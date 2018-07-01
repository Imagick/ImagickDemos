<?php

namespace ImagickDemo;

use Auryn\Injector;

use ImagickDemo\ImageCachePath;
use Room11\HTTP\Body;
use Room11\HTTP\VariableMap;
use Room11\HTTP\HeadersSet;
use ImagickDemo\Helper\PageInfo;
use ImagickDemo\Navigation\CategoryInfo;
use ImagickDemo\Queue\ImagickTaskQueue;
use ImagickDemo\Config;
use Jig\Jig;
use Predis\Client as RedisClient;
use Psr\Http\Message\ServerRequestInterface as Request;
use Room11\HTTP\Body\BlobBody;
use Room11\HTTP\Body\EmptyBody;
use Room11\HTTP\Body\TextBody;
use Room11\Caching\LastModifiedStrategy;
use Room11\Caching\LastModified\Disabled as CachingDisabled;
use Room11\Caching\LastModified\Revalidate as CachingRevalidate;
use Room11\Caching\LastModified\Time as CachingTime;
use Tier\Body\CachingFileBodyFactory;
use Tier\Bridge\RouteParams;


class App
{
    public static function createLibrato(Config $config)
    {
        return \ImagickDemo\Config\Librato::make(
            $config->getKey(Config::LIBRATO_KEY),
            $config->getKey(Config::LIBRATO_USERNAME),
            $config->getKey(Config::LIBRATO_STATSSOURCENAME)
        );
    }

    public static function createJigConfig(Config $config)
    {
        $jigConfig = new \Jig\JigConfig(
            new \Jig\JigTemplatePath("../templates/"),
            new \Jig\JigCompilePath("../var/compile/"),
            $config->getKey(Config::JIG_COMPILE_CHECK)
        );
    
        return $jigConfig;
    }

    public static function createDomain(Config $config)
    {
        return new \Tier\Domain(
            $config->getKey(Config::DOMAIN_CANONICAL),
            $config->getKey(Config::DOMAIN_CDN_PATTERN),
            $config->getKey(Config::DOMAIN_CDN_TOTAL)
        );
    }

    public static function createCaching(Config $config)
    {
        $cacheSetting = $config->getKey(Config::CACHING_SETTING);
    
        switch ($cacheSetting) {
            case LastModifiedStrategy::CACHING_DISABLED: {
                return new CachingDisabled();
            }
            case LastModifiedStrategy::CACHING_REVALIDATE: {
                return new CachingRevalidate(3600 * 2, 3600);
            }
            case LastModifiedStrategy::CACHING_TIME: {
                return new CachingTime(3600 * 10, 3600);
            }
            default: {
                throw new TierException("Unknown caching setting '$cacheSetting'.");
            }
        }
    }

    public static function createScriptVersion(Config $config)
    {
        $value = $config->getKey(Config::SCRIPT_VERSION);
        return new \ScriptServer\Value\ScriptVersion(
            $value
        );
    }

    public static function createScriptInclude(
        Config $config,
        \ScriptHelper\ScriptURLGenerator $scriptURLGenerator
    ) {
        $packScript = $config->getKey(Config::SCRIPT_PACKING);
    
        if ($packScript) {
            return new \ScriptHelper\ScriptInclude\ScriptIncludePacked($scriptURLGenerator);
        }
        else {
            return new \ScriptHelper\ScriptInclude\ScriptIncludeIndividual($scriptURLGenerator);
        }
    }

    
    public static function prepareJig(Jig $jigRender, $injector)
    {
        $jigRender->addDefaultPlugin('ImagickDemo\JigPlugin\ImagickPlugin');
    }
    
        
    public static function createRedisClient(Config $config)
    {
        $redisParameters = array(
            'host'     => 'redis',
            'password' => $config->getKey(Config::REDIS_PASSWORD),
            'connection_timeout' => 30,
            'read_write_timeout' => 30,
        );
    
        $redisOptions = [];
    
        return new \Predis\Client($redisParameters, $redisOptions);
    }

    public static function createRedisSessionDriver()
    {
        $redisConfig = array(
            "scheme" => "tcp",
            "host" => 'localhost',
            "port" => 6379
        );
    
        $redisOptions = array(
            'profile' => '2.6',
            'prefix' => 'imagickdemo:',
        );
    
        $redisClient = new RedisClient($redisConfig, $redisOptions);
        $redisDriver = new RedisDriver($redisClient);
    
        return $redisDriver;
    }
    
    public static function createSessionManager(RedisDriver $redisDriver)
    {
        $sessionConfig = new SessionConfig(
            'SessionTest',
            3600 * 10,
            60
        );
    
        $sessionManager = new SessionManager(
            $sessionConfig,
            $redisDriver
        );
    
        return $sessionManager;
    }
    
    function createControl(PageInfo $pageInfo, Injector $injector)
    {
        list($controlClassname, $params) = CategoryInfo::getDIInfo($pageInfo);
        foreach ($params as $name => $value) {
            $injector->defineParam($name, $value);
        }
    
        $control = $injector->make($controlClassname);
        $params = $control->getFullParams();
        
        foreach ($params as $name => $value) {
            $injector->defineParam($name, $value);
        }
        
        return $control;
    }
    
    public static function createExample(PageInfo $pageInfo, Injector $injector)
    {
        $exampleName = CategoryInfo::getImageFunctionName($pageInfo);
    
        return $injector->make($exampleName);
    }
    
    
    public static function setupCategoryExample(RouteParams $routeInfo)
    {
        if (array_key_exists('category', $routeInfo->params)) {
            //This is actually only needed for image requests
            $className = sprintf('ImagickDemo\%s\functions', $routeInfo->params ['category']);
            $className::load();
        }
    }
    
    public static function createDispatcher()
    {
        $dispatcher = \FastRoute\simpleDispatcher(['ImagickDemo\Route', 'routesFunction']);
        
        return $dispatcher;
    }

    public static function cachingheader($string, $replace = true, $http_response_code = null)
    {
        global $imageType;
        global $cacheImages;
    
        if (stripos($string, "Content-Type: image/") === 0) {
            $imageType = substr($string, strlen("Content-Type: image/"));
        }
        
        if ($cacheImages == false) {
            if (php_sapi_name() !== 'cli') {
                \header($string, $replace, $http_response_code);
            }
        }
    }

    /**
     * @param \Auryn\Injector $injector
     * @param $imageCallable
     * @param $filename
     * @return FileResponse
     * @throws \Exception
     */
    public static function renderImageAsFileResponse(
        $imageFunction,
        $filename,
        \Auryn\Injector $injector,
        $params
    ) {
        global $imageType;

        try {
            ob_start();
    
            $injector->execute($imageFunction, $params);
    
            if ($imageType == null) {
                ob_end_clean();
                throw new \Exception("imageType not set, can't cache image correctly.");
            }
    
            $image = ob_get_contents();
            ob_end_clean();
            @mkdir(dirname($filename), 0755, true);
            $fullFilename = $filename . "." . strtolower($imageType);
    
            if (!strlen($image)) {
                throw new \Exception("Image generated was empty for $imageFunction.");
            }
    
            $fileWritten = @file_put_contents($fullFilename, $image);
    
            if ($fileWritten === false) {
                throw new \Exception("Failed to write file $fullFilename");
            }
            if ($fileWritten === 0) {
                throw new \Exception("Image was empty when written to $fullFilename .");
            }
    
            return [$fullFilename, $imageType];
        }
        finally {
            while (ob_get_level() > 0) {
                ob_end_flush();
            }
        }
    }
}
