<?php

//TODO - Arctan function isn't in my current imagick.

\Intahwebz\Functions::load();

//yolo - We use a global to allow us to do a hack to make all the code examples
//appear to use the standard 'header' function, but also capture the content type 
//of the image
$imageType = null;


/**
 * @return \Auryn\Provider
 */
function bootstrap() {

    $injector = new Auryn\Provider();
    $jigConfig = new Intahwebz\Jig\JigConfig(
        "../templates/",
        "../var/compile/",
        'tpl',
        \Intahwebz\Jig\JigRender::COMPILE_CHECK_MTIME
    );

    $injector->share($jigConfig);

    $injector->defineParam('imageBaseURL', null);
    $injector->defineParam('pageTitle', "Imagick demos");

    $injector->alias(\ImagickDemo\Example::class, \ImagickDemo\NullExample::class);
    $injector->alias(ImagickDemo\Control::class, ImagickDemo\Control\NullControl::class);
    $injector->alias(Intahwebz\Request::class, Intahwebz\Routing\HTTPRequest::class);

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
    $injector->defineParam('activeNav', null);
    $injector->share(ImagickDemo\Navigation\Nav::class);
    $injector->alias(\ImagickDemo\Navigation\ActiveNav::class, \ImagickDemo\Navigation\DefaultNav::class);
    $injector->share($injector); //yolo - use injector as service locator

    return $injector;
}

function setupImage(\Auryn\Provider $injector, $category, $example = null) {

    $cache = false;

    if (strlen($example) === 0) {
        $example = null;
    }

    setupExample($injector, $category, $example, true);
    
    if ($cache == true) {
        $injector->execute([\ImagickDemo\ImageExampleCache::class, 'renderImageSafe']);
    }
    else {
        if (false) {
            $injector->execute([\ImagickDemo\Example::class, 'renderImage']);
        }
        else {
            $object = $injector->make(\ImagickDemo\Example::class);
            $injector->execute([$object, 'renderImage']);
        }
    }
    exit(0);
}



function setupExample(\Auryn\Provider $injector, $category, $example = null, $image = false) {

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

    $injector->defineParam('imageBaseURL', '/image/'.$category.'/'.$example);
    $injector->alias('ImagickDemo\ExampleList', "ImagickDemo\\".$category."\\ExampleList");
    $injector->alias(\ImagickDemo\Navigation\ActiveNav::class, \ImagickDemo\Navigation\Nav::class);

    $nav = $injector->make(ImagickDemo\Navigation\Nav::class, [
        ':category' => $category,
        ':example' => $example
    ]);

    $nav->setupControlAndExample($injector);

    if ($image == false) {
        renderTemplate($injector);
    }
}

function renderTemplate(\Auryn\Provider $injector) {
    $viewModel = $injector->make(Intahwebz\ViewModel\BasicViewModel::class);
    $jigRenderer = $injector->make(Intahwebz\Jig\JigRender::class);
    $jigRenderer->bindViewModel($viewModel);
    $viewModel->setVariable('pageTitle', "Imagick demos");
    $jigRenderer->renderTemplateFile('index');
}


function setupRootIndex(\Auryn\Provider $injector) {
    renderTemplate($injector);
}

$routesFunction = function(FastRoute\RouteCollector $r) {

    $categories = '{category:Imagick|ImagickDraw|ImagickPixel|ImagickPixelIterator|Example}';

    //Category indices
    $r->addRoute(
      'GET',
          "/$categories",
          'setupExample'
    );

    //Category + example
    $r->addRoute(
      'GET',
          "/$categories/{example:[a-zA-Z]+}",
          'setupExample'
    );

    //Images
    $r->addRoute(
      'GET',
          "/image/$categories/{example:[a-zA-Z]*}",
          'setupImage'
    );

    $r->addRoute(
      'GET',
          "/help/$categories/{example:[a-zA-Z]+}",
          'setupHelp'
    );
    
    //root
    $r->addRoute('GET', '/', 'setupRootIndex');
};


$dispatcher = FastRoute\simpleDispatcher($routesFunction);

$httpMethod = 'GET';
$uri = '/';

if(array_key_exists('REQUEST_URI', $_SERVER)){
    $uri = $_SERVER['REQUEST_URI'];
}

// $uri = '/image/Imagick/raiseImage?image=Lorikeet';


$path = $uri;
$queryPosition = strpos($path, '?');
if ($queryPosition !== false) {
    $path = substr($path, 0, $queryPosition);
}

$injector = bootstrap(); 
$injector->defineParam('activeNav', $path);
$routeInfo = $dispatcher->dispatch($httpMethod, $path);

function process(\Auryn\Provider $injector, $handler, $vars) {

    $lowried = [];
    foreach ($vars as $key => $value) {
        $lowried[':'.$key] = $value;
    }

    $injector->execute($handler, $lowried);
}



//$handler = [
//    'ImagickDemo\ImagickNav',
//    'display'
//];
//
//$vars = [
//  'example' => 'uniqueImageColors'
//];
//
//process($injector, $handler, $vars);
//
//exit(0);


switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND: {
        header("HTTP/1.0 404 Not Found", true, 404);
        echo "No route matched";
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

        process($injector, $handler, $vars);
        break;
    }
}



