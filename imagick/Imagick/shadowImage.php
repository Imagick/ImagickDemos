<?php
$imagick = new Imagick(realpath("../images/TestImage.jpg"));

$imagick->shadowImage(1, 1, 0, 0);

header("Content-Type: image/jpg");
echo $imagick->getImageBlob();