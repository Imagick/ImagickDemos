<?php
$imagick = new Imagick(realpath("../images/TestImage.jpg"));

$imagick->borderImage('rgb(32, 32, 128)', 20, 20);

header("Content-Type: image/jpg");
echo $imagick->getImageBlob();