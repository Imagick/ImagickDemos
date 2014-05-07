<?php


namespace ImagickDemo;


class ExampleWithoutControl extends \ImagickDemo\Example {

    private $control;
    
    function __construct(\ImagickDemo\Control\NullControl $control) {
        $this->control = $control;
    }
    
    function renderImageURL() {
        return $this->getControl()->getURL();
    }

    /**
     * @return \ImagickDemo\Control
     */
    function getControl() {
        return $this->control;
    }


}

 