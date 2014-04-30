<?php

if (defined('LOW_MEM_CLASS_LOADER') && LOW_MEM_CLASS_LOADER == true) {
    require_once('../vendor/intahwebz/lowmemoryclassloader/LowMemoryClassloader.php');
}
else {
    require_once('../vendor/autoload.php');
}

$parser = new Less_Parser();

$cacheDir = '../var/cache/less';

$compileItems = [
    "../less/bootstrap/bootstrap.less" => '../imagick/css/bootstrap.css',
    "../less/bootstrap/theme.less" => '../imagick/css/bootstrap-theme.css'
];

foreach ($compileItems as $input => $output) {

    $to_cache = array( $input => '/mysite/' );
    Less_Cache::$cache_dir = $cacheDir;
    $css_file_name = Less_Cache::Get( $to_cache );
    //$compiled = file_get_contents( '/var/www/writable_folder/'.$css_file_name );
    
    echo "$css_file_name \n";
    
    $compiled = file_get_contents( $cacheDir.'/'.$css_file_name );
    
    //$parser->parseFile( "../bootstrap-3.1.1/less/bootstrap.less");
    //$css = $parser->getCss();
    file_put_contents($output, $compiled);
    
    
    //$parser = new Less_Parser();
    //$parser->parseFile( "../bootstrap-3.1.1/less/theme.less");
    //$css = $parser->getCss();
    //file_put_contents('../imagick/css/bootstrap-theme.css', $css);
    //

}
