<?php

namespace ImagickDemo;

use Auryn\Injector;

//use Jig\JigConfig;

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
    

    public static function getConfigNames()
    {
        return [
            self::FLICKR_KEY,
            self::FLICKR_SECRET,
            
            self::GITHUB_ACCESS_TOKEN,
            self::GITHUB_REPO_NAME,

            self::AWS_SERVICES_KEY,
            self::AWS_SERVICES_SECRET,
            
            self::AMAZON_EC2_MACHINEIMAGENAME,
            self::AMAZON_EC2_INSTANCE_TYPE,
            
            self::AMAZON_EC2_VPC,
            self::AMAZON_EC2_SECURITY_GROUP,
            self::AMAZON_EC2_SSH_KEY_PAIR_NAME,

            self::LIBRATO_KEY,
            self::LIBRATO_USERNAME,
            self::LIBRATO_STATSSOURCENAME,
            
            self::JIG_COMPILE_CHECK,
        ];
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
}
