<?php


$sourceImages = [
    'gradientDown' => 'gradientDown',
    'gradientRight' => 'gradientRight',
];


foreach ($sourceImages as $functionName => $outputFilename) {
    $imagick = $functionName(500, 500);

    /** @var $imagick \Imagick */
    $imagick->setImageFormat('png');
    $imagick->writeImage('../images/'.$outputFilename.'.png');

    echo "$outputFilename \n";
}

function gradientDown($width, $height) {
    $imagick = new Imagick();
    $imagick->newPseudoImage($width, $height, 'gradient:white-black');

    return $imagick;
}

function gradientRight($width, $height) {
    $imagick = new Imagick();
    $imagick->newPseudoImage($width, $height, 'gradient:white-black');
    $imagick->rotateImage('none', 90);

    return $imagick;
}




 