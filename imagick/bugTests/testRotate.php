<?php


$imagick = new Imagick(realpath("TestImage2.jpg"));

//$imagick->rotateImage(new ImagickPixel('transparent'),6.5);

//header("Content-Type: image/jpg");
//echo $imagick->getImageBlob();





print_r ($imagick->getImageProfiles("*", false));