<?php


namespace ImagickDemo\ControlElement;




class ImageOption extends OptionKeyElement {
    protected function getDefault() {
        return 0;
    }

    protected function getVariableName() {
        return 'imageOption';
    }

    protected function getDisplayName() {
        return 'Option';
    }

    protected function getOptions() {
        return [
            0 => "'jpeg:extent', '10kb'",
            1 => "'jpeg:extent', '60kb'",
            2 => "'png:format', 'png00'",
            3 => "'png:format', 'png64'",
            4 => "16bit rgba PNG",
        //  5 => "Black point compensation"
        ];
    }

    function getImageOption() {
        return $this->key;
    }
}