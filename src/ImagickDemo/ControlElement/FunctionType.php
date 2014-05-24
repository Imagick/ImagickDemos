<?php


namespace ImagickDemo\ControlElement;

use Intahwebz\Request;


class FunctionType extends OptionKeyElement {
    protected function getDefault() {
        return 'renderImagePolynomial';
    }

    protected function getVariableName() {
        return 'imagickFunction';
    }

    protected function getDisplayName() {
        return "Function";
    }

    function getOptions() {
        return [
            "renderImagePolynomial" => 'Polynomial',
            "renderImageSinusoid" => 'Sinusoid',
            "renderImageArctan" => "Arc tan"
        ];
    }

    function getDistortionType() {
        return $this->getKey();
    }
}

 