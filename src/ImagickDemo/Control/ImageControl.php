<?php


namespace ImagickDemo\Control;


class ImageControl extends OptionControl {

    function getName() {
        return 'image';
    }
    
    function getDefaultOption() {
        return 'Skyline';
    }
    
    function getOptions() {
        $images = [
            "../images/Skyline_400.jpg" => 'Skyline',
            "../images/Biter_500.jpg" => 'Lorikeet',
        ];
        
        return $images;
    }

    function getImagePath() {
        return $this->image;
    }
    
}

 