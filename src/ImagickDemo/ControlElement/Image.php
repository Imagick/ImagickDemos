<?php


namespace ImagickDemo\ControlElement;

use ImagickDemo\Control\OptionValueControl;
use Intahwebz\Request;

//TODO - rename this to imagePath

class Image extends \ImagickDemo\ControlElement\OptionValueElement {
    protected function getDefault() {
        return 'Lorikeet';
    }

    protected function getVariableName() {
        return 'image';
    }

    protected function getDisplayName() {
        return "Image";
    }

    function getOptions() {
        $images = [
            "../images/Skyline_400.jpg" => 'Skyline',
            "../images/Biter_500.jpg" => 'Lorikeet',
        ];
        
        return $images;
    }

    function getImagePath() {
        return $this->getOptionKey();
    }
}

 