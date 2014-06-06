<?php


namespace ImagickDemo\ControlElement;




class Opacity extends ValueElement {

    protected function getDefault() {
        return 100;
    }

    protected function getMin() {
        return 0;
    }

    protected function getMax() {
        return 255;
    }

    protected function getVariableName() {
        return 'opacity';
    }

    protected function getDisplayName() {
        return 'Opacity';
    }

    function getOpacity() {
        return $this->getValue();
    }
}



 