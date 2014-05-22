<?php

namespace ImagickDemo\Imagick;

class subImageMatch extends \ImagickDemo\Example {
    /**
     * @var \ImagickDemo\Control\ImageControl
     */
    private $rsiControl;
    
    function __construct(\ImagickDemo\Control\ImageControl $rsiControl) {
        $this->rsiControl = $rsiControl;
    }

    function getControl() {
        return $this->rsiControl;
    }

    function renderDescription() {

        //Similarity score is: 0
        //array(4) { ["x"]=> int(250) ["y"]=> int(110) ["width"]=> int(40) ["height"]=> int(40)

        $imagick = new \Imagick(realpath($this->rsiControl->getImagePath()));

        $imagick2 = clone $imagick;
        //$imagick2->blurImage(5, 1);
        $imagick2->cropimage(40, 40, 250, 110);

        $imagick2->setImagePage($imagick2->getimageWidth(), $imagick2->getimageheight(), 0, 0);
        $imagick2->vignetteimage(0, 1, 3, 3);

        $similarity = null;
        $bestMatch = null;
        $comparison = $imagick->subImageMatch($imagick2, $bestMatch, $similarity);
        
        echo "Similarity score is: ".$similarity;
        foreach($bestMatch as $key => $value) {
            echo "$key : $value <br/>";
        }
    }

    function renderImage() {
        //todo add control
        $imagick = new \Imagick(realpath($this->rsiControl->getImagePath()));
        $imagick2 = clone $imagick;
        
        $imagick2->cropimage(40, 40, 250, 110);
        $imagick2->setImagePage($imagick2->getimageWidth(), $imagick2->getimageheight(), 0, 0);
        $imagick2->vignetteimage(0, 1, 3, 3);

        $similarity = null;
        $bestMatch = null;
        $comparison = $imagick->subImageMatch($imagick2, $bestMatch, $similarity);

        header("Content-Type: image/png");
        echo $comparison->getImageBlob();
    }
}