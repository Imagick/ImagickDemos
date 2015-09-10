<?php

use ImagickDemo\Config;

$config = [];

$live = [];
$live[Config::LIBRATO_STATSSOURCENAME] = 'phpimagick.com';
$live[Config::JIG_COMPILE_CHECK] = 'COMPILE_CHECK_EXISTS';
$live[Config::SCRIPT_PACKING] = true;
$live[Config::CACHING_SETTING] = 'caching.time';

$dev = [];
$dev[Config::LIBRATO_STATSSOURCENAME] = 'phpimagick.test';
$dev[Config::JIG_COMPILE_CHECK] = 'COMPILE_CHECK_MTIME';
$dev[Config::SCRIPT_PACKING] = false;
$dev[Config::CACHING_SETTING] = 'caching.revalidate';


//$dev[Config::JIG_COMPILE_CHECK] = 'COMPILE_CHECK_EXISTS';
//$dev[Config::SCRIPT_PACKING] = true;
//$dev[Config::CACHING_SETTING] = 'caching.revalidate';

$config['live'] = $live;
$config['dev'] = $dev;


return $config;
