<?php


namespace ImagickDemo\Control;


class ImageControl extends OptionValueControl {

    function getName() {
        return 'image';
    }
    
    function getDefaultOption() {
        return 'Lorikeet';
    }
    
    function getOptions() {
        $images = [
            "../images/Skyline_400.jpg" => 'Skyline',
            "../images/Biter_500.jpg" => 'Lorikeet',
        ];

        return $images;
    }

    function getImagePath() {
        return $this->getOptionValue();
    }
}

 