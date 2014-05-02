<?php


namespace ImagickDemo\Control;


class ImageControl implements \ImagickDemo\Control {

    private $images = [
        "../Skyline_400.jpg" => 'Skyline',
        "../images/Biter_500.jpg" => 'Lorikeet',
        
    ];
    
    function render() {
     
        $output = "";

        $output .= "<select name='image'>";

        foreach ($this->images as $key => $image) {
            $output .= "<option value='$image'>$image</option>";
        }

        $output .= "</select>";

        return $output;
    }
}

 