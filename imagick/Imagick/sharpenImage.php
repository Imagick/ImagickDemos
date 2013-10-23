<?php
$imagick = new Imagick(realpath("../images/TestImage.jpg"));

$imagick->sharpenimage(3, 15);

header("Content-Type: image/jpg");
echo $imagick->getImageBlob();