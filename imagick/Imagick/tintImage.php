<?php
$imagick = new Imagick(realpath("../images/TestImage.jpg"));

$imagick->tintImage('rgb(0, 128, 255)', 1);

header("Content-Type: image/jpg");
echo $imagick->getImageBlob();