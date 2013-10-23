<?php
$imagick = new Imagick(realpath("../images/TestImage.jpg"));

$imagick->normalizeImage();

header("Content-Type: image/jpg");
echo $imagick->getImageBlob();