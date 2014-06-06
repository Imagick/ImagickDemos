<?php


namespace ImagickDemo\ControlElement;




class Sigma20 extends ValueElement {

    protected function getDefault() {
        return 20;
    }

    protected function getMin() {
        return 0;
    }

    protected function getMax() {
        return 200;
    }

    protected function getVariableName() {
        return 'sigma';
    }

    protected function getDisplayName() {
        return 'Sigma';
    }

    function getSigma() {
        return $this->getValue();
    }
}
