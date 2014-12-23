<?php


namespace ImagickDemo\ControlElement;




class PhaseDivider extends ValueElement {

    protected function getDefault() {
        return 1;
    }

    protected function getMin() {
        return -30;
    }

    protected function getMax() {
        return 30;
    }

    protected function filterValue($value) {
        return intval($value);
    }

    protected function getVariableName() {
        return 'phaseDivider';
    }

    protected function getDisplayName() {
        return 'Phase divider';
    }

    function getPhaseDivider() {
        return $this->getValue();
    }
}



 