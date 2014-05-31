<?php


namespace ImagickDemo\ControlElement;




class Sharpening extends OptionKeyElement {
    protected function getDefault() {
        return 1;
    }

    protected function getVariableName() {
        return 'sigmoidalMode';
    }

    protected function getDisplayName() {
        return 'Contrast';
    }

    protected function getOptions() {
        return [
            0 => 'Decrease',
            1 => 'Increase',
        ];
    }

    function getSharpening() {
        return $this->key;
    }
}