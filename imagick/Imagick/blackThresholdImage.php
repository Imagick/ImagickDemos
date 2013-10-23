<?php
$imagick = new Imagick(realpath("../images/TestImage.jpg"));

$imagick->blackthresholdimage('rgb(64, 64, 64)');

header("Content-Type: image/jpg");
echo $imagick->getImageBlob();