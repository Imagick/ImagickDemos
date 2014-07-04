<?php

if (defined('LOW_MEM_CLASS_LOADER') && LOW_MEM_CLASS_LOADER == true) {
    require __DIR__.'/../vendor/intahwebz/lowmemoryclassloader/LowMemoryClassloader.php';
}
else {
    require __DIR__.'/../vendor/autoload.php';
}


require __DIR__ . "../../imagick-demos.conf.php";
require __DIR__ . '/../src/bootstrap.php';


use ImagickDemo\Response\StandardHTTPResponse;
use ImagickDemo\Response\FileResponse;




\Intahwebz\Functions::load();

register_shutdown_function('fatalErrorShutdownHandler');
set_error_handler('errorHandler');
set_exception_handler('exceptionHandler');

$startTime = microtime(true);



function createFileResponseIfFileExists($filename) {
    $extensions = ["jpg", 'jpeg', "gif", "png", ];

    foreach ($extensions as $extension) {
        $filenameWithExtension = $filename.".".$extension;
        if (file_exists($filenameWithExtension) == true) {
            //TODO - content type should actually be image/jpeg
            return new FileResponse($filenameWithExtension, "image/".$extension);
        }
    }

    return null;
}



function setupCustomImageDelegation(\Auryn\Provider $injector, $category, $example) {
    $function = setupExampleInjection($injector, $category, $example); 
    $className = sprintf('ImagickDemo\%s\%s', $category, $function);
    $namespace = 'ImagickDemo\\'.$category.'\functions';
    $namespace::load();
    
    global $imageCache;
    
    if ($imageCache == false) {
        $injector->execute([$className, 'renderCustomImage']);
        return null;
    }

    $controller = $injector->make($className);
    $params = $controller->getCustomImageParams();
    $filename = getImageCacheFilename($category, $example.".custom", $params);
    
    $response = createFileResponseIfFileExists($filename);

    if ($response) {
        return $response;
    }

    $response = createAndCacheFile($injector, [$controller, 'renderCustomImage'], $filename);

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

    $categories = '{category:Imagick|ImagickDraw|ImagickPixel|ImagickPixelIterator|Tutorial}';

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



function servePage(\Auryn\Provider $injector, $routesFunction) {

    $dispatcher = FastRoute\simpleDispatcher($routesFunction);

    $httpMethod = 'GET';
    $uri = '/';

    if (array_key_exists('REQUEST_URI', $_SERVER)) {
        $uri = $_SERVER['REQUEST_URI'];
    }

//$uri = "/customImage/Tutorial/composite?compositeExample=multiplyGradients";

//    $uri = "/image/Imagick/resizeImage?image=Lorikeet&filterType=31&width=200&height=200&blur=1&bestFit=1&cropZoom=1&task=0";

    $path = $uri;
    $queryPosition = strpos($path, '?');
    if ($queryPosition !== false) {
        $path = substr($path, 0, $queryPosition);
    }

    $routeInfo = $dispatcher->dispatch($httpMethod, $path);

    switch ($routeInfo[0]) {
        case FastRoute\Dispatcher::NOT_FOUND: {
            return new StandardHTTPResponse(404, $uri, "Not found");
        }

        case FastRoute\Dispatcher::METHOD_NOT_ALLOWED: {
            $allowedMethods = $routeInfo[1];
            // ... 405 Method Not Allowed
            return new StandardHTTPResponse(405, $uri, "Not allowed");
        }

        case FastRoute\Dispatcher::FOUND: {
            $handler = $routeInfo[1];
            $vars = $routeInfo[2];
            //TODO - support head?
            return process($injector, $handler, $vars);
        }
    }
};


$injector = bootstrapInjector();

$response = servePage($injector, $routesFunction);


if ($response != null) {
    $response->send();
}


if (php_sapi_name() === 'fpm-fcgi') {
//if (function_exists('fastcgi_finish_request'){
    fastcgi_finish_request();
}

//Everything below here should never affect user time.

$time = microtime(true) - $startTime;
$asyncStats = $injector->make('Stats\AsyncStats');
$asyncStats->recordTime(
    \ImagickDemo\Queue\ImagickTaskRunner::event_pageGenerated,
    $time
);