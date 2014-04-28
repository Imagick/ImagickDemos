<?php


namespace ImagickDemo;


class Example {

    protected $colors;
    
    function __construct(\ImagickDemo\Colors $colors) {
        $this->colors = $colors;
    }

    function renderImageURL() {
        echo "An image url would go here.";
    }
    
    function renderImage() {
        //TODO - show not implemented image.
        echo "Image goes here?";
    }
    
    function renderDescription() {
        //return "Choose something mofo.";
        return "";
    }
    
}

 