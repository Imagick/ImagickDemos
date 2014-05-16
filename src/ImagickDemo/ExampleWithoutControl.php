<?php


namespace ImagickDemo;


abstract class ExampleWithoutControl extends \ImagickDemo\Example {

    /**
     * @var Control\NullControl
     */
    private $control;
    
    function __construct(\ImagickDemo\Control\NullControl $control) {
        $this->control = $control;
    }

    function renderImageURL() {
        return $this->control->getURL();
    }

    /**
     * @return \ImagickDemo\Control
     */
    function getControl() {
        return $this->control;
    }
}

 