<?php
$imagick = new Imagick(realpath("../images/TestImage.jpg"));


$imagick->oilPaintImage(4.0);


header("Content-Type: image/jpg");
echo $imagick->getImageBlob();