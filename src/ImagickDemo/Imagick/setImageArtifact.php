<?php


namespace ImagickDemo\Imagick;


class setImageArtifact extends \ImagickDemo\Example {

    /**
     * @var \ImagickDemo\Control\ImageControl
     */
    private $imageControl;
    
    function __construct(\ImagickDemo\Control\ImageControl $control) {
        $this->imageControl = $control;
        parent::__construct($control);
    }
    
    function render() {

        $output = "";//$this->renderDescription();

        $output .= $this->renderImageURL();
        
        return $output;
    }

    function makeImage() {
        $imagick = new \Imagick(realpath($this->imageControl->getImagePath()));
        //$imagick->negateimage(false);
//$currentExtent = $imagick->getImageArtifact('jpeg:extent');
//header("Content-Type: image/jpg");
//echo $imagick->getImageBlob();
        $imagick->setImageFormat('jpg');
//$imagick->deconstructimages();
        $imagick->setImageArtifact('jpeg:extent', '20kb');
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
        return "After setting \"'jpeg:extent', '70kb'\" File size is " . strlen($data) . "<br/>";
        //echo "newExtent = $newExtent<br/>";
    }
}