<?php


namespace ImagickDemo\Control;


class ImagickFunctionControl extends OptionControl {

    function getName() {
        return 'imagickFunction';
    }
    
    function getDefaultOption() {
        return 'renderImagePolynomial';
    }
    
    function getOptions() {
        $images = [
            "renderImagePolynomial" => 'Polynomial',
            "renderImageSinusoid" => 'Sinusoid',
            "renderImageArctan" => "Arc tan"
        ];

        return $images;
    }

    function getImagePath() {
        return $this->image;
    }
}

 