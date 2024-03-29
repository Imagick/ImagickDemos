<?php

namespace ImagickDemo\Imagick;

use Room11\HTTP\VariableMap;

class setIteratorIndex extends \ImagickDemo\Example
{
    private $firstLayer = 0;

    public function __construct(\ImagickDemo\Control $control, VariableMap $variableMap)
    {
        $this->control = $control;
        $this->firstLayer = $variableMap->getVariable('firstLayer', 0);
    }

    public function renderTitle(): string
    {
        return "Imagick::setIteratorIndex";
    }

    public function getCustomImageParams()
    {
        return ['firstLayer' => $this->firstLayer];
    }

    public function render(
        ?string $activeCategory,
        ?string $activeExample
    )
    {
        $output = '';
        $output .= "Selecting layers from <a href='/images/LayerTest.psd'>source PSD</a>:<br/>";

        $output .= $this->renderCustomImageURL(['firstLayer' => 1]);
        $output .= $this->renderCustomImageURL(['firstLayer' => 2]);
        $output .= $this->renderCustomImageURL(['firstLayer' => 3]);

        return $output;
    }

    public function renderCustomImage()
    {
        setIteratorIndex($this->firstLayer);
    }
}
