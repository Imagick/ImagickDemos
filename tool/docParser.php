<?php

require __DIR__.'/../vendor/autoload.php';

require __DIR__.'/docParserFunctions.php';


$urlList = getUrlList();

$classes = [
    'Imagick',
    'ImagickDraw',
    'ImagickPixel',
    'ImagickPixelIterator',
    'ImagickKernel',
];

$excludeList = [];
file_put_contents(__DIR__ . "/doc_fetching_errors.txt", "List of fetching errors\n=============\n");

foreach ($classes as $class) {
    $class = strtolower($class);
    echo "Processing class: $class \n";
    $rc = new ReflectionClass($class);

    $methods = $rc->getMethods();

    foreach ($methods as $method) {
        $methodName = $method->getName();
        echo "Processing method: $methodName \n";
        $methodName = strtolower($methodName);
        if (in_array($methodName, $excludeList, true) === true) {
            echo "excluded...\n";
            continue;
        }

        $filename = sprintf(
            __DIR__ . "/../doc/%s/%s.html",
            $class,
            $methodName
        );
        if (file_exists($filename) === true) {
            // lets go through and get them all.
            echo "Skipping.\n";
            continue;
        }

        $manual = getManualWords($class, $methodName);
        if ($manual === null) {
            continue;
        }

        $written = file_put_contents($filename, $manual->getDescription());
        if ($written === false) {
            echo "Failed to write file $filename";
            exit(-1);
        }
    }
}
