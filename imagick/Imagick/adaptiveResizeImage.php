<?php
$imagick = new Imagick(realpath("../images/TestImage.jpg"));





$imagick->adaptiveResizeImage(200, 200, true);


header("Content-Type: image/jpg");
echo $imagick->getImageBlob();