<?php


namespace ImagickDemo\Imagick;


class setImageArtifact extends \ImagickDemo\Example {

    use OriginalImageFile;
    
    /**
     * @var \ImagickDemo\Control\ArtifactExample
     */
    private $imageControl;

    static private $listOfExamples = [
        'multiplyGradients' => 'MULTIPLY',
        'difference'        => 'DIFFERENCE',
    ];
    
    
    function __construct(\ImagickDemo\Imagick\Control\ArtifactExample $control) {
        $this->imageControl = $control;
        parent::__construct($control);
    }

    public static function getExamples() {
        

        return self::$listOfExamples;
    }
    

    function render() {
        $output = "";
        //$output .= $this->renderImageURL();

        $this->renderCustomImageURL([]);
        
        return $output;
    }

    function renderCustomImageURL($extraParams = []) {
        return sprintf(
            "<img src='%s' />",
            $this->imageControl->getCustomImageURL($extraParams)
        );
    }

    function renderCustomImage() {

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