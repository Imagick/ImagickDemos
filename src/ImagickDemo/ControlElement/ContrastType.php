<?php


namespace ImagickDemo\ControlElement;




class ContrastType extends OptionKeyElement {
    protected function getDefault() {
        return 1;
    }

    protected function getVariableName() {
        return 'bestFit';
    }

    protected function getDisplayName() {
        return 'Best fit';
    }

    protected function getOptions() {
        return [
            0 => 'Enabled - unsharpen',
            1 => 'Enabled - sharpen',
            2 => 'Disabled'
        ];
    }

    function getContrastType() {
        return $this->key;
    }
}