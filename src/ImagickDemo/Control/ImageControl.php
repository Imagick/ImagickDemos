<?php


namespace ImagickDemo\Control;

use Intahwebz\Request;

class ImageControl implements \ImagickDemo\Control {


    private $images = [
        "../images/Skyline_400.jpg" => 'Skyline',
        "../images/Biter_500.jpg" => 'Lorikeet',
        
    ];

    private $image = "../images/Skyline_400.jpg";
    private $option = 'Skyline';

    function __construct(Request $request) {
        $this->option = $request->getVariable('image');

        foreach ($this->images as $key => $value) {
            if (strcmp($this->option, $value) === 0) {
                $this->image = $key;
            }
        }
    }
    
    function getParams() {
        return ['image' => $this->option];
    }

    function getParamString() {
        return "image=".$this->option;
    }
    
    function getImagePath() {
        return $this->image;
    }
    
    function render() {
        $output = "";
        $output .= "<form method='GET' accept-charset='utf-8'>";
        $output .= "<select name='image'>";
        foreach ($this->images as $key => $image) {
            $output .= "<option value='$image'>$image</option>";
        }

        $output .= "</select>";
        $output .= "<button type='submit' class='btn btn-default'>Update</button>";
        $output .= "</form>";

        return $output;
    }
}

 