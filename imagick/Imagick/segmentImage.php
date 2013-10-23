<?php
$imagick = new Imagick(realpath("../images/TestImage.jpg"));

$imagick->segmentImage(\Imagick::COLORSPACE_RGB, 10, 5);


header("Content-Type: image/jpg");
echo $imagick->getImageBlob();