<?php
$imagick = new Imagick();

$imagick->newimage(400, 400, "white");

//functionimage

$imagick->evaluateimage(Imagick::EVALUATE_COSINE, "4,-90");



$imagick->setimageformat('png');

header("Content-Type: image/png");
echo $imagick->getImageBlob();