<?php
$imagick = new Imagick(realpath("../images/TestImage.jpg"));

$imagick->transposeImage();

header("Content-Type: image/jpg");
echo $imagick->getImageBlob();