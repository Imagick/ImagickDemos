<?php
$imagick = new Imagick(realpath("../images/TestImage.jpg"));

$imagick->scaleImage(150, 150, true);

header("Content-Type: image/jpg");
echo $imagick->getImageBlob();