<?php


namespace ImagickDemo\ImagickDraw;

abstract class ImagickDrawExample extends \ImagickDemo\Example {

    protected $backgroundColor;
    protected $fillColor;
    protected $strokeColor;

//    /**
//     * @var \ImagickDemo\Control
//     */
//    protected $colorControl;

    abstract function getDescription();

    function render() {
        $output = $this->getDescription();
        $output .= $this->renderImageURL();

        return $output;
    }
}

 