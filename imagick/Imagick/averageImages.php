<?php

try{
$imagick = new Imagick(realpath("../images/TestImage.jpg"));

$imagick2 = new Imagick(realpath("../images/TestImage2.jpg"));

$imagick->addImage($imagick2);

//This kills PHP  - but the function is deprecated.
$averageImage = $imagick->averageImages();

$averageImage->setImageType('jpg');
header("Content-Type: image/jpg");
echo $averageImage->getImageBlob();


}
catch(Exception $e) {
    echo "Exception ".$e->getMessage();
}