<?php

namespace ImagickDemo\ControlElement;

class BackgroundColorChoice extends OptionKeyElement
{
    protected function getDefault()
    {
        return "white";
    }

    protected function getVariableName()
    {
        return 'backgroundColor';
    }

    protected function getDisplayName()
    {
        return "Background color";
    }

    public function getOptions()
    {
        return [
            "white" => "White",
            "black" => "Black",
            //"none" => "Transparent", //This needs webp to be nice.
        ];
    }

    public function getBackgroundColorChoiceType()
    {
        return $this->getKey();
    }
}
