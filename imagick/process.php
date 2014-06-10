<?php

//TODO - Arctan function isn't in my current imagick.

\Intahwebz\Functions::load();

//yolo - We use a global to allow us to do a hack to make all the code examples
//appear to use the standard 'header' function, but also capture the content type 
//of the image
$imageType = null;
$imageCache = false;


/**
 * @return \Auryn\Provider
 */
function bootstrap() {

    $injector = new Auryn\Provider();
    $jigConfig = new Intahwebz\Jig\JigConfig(
        "../templates/",
        "../var/compile/",
        'tpl',
        \Intahwebz\Jig\JigRender::COMPILE_CHECK_EXISTS
    );

    $injector->share($jigConfig);

    $injector->defineParam('imageBaseURL', null);
    $injector->defineParam('customImageBaseURL', null);
    $injector->defineParam('pageTitle', "Imagick demos");
    //TODO - move these elsewhere or delete
    $injector->defineParam('standardImageWidth', 500);
    $injector->defineParam('standardImagHeight', 500);
    $injector->defineParam('smallImageWidth', 350); 
    $injector->defineParam('smallImageHeight', 300);

    $injector->alias(ImagickDemo\Control::class, ImagickDemo\Control\NullControl::class);
    $injector->alias(\ImagickDemo\Navigation\Nav::class, \ImagickDemo\Navigation\NullNav::class);
    $injector->alias(Intahwebz\Request::class, Intahwebz\Routing\HTTPRequest::class);
    $injector->alias(\ImagickDemo\Example::class, \ImagickDemo\NullExample::class);

    $injector->share(\ImagickDemo\Control::class);
    $injector->share(\ImagickDemo\Example::class);
    $injector->share(ImagickDemo\Navigation\Nav::class);

    $injector->define(ImagickDemo\DocHelper::class, [
        ':category' => null,
        ':example' => null
    ]);

    $injector->define(
    Intahwebz\Routing\HTTPRequest::class,
        array(
            ':server' => $_SERVER,
            ':get' => $_GET,
            ':post' => $_POST,
            ':files' => $_FILES,
            ':cookie' => $_COOKIE
        )
    );

    $injector->defineParam('imageCachePath', "../var/cache/imageCache/");
    $injector->share($injector); //yolo - use injector as service locator

    return $injector;
}

function setupImageDelegation(\Auryn\Provider $injector, $category, $example) {
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

        $filename = "../var/cache/imageCache/".$category.'/'.$example;
        $control = $injector->make(\ImagickDemo\Control::class);
        $params = $control->getParams();
        
        if (!empty($params)) {
            $filename .= '_'.md5(json_encode($params));
        }
    
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
    
        ob_start();

        $injector->execute($functionFullname);

        if ($imageType == null) {
            throw new \Exception("imageType not set, can't cache image correctly.");
        }

        $image = ob_get_contents();
        @mkdir(dirname ($filename), 0755, true);
        //TODO - is this atomic?
        file_put_contents($filename.".".strtolower($imageType), $image);
        ob_end_flush();
        //ob_end_clean();
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

    $params = ['a', 'adaptiveOffset', 'alpha', 'amount', 'amplitude', 'angle', 'b', 'backgroundColor', 'bestFit', 'blackPoint', 'blueShift', 'brightness', 'canvasType', 'channel', 'clusterThreshold', 'color', 'colorElement', 'colorSpace',  'contrast',  'contrastType', 'distortionExample', 'dither', 'endAngle', 'endX', 'endY', 'evaluateType', 'fillColor', 'firstTerm', 'fillModifiedColor', 'fourthTerm', 'fuzz', 'g', 'gamma', 'gradientStartColor', 'gradientEndColor', 'grayOnly', 'height', 'highThreshold', 'hue', 'image', 'imagePath', 'innerBevel', 'length', 'lowThreshold', 'meanOffset', 'noiseType', 'numberColors', 'opacity', 'originX', 'originY', 'outerBevel', 'paintType', 'r', 'raise', 'radius', 'reduceNoise', 'rollX', 'rollY', 'roundX', 'roundY', 'saturation', 'secondTerm', 'sepia', 'shearX', 'shearY', 'sigma', 'skew', 'smoothThreshold', 'solarizeThreshold', 'startAngle', 'startX', 'startY', 'statisticType', 'strokeColor', 'swirl', 'textDecoration', 'textUnderColor', 'thirdTerm', 'threshold', 'thresholdAngle', 'thresholdColor', 'translateX', 'translateY', 'treeDepth', 'unsharpThreshold', 'virtualPixelType', 'whitePoint', 'x', 'y', 'w20', 'width', 'h20', 'sharpening', 'midpoint', 'sigmoidalContrast',];


    foreach ($params as $param) {
        $paramGet = 'get'.ucfirst($param);
        $injector->delegateParam(
                 $param,
                     [$controlClass, $paramGet]
        );
    }

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



$injector = bootstrap(); 
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