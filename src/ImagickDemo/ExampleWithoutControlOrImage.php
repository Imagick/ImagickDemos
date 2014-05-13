<?php


namespace ImagickDemo;


class ExampleWithoutControlOrImage extends \ImagickDemo\Example {

    /**
     * @var Control\NullControl
     */
    private $control;
    
    function __construct(\ImagickDemo\Control\NullNoImageControl $control) {
        $this->control = $control;
    }
    
    function renderImageURL() {
        return "";
    }

    /**
     * @return \ImagickDemo\Control
     */
    function getControl() {
        return $this->control;
    }
}

 