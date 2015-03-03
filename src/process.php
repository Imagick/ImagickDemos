<?php


http://stackoverflow.com/questions/22540211/php-imagick-distorting-text-in-arc-clipping/22618900#22618900

$startTime = microtime(true);


require __DIR__ . '/../src/bootstrap.php';

ini_set('display_errors', 'on');


\Intahwebz\Functions::load();

register_shutdown_function('fatalErrorShutdownHandler');
set_error_handler('errorHandler');
set_exception_handler('exceptionHandler');

$injector = bootstrapInjector();

$injector->alias('Intahwebz\Request', 'Intahwebz\Routing\HTTPRequest');

$routesFunction = $injector->execute('getRoutes');

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