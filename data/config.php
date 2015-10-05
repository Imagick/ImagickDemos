<?php


use ImagickDemo\Config;
use Jig\Jig;
use Room11\Caching\LastModifiedStrategy;

$socketDir = '/var/run/php-fpm';

$default = [
    'app_name' => 'imagickdemos',
    'nginx_sendFile' => 'off',
    'mysql_charset' => 'utf8mb4',
    'mysql_collation' => 'utf8mb4_unicode_ci',
];

$default[Config::SCRIPT_VERSION] = date('jmyhis');


$centos = [
    'nginx_log_directory' => '/var/log/nginx',
    'nginx_root_directory' => '/usr/share/nginx',
    'nginx_conf_directory' => '/etc/nginx',
    'nginx_run_directory ' => '/var/run',
    'nginx_user' => 'nginx',
    'nginx_sendFile' => 'on',
    
    'imagick_root_directory' => dirname(__DIR__),
    
    'phpfpm_www_maxmemory' => '16M',
    'phpfpm_images_maxmemory' => '48M',
    'phpfpm_user' => 'intahwebz',
    'phpfpm_group' => 'www-data',
    'phpfpm_socket_directory' => $socketDir,
    'phpfpm_conf_directory' => '/etc/php-fpm.d',
    'phpfpm_pid_directory' => '/var/run/php-fpm',
    'phpfpm_fullsocketpath' => $socketDir."/php-fpm-imagickdemos-".basename(dirname(__DIR__)).".sock",

    'php_conf_directory' => '/etc/php',
    'php_log_directory' => '/var/log/php',
    'php_errorlog_directory' => '/var/log/php',
    'php_session_directory' => '/var/lib/php/session',
    
    'mysql_casetablenames' => '0',
    'mysql_datadir' => '/var/lib/mysql',
    'mysql_socket' => '/var/lib/mysql/mysql.sock',
    'mysql_log_directory' => '/var/log',
];

$centos_guest = $centos;

$live = [];
$dev = [];

$live[Config::LIBRATO_STATSSOURCENAME] = 'phpimagick.com';
$dev[Config::LIBRATO_STATSSOURCENAME] = 'phpimagick.test';

$live[Config::JIG_COMPILE_CHECK] = Jig::COMPILE_CHECK_EXISTS;
$dev[Config::JIG_COMPILE_CHECK] = Jig::COMPILE_CHECK_MTIME;

$live[Config::CACHING_SETTING] = LastModifiedStrategy::CACHING_TIME;
$dev[Config::CACHING_SETTING] = LastModifiedStrategy::CACHING_REVALIDATE;

$live[Config::SCRIPT_PACKING] = true;
$dev[Config::SCRIPT_PACKING] = false;

$live[Config::DOMAIN_CANONICAL] = 'phpimagick.com';
$dev[Config::DOMAIN_CANONICAL] = 'phpimagick.test';

$live[Config::DOMAIN_CDN_PATTERN] = 'phpimagick.test';
$dev[Config::DOMAIN_CDN_PATTERN] = 'phpimagick.test';

$live[Config::DOMAIN_CDN_TOTAL] = 1;
$dev[Config::DOMAIN_CDN_TOTAL] = 1;
