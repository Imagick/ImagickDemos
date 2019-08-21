<?php

ini_set('display_errors', 'on');
define('COMPOSER_OPCACHE_OPTIMIZE', true);

use Auryn\Injector;
use Tier\Executable;
use Tier\InjectionParams;

use Tier\TierApp;
use Tier\TierHTTPApp;
use Tier\HTTPFunction;
use Room11\HTTP\Request\CLIRequest;

require_once realpath(__DIR__).'/../vendor/autoload.php';



\Tier\HTTPFunction::setupErrorHandlers();

ini_set('display_errors', 'off');

require __DIR__."/../vendor/intahwebz/core/src/Intahwebz/Functions.php";

// To make the example code be simple, they all assume the application's
// current directory is the root of the project
chdir(realpath(__DIR__).'/../public');


$injector = new Injector();

// Read application standard config params
$standardInjectionParams = require "injectionParams.php";
/** @var $injectionParams \Tier\InjectionParams */
$standardInjectionParams->addToInjector($injector);

// Read application HTTP config params
$httpIinjectionParams = require "httpInjectionParams.php";
/** @var $httpIinjectionParams \Tier\InjectionParams */
$httpIinjectionParams->addToInjector($injector);

if (strcasecmp(PHP_SAPI, 'cli') == 0) {
    // We only reach CLI here when we are testing, so hard-coded to test particular
    // route.
    $request = new CLIRequest('/customImage/Tutorial/multiLineWrap?time=1465769442452', 'phpimagick.com');
}
else {
    $request = HTTPFunction::createRequestFromGlobals();
}

ini_set("serialize_precision", "-1");
ini_set("precision", 10);

// Create the first Tier that needs to be run.
$routeRequest = new Executable(['Tier\Bridge\FastRouter', 'routeRequest']);

// Create the Tier application
$app = new TierHTTPApp($injector);
$app->createStandardExceptionResolver();

// Make the body that is generated be shared by TierApp
$app->addExpectedProduct('Room11\HTTP\Body');
//$app->addInitialExecutable(['ImagickDemo\AppTimer', 'timerStart']);
$app->addGenerateBodyExecutable($routeRequest);
//$app->addAfterSendExecutable(['ImagickDemo\AppTimer', 'timerEnd']);
$app->addSendExecutable(new Executable(['Tier\HTTPFunction', 'sendBodyResponse']));

// Run it
$app->execute($request);
