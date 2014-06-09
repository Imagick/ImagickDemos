<?php


namespace ImagickDemo\ControlElement;




class Dither extends OptionKeyElement {
    protected function getDefault() {
        return 1;
    }

    protected function getVariableName() {
        return 'dither';
    }

    protected function getDisplayName() {
        return 'Dither';
    }

    protected function getOptions() {
        return [
            1 => 'Enabled',
            0 => 'Disabled',
        ];
    }

    function getDither() {
        return $this->key;
    }
}