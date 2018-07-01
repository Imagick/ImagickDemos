<?php


$imagick = new \Imagick();

$desiredWidth = 300;
$desiredWidth = 2 * intval($desiredWidth / 2);

$imagick->newpseudoimage($desiredWidth / 2, 1, "gradient:white-black");
$imagick->setFormat('png');
$imagick->setImageVirtualPixelMethod(\Imagick::VIRTUALPIXELMETHOD_MIRROR);

$originalWidth = $imagick->getImageWidth();

//Now scale, rotate, translate (aka affine project) it
//to be how you want
$points = array(//The x scaling factor is 0.5 when the desired width is double
    //the source width
    ($originalWidth / $desiredWidth), 0, //Don't scale vertically
    0, 1, //Offset the image so that it's in the centre
    0, 0
);

//Make the image be the desired width.
$imagick->sampleimage($desiredWidth, $imagick->getImageHeight());

$imagick->distortImage(\Imagick::DISTORTION_AFFINEPROJECTION, $points, false);



header("Content-Type: image/png");

echo $imagick->getImageBlob();