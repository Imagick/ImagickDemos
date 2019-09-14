<?php

declare(strict_types=1);


$default = [
    'opcache.enabled' => '1',
    'script.version' => '100917010607',
    'script.packing' => true,
    'caching.setting' => 'caching.time',
    'jig.compilecheck' => 'COMPILE_CHECK_EXISTS',
];




$local = [
    'opcache.enabled' => '0',
    'caching.setting' => 'caching.time',
    'jig.compilecheck' => 'COMPILE_CHECK_MTIME',
];


