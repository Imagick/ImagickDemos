<?php

namespace ImagickDemo\ControlElement;

use Room11\HTTP\VariableMap;

//TODO - rename this to imagePath

class Image extends \ImagickDemo\ControlElement\OptionValueElement
{
    protected function getDefault()
    {
        return 'Lorikeet';
    }

    protected function getVariableName()
    {
        return 'imagePath';
    }

    protected function getDisplayName()
    {
        return "Image";
    }

    protected function getOptions()
    {
        $images = [
            "../imagick/images/Skyline_400.jpg" => 'Skyline',
            "../imagick/images/Biter_500.jpg" => 'Lorikeet',
            "../imagick/images/SydneyPeople_400.jpg" => 'People',
            "../imagick/images/LowContrast.jpg" => 'Low contrast',
        ];

        return $images;
    }

    public function getImagePath()
    {
        return $this->getOptionKey();
    }
}
