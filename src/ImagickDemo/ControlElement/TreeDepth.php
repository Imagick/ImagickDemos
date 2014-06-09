<?php


namespace ImagickDemo\ControlElement;




class TreeDepth extends ValueElement {

    protected function getDefault() {
        return 0;
    }

    protected function getMin() {
        return 0;
    }

    protected function getMax() {
        return 255;
    }

    protected function filterValue($value) {
        return intval($value);
    }

    protected function getVariableName() {
        return 'treeDepth';
    }

    protected function getDisplayName() {
        return 'Tree depth';
    }

    function getTreeDepth() {
        return $this->getValue();
    }
}



 