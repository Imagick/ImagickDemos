<?php
$imagick = new Imagick(realpath("../images/TestImage.jpg"));

$imagick->shearimage('rgb(128, 32, 32)', 15, 0);

header("Content-Type: image/jpg");
echo $imagick->getImageBlob();