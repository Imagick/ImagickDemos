<?php

require __DIR__."/../vendor/autoload.php";

$inputPath = __DIR__."/../sass";
$outputPath = __DIR__."/../imagick/css/synaxhighlighter";

@mkdir($outputPath, 0775, true);

$itemsToProcess = [];
$dirIterator = new DirectoryIterator($inputPath);

foreach ($dirIterator as $item) {
    if (!$item->isFile()) {
        continue;
    }
    if (!($item->getExtension() === "scss")) {
        continue;
    }

    $inputFilename = $inputPath .'/'.$item->getFilename();
    $outputFilename = $outputPath.'/'.$item->getBasename('.scss').'.css';
    $itemsToProcess[$inputFilename] = $outputFilename;
}

foreach ($itemsToProcess as $inputFilename => $outputFilename) {
    sassCss($inputFilename, $outputFilename, $inputPath);
}

function sassCss($inputFilename, $outputFilename, $inputPath)
{
    $compiler = new Leafo\ScssPhp\Compiler();

    $compiler->addImportPath($inputPath);
    
    $input = file_get_contents($inputFilename);
    $output =  $compiler->compile($input);
    file_put_contents($outputFilename, $output);
}
