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

    function __construct(Request $request, $imageBaseURL) {
        $this->option = $request->getVariable('image', $this->option);

        foreach ($this->images as $key => $value) {
            if (strcmp($this->option, $value) === 0) {
                $this->image = $key;
            }
        }
        $this->imageBaseURL = $imageBaseURL;
    }

    function getURL() {
        return sprintf("<img src='%s?%s' />", $this->imageBaseURL, $this->getParamString() );
    }
    
    function getParams() {
        return ['image' => $this->image];
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
            
            $selected = '';
            if (strcmp($image, $this->option) === 0) {
                $selected = "selected='selected'";
            }
            $output .= "<option value='$image' $selected>$image</option>";
        }
        
//        echo "asdsd ".$this->option;
//        var_dump($output);
//        exit(0);

        $output .= "</select>";
        $output .= "<button type='submit' class='btn btn-default'>Update</button>";
        $output .= "</form>";

        return $output;
    }
}

 