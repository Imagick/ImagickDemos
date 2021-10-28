<?php

require __DIR__.'/../vendor/autoload.php';
require __DIR__.'/../src/example_list.php';


$categories = [
    'Imagick',
    'ImagickDraw',
    'ImagickPixel',
    'ImagickPixelIterator',
    'ImagickKernel',

];

$any_missing = false;
echo "Missing list:\n";
foreach ($categories as $category) {
    $rc = new ReflectionClass($category);
    $categoryList = getCategoryList($category);
    foreach ($rc->getMethods() as $rc_method) {
        $name = $rc_method->getName();

        if (array_key_exists($name, $categoryList) === false &&
            in_array($name, $categoryList, true) === false) {
            echo "$category::$name\n";
            $any_missing = true;
        }
    }
}

if ($any_missing === false) {
    echo "None!\n";
}