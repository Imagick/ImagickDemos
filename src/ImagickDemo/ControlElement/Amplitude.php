<?php


namespace ImagickDemo\ControlElement;




class Amplitude extends ValueElement {

    protected function getDefault() {
        return 5;
    }

    protected function getMin() {
        return 0;
    }

    protected function getMax() {
        return 20;
    }

    protected function getVariableName() {
        return 'amplitude';
    }

    protected function getDisplayName() {
        return 'Amplitude';
    }

    function getAmplitude() {
        return $this->getValue();
    }
}
 