<?php
$imagick = new Imagick(realpath("../images/TestImage.jpg"));

$imagick->resampleImage(200, 200, \Imagick::FILTER_LANCZOS, 1);


header("Content-Type: image/jpg");
echo $imagick->getImageBlob();