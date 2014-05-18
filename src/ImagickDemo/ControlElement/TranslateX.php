<?php


namespace ImagickDemo\ControlElement;


class TranslateX extends ValueElement {

    protected function getDefault() {
        return 75;
    }

    protected function getMin() {
        return 0;
    }

    protected function getMax() {
        return 500;
    }

    protected function getVariableName() {
        return 'translateX';
    }

    protected function getDisplayName() {
        return 'Translate X';
    }

    function getTranslateX() {
        return $this->getValue();
    }
}