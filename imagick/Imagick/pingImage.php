<?php

$image = new Imagick();
$image->pingImage(realpath("../images/TestImage.jpg"));

echo "Width is ".$image->getImageWidth()."<br/>";
echo "Height is ".$image->getImageHeight()."<br/>";

//header("Content-Type: image/jpg");
//echo $imagick->getImageBlob();