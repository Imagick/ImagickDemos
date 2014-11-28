<?php


namespace ImagickDemo\Imagick;


class setImageArtifact extends \ImagickDemo\Example {

    use OriginalImageFile;
    
    /**
     * @var \ImagickDemo\Control\ImageControl
     */
    private $imageControl;
    
    function __construct(\ImagickDemo\Control\ImageControl $control) {
        $this->imageControl = $control;
        parent::__construct($control);
    }

    function render() {
        $output = "";
        $output .= $this->renderImageURL();
        
        return $output;
    }

    function makeImage() {
        $imagick = new \Imagick(realpath($this->imageControl->getImagePath()));
        $imagick->setImageFormat('jpg');
        $imagick->setImageArtifact('jpeg:extent', '20kb');

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
    }
}