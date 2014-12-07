<?php


namespace ImagickDemo\ControlElement;



class Quality extends ValueElement {

    protected function getDefault() {
        return 15;
    }

    protected function getMin() {
        return 0;
    }

    protected function getMax() {
        return 100;
    }

    protected function getVariableName() {
        return 'quality';
    }

    protected function getDisplayName() {
        return 'Quality';
    }

    function getQuality() {
        return $this->getValue();
    }
}

