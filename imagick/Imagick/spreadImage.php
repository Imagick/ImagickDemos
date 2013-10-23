<?php
$imagick = new Imagick(realpath("../images/TestImage.jpg"));

$imagick->spreadImage(5);

header("Content-Type: image/jpg");
echo $imagick->getImageBlob();