<?php


namespace ImagickDemo;


class NullExample extends \ImagickDemo\Example {

    /**
     * @var \ImagickDemo\Control Control
     */
    protected $control;

    function __construct(\ImagickDemo\Control\NullControl $control) {
        $this->control = $control;
    }

    function renderImageURL() {
        return "";
    }
    
    function renderImage() {
    }

    /**
     * @return \ImagickDemo\Control
     */
    function getControl() {
        return $this->control;
    }
}

 