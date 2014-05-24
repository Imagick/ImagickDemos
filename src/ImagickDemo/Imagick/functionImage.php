<?php

namespace ImagickDemo\Imagick;


class functionImage extends \ImagickDemo\Example {

    /**
     * @var \ImagickDemo\Control\ImagickFunctionControl
     */
    private $functionControl;

    
    function __construct(\ImagickDemo\Control\ImagickFunctionControl $control) {
        $this->functionControl = $control;
    }
    
    function renderDescription() {
        return '';
    }

    function render() {
        $output = $this->renderDescription();
        $output .= $this->renderCustomImageURL($this->functionControl);

        return $output;
    }

    function renderCustomImage() {
        $function = $this->functionControl->getDistortionType();

        if (method_exists($this, $function)) {
            call_user_func([$this, $function]);
            return;
        }

        $this->renderImagePolynomial();
    }
    
    function renderImagePolynomial() {
        $imagick = new \Imagick();
        $imagick->newPseudoImage(500, 500, 'gradient:black-white');
        $arguments = array(0.5, 1, 0);
        $imagick->functionImage(\Imagick::FUNCTION_POLYNOMIAL, $arguments);
        $imagick->setimageformat('png');
        header("Content-Type: image/png");
        echo $imagick->getImageBlob();
    }

    function renderImageSinusoid() {
        $imagick = new \Imagick();
        $imagick->newPseudoImage(500, 500, 'gradient:black-white');
        $arguments = array(7, -90);
        $imagick->functionImage(\Imagick::FUNCTION_SINUSOID, $arguments);
        $imagick->setimageformat('png');
        header("Content-Type: image/png");
        echo $imagick->getImageBlob();
    }

    function renderImageArctan() {
        $imagick = new \Imagick();
        $imagick->newPseudoImage(500, 500, 'gradient:black-white');
        $arguments = array(10);
        $imagick->functionImage(\Imagick::FUNCTION_ARCTAN, $arguments);
        $imagick->setimageformat('png');
        header("Content-Type: image/png");
        echo $imagick->getImageBlob();
    }
    
}