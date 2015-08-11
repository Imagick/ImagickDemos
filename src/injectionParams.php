<?php

use Intahwebz\DataPath;
use Intahwebz\StoragePath;
use Tier\InjectionParams;
use Tier\Path\AutogenPath;
use Tier\Path\CachePath;
use Tier\Path\ExternalLibPath;
use Tier\Path\WebRootPath;
use Tier\Path\YuiCompressorPath;

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
    'ScriptServer\Service\ScriptInclude',

    new AutogenPath(__DIR__."/../autogen/"),
    new DataPath(__DIR__."/../data/"),
    new StoragePath(__DIR__."/../var/"),
    new WebRootPath(__DIR__.'/../imagick/'),
    new ExternalLibPath(__DIR__.'/../lib/'),
    new YuiCompressorPath("/usr/lib/yuicompressor.jar"),
    new CachePath(__DIR__.'/../var/cache/'),
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
    //'ScriptServer\Service\ScriptInclude' => 'ScriptServer\Service\ScriptIncludePacked',
    'ScriptServer\Service\ScriptInclude' => 'ScriptServer\Service\ScriptIncludeIndividual',
    
    'FilePacker\FilePacker' => 'FilePacker\YuiFilePacker',
    
];


// Delegate the creation of types to callables.
$delegates = [
    'ImagickDemo\Control' => 'createControl',
    'ImagickDemo\Example' => 'createExample',
    'Intahwebz\Routing\HTTPRequest' => 'createHTTPRequest',
    'Predis\Client' => 'createRedisClient',
    
    // These rely purely on env vars
    'ImagickDemo\Config\Librato' => ['ImagickDemo\Config', 'createLibrato'],
    'Jig\JigConfig' => ['ImagickDemo\Config', 'createJigConfig'],
    
    'Tier\Caching\Caching' => ['ImagickDemo\Config', 'createCaching'],
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
