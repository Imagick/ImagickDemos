<?php


namespace ImagickDemo\ImagickDraw;

class ImagickDrawExample extends \ImagickDemo\Example {

    protected $backgroundColor;
    protected $fillColor;
    protected $strokeColor;

    function __construct(\ImagickDemo\Control\ColorControl $colorControl) {
        $this->backgroundColor = $colorControl->getBackgroundColor();
        $this->fillColor =  $colorControl->getFillColor();
        $this->strokeColor = $colorControl->getStrokeColor();
    }
}

 