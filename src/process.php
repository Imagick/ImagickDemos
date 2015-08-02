<?php

ini_set('display_errors', 'on');
require __DIR__ . '/../src/bootstrap.php';
require_once __DIR__ . "/./Tier/tierFunctions.php";

use Arya\Request;
use Tier\Tier;
use Tier\TierApp;
use Tier\ResponseBody\ExceptionHtmlBody;

\Intahwebz\Functions::load();

//register_shutdown_function('fatalErrorShutdownHandler');
//set_error_handler('errorHandler');
set_exception_handler('exceptionHandler');

//if (false) {
//    $sessionManager = $injector->make('ASM\SessionManager');
//    $session = $sessionManager->createSession($_COOKIE);
//    $injector->alias('ASM\Session', get_class($session));
//    $injector->share($session);
//}

$injectionParams = require_once "injectionParams.php";

try {
    $_input = empty($_SERVER['CONTENT-LENGTH']) ? null : fopen('php://input', 'r');
    $request = new Request($_SERVER, $_GET, $_POST, $_FILES, $_COOKIE, $_input);
}
catch (\Exception $e) {
    //TODO - exit quickly.
    header("We totally failed", true, 501);
    echo "we ded ".$e->getMessage();
    exit(0);
}

try {
    // Create the first Tier that needs to be run.
    $tier = new Tier('routeRequest');

    // Create the Tier application
    $app = new TierApp($tier, $injectionParams);

//    $app->addPreCallable(['ImagickDemo\AppTimer', 'timerStart']);
//    $app->addPostCallable(['ImagickDemo\AppTimer', 'timerEnd']);
//    
    // Run it
    $app->execute($request);
}
catch (InjectorException $ie) {
    // TODO - add custom notifications.
    $body = new ExceptionHtmlBody($ie);
    \Tier\sendErrorResponse($request, $body, 500);
}
catch (JigException $je) {
    $body = new ExceptionHtmlBody($je);
    \Tier\sendErrorResponse($request, $body, 500);
}
catch (\Exception $e) {
    $body = new ExceptionHtmlBody($e);
    \Tier\sendErrorResponse($request, $body, 500);
}

if (php_sapi_name() === 'fpm-fcgi') {
    fastcgi_finish_request();
}
