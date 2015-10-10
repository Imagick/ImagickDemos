<?php

use ImagickDemo\Config;

$env = [
    Config::LIBRATO_STATSSOURCENAME,
    Config::JIG_COMPILE_CHECK,
    Config::CACHING_SETTING,

    Config::DOMAIN_CANONICAL,
    Config::DOMAIN_CDN_PATTERN,
    Config::DOMAIN_CDN_TOTAL,
    
    Config::SCRIPT_VERSION,
    Config::SCRIPT_PACKING,
    Config::DOMAIN_INTERNAL,
    Config::ENVIRONMENT
];

return $env;
