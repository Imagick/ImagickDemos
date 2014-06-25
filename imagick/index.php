<?php

if (defined('LOW_MEM_CLASS_LOADER') && LOW_MEM_CLASS_LOADER == true) {
    require __DIR__.'/../vendor/intahwebz/lowmemoryclassloader/LowMemoryClassloader.php';
}
else {
    require __DIR__.'/../vendor/autoload.php';
}


//yolo - We use a global to allow us to do a hack to make all the code examples
//appear to use the standard 'header' function, but also capture the content type 
//of the image
$imageType = null;
$imageCache = true;

require_once "process.php";

