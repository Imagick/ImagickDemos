<?php

//TODO - Arctan function isn't in my current imagick.

require "../../imagick-demos.conf.php";
require "../src/bootstrap.php";

\Intahwebz\Functions::load();

use ImagickDemo\Queue\ImagickTask;
use ImagickDemo\Queue\RedisTaskQueue;
use Intahwebz\Request;



function serverCachedFileIfExists($filename) {
    $extensions = ["jpg", "gif", "png"];
    
    foreach ($extensions as $extension) {
        $filenameWithExtension = $filename.".".$extension;
        if (file_exists($filenameWithExtension) == true) {
            \header("Content-Type: image/".$extension);
            readfile($filenameWithExtension);
            //It was read from cache, no need to process further
            exit(0);
        }
    }

}


function setupImageDelegation(\Auryn\Provider $injector, Request $request, $category, $example) {
    $function = setupExampleInjection($injector, $category, $example);
    $namespace = sprintf('ImagickDemo\%s\functions', $category);
    $namespace::load();

    global $imageCache;

    $functionFullname = 'ImagickDemo\\'.$category.'\\'.$function;

    if ($imageCache == false) {        
        $injector->execute($functionFullname);   
    }
    else {
        global $imageType;
        $control = $injector->make(\ImagickDemo\Control::class);
        $filename = getImageCacheFilename($category, $example, $control->getParams());
        serverCachedFileIfExists($filename);
        
        if (true) {

            $job = $request->getVariable('job');
            if ($job === false) {
                $task = new ImagickTask($category, $example, $control);
                $queue = $injector->make('ImagickDemo\Queue\RedisTaskQueue');
                $queue->pushTask($task);
                $job = 0;
  //              echo "task pushed";
            }
            else {
                $job++;
//                echo "incremented job";
            }

            if ($job > 20) {
                //probably ought to time out at some point.
            }
            

            usleep(1000);
            $url = $control->getURL()."&job=".$job;
            //echo "Redirect to ".$url;
            header('Location: '.$url, 307);

        }
        else {
            $image = createAndCacheFile($injector, $functionFullname, $filename);
            header("Content-Type: image/".$imageType);
            echo $image;
        }
    }

    exit(0);   
}

function setupExampleDelegation(\Auryn\Provider $injector, $category, $example) {
    setupExampleInjection($injector, $category, $example);
    renderTemplate($injector);
}

function setupExampleInjection(\Auryn\Provider $injector, $category, $example) {

    $injector->alias(\ImagickDemo\Navigation\Nav::class, \ImagickDemo\Navigation\CategoryNav::class);
    $injector->define(ImagickDemo\Navigation\CategoryNav::class, [
        ':category' => $category,
        ':example' => $example
    ]);

    $categoryNav = $injector->make(ImagickDemo\Navigation\CategoryNav::class);
    
    $exampleDefinition = $categoryNav->getExampleDefinition($category, $example);
    $function = $exampleDefinition[0];
    $controlClass = $exampleDefinition[1];

    if (array_key_exists('defaultParams', $exampleDefinition) == true) {
        foreach($exampleDefinition['defaultParams'] as $name => $value) {
            $defaultName = 'default'.ucfirst($name);
            $injector->defineParam($defaultName, $value);
        }
    }

    $injector->defineParam('imageBaseURL', '/image/'.$category.'/'.$example);
    $injector->defineParam('customImageBaseURL', '/customImage/'.$category.'/'.$example);
    $injector->defineParam('activeCategory', $category);
    $injector->alias(\ImagickDemo\Control::class, $controlClass);
    $injector->share($controlClass);

    $injector->define(ImagickDemo\DocHelper::class, [
        ':category' => $category,
        ':example' => $example
    ]);

    delegateAllTheThings($injector, $controlClass);
    $injector->alias(\ImagickDemo\Example::class, sprintf('ImagickDemo\%s\%s', $category, $function));

    return $function;
}


function setupCustomImageDelegation(\Auryn\Provider $injector, $category, $example) {
    $function = setupExampleInjection($injector, $category, $example); 
    $className = sprintf('ImagickDemo\%s\%s', $category, $function);
    $injector->execute([$className, 'renderCustomImage']);
}


function setupCatergoryDelegation(\Auryn\Provider $injector, $category) {
    $validCatergories = [
        'Imagick',
        'ImagickDraw',
        'ImagickPixel',
        'ImagickPixelIterator',
        'Example',
    ];

    if (in_array($category, $validCatergories) == false) {
        throw new \Exception("Category is not valid.");
    }

    $injector->defineParam('imageBaseURL', '/image/'.$category);
    $injector->defineParam('customImageBaseURL', '/customImage/'.$category);
    $injector->defineParam('activeCategory', $category);

    $injector->share(\ImagickDemo\Control::class);
    $injector->alias(ImagickDemo\ExampleList::class, "ImagickDemo\\".$category."\\ExampleList");
    $injector->alias(\ImagickDemo\Example::class, sprintf('ImagickDemo\%s\IndexExample', $category));
    $injector->alias(\ImagickDemo\Navigation\Nav::class, \ImagickDemo\Navigation\CategoryNav::class);
    $injector->define(ImagickDemo\Navigation\CategoryNav::class, [
        ':category' => $category,
        ':example' => null
    ]);

    $injector->define(ImagickDemo\DocHelper::class, [
        ':category' => $category,
        ':example' => null
    ]);

    renderTemplate($injector);
}

function renderTemplate(\Auryn\Provider $injector) {
    $viewModel = $injector->make(Intahwebz\ViewModel\BasicViewModel::class);
    $jigRenderer = $injector->make(Intahwebz\Jig\JigRender::class);
    $jigRenderer->bindViewModel($viewModel);
    $viewModel->setVariable('pageTitle', "Imagick demos");
    $jigRenderer->renderTemplateFile('index');
}


function setupRootIndex(\Auryn\Provider $injector) {
    $injector->alias(\ImagickDemo\Example::class, ImagickDemo\HomePageExample::class);

    //TODO - setup 
    renderTemplate($injector);
}




function setupInfo() {

    $knownServers = [
        'imagick.test',
        'phpimagick.com',
        'test.phpimagick.com'
    ];

    $serverName = null;

    if(array_key_exists("HTTP_HOST", $_SERVER)) {
        $allgedServerName = strtolower($_SERVER["HTTP_HOST"]);
        
        if (in_array($allgedServerName, $knownServers)) {
            $serverName = $allgedServerName;
        }
    }

    $client = new Artax\Client;
    $url ="http://".$serverName."/www-status?full&json";
    $response = $client->request($url);

    $headers = [
        "pool" => "Pool name",
        "process manager" => "Process manager",
        "start time" => "Start time",
        "start since" => "Uptime",
        "accepted conn" => "Accepted connections",
        "listen queue" => "Listen queue",
        "max listen queue" => "Max listen queue",
        "listen queue len" => "Listen queue length",
        "idle processes" => "Idle processes",
        "active processes" => "Active processes",
        "total processes" => "Total processes",
        "max active processes" => "Max active processes",
        "max children reached" => "Max children reached",
        "slow requests" => "Slow requests",
    ];

    $json = json_decode($response->getBody(), true);

    echo "<table>";
    foreach ($headers as $header => $display) {
        echo "<tr><td>";
        echo $display;
        echo "</td><td>";
        echo $json[$header];
        echo "</td></tr>";
    }
    echo "</table>";
    
    echo "<table>";

    $processHeaders = [
        "pid",
        "state",
        "start time",
        "start since",
        "requests",
        "request duration",
        //"request method",
        "request URI",
        "content length",
        //"user",
        "script",
        "last request cpu",
        "last request memory",
    ];

    foreach ($processHeaders as $processHeader) {
        echo "<th>";
        echo $processHeader;
        echo "</th>";
    }

    foreach ($json['processes'] as $process) {
        echo "<tr>";
        
            foreach ($processHeaders as $processHeader) {
                echo "<td align='right'>";
                if (array_key_exists($processHeader, $process)) {
                    $text = $process[$processHeader];

                    $text = str_replace([
                        '/home/github/imagick-demos//imagick',
                        '/home/github/imagick-demos/imagick'
                        ],
                        '',
                        $text
                    );
                    
                    echo $text;
                }
                else {
                    echo "-";
                }
                echo "</td>";
            }
        
        
        echo "</tr>";
    }

    echo "</table>";

}


$routesFunction = function(FastRoute\RouteCollector $r) {

    $categories = '{category:Imagick|ImagickDraw|ImagickPixel|ImagickPixelIterator|Example}';

    //Category indices
    $r->addRoute(
      'GET',
          "/$categories",
          'setupCatergoryDelegation'
    );

    //Category + example
    $r->addRoute(
        'GET',
        "/$categories/{example:[a-zA-Z]+}",
        'setupExampleDelegation'
    );

    //Images
    $r->addRoute(
      'GET',
          "/image/$categories/{example:[a-zA-Z]+}",
          'setupImageDelegation'
    );

    $r->addRoute(
      'GET',
          "/customImage/$categories/{example:[a-zA-Z]*}",
          'setupCustomImageDelegation'
    );

    $r->addRoute(
      'GET',
          "/help/$categories/{example:[a-zA-Z]+}",
          'setupHelp'
    );

    $r->addRoute('GET', '/info', 'setupInfo');
    
    //root
    $r->addRoute('GET', '/', 'setupRootIndex');
};




$dispatcher = FastRoute\simpleDispatcher($routesFunction);

$httpMethod = 'GET';
$uri = '/';

if(array_key_exists('REQUEST_URI', $_SERVER)){
    $uri = $_SERVER['REQUEST_URI'];
}

//$uri = "/customImage/Example/composite?compositeExample=multiplyGradients";

$path = $uri;
$queryPosition = strpos($path, '?');
if ($queryPosition !== false) {
    $path = substr($path, 0, $queryPosition);
}


$injector = bootstrapInjector(); 
$routeInfo = $dispatcher->dispatch($httpMethod, $path);

function process(\Auryn\Provider $injector, $handler, $vars) {

    $lowried = [];
    foreach ($vars as $key => $value) {
        $lowried[':'.$key] = $value;
    }

    $injector->execute($handler, $lowried);
}


switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND: {
        header("HTTP/1.0 404 Not Found", true, 404);
        echo "No route matched. No route matched.No route matched.No route matched.No route matched.No route matched.No route matched.No route matched.";
        break;
    }

    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED: {
        $allowedMethods = $routeInfo[1];
        // ... 405 Method Not Allowed
        break;
    }

    case FastRoute\Dispatcher::FOUND: {
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        // ... call $handler with $vars
        //TODO - support head?

        process($injector, $handler, $vars);
        break;
    }
}


/*

function renderImageSafe() {
    try {
        $this->renderImage();
    }
    catch(\Exception $e) {
        $draw = new \ImagickDraw();

        $strokeColor = new \ImagickPixel('none');
        $lightColor = new \ImagickPixel('brown');

        $draw->setStrokeColor($strokeColor);
        $draw->setFillColor($lightColor);
        $draw->setStrokeWidth(1);
        $draw->setFontSize(24);
        $draw->setFont("../fonts/Arial.ttf");

        $draw->setTextAntialias(false);
        $draw->annotation(50, 75, $e->getMessage());

        $imagick = new \Imagick();
        $imagick->newImage(500, 250, "SteelBlue2");
        $imagick->setImageFormat("png");
        $imagick->drawImage($draw);

        header("Content-Type: image/png");
        echo $imagick->getImageBlob();
    }
}

*/