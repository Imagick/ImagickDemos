<?php


namespace ImagickDemo\ControlElement;


class KernelFirstTerm extends ValueElement {

    protected function getDefault() {
        return '2';
    }

    protected function getMin() {
        return 1;
    }

    protected function getMax() {
        return 5;
    }

    protected function getVariableName() {
        return 'kernelFirstTerm';
    }

    protected function getDisplayName() {
        return 'First term';
    }

    function getKernelFirstTerm() {
        return $this->getValue();
    }
}