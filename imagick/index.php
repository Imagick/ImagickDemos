<?php


if (defined('LOW_MEM_CLASS_LOADER') && LOW_MEM_CLASS_LOADER == true) {
    require_once('../vendor/intahwebz/lowmemoryclassloader/LowMemoryClassloader.php');
}
else {
    require_once('../vendor/autoload.php');
}

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

    $injector->share($colors);

    $injector->share($injector); //yolo

    return $injector;
}


$injector = bootstrap();


$routesFunction = function(FastRoute\RouteCollector $r) {
    

    $r->addRoute('GET', '/ImagickDraw/{example:[a-zA-Z]+}', [\ImagickDemo\ImagickDraw\ImagickDraw::class, 'display']);

    $r->addRoute(
        'GET', 
        '/image/ImagickDraw/{example:[a-zA-Z]+}',
        [\ImagickDemo\ImagickDraw\ImagickDraw::class, 'renderImage']
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







switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        // ... 404 Not Found
    break;
    
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        // ... 405 Method Not Allowed
    break;
    
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        // ... call $handler with $vars
        
        $lowried = [];
        foreach ($vars as $key => $value) {
            $lowried[':'.$key] = $value; 
        }
        
        $injector->execute($handler, $lowried);

        $viewModel = $injector->make('Intahwebz\ViewModel\BasicViewModel');
        $jigRenderer = $injector->make(Intahwebz\Jig\JigRender::class);
        //$jigRenderer->bindViewModel($viewModel);
        $jigRenderer->renderTemplateFile('index');

        break;
}

