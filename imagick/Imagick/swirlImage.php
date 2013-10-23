<?php
$imagick = new Imagick(realpath("../images/TestImage.jpg"));

$imagick->swirlImage(-190);

header("Content-Type: image/jpg");
echo $imagick->getImageBlob();