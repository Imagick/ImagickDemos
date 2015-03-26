<?php


$zipFile = new ZipArchive();


$zipFile->open(
    "./binaries.zip",
    ZipArchive::CREATE
);


$directories = [
    "../imagick/images/spiderGif/*.png",
];


foreach ($directories as $directory) {
    $zipFile->addGlob($directory);
}
    
    
$zipFile->close();