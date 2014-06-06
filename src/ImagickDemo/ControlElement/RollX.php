<?php


namespace ImagickDemo\ControlElement;




class RollX extends ValueElement {

    protected function getDefault() {
        return 100;
    }

    protected function getMin() {
        return 0;
    }

    protected function getMax() {
        return 800;
    }

    protected function getVariableName() {
        return 'rollX';
    }

    protected function getDisplayName() {
        return 'Roll X';
    }

    function getRollX() {
        return $this->getValue();
    }
}



 