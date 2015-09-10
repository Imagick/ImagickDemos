<?php

ini_set('display_errors', 'on');
define('COMPOSER_OPCACHE_OPTIMIZE', true);

use Tier\Tier;
use Tier\TierApp;

require_once realpath(__DIR__).'/../vendor/autoload.php';

// Contains helper functions for the 'framework'.
require __DIR__."/../vendor/danack/tier/src/Tier/tierFunctions.php";

// Contains helper functions for the application.
require_once "appFunctions.php";

\Tier\setupErrorHandlers();

require __DIR__."/../vendor/intahwebz/core/src/Intahwebz/Functions.php";

// Read application config params
$injectionParams = require_once "injectionParams.php";

$request = \Tier\createRequestFromGlobals();

// Create the first Tier that needs to be run.
$tier = new Tier('routeRequest');

// Create the Tier application
$app = new TierApp($tier, $injectionParams);
$app->addPreCallable(['ImagickDemo\AppTimer', 'timerStart']);
$app->addPostCallable(['ImagickDemo\AppTimer', 'timerEnd']);

// Run it
$app->execute($request);
