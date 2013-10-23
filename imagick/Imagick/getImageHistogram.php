<?php
$imagick = new Imagick(realpath("../images/TestImage.jpg"));


//Requires more than 16MB memory

//echo "Width is ".$image->getImageWidth()."<br/>";
//echo "Height is ".$image->getImageHeight()."<br/>";

//header("Content-Type: image/jpg");
//echo $imagick->getImageBlob();

var_dump($imagick->getImageHistogram());