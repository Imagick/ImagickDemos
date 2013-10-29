<?php
$imagick = new Imagick(realpath("../images/TestImage.jpg"));

$imagick->spliceImage(50, 50, 100, 100);

header("Content-Type: image/jpg");
echo $imagick->getImageBlob();