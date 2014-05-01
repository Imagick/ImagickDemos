<?php


if (defined('LOW_MEM_CLASS_LOADER') && LOW_MEM_CLASS_LOADER == true) {
    require_once('../vendor/intahwebz/lowmemoryclassloader/LowMemoryClassloader.php');
}
else {
    require_once('../vendor/autoload.php');
}


function getPrevious($array, $current) {

    $previous = null;

    foreach ($array as $element) {
        if ($current == $element) {
            return $previous;
        }
        $previous = $element;
    }

    return null;
}

function getNext($array, $current) {
    $next = false;

    foreach ($array as $element) {

        if ($next == true) {
            return $element;
        }
        if ($current == $element) {
            $next = true;
        }
    }

    return null;
}



//Arctan function isn't in my current imagick.

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
    
    $colors = new \ImagickDemo\Colors(
        "SteelBlue2",
        'DarkSlateGrey',
        'LightCoral'
    );
    
    //$injector->defineParam('imagePath', "../images/TestImage.jpg");
    //$injector->defineParam('imagePath', "../images/TestImage2.jpg");

    //$injector->defineParam('imagePath', "../images/fnord.png");
    $injector->defineParam('imagePath', "../images/Skyline_400.jpg");
    $injector->share($colors);
    $injector->share($injector); //yolo

    return $injector;
}


$injector = bootstrap();


$routesFunction = function(FastRoute\RouteCollector $r) {
    


    $r->addRoute(
      'GET',
          '/Imagick',
          [\ImagickDemo\ImagickNav::class, 'displayIndex']
    );

    $r->addRoute(
      'GET',
          '/ImagickDraw',
          [\ImagickDemo\ImagickDrawNav::class, 'displayIndex']
    );

    $r->addRoute(
      'GET',
          '/ImagickPixel{trail:\/?}',
          [\ImagickDemo\ImagickPixelNav::class, 'displayIndex']
    );

    $r->addRoute(
      'GET',
          '/ImagickPixelIterator',
          [\ImagickDemo\ImagickPixelIteratorNav::class, 'displayIndex']
    );

    $r->addRoute(
      'GET',
          '/Example',
          [\ImagickDemo\ExampleNav::class, 'displayIndex']
    );

    $r->addRoute(
      'GET',
          '/ImagickDraw/{example:[a-zA-Z]+}',
          [\ImagickDemo\ImagickDrawNav::class, 'display']
    );

    $r->addRoute(
      'GET',
          '/image/ImagickDraw/{example:[a-zA-Z]+}',
          [\ImagickDemo\ImagickDrawNav::class, 'renderImage']
    );

    $r->addRoute(
      'GET',
          '/ImagickPixel/{example:[a-zA-Z]+}',
          [\ImagickDemo\ImagickPixelNav::class, 'display']
    );

    $r->addRoute(
      'GET',
          '/image/ImagickPixel/{example:[a-zA-Z]+}',
          [\ImagickDemo\ImagickPixelNav::class, 'renderImage']
    );

    $r->addRoute(
      'GET',
          '/ImagickPixelIterator/{example:[a-zA-Z]+}',
          [\ImagickDemo\ImagickPixelIteratorNav::class, 'display']
    );

    $r->addRoute(
      'GET',
          '/image/ImagickPixelIterator/{example:[a-zA-Z]+}',
          [\ImagickDemo\ImagickPixelIteratorNav::class, 'renderImage']
    );

    $r->addRoute(
      'GET',
          '/Imagick/{example:[a-zA-Z]+}',
          [\ImagickDemo\ImagickNav::class, 'display']
    );

    $r->addRoute(
      'GET',
          '/image/Imagick/{example:[a-zA-Z]+}',
          [\ImagickDemo\ImagickNav::class, 'renderImage']
    );

    $r->addRoute(
      'GET',
          '/Example/{example:[a-zA-Z]+}',
          [\ImagickDemo\ExampleNav::class, 'display']
    );

    $r->addRoute(
      'GET',
          '/image/Example/{example:[a-zA-Z]+}',
          [\ImagickDemo\ExampleNav::class, 'renderImage']
    );



    $r->addRoute('GET', '/', [\ImagickDemo\Index::class, 'display']);
    
//    $r->addRoute('GET', '/ImagickDraw/affine', [\ImagickDemo\ImagickDraw\ImagickDraw::class, 'display']);
//    $r->addRoute('GET', '/user/{name}/{id:[0-9]+}', 'handler0');
//    $r->addRoute('GET', '/user/{id:[0-9]+}', 'handler1');
//    $r->addRoute('GET', '/user/{name}', 'handler2');


};




$dispatcher = FastRoute\simpleDispatcher($routesFunction);

$httpMethod = 'GET';
$uri = '/';

if(array_key_exists('REQUEST_URI', $_SERVER)){
    //$uri = parse_url($_SERVER['REQUEST_URI']);
    $uri = $_SERVER['REQUEST_URI'];
}


$routeInfo = $dispatcher->dispatch($httpMethod, $uri);



function process(\Auryn\Provider $injector, $handler, $vars) {

    $lowried = [];
    foreach ($vars as $key => $value) {
        $lowried[':'.$key] = $value;
    }

   

    $injector->alias('ImagickDemo\ActiveNav', 'ImagickDemo\DefaultNav');

    $activeNav = $injector->execute($handler, $lowried);

    $viewModel = $injector->make('Intahwebz\ViewModel\BasicViewModel');
    $jigRenderer = $injector->make(Intahwebz\Jig\JigRender::class);
    //$jigRenderer->bindViewModel($viewModel);
    $jigRenderer->renderTemplateFile('index');
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
    case FastRoute\Dispatcher::NOT_FOUND:
        // ... 404 Not Found
        echo "No route matched";
    break;
    
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        // ... 405 Method Not Allowed
    break;
    
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        // ... call $handler with $vars

        process($injector, $handler, $vars);

        break;
}

