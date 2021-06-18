<?php

ini_set('display_errors', 'on');
define('COMPOSER_OPCACHE_OPTIMIZE', true);

use Auryn\Injector;
use ImagickDemo\InjectionParams;
use SlimAuryn\ExceptionMiddleware;
use SlimAuryn\Routes;
use Room11\HTTP\Request\CLIRequest;

require_once realpath(__DIR__) . '/../vendor/autoload.php';
require_once realpath(__DIR__) . '/factories.php';
require_once realpath(__DIR__) . '/site_html.php';

ini_set('display_errors', 'off');

require __DIR__."/../vendor/intahwebz/core/src/Intahwebz/Functions.php";
require "httpInjectionParams.php";

// To make the example code be simple, they all assume the application's
// current directory is the root of the project
chdir(realpath(__DIR__).'/../public');


$injector = new Injector();

// Read application HTTP config params
$httpIinjectionParams = injectionParams();
/** @var $httpIinjectionParams \ImagickDemo\InjectionParams */
$httpIinjectionParams->addToInjector($injector);

ini_set("serialize_precision", "-1");
ini_set("precision", 10);

set_error_handler('saneErrorHandler');

$injector = new Auryn\Injector();
$injectionParams = injectionParams();
$injectionParams->addToInjector($injector);
$injector->share($injector);


try {
    $app = $injector->make(\Slim\App::class);
    $routes = $injector->make(Routes::class);
    $routes->setupRoutes($app);
    $app->run();
}
catch (\Throwable $exception) {
    $exceptionText = null;

    try {
        $exceptionText = getExceptionText($exception);

        \error_log("Exception in code and Slim error handler failed also: " . get_class($exception) . " " . $exceptionText);
    }
    catch (\Throwable $exception) {
        // Does nothing.
    }

    http_response_code(503);
    echo "oops.";
    if ($exceptionText !== null) {
        var_dump(get_class($exception));
        echo nl2br($exceptionText);
    }

//    return;
}