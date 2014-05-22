<?php


namespace ImagickDemo;

use ImagickDemo\Navigation\Nav;

class NavigationBar {

    
    private $activeCategory;
    
    private $navOptions = [
        "/" => "Home",
        "/Imagick" => "Imagick",
        "/ImagickDraw" => "ImagickDraw",
        "/ImagickPixel" => "ImagickPixel",
        "/ImagickPixelIterator" => "Imagick Pixel Interator",
        "/Example" => "Example",
    ];
    
    function __construct($activeCategory = null) {
        $this->activeCategory = $activeCategory;
    }
    
    function render() {
        $output = "";

        foreach ($this->navOptions as $url => $name) {
            $activeClass = '';
            if (strcmp($url, '/'.$this->activeCategory) === 0) {
                $activeClass = 'active';
            }
            $output .= "<li class='$activeClass'>";
            $output .= "<a href='$url'>$name</a>";
            $output .= "</li>";
        }

        return $output;
    }
}

 