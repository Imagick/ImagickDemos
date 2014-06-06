<?php


namespace ImagickDemo\ControlElement;




class ThresholdAngle extends ValueElement {

    protected function getDefault() {
        return 10;
    }

    protected function getMin() {
        return 0;
    }

    protected function getMax() {
        return 90;
    }

    protected function getVariableName() {
        return 'thresholdAngle';
    }

    protected function getDisplayName() {
        return 'Threshold angle';
    }

    function getThresholdAngle() {
        return $this->getValue();
    }
}
