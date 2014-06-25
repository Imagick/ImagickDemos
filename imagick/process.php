<?php

require __DIR__."../../imagick-demos.conf.php";
require __DIR__.'/../src/bootstrap.php';


use ImagickDemo\Response\StandardHTTPResponse;


\Intahwebz\Functions::load();

register_shutdown_function('fatalErrorShutdownHandler');
set_error_handler('errorHandler');
set_exception_handler('exceptionHandler');


$startTime = microtime(true);

function setupCustomImageDelegation(\Auryn\Provider $injector, $category, $example) {
    $function = setupExampleInjection($injector, $category, $example); 
    $className = sprintf('ImagickDemo\%s\%s', $category, $function);
    $response = $injector->execute([$className, 'renderCustomImage']);
    
    return $response;
}


/**
 * @param \Auryn\Provider $injector
 * @param $handler
 * @param $vars
 * @return \ImagickDemo\Response\Response $response;
 */
function process(\Auryn\Provider $injector, $handler, $vars) {

    $lowried = [];
    foreach ($vars as $key => $value) {
        $lowried[':'.$key] = $value;
    }

    $response = $injector->execute($handler, $lowried);

    return $response;
}


$routesFunction = function(FastRoute\RouteCollector $r) {

    $categories = '{category:Imagick|ImagickDraw|ImagickPixel|ImagickPixelIterator|Example}';

    //Category indices
    $r->addRoute(
        'GET',
        "/$categories",
        [\ImagickDemo\Controller\Page::class, 'setupCatergoryDelegation']
    );

    //Category + example
    $r->addRoute(
        'GET',
        "/$categories/{example:[a-zA-Z]+}",
        [\ImagickDemo\Controller\Page::class, 'setupExampleDelegation']
    );

    //Images
    $r->addRoute(
        'GET',
        "/image/$categories/{example:[a-zA-Z]+}",
        [\ImagickDemo\Controller\Page::class, 'getImageResponse']
    );

    $r->addRoute(
      'GET',
          "/customImage/$categories/{example:[a-zA-Z]*}",
          'setupCustomImageDelegation'
    );


    $r->addRoute('GET', '/info', [\ImagickDemo\Controller\ServerInfo::class, 'createResponse']);
    
    //root
    $r->addRoute('GET', '/', [\ImagickDemo\Controller\Page::class, 'setupRootIndex']);
};



function servePage($routesFunction) {

    $dispatcher = FastRoute\simpleDispatcher($routesFunction);

    $httpMethod = 'GET';
    $uri = '/';

    if (array_key_exists('REQUEST_URI', $_SERVER)) {
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

    switch ($routeInfo[0]) {
        case FastRoute\Dispatcher::NOT_FOUND: {
            return new StandardHTTPResponse(404, $uri);
        }

        case FastRoute\Dispatcher::METHOD_NOT_ALLOWED: {
            $allowedMethods = $routeInfo[1];
            // ... 405 Method Not Allowed
            return new StandardHTTPResponse(405, $uri);
        }

        case FastRoute\Dispatcher::FOUND: {
            $handler = $routeInfo[1];
            $vars = $routeInfo[2];
            //TODO - support head?
            return process($injector, $handler, $vars);
        }
    }
};


$response = servePage($routesFunction);

if ($response != null) {
    $response->send();
}

fastcgi_finish_request();

//Everything below here should never affect user time.

$time = microtime(true) - $startTime;
$asyncStats = $injector->make('Stats\AsyncStats');
$asyncStats->recordTime(
    \ImagickDemo\Queue\ImagickTaskRunner::event_pageGenerated,
    $time
);