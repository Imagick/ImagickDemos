<?php

// This is a sample configuration file

use ImagickDemo\Config;

$socketDir = '/var/run/php-fpm';

$default = [
    //global/default variables go here.
    'nginx.sendFile' => 'off',
    'mysql.charset' => 'utf8mb4',
    'mysql.collation' => 'utf8mb4_unicode_ci',
];


$default[Config::SCRIPT_VERSION] = date('jmyhis');


$centos = [
    'nginx.log.directory' => '/var/log/nginx',
    'nginx.root.directory' => '/usr/share/nginx',
    'nginx.conf.directory' => '/etc/nginx',
    'nginx.run.directory ' => '/var/run',
    'nginx.user' => 'nginx',
    'nginx.sendFile' => 'on',
    
    'imagick.root.directory' => dirname(__DIR__), //'/home/imagickdemos/current',
    
    'phpfpm.www.maxmemory' => '16M',
    'phpfpm.images.maxmemory' => '48M',
    'phpfpm.user' => 'intahwebz',
    'phpfpm.group' => 'www-data',
    'phpfpm.socket.directory' => $socketDir,
    'phpfpm.conf.directory' => '/etc/php-fpm.d',
    'phpfpm.pid.directory' => '/var/run/php-fpm',
    'phpfpm.fullsocketpath' => $socketDir."/php-fpm-imagickdemos-".basename(dirname(__DIR__)).".sock",

    'php.conf.directory' => '/etc/php',
    'php.log.directory' => '/var/log/php',
    'php.errorlog.directory' => '/var/log/php',
    'php.session.directory' => '/var/lib/php/session',
    
    'mysql.casetablenames' => '0',
    'mysql.datadir' => '/var/lib/mysql',
    'mysql.socket' => '/var/lib/mysql/mysql.sock',
    'mysql.log.directory' => '/var/log',
];

$centos_guest = $centos;

$live = [];
$live[Config::LIBRATO_STATSSOURCENAME] = 'phpimagick.com';
$live[Config::JIG_COMPILE_CHECK] = 'COMPILE_CHECK_EXISTS';
$live[Config::SCRIPT_PACKING] = true;
$live[Config::CACHING_SETTING] = 'caching.time';

$live[Config::DOMAIN_CANONICAL] = 'phpimagick.com';
$live[Config::DOMAIN_CDN_PATTERN] = 'phpimagick.test';
$live[Config::DOMAIN_CDN_TOTAL] = 1;


$dev = [];
$dev[Config::LIBRATO_STATSSOURCENAME] = 'phpimagick.test';
$dev[Config::JIG_COMPILE_CHECK] = 'COMPILE_CHECK_MTIME';
$dev[Config::SCRIPT_PACKING] = false;
$dev[Config::CACHING_SETTING] = 'caching.revalidate';

$dev[Config::DOMAIN_CANONICAL] = 'phpimagick.test';
$dev[Config::DOMAIN_CDN_PATTERN] = 'phpimagick.test';
$dev[Config::DOMAIN_CDN_TOTAL] = 1;


//$dev[Config::JIG_COMPILE_CHECK] = 'COMPILE_CHECK_EXISTS';
//$dev[Config::SCRIPT_PACKING] = true;
//$dev[Config::CACHING_SETTING] = 'caching.revalidate';
