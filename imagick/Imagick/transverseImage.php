<?php
$imagick = new Imagick(realpath("../images/TestImage.jpg"));

$imagick->transverseImage();

header("Content-Type: image/jpg");
echo $imagick->getImageBlob();