<?php


//echo "Hello";
//
//exit(0);

$imagick = new Imagick();

//$imagick->setResolution(600,600);
$imagick->setResolution(150, 150);
$imagick->readImage(realpath('flyer.pdf'));

////CMYK PROFILE
//$icc = file_get_contents('USWebCoatedSWOP.icc');
//$imagick->profileImage('icc', $icc);
//$imagick->setImageColorspace(imagick::COLORSPACE_CMYK);
//
////RGB PROFILE
//$icc = file_get_contents('sRGB_IEC61966-2-1_no_black_scaling.icc');
//$imagick->profileImage('icc', $icc);
//$imagick->setImageColorspace(imagick::COLORSPACE_RGB);

//$imagick->
$imagick->setImageFormat( "jpg" );
$imagick->setImageCompression(imagick::COMPRESSION_JPEG);
$imagick->setImageCompressionQuality(90);

@$imagick->flattenimages();



header("Content-Type: image/jpeg");
echo $imagick;