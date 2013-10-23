<?php
$imagick = new Imagick(realpath("../images/TestImage.jpg"));

$imagick2 = new Imagick(realpath("../images/TestImage2.jpg"));

$imagick->remapImage($imagick2, true);

header("Content-Type: image/jpg");
echo $imagick->getImageBlob();