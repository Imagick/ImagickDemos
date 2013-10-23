<?php
$imagick = new Imagick(realpath("../images/TestImage.jpg"));

$imagick->sketchimage(3, 15, 45);

header("Content-Type: image/jpg");
echo $imagick->getImageBlob();