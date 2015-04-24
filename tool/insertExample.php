<?php

require __DIR__.'/../vendor/autoload.php';

use ImagickDemo\Navigation\CategoryNav;
use ImagickDemo\DocHelperDisplay;

$dir = "/home/svn/phpdoc-en/en/reference/imagick";


$categories = [
    'imagick',
    'imagickdraw',
    'imagickpixel',
    'imagickpixeliterator',
    'imagickkernel'
];



foreach ($categories as $category) {
    process($dir.'/'.$category, $category);
}


function process($directory, $category) {
    
    $files = glob($directory.'/*.xml');

    foreach ($files as $file) {
        $contents = file_get_contents($file);

        if (strpos($contents, '<example>') !== false) {
            continue;
        }
        $examplePosition = strpos($contents, '</refentry>');
        if ($examplePosition === false) {
            echo "$file couldn't find </refentry> \n";
            continue;
        }

        $basename = basename($file, '.xml');
        $exampleInfo = CategoryNav::findExample($category, $basename);
        
        if ($exampleInfo == null) {
            //echo "No example at all for $category::$basename\n";
            continue;
        }

        list($exampleCategory, $exampleFunction) = $exampleInfo;
        $docHelper = new DocHelperDisplay($exampleCategory, $exampleFunction);
        $xml = $docHelper->getXML();
        $start = substr($contents, 0, $examplePosition);        
        $end = substr($contents, $examplePosition);
        
        $newContents = $start;
        $newContents .= $xml;
        $newContents .= $end;
    
        $written = @file_put_contents($file, $newContents);

        if ($written == false) {
            echo "Failed to write contents to file $file \n";
            exit(0);
        }
        echo "Added example to $file \n";

        //exit(0);
    }
    
}