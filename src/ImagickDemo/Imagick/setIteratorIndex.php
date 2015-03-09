<?php

namespace ImagickDemo\Imagick;



use ImagickDemo\Framework\VariableMap;

class setIteratorIndex extends \ImagickDemo\Example {

    private $firstLayer = 0;

    function __construct(\ImagickDemo\Control $control, VariableMap $variableMap) {
        $this->control = $control;
        $this->firstLayer = $variableMap->getVariable('firstLayer', 0);
    }

    function getCustomImageParams() {
        return ['firstLayer' => $this->firstLayer];
    }

    function render() {
        $output = '';
        $output .= "Selecting layers from <a href='/images/LayerTest.psd'>source PSD</a>:<br/>";
        
        $output .= $this->renderCustomImageURL(['firstLayer' => 1]);
        $output .= $this->renderCustomImageURL(['firstLayer' => 2]);
        $output .= $this->renderCustomImageURL(['firstLayer' => 3]);

        return $output;
    }
    
    function renderCustomImage() {
        setIteratorIndex($this->firstLayer);
    }
}