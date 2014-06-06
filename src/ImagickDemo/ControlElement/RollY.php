<?php


namespace ImagickDemo\ControlElement;




class RollY extends ValueElement {

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
        return 'rollY';
    }

    protected function getDisplayName() {
        return 'Roll Y';
    }

    function getRollY() {
        return $this->getValue();
    }
}



 