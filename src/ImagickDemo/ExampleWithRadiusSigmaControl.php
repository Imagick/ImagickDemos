<?php


namespace ImagickDemo;


class ExampleWithRadiusSigmaControlControl extends \ImagickDemo\Example {

    /**
     * @var Control\RadiusSigmaControl
     */
    private $radiusSigmaControl;

    function __construct(\ImagickDemo\Control\RadiusSigmaControl $radiusSigmaControl) {
        $this->radiusSigmaControl = $radiusSigmaControl;
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

 