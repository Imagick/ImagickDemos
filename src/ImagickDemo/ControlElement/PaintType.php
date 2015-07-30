<?php

namespace ImagickDemo\ControlElement;

class PaintType extends OptionKeyElement
{
    protected function getDefault()
    {
        return \Imagick::PAINT_FILLTOBORDER;
    }

    protected function getVariableName()
    {
        return 'paintType';
    }

    protected function getDisplayName()
    {
        return "Paint type";
    }

    protected function getOptions()
    {
        return [
            \Imagick::PAINT_POINT => "Point",
            \Imagick::PAINT_REPLACE => "Replace",
            \Imagick::PAINT_FLOODFILL => "Floodfill",
            \Imagick::PAINT_FILLTOBORDER => "Fill to border",
            \Imagick::PAINT_RESET => "Reset"
        ];
    }

    public function getPaintType()
    {
        return $this->getKey();
    }
}
