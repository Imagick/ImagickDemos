<?php


namespace ImagickDemo\Imagick;


class setImageArtifact extends \ImagickDemo\Example {

    function renderImageURL() {
     //   return "<img src='/image/Imagick/setImageArtifact'/>";
    }


    function renderDescription() {

        $imagick = new \Imagick(realpath($this->imagePath));


        $imagick->negateimage(false);


//$currentExtent = $imagick->getImageArtifact('jpeg:extent');


//header("Content-Type: image/jpg");
//echo $imagick->getImageBlob();

        $imagick->setImageFormat('jpg');
//$imagick->deconstructimages();

        $imagick->setImageArtifact('jpeg:extent', '40kb');

        $newExtent = $imagick->getImageArtifact('jpeg:extent');
        $filepath = "/home/intahwebz/intahwebz/testExtent3asdsdsd.jpg";
        $imagick->writeimage($filepath);
        
        


        echo "done. File size is " . filesize($filepath) . "<br/>";

        echo "newExtent = $newExtent<br/>";
    }
}