<?php
$imagick = new Imagick(realpath("../images/TestImage.jpg"));

$imagick->unsharpMaskImage(5, 1, 5, 1);

header("Content-Type: image/jpg");
echo $imagick->getImageBlob();