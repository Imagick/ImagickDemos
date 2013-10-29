<?php
$imagick = new Imagick(realpath("../images/TestImage.jpg"));

$imagick->shadeImage(true, 45, 20);

header("Content-Type: image/jpg");
echo $imagick->getImageBlob();