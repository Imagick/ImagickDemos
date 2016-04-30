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
    'ScriptServer\Service\ScriptInclude',
    'Tier\Path\AutogenPath',
    'Intahwebz\DataPath',
    'Intahwebz\StoragePath',
    'Tier\Path\CachePath',
    'Tier\Path\ExternalLibPath',
    'Tier\Path\YuiCompressorPath',
    'Tier\Path\WebRootPath',
    'Room11\HTTP\HeadersSet',
];

// A set of definitions for some classes
$defines = [
//    'Tier\Path\AutogenPath'       => [':path' => __DIR__."/../autogen/"],
//    'Intahwebz\DataPath'          => [':path' => __DIR__."/../data/"],
//    'Intahwebz\StoragePath'       => [':path' => __DIR__."/../var/"],
//    'Tier\Path\CachePath'         => [':path' => __DIR__.'/../var/cache/'],
//    'Tier\Path\ExternalLibPath'   => [':path' => __DIR__.'/../lib/'],
//    'Tier\Path\WebRootPath'       => [':path' => __DIR__.'/../imagick/'],
//    'FileFilter\YuiCompressorPath' => ["/usr/lib/yuicompressor.jar"],
];

// Alias interfaces (or classes) to the actual types that should be used 
// where they are required. 
$aliases = [
//    'FilePacker\FilePacker' => 'FilePacker\YuiFilePacker',
//    //'Intahwebz\Request' => 'Intahwebz\Routing\HTTPRequest',
//    'ImagickDemo\DocHelper' => 'ImagickDemo\DocHelperDisplay',
//    'ImagickDemo\Framework\VariableMap' => 'ImagickDemo\Framework\RequestVariableMap',
//    'Jig\Escaper' => 'Jig\Bridge\ZendEscaperBridge',
//    //$injector->alias('ImagickDemo\Banners\Banner', 'ImagickDemo\Banners\PHPStormBanner');
//    'ImagickDemo\Banners\Banner' => 'ImagickDemo\Banners\NullBanner',
//    'ImagickDemo\Navigation\Nav' => 'ImagickDemo\Navigation\NullNav',
    'Room11\HTTP\RequestHeaders' => 'Room11\HTTP\RequestHeaders\HTTPRequestHeaders',
    'Room11\HTTP\RequestRouting' => 'Room11\HTTP\RequestRouting\PSR7RequestRouting',
    'Room11\HTTP\VariableMap' => 'Room11\HTTP\VariableMap\PSR7VariableMap',
    'ScriptHelper\FilePacker' => 'ScriptHelper\FilePacker\YuiFilePacker',
    'ScriptHelper\ScriptVersion' => 'ScriptHelper\ScriptVersion\DateScriptVersion',
    'ScriptHelper\ScriptURLGenerator' => 'ScriptHelper\ScriptURLGenerator\StandardScriptURLGenerator',
    'Zend\Diactoros\Response\EmitterInterface' => 'Zend\Diactoros\Response\SapiEmitter',
];


// Delegate the creation of types to callables.
$delegates = [
    'FastRoute\Dispatcher' => 'ImagickDemo\App::createDispatcher',
//    'ImagickDemo\Control' => 'createControl',
//    'ImagickDemo\Example' => 'createExample',
//    'ImagickDemo\Config\Librato' => 'createLibrato',
//    'Jig\JigConfig' => 'createJigConfig',
//    'Predis\Client' => 'createRedisClient',
//    
    'Room11\Caching\LastModifiedStrategy' => 'ImagickDemo\App::createCaching',
    'ScriptServer\Value\ScriptVersion' => 'ImagickDemo\App::createScriptVersion',
    '\ScriptHelper\ScriptInclude' => 'ImagickDemo\App::createScriptInclude',
    'Tier\Domain' => 'ImagickDemo\App::createDomain',
];



// Avoiding defining injection params by name is good.
$params = [
];

// Some objects need to be prepared after the are created.
$prepares = [
    //'Jig\Jig' => 'prepareJig',
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
