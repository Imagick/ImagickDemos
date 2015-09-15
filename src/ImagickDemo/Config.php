<?php

namespace ImagickDemo;

use Auryn\Injector;

use Room11\Caching\LastModifiedStrategy;
use Room11\Caching\LastModified\Disabled as CachingDisabled;
use Room11\Caching\LastModified\Revalidate as CachingRevalidate;
use Room11\Caching\LastModified\Time as CachingTime;
use Tier\TierException;
use ScriptServer\Value\ScriptVersion;

class Config
{
    const FLICKR_KEY = 'flickr.key';
    const FLICKR_SECRET = 'flickr.secret';
    
    const GITHUB_ACCESS_TOKEN = 'github.access_token';
    const GITHUB_REPO_NAME = 'github.repo_name';
    
    //Server container
    const AWS_SERVICES_KEY = 'aws.services.key';
    const AWS_SERVICES_SECRET = 'aws.services.secret';
    
    const LIBRATO_KEY = 'librato.key';
    const LIBRATO_USERNAME = 'librato.username';
    const LIBRATO_STATSSOURCENAME = 'librato.stats_source_name';

    const JIG_COMPILE_CHECK = 'jig.compilecheck';

    const DOMAIN_CANONICAL = 'domain.canonical';
    const DOMAIN_CDN_PATTERN= 'domain.cdn.pattern';
    const DOMAIN_CDN_TOTAL= 'domain.cdn.total';

    const CACHING_SETTING = 'caching.setting';
    
    const SCRIPT_VERSION = 'script.version';
    const SCRIPT_PACKING = 'script.packing';
    
    private $values = [];
    
    
    public function __construct()
    {
        static $envSetting = false;
        
        $config = getAppEnv();
        $keys = getAppKeys();

        foreach ($config as $envKey => $values) {
            if (array_key_exists($envKey, $envSetting)) {
                foreach ($values as $key => $value) {
                    $this->values[$key] = $value;
                }
            }
        }
    }
    
    
    public function getSetting($name)
    {
        $envSettings = [
            self::LIBRATO_KEY,
            self::LIBRATO_USERNAME,
            self::AWS_SERVICES_KEY,
            self::AWS_SERVICES_SECRET,
            self::FLICKR_KEY,
            self::FLICKR_SECRET,
            self::GITHUB_ACCESS_TOKEN,
            self::GITHUB_REPO_NAME,
        ];
    
        if (array_key_exists($name, $envSettings)) {
            return $this->getEnv($name);
        }
        
        return $this->getValue($name);
    }
    
    public static function getConfigNames()
    {
        $reflClass = new \ReflectionClass(__CLASS__);

        return $reflClass->getConstants();
    }

    public static function getEnv($key)
    {
        $key = str_replace('.', "_", $key);
        $key = 'imagickdemos_'.$key;
        $value = getenv($key);

        if ($value === null || $value === false) {
            throw new \Exception("Missing env value of $key");
        }

        return $value;
    }
    
    
    public function getValue($key)
    {
        if (array_key_exists($key, $this->values) === false) {
            throw new \Exception("Missing config of $key");
        }

        return $this->values[$key];
    }

    
    public function createLibrato()
    {
        return\ImagickDemo\Config\Librato::make(
            $this->getEnv(self::LIBRATO_KEY),
            $this->getEnv(self::LIBRATO_USERNAME),
            $this->getValue(self::LIBRATO_STATSSOURCENAME)
        );
    }

    public function createJigConfig()
    {
        $jigConfig = new \Jig\JigConfig(
            "../templates/",
            "../var/compile/",
            'tpl',
            $this->getValue(self::JIG_COMPILE_CHECK)
        );

        return $jigConfig;
    }
    
    public function createDomain()
    {
        return new \Tier\Domain(
            self::getEnv(self::DOMAIN_CANONICAL),
            self::getEnv(self::DOMAIN_CDN_PATTERN),
            self::getEnv(self::DOMAIN_CDN_TOTAL)
        );
    }

    public function createCaching()
    {
        $cacheSetting = $this->getValue(Config::CACHING_SETTING);
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
    
    public function createScriptVersion()
    {
        $value = self::getEnv(self::SCRIPT_VERSION);
        return new \ScriptServer\Value\ScriptVersion(
            $value
        );
    }
    
    public function createScriptInclude(ScriptVersion $scriptVersion)
    {
        $value = $this->getValue(self::SCRIPT_PACKING);
        
        if ($value) {
            return new \ScriptServer\Service\ScriptIncludePacked($scriptVersion);
        }
            
        return new \ScriptServer\Service\ScriptIncludeIndividual(
            $scriptVersion
        );
    }
}
