<?php

$overlay = new Imagick(realpath("../images/dickbutt.jpg"));
$imagick = new Imagick(realpath("../images/Screeny.png"));

$overlay->setImageVirtualPixelMethod(Imagick::VIRTUALPIXELMETHOD_TRANSPARENT);

$width = $overlay->getImageWidth();
$height = $overlay->getImageHeight();

$points = array(
    0, 0,              364, 51,   
    $width, 0,         473.4, 23, 
    0, $height,         433.5, 182,  
    $width, $height,    523, 119.4 
);

$overlay->modulateImage(97, 100, 0 );
$overlay->distortImage(Imagick::DISTORTION_PERSPECTIVE, $points, TRUE );

$imagick->compositeImage($overlay, Imagick::COMPOSITE_OVER, 364.5, 23.5);

header("Content-Type: image/png");
echo $imagick->getImageBlob();