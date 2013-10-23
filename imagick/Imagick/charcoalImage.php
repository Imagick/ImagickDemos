<?php
$imagick = new Imagick(realpath("../images/TestImage.jpg"));

$imagick->charcoalImage(4, 4);

header("Content-Type: image/jpg");
echo $imagick->getImageBlob();