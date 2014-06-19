<?php


//TODO - is this still alive?

$sourceImages = [
    'gradientDown' => 'gradientDown',
    'gradientRight' => 'gradientRight',

    'whiteDisc' => 'whiteDisc',
    'whiteDiscAlpha' => 'whiteDiscAlpha',

    'redDiscAlpha'      => 'redDiscAlpha',
    'greenDiscAlpha'    => 'greenDiscAlpha',
    'blueDiscAlpha'     => 'blueDiscAlpha',
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

    $imagick->setBackgroundColor('yellow');
    $imagick->newPseudoImage($width, $height, 'gradient:white-black');

    return $imagick;
}

function gradientRight($width, $height) {
    $imagick = new Imagick();
    $imagick->newPseudoImage($width, $height, 'gradient:white-black');
    $imagick->rotateImage('none', 90);

    return $imagick;
}


function whiteDisc($width, $height) {
    $imagick = new Imagick();
    $imagick->newImage($width, $height, 'black');

    $draw = new ImagickDraw();

    $draw->setStrokeOpacity(0);
    $draw->setFillColor('white');
    $draw->circle($width / 2, $height / 2, $width / 4, $height / 2);

    $imagick->drawImage($draw);

    return $imagick;
}


function whiteDiscAlpha($width, $height) {
    $imagick = new Imagick();
    $imagick->newImage($width, $height, 'none');

    $draw = new ImagickDraw();

    $draw->setStrokeOpacity(0);
    $draw->setFillColor('white');
    $draw->circle($width / 2, $height / 2, $width / 4, $height / 2);

    $imagick->drawImage($draw);

    return $imagick;
}



function redDiscAlpha($width, $height) {
    $imagick = new Imagick();
    $imagick->newImage($width, $height, 'none');

    $draw = new ImagickDraw();

    $draw->setStrokeOpacity(0);
    $draw->setFillColor('red');
    $draw->circle($width / 2, $height / 3, $width / 2, ($height / 3 - $height / 4));

    $imagick->drawImage($draw);

    return $imagick;
}


function greenDiscAlpha($width, $height) {
    $imagick = new Imagick();
    $imagick->newImage($width, $height, 'none');

    $draw = new ImagickDraw();

    $draw->setStrokeOpacity(0);
    $draw->setFillColor('lime');
    $draw->circle($width / 3, 2 * $height / 3, ($width / 3 - $width / 4), 2 * $height / 3);

    $imagick->drawImage($draw);

    return $imagick;
}

function blueDiscAlpha($width, $height) {
    $imagick = new Imagick();
    $imagick->newImage($width, $height, 'none');

    $draw = new ImagickDraw();

    $draw->setStrokeOpacity(0);
    $draw->setFillColor('blue');
    $draw->circle(2 * $width / 3, 2 * $height / 3, $width - ($width / 3 - $width / 4), 2 * $height / 3);

    $imagick->drawImage($draw);

    return $imagick;
}

