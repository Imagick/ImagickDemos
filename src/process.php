<?php

// http://stackoverflow.com/questions/22540211/php-imagick-distorting-text-in-arc-clipping/22618900#22618900

require __DIR__ . '/../src/bootstrap.php';

use ImagickDemo\Response\Response;
use ImagickDemo\Tier;

ini_set('display_errors', 'on');

\Intahwebz\Functions::load();

//register_shutdown_function('fatalErrorShutdownHandler');
//set_error_handler('errorHandler');
set_exception_handler('exceptionHandler');

$injector = bootstrapInjector();

if (false) {
    $sessionManager = $injector->make('ASM\SessionManager');
    $session = $sessionManager->createSession($_COOKIE);
    $injector->alias('ASM\Session', get_class($session));
    $injector->share($session);
}

$callable = 'servePage';
$headers = [];
$count = 0;
$response = null;

do {
    $result = $injector->execute($callable);

    if ($result instanceof Response) {
        $response = $result;
        break;
    }
    else if ($result instanceof Tier) {
        $injectionParams = $result->getInjectionParams();
        if ($injectionParams) {
            addInjectionParams($injector, $injectionParams);
        }
        $callable = $result->getCallable();
    }
    else {
        echo "Unknown result: ";
        var_dump($result);
        exit(0);
    }
    $count++;
} while ($count < 10);

//  if (false) {
//        $session->save();
//        $headers = $session->getHeaders(\ASM\SessionManager::CACHE_NO_CACHE);
//    }

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
    \ImagickDemo\Queue\ImagickTaskRunner::EVENT_PAGE_GENERATED,
    $time
);
