<?php

namespace ImagickDemo\Imagick;

class colorMatrixImage extends \ImagickDemo\Example {

    /**
     * @var \ImagickDemo\Control\ControlCompositeRadiusSigmaImage
     */
    private $rsiControl;
    
    function __construct(\ImagickDemo\Control\ControlCompositeRadiusSigmaImage $rsiControl) {
        $this->rsiControl = $rsiControl;
    }

    function getControl() {
        return $this->rsiControl;
    }
    
    function renderDescription() {
        //http://www.imagemagick.org/Usage/color_mods/#color-matrix
        //http://www.c-sharpcorner.com/UploadFile/mahesh/Transformations0512192005050129AM/Transformations05.aspx
        //http://www.graficaobscura.com/matrix/index.html
    }

    function renderImage() {
        $radius = $this->rsiControl->getRadius();
        $sigma = $this->rsiControl->getSigma();

        $imagick = new \Imagick(realpath($this->rsiControl->getImagePath()));

        $colorMatrix = [
            1.5, 0.0, 0.0, 0.0, 0.0, -0.157,
            0.0, 1.5, 0.0, 0.0, 0.0, -0.157,
            0.0, 0.0, 1.5, 0.0, 0.0, -0.157,
            0.0, 0.0, 0.0, 1.0, 0.0,  0.0,
            0.0, 0.0, 0.0, 0.0, 1.0,  0.0,
            0.0, 0.0, 0.0, 0.0, 0.0,  1.0
         ];

        $colorMatrix = [
            1.5, 0.0, 0.0, 0.0, 0.0, -0.157,
            0.0, 1.0, 0.5, 0.0, 0.0, -0.157,
            0.0, 0.0, 1.5, 0.0, 0.0, -0.157,
            0.0, 0.0, 0.0, 1.0, 0.0,  0.0,
            0.0, 0.0, 0.0, 0.0, 1.0,  0.0,
            0.0, 0.0, 0.0, 0.0, 0.0,  1.0
        ];
        
        
        $imagick->colorMatrixImage($colorMatrix);
        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();
    }
}