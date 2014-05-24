<?php


namespace ImagickDemo\Imagick;


class setImageArtifact extends \ImagickDemo\Example {

    function render() {
        return $this->renderImageURL();
    }

    function makeImage() {
        $imagick = new \Imagick(realpath($this->imagePath));
        //$imagick->negateimage(false);
//$currentExtent = $imagick->getImageArtifact('jpeg:extent');
//header("Content-Type: image/jpg");
//echo $imagick->getImageBlob();
        $imagick->setImageFormat('jpg');
//$imagick->deconstructimages();
        $imagick->setImageArtifact('jpeg:extent', '40kb');
        //$newExtent = $imagick->getImageArtifact('jpeg:extent');
        //$filepath = "/home/intahwebz/intahwebz/testExtent3asdsdsd.jpg";
        //$imagick->writeimage($filepath);
        return $imagick;
    }

    function renderImage() {
        $imagick = $this->makeImage();
        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();
    }
    
    function renderDescription() {
        $imagick = $this->makeImage();
        $data = $imagick->getImageBlob();
        echo "done. File size is " . strlen($data) . "<br/>";
        //echo "newExtent = $newExtent<br/>";
    }
}