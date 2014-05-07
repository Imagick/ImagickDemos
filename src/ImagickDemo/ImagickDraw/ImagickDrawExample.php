<?php


namespace ImagickDemo\ImagickDraw;

class ImagickDrawExample extends \ImagickDemo\Example {

    protected $backgroundColor;
    protected $fillColor;
    protected $strokeColor;

    /**
     * @var \ImagickDemo\Control\ColorControl
     */
    private $colorControl;

    function __construct(\ImagickDemo\Control\ColorControl $colorControl) {
        $this->backgroundColor = $colorControl->getBackgroundColor();
        $this->fillColor =  $colorControl->getFillColor();
        $this->strokeColor = $colorControl->getStrokeColor();
        $this->colorControl = $colorControl;
    }

    function renderImageURL() {
        return $this->colorControl->getURL();
    }

    /**
     * @return \ImagickDemo\Control
     */
    function getControl() {
        return $this->colorControl;
    }
}

 