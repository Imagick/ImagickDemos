<?php


require __DIR__.'/../vendor/autoload.php';

$parser = new Less_Parser();

$cacheDir = __DIR__.'/../var/cache/less';
@mkdir($cacheDir, 0755, true);

$compileItems = [
    __DIR__."/../less/bootstrap/bootstrap.less" => __DIR__.'/../imagick/css/bootstrap.css',
    __DIR__."/../less/bootstrap/theme.less" => __DIR__.'/../imagick/css/bootstrap-theme.css'
];

foreach ($compileItems as $input => $output) {
    $cacheSetting = array( $input => '/mysite/' );
    Less_Cache::$cache_dir = $cacheDir;
    $cssFileName = Less_Cache::Get( $cacheSetting );    
    echo "$cssFileName \n";
    $compiled = file_get_contents($cacheDir.'/'.$cssFileName);
    file_put_contents($output, $compiled);
}
