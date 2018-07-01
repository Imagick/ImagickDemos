<?php

use Tier\InjectionParams;

//yolo - We use a global to allow us to do a hack to make all the code examples
//appear to use the standard 'header' function, but also capture the content type 
//of the image
$imageType = null;

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
    new \ImagickDemo\ImageCachePath(__DIR__."/../var/cache/imageCache"),
    new \Tier\Path\AutogenPath(__DIR__."/../autogen/"),
    new \Intahwebz\DataPath(__DIR__."/../data/"),
    new \Intahwebz\StoragePath(__DIR__."/../var/"),
    new \Tier\Path\CachePath(__DIR__.'/../var/cache/'),
    new \Tier\Path\ExternalLibPath(__DIR__.'/../lib/'),
    new \Tier\Path\WebRootPath(__DIR__.'/../public/'),
    new \FileFilter\YuiCompressorPath("/usr/lib/yuicompressor.jar"),
    new \ScriptHelper\ScriptPath(__DIR__.'/../public/'),
];

// A set of definitions for some classes
$defines = [

];

// Alias interfaces (or classes) to the actual types that should be used 
// where they are required. 
$aliases = [
    //'FilePacker\FilePacker' => 'FilePacker\YuiFilePacker',
    //'Intahwebz\Request' => 'Intahwebz\Routing\HTTPRequest',
    'ImagickDemo\DocHelper' => 'ImagickDemo\DocHelperDisplay',
    //'ImagickDemo\Framework\VariableMap' => 'ImagickDemo\Framework\RequestVariableMap',
    'Jig\Escaper' => 'Jig\Bridge\ZendEscaperBridge',
    //$injector->alias('ImagickDemo\Banners\Banner', 'ImagickDemo\Banners\PHPStormBanner');
    'ImagickDemo\Banners\Banner' => 'ImagickDemo\Banners\NullBanner',
    'ImagickDemo\Navigation\Nav' => 'ImagickDemo\Navigation\NullNav',

//    'ScriptHelper\FilePacker' => 'ScriptHelper\FilePacker\YuiFilePacker',
//    'ScriptHelper\ScriptVersion' => 'ScriptHelper\ScriptVersion\DateScriptVersion',
//    'ScriptHelper\ScriptURLGenerator' => 'ScriptHelper\ScriptURLGenerator\StandardScriptURLGenerator',
//    'Zend\Diactoros\Response\EmitterInterface' => 'Zend\Diactoros\Response\SapiEmitter',
];


// Delegate the creation of types to callables.
$delegates = [
    //'FastRoute\Dispatcher' => 'createDispatcher',
    'ImagickDemo\Control' => 'ImagickDemo\App::createControl',
    'ImagickDemo\Example' => 'ImagickDemo\App::createExample',
    'ImagickDemo\Config\Librato' => 'ImagickDemo\App::createLibrato',
    'Jig\JigConfig' => 'ImagickDemo\App::createJigConfig',
    'Predis\Client' => 'ImagickDemo\App::createRedisClient',
    
    //'Room11\Caching\LastModifiedStrategy' => 'createCaching',
    //'ScriptServer\Value\ScriptVersion' => 'createScriptVersion',
    //'ScriptHelper\ScriptInclude' => 'createScriptInclude',
    'Tier\Domain' => 'ImagickDemo\App::createDomain',
];



// Avoiding defining injection params by name is good.
$params = [
];

// Some objects need to be prepared after the are created.
$prepares = [
    'Jig\Jig' => 'ImagickDemo\App::prepareJig',
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
