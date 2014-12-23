<?php


namespace ImagickDemo\ControlElement;


class BackgroundColorChoice extends OptionKeyElement {
    protected function getDefault() {
        return "white";
    }

    protected function getVariableName() {
        return 'backgroundColor';
    }

    protected function getDisplayName() {
        return "Background color";
    }

    function getOptions() {
        return [
            "white" => "White",
            "black" => "Black",
            "none" => "Transparent",
        ];
    }

    function getBackgroundColorChoiceType() {
        return $this->getKey();
    }
}

 