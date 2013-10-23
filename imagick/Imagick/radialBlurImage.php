<?php
$imagick = new Imagick(realpath("../images/TestImage.jpg"));

$imagick->radialBlurImage(10);

header("Content-Type: image/jpg");
echo $imagick->getImageBlob();