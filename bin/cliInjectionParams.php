<?php

use ImagickDemo\InjectionParams;

// These classes will only be created  by the injector once
$shares = [
    //'Amp\Reactor'
];

// Alias interfaces (or classes) to the actual types that should be used 
// where they are required. 
$aliases = [
    //'ArtaxServiceBuilder\ResponseCache' => 'ArtaxServiceBuilder\ResponseCache\FileResponseCache',
    'Danack\Console\Application' => 'ImagickDemo\ConsoleApplication',
];

// Delegate the creation of types to callables.
$delegates = [
    //'ArtaxServiceBuilder\Oauth2Token' => 'ServerContainer\ControlPanel::getOauthToken',
    //'Amp\Reactor' => 'Amp\getReactor',
    //'ServerContainer\Tool\EC2Manager' => 'ServerContainer\ControlPanel::createEC2Manager',
    //'ServerContainer\Tool\KillEC2TestInstances' => 'ServerContainer\ControlPanel::createKillEC2TestInstances'
];


// If necessary, define some params that can be injected purely by name.
$params = [
//    'cacheDirectory' => realpath(__DIR__."/../var/cache"),
//    'tempDirectory' => realpath(__DIR__."/../var/tmp"),
//    'userAgent' => 'Danack/ServerContainer'
];

// If necessary, define some params per class.
$defines = [
];

$prepares = [
    
];

$injectionParams = new InjectionParams(
    $shares,
    $aliases,
    $delegates,
    $params,
    $prepares,
    $defines
);

return $injectionParams;
