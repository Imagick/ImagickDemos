<?php


namespace ImagickDemo\ControlElement;


class MontageType extends OptionKeyElement {

    protected function getDefault() {
        return \Imagick::MONTAGEMODE_FRAME;
    }

    protected function getVariableName() {
        return 'montageType';
    }

    protected function getDisplayName() {
        return "Montage type";
    }

    function getOptions() {
        return [
            \Imagick::MONTAGEMODE_FRAME => "Frame",
            \Imagick::MONTAGEMODE_UNFRAME  => "Unframe",
            \Imagick::MONTAGEMODE_CONCATENATE => "Concatenate"
        ];
    }

    function getMontageType() {
        return $this->getKey();
    }
}

 