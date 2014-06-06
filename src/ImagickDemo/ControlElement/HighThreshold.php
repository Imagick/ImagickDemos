<?php


namespace ImagickDemo\ControlElement;




class HighThreshold extends ValueElement {

    protected function getDefault() {
        return 0.9;
    }

    protected function getMin() {
        return 0;
    }

    protected function getMax() {
        return 1;
    }

    protected function getVariableName() {
        return 'highThreshold';
    }

    protected function getDisplayName() {
        return 'High threshold';
    }

    function getHighThreshold() {
        return $this->getValue();
    }
}



 