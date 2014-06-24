<?php

if (defined('LOW_MEM_CLASS_LOADER') && LOW_MEM_CLASS_LOADER == true) {
    require __DIR__.'/../vendor/intahwebz/lowmemoryclassloader/LowMemoryClassloader.php';
}
else {
    require __DIR__.'/../vendor/autoload.php';
}

$parser = new Less_Parser();

$cacheDir = __DIR__.'/../var/cache/less';

@mkdir($cacheDir, 0755, true);

$compileItems = [
    "../less/bootstrap/bootstrap.less" => '../imagick/css/bootstrap.css',
    "../less/bootstrap/theme.less" => '../imagick/css/bootstrap-theme.css'
];

foreach ($compileItems as $input => $output) {
    $cacheSetting = array( $input => '/mysite/' );
    Less_Cache::$cache_dir = $cacheDir;
    $cssFileName = Less_Cache::Get( $cacheSetting );    
    echo "$cssFileName \n";
    $compiled = file_get_contents( $cacheDir.'/'.$cssFileName );
    file_put_contents($output, $compiled);
}
