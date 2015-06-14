<?php


namespace ImagickDemo;


class Config {

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
    
    const IMAGES_CACHE = 'images.cache';
    const IMAGES_QUEUE = 'images.queue';
    
    const NGINX_LOG_DIRECTORY = 'nginx.log.directory';
    const NGINX_ROOT_DIRECTORY = 'nginx.root.directory';
    const NGINX_CONF_DIRECTORY = 'nginx.conf.directory';
    
    const MYSQL_USERNAME = 'mysql.username';
    const MYSQL_PASSWORD = 'mysql.password';
    const MYSQL_ROOT_PASSWORD = 'mysql.root_password';
    
    const LIBRATO_KEY = 'librato.key';
    const LIBRATO_USERNAME = 'librato.username';
    const LIBRATO_STATSSOURCENAME = 'librato.stats_source_name'; 
    
    
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
            
            self::IMAGES_CACHE,
            self::IMAGES_QUEUE,
            
            self::NGINX_LOG_DIRECTORY,
            self::NGINX_ROOT_DIRECTORY,
            self::NGINX_CONF_DIRECTORY,
            
            self::MYSQL_USERNAME,
            self::MYSQL_PASSWORD,
            self::MYSQL_ROOT_PASSWORD,
            
            self::LIBRATO_KEY,
            self::LIBRATO_USERNAME,
            self::LIBRATO_STATSSOURCENAME,
        ];
    }
}

