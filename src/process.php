<?php

$startTime = microtime(true);


require __DIR__ . '/../src/bootstrap.php';


\Intahwebz\Functions::load();

register_shutdown_function('fatalErrorShutdownHandler');
set_error_handler('errorHandler');
set_exception_handler('exceptionHandler');


$routesFunction = function(\FastRoute\RouteCollector $r) {

    $categories = '{category:Imagick|ImagickDraw|ImagickPixel|ImagickPixelIterator|Tutorial}';

    //Category indices
    $r->addRoute(
        'GET',
        "/$categories",
        [\ImagickDemo\Controller\Page::class, 'renderCategoryIndex']
    );

    //Category + example
    $r->addRoute(
        'GET',
        "/$categories/{example:[a-zA-Z]+}",
        [\ImagickDemo\Controller\Page::class, 'renderExamplePage']
    );

    //Images
    $r->addRoute(
        'GET',
        "/image/$categories/{example:[a-zA-Z]+}",
        [\ImagickDemo\Controller\Image::class, 'getImageResponse']
    );

    //Custom images
    $r->addRoute(
        'GET',
        "/customImage/$categories/{example:[a-zA-Z]*}",
        [\ImagickDemo\Controller\Image::class, 'getCustomImageResponse']
    );
    
    $r->addRoute('GET', '/info', [\ImagickDemo\Controller\ServerInfo::class, 'createResponse']);
    $r->addRoute('GET', '/', [\ImagickDemo\Controller\Page::class, 'renderTitlePage']);
};


$injector = bootstrapInjector();
$response = servePage($injector, $routesFunction);
if ($response != null) {
    $response->send();
}

if (php_sapi_name() === 'fpm-fcgi') {
    fastcgi_finish_request();
}

//Everything below here should never affect user time.
$time = microtime(true) - $startTime;
$asyncStats = $injector->make('Stats\AsyncStats');
$asyncStats->recordTime(
    \ImagickDemo\Queue\ImagickTaskRunner::event_pageGenerated,
    $time
);