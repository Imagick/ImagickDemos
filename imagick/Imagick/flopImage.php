<?php
$imagick = new Imagick(realpath("../images/TestImage.jpg"));

$imagick->flopImage();

header("Content-Type: image/jpg");
echo $imagick->getImageBlob();