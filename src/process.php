<?php

// http://stackoverflow.com/questions/22540211/php-imagick-distorting-text-in-arc-clipping/22618900#22618900

require __DIR__ . '/../src/bootstrap.php';

ini_set('display_errors', 'on');


\Intahwebz\Functions::load();

register_shutdown_function('fatalErrorShutdownHandler');
set_error_handler('errorHandler');
set_exception_handler('exceptionHandler');

$injector = bootstrapInjector();

$injector->alias('Intahwebz\Request', 'Intahwebz\Routing\HTTPRequest');

if (false) {
    $sessionManager = $injector->make('ASM\SessionManager');
    $session = $sessionManager->createSession($_COOKIE);
    $injector->alias('ASM\Session', get_class($session));
    $injector->share($session);
}

$routesFunction = $injector->execute('getRoutes');
$response = servePage($injector, $routesFunction);

$headers = [];

if (false) {
    $session->save();
    $headers = $session->getHeaders(\ASM\SessionManager::CACHE_NO_CACHE);
}

if ($response != null) {
    $response->send($headers);
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