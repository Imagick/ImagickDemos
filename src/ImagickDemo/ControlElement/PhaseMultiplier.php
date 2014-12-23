<?php


namespace ImagickDemo\ControlElement;




class PhaseMultiplier extends ValueElement {

    protected function getDefault() {
        return 2;
    }

    protected function getMin() {
        return -100;
    }

    protected function getMax() {
        return 1000;
    }

    protected function filterValue($value) {
        return intval($value);
    }

    protected function getVariableName() {
        return 'phaseMultiplier';
    }

    protected function getDisplayName() {
        return 'Phase multiplier';
    }

    function getPhaseMultiplier() {
        return $this->getValue();
    }
}



 