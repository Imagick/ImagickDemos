<?php
$imagick = new Imagick(realpath("../images/TestImage.jpg"));

$imagick->rotateimage('rgb(128, 32, 32)', 15);

header("Content-Type: image/jpg");
echo $imagick->getImageBlob();