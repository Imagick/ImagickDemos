<?php

use Tier\InjectionParams;

// These classes will only be created once by the injector.
$shares = [
    'Jig\JigConfig',
    
    'ImagickDemo\AppTimer',
    'ImagickDemo\Config',
    'ImagickDemo\Control',
    'ImagickDemo\Example',
    'ImagickDemo\Navigation\Nav',
    'ImagickDemo\Queue\ImagickTaskQueue',
    'ImagickDemo\Helper\PageInfo',
    'ImagickDemo\Config\Application',
    'ImagickDemo\Config\Librato',
    'ImagickDemo\Framework\VariableMap',
    
    'Predis\Client',
];

// Alias interfaces (or classes) to the actual types that should be used 
// where they are required. 
$aliases = [
    'Intahwebz\Request' => 'Intahwebz\Routing\HTTPRequest',
    'ImagickDemo\DocHelper' => 'ImagickDemo\DocHelperDisplay',
    'ImagickDemo\Framework\VariableMap' => 'ImagickDemo\Framework\RequestVariableMap',
    //$injector->alias('ImagickDemo\Banners\Banner', 'ImagickDemo\Banners\PHPStormBanner');
    'ImagickDemo\Banners\Banner' => 'ImagickDemo\Banners\NullBanner',
    
    'ImagickDemo\Navigation\Nav' => 'ImagickDemo\Navigation\NullNav',
];


// Delegate the creation of types to callables.
$delegates = [
    'ImagickDemo\Control' => 'createControl',
    'ImagickDemo\Example' => 'createExample',
    'ImagickDemo\Config\Librato' => ['ImagickDemo\Config', 'createLibrato'],
    'Jig\JigConfig' => ['ImagickDemo\Config', 'createJigConfig'],
    'Intahwebz\Routing\HTTPRequest' => ['ImagickDemo\Config', 'createHTTPRequest'],
    'Predis\Client' => 'createRedisClient'
];

// If necessary, define some params that can be injected purely by name.
$params = [
    'imageCachePath' => "../var/cache/imageCache/",
];

$prepares = [
    'Jig\Converter\JigConverter' => 'prepareJigConverter',
];

$injectionParams = new InjectionParams(
    $shares,
    $aliases,
    $delegates,
    $params,
    $prepares
);

return $injectionParams;
