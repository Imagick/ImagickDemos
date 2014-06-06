<?php


namespace ImagickDemo\ControlElement;




class ReduceNoise extends ValueElement {

    protected function getDefault() {
        return 5;
    }

    protected function getMin() {
        return 0;
    }

    protected function getMax() {
        return 100;
    }

    protected function getVariableName() {
        return 'reduceNoise';
    }

    protected function getDisplayName() {
        return 'Reduce noise';
    }

    function getReduceNoise() {
        return $this->getValue();
    }
}



 