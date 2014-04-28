<?php


$image = new \Imagick();
$image->newImage(400, 300, '#000000');

$pixel = new \ImagickPixel('#ffffff');
$pixel->setColorValue(\Imagick::COLOR_OPACITY, 0.0);

$arc = new \ImagickDraw();

$arc->setStrokeColor($pixel);
$arc->setStrokeWidth(1);
$arc->setFillColor($pixel);
$arc->arc(50, 50, 350, 250, 45, 135);

$image->drawImage($arc);
$image->flattenImages();

//$image->setcolorspace(Imagick::COLORSPACE_GRAY);
//$image->setimagechanneldepth(Imagick::CHANNEL_GRAY, 1);
$image->setImageDepth (1);
$image->gra
$image->setimageformat("RGB");
$image->resizeimage(100, 100, \Imagick::FILTER_LANCZOS, 1);
$image->writeImage('./arc.rgb');

$pixel->clear();
$pixel->destroy();

$arc->clear();
$arc->destroy();


//$image->setImageFormat("png");
////$drawing->drawImage($draw);
//
//header("Content-Type: image/png");
//echo $image->getImageBlob();



 