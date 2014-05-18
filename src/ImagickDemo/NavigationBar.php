<?php


namespace ImagickDemo;

use ImagickDemo\Navigation\ActiveNav;

class NavigationBar {

    /**
     * @var Navigation\ActiveNav
     */
    private $activeNav;
    
    private $navOptions = [
        "/" => "Home",
        "/Imagick" => "Imagick",
        "/ImagickDraw" => "ImagickDraw",
        "/ImagickPixel" => "ImagickPixel",
        "/ImagickPixelIterator" => "Imagick Pixel Interator",
        "/Example" => "Example",
    ];
    
    function __construct(ActiveNav $activeNav) {
        $this->activeNav = $activeNav;
    }
    
    function render() {
        $output = "";

        foreach ($this->navOptions as $url => $name) {
            $activeClass = '';
            if (strcmp($url, '/'.$this->activeNav->getCategory()) === 0) {
                $activeClass = 'active';
            }
            $output .= "<li class='$activeClass'>";
            $output .= "<a href='$url'>$name</a>";
            $output .= "</li>";
        }

        return $output;
    }
}

 