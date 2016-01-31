<?php

ini_set('display_errors', 'on');
define('COMPOSER_OPCACHE_OPTIMIZE', true);

use Tier\Executable;
use Tier\Tier;
use Tier\TierApp;
use Tier\TierHTTPApp;
use Room11\HTTP\Request\CLIRequest;

require_once realpath(__DIR__).'/../vendor/autoload.php';

// Contains helper functions for the 'framework'.
//require __DIR__."/../vendor/danack/tier/src/Tier/tierFunctions.php";

// Contains helper functions for the application.
require_once "appFunctions.php";

Tier::setupErrorHandlers();

ini_set('display_errors', 'off');

require __DIR__."/../vendor/intahwebz/core/src/Intahwebz/Functions.php";

// Read application config params
$injectionParams = require_once "injectionParams.php";

if (strcasecmp(PHP_SAPI, 'cli') == 0) {
    $request = new CLIRequest('/Imagick/getImageGeometry', 'phpimagick.com');
}
else {
    $request = Tier::createRequestFromGlobals();
}

// Create the first Tier that needs to be run.
$routeRequest = new Executable(['Tier\JigBridge\Router', 'routeRequest']);

// Create the Tier application
$app = new TierHTTPApp($injectionParams);
$app->createStandardExceptionResolver();

// Make the body that is generated be shared by TierApp
$app->addExpectedProduct('Room11\HTTP\Body');

$app->addBeforeGenerateBodyExecutable($routeRequest);
$app->addInitialExecutable(['ImagickDemo\AppTimer', 'timerStart']);
$app->addAfterSendExecutable(['ImagickDemo\AppTimer', 'timerEnd']);
$app->addSendExecutable(new Executable(['Tier\Tier', 'sendBodyResponse']));

// Run it
$app->execute($request);
