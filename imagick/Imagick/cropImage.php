<?php
$imagick = new Imagick(realpath("../images/TestImage.jpg"));

$imagick->cropImage(200, 200, 120, 50);

header("Content-Type: image/jpg");
echo $imagick->getImageBlob();