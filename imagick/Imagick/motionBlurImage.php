<?php
$imagick = new Imagick(realpath("../images/TestImage.jpg"));


$imagick->motionBlurImage(20.0, 50.0, 45);


header("Content-Type: image/jpg");
echo $imagick->getImageBlob();