<?php
$imagick = new Imagick(realpath("../images/TestImage.jpg"));

$imagick->sepiaToneImage(55);


header("Content-Type: image/jpg");
echo $imagick->getImageBlob();