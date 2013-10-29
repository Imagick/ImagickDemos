<?php

$imagick = new Imagick(realpath("../images/TestImage.jpg"));

//http://www.imagemagick.org/script/command-line-options.php#define

//$imagick->tintImage('rgb(0, 128, 128)', 1);

$imagick->negateimage(false);


//$currentExtent = $imagick->getImageArtifact('jpeg:extent');


//header("Content-Type: image/jpg");
//echo $imagick->getImageBlob();
try{
$imagick->setImageFormat('jpg');
//$imagick->deconstructimages();

$imagick->setImageArtifact('jpeg:extent', '40kb');

$newExtent = $imagick->getImageArtifact('jpeg:extent');
$filepath = "/home/intahwebz/intahwebz/testExtent3.jpg";
$imagick->writeimage($filepath);



echo "done. File size is ".filesize($filepath)."<br/>";

echo "newExtent = $newExtent<br/>";
//echo "currentExtent = $currentExtent<br/>";

}
catch(Exception $e) {
    echo "Exception :".$e->getMessage();
}

