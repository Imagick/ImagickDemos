<?php

namespace ImagickDemo\Params;

use Room11\HTTP\VariableMap;

ImagickRgbColor

class TargetColor extends ColorElement
{
    private $defaultTargetColor;

    public function __construct(VariableMap $variableMap, $defaultTargetColor = 'rgb(127, 0, 127)')
    {
        $this->defaultTargetColor = $defaultTargetColor;
        parent::__construct($variableMap);
    }

    protected function getDefault()
    {
        return $this->defaultTargetColor;
    }

    protected function getVariableName()
    {
        return 'targetColor';
    }

    protected function getDisplayName()
    {
        return 'Target color';
    }

    public function getTargetColor()
    {
        return $this->getValue();
    }
}
