<?php


namespace ImagickDemo\ControlElement;




class LowThreshold extends ValueElement {

    protected function getDefault() {
        return 0.1;
    }

    protected function getMin() {
        return 0;
    }

    protected function getMax() {
        return 1;
    }

    protected function getVariableName() {
        return 'lowThreshold';
    }

    protected function getDisplayName() {
        return 'Low threshold';
    }

    function getLowThreshold() {
        return $this->getValue();
    }
}



 