<?php

namespace ImagickDemo;

use Tier\TierException;

class Config
{
//    const FLICKR_KEY = 'flickr.key';
//    const FLICKR_SECRET = 'flickr.secret';
    
//    const GITHUB_ACCESS_TOKEN = 'github.access_token';
//    const GITHUB_REPO_NAME = 'github.repo_name';
    
    //Server container
//    const AWS_SERVICES_KEY = 'imagickdemos.aws.services.key';
//    const AWS_SERVICES_SECRET = 'imagickdemos.aws.services.secret';
    
//    const LIBRATO_KEY = 'librato.key';
//    const LIBRATO_USERNAME = 'librato.username';
//    const LIBRATO_STATSSOURCENAME = 'librato.stats_source_name';

    const ENVIRONMENT_LOCAL = 'local';

    const ENVIRONMENT_PROD = 'prod';

    const JIG_COMPILE_CHECK = 'jig.compilecheck';

    const DOMAIN_CANONICAL = 'domain.canonical';
    const DOMAIN_CDN_PATTERN= 'domain.cdn.pattern';
    const DOMAIN_CDN_TOTAL= 'domain.cdn.total';
    const DOMAIN_INTERNAL = 'domain.internal';

    const REDIS_PASSWORD = 'redis.password';

    const CACHING_SETTING = 'caching.setting';
    
    const SCRIPT_VERSION = 'script.version';
    const SCRIPT_PACKING = 'script.packing';
    
    const ENVIRONMENT = 'environment';


    private $values = [];

    public function __construct()
    {
//        require_once __DIR__."/../../../clavis.php";
        require_once __DIR__ . "/../../config.php";

        $this->values = [];
        $this->values = array_merge($this->values, getAppOptions());
//        $this->values = array_merge($this->values, getAppKeys());
    }

    public function getKey($key)
    {
        if (array_key_exists($key, $this->values) == false) {
            throw new \Exception("Missing config value of $key");
        }

        return $this->values[$key];
    }

//    private function getKeyWithDefault($key, $default)
//    {
//        if (array_key_exists($key, $this->values) === false) {
//            return $default;
//        }
//
//        return $this->values[$key];
//    }

    public function getRedisPassword()
    {
        return $this->getKey(Config::REDIS_PASSWORD);
    }

    public function getJigCompileCheck()
    {
        return $this->getKey(self::JIG_COMPILE_CHECK);
    }

    public function getCachingSetting()
    {
        return $this->getKey(Config::CACHING_SETTING);
    }

    public function isProductionEnv()
    {
        if ($this->getEnvironment() === self::ENVIRONMENT_LOCAL) {
            return false;
        }

        return true;
    }

    public function useSsl()
    {
        if ($this->getEnvironment() !== self::ENVIRONMENT_LOCAL) {
            return true;
        }
        return false;
    }


    public function getEnvironment()
    {
        return $this->getKey(self::ENVIRONMENT);
    }
}
