<?php


namespace ImagickDemo\ControlElement;



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
            "../images/SydneyPeople_400.jpg" => 'People',
        ];
        
        return $images;
    }

    function getImagePath() {
        return $this->getOptionKey();
    }
}

 