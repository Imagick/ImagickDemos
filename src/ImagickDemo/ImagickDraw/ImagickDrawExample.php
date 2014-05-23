<?php


namespace ImagickDemo\ImagickDraw;

abstract class ImagickDrawExample extends \ImagickDemo\Example {

    protected $backgroundColor;
    protected $fillColor;
    protected $strokeColor;

    /**
     * @var \ImagickDemo\Control\ControlCompositeBackgroundColorStrokeColorFillColor
     */
    private $colorControl;

    abstract function getDescription();
    
    /**
     * @return \ImagickDemo\Control
     */
    function getControl() {
        return $this->colorControl;
    }

    function render() {
        $output = $this->getDescription();
        $output .= $this->renderImageURL();

        return $output;
    }
}

 