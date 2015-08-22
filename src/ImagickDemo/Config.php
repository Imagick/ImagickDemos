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

    const AMAZON_EC2_MACHINEIMAGENAME = 'amazon.ec2.machine_image_name';
    const AMAZON_EC2_INSTANCE_TYPE = 'amazon.ec2.instance_type';

    const AMAZON_EC2_VPC = 'amazon.ec2.vpc';
    const AMAZON_EC2_SECURITY_GROUP = 'amazon.ec2.security_group';
    const AMAZON_EC2_SSH_KEY_PAIR_NAME = 'amazon.ec2.ssh_key_pair_name';
    
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
    
    public static function getConfigNames()
    {
        $reflClass = new \ReflectionClass(__CLASS__);

        return $reflClass->getConstants();
    }

    public static function getEnv($key)
    {
        $key = str_replace('.', "_", $key);
        $value = getenv($key);

        if ($value === null || $value === false) {
            throw new \Exception("Missing config of $key");
        }

        return $value;
    }

    public function createLibrato()
    {
        return\ImagickDemo\Config\Librato::make(
            self::getEnv(self::LIBRATO_KEY),
            self::getEnv(self::LIBRATO_USERNAME),
            self::getEnv(self::LIBRATO_STATSSOURCENAME)
        );
    }

    public function createJigConfig()
    {
        $jigConfig = new \Jig\JigConfig(
            "../templates/",
            "../var/compile/",
            'tpl',
            $this->getEnv(self::JIG_COMPILE_CHECK)
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
        $cacheSetting = self::getEnv(Config::CACHING_SETTING);
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
        $value = self::getEnv(self::SCRIPT_PACKING);
        
        if ($value) {
            return new \ScriptServer\Service\ScriptIncludePacked($scriptVersion);
        }
            
        return new \ScriptServer\Service\ScriptIncludeIndividual(
            $scriptVersion
        );
    }
}
