<?php

use ImagickDemo\InjectionParams;

if (function_exists('injectionParams') == false) {

    function injectionParams(): InjectionParams
    {

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
            \Twig\Environment::class,

            new \ImagickDemo\ImageCachePath(__DIR__."/../var/cache/imageCache"),
        ];

// A set of definitions for some classes
        $defines = [
        ];

// Alias interfaces (or classes) to the actual types that should be used 
// where they are required. 
        $aliases = [
            'Jig\Escaper' => 'Jig\Bridge\ZendEscaperBridge',
            'ImagickDemo\Banners\Banner' => 'ImagickDemo\Banners\NullBanner',
            'ImagickDemo\Navigation\Nav' => 'ImagickDemo\Navigation\NullNav',

            \VarMap\VarMap::class => \VarMap\Psr7VarMap::class,

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
            \SlimAuryn\Routes::class => 'createRoutesForApp',

            'Room11\Caching\LastModifiedStrategy' => 'ImagickDemo\App::createCaching',
            \Twig\Environment::class => 'createTwigForSite',
            'ImagickDemo\Control' => ['ImagickDemo\App', 'createControl'],
            'ImagickDemo\Example' => ['ImagickDemo\App', 'createExample'],
            'Jig\JigConfig' => ['ImagickDemo\App', 'createJigConfig'],
            'Predis\Client' => ['ImagickDemo\App', 'createRedisClient'],

            \Slim\Container::class => 'createSlimContainer',
            \Slim\App::class => 'createSlimAppForApp',

            \ImagickDemo\AppErrorHandler\AppErrorHandler::class => 'createHtmlAppErrorHandler',

            \SlimAuryn\ExceptionMiddleware::class => 'createExceptionMiddlewareForApp',
            \SlimAuryn\SlimAurynInvokerFactory::class => 'createSlimAurynInvokerFactory',
            ImagickDemo\ExampleFinder\ExampleFinder::class => 'createExampleFinder'
        ];


// Avoiding defining injection params by name is good.
        $params = [
        ];

// Some objects need to be prepared after the are created.
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
    }
}