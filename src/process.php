<?php

ini_set('display_errors', 'on');
define('COMPOSER_OPCACHE_OPTIMIZE', true);

require __DIR__.'/../vendor/autoload.php';
require __DIR__ . '/../src/appFunctions.php';
require __DIR__ . "/./Tier/tierFunctions.php";

use Arya\Request;
use Tier\Tier;
use Tier\TierApp;
use Tier\ResponseBody\ExceptionHtmlBody;
use Auryn\InjectionException;

\Intahwebz\Functions::load();

register_shutdown_function('fatalErrorShutdownHandler');
set_exception_handler('exceptionHandler');
set_error_handler('errorHandler');


$injectionParams = require "injectionParams.php";

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
    $app->addPreCallable(['ImagickDemo\AppTimer', 'timerStart']);
    $app->addPostCallable(['ImagickDemo\AppTimer', 'timerEnd']);

    // Run it
    $app->execute($request);
}
//TODO - move injectionException inside the tierApp
catch (InjectionException $ie) {
    // TODO - add custom notifications.
    $bodyText  = "InjectionException: ".$ie->getMessage();
    $bodyText .= "<br/>Dependency chain is:<br/>";
    $bodyText .= "<ul>";
    
    foreach ($ie->getDependencyChain() as $dependency) {
        $bodyText .= "<li>";
        $bodyText .= $dependency;
        $bodyText .= "</li>";
    }
    $bodyText .= "</ul>";
    
    $body = new ExceptionHtmlBody($bodyText);
    \Tier\sendErrorResponse($request, $body, 500);
}
catch (JigException $je) {
    $body = new ExceptionHtmlBody(getExceptionText($je));
    \Tier\sendErrorResponse($request, $body, 500);
}
catch (\Exception $e) {
    $body = new ExceptionHtmlBody(getExceptionText($e));
    \Tier\sendErrorResponse($request, $body, 500);
}

if (php_sapi_name() === 'fpm-fcgi') {
    fastcgi_finish_request();
}
