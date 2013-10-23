<?php
$imagick = new Imagick(realpath("../images/TestImage.jpg"));

$imagick->blurImage(5, 5);

header("Content-Type: image/jpg");
echo $imagick->getImageBlob();