<?php
$imagick = new Imagick(realpath("../images/TestImage.jpg"));

$imagick->trimImage(25);

header("Content-Type: image/jpg");
echo $imagick->getImageBlob();