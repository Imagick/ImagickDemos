<?php

namespace ImagickDemo\Params;

use Params\ExtractRule\GetFloatOrDefault;
use Params\InputParameter;
use Params\Param;
use Params\ProcessRule\MaxIntValue;
use Params\ProcessRule\MinIntValue;

class Contrast implements Param
{
    public function __construct(
        private string $name
    ) {
    }

    public function getInputParameter(): InputParameter
    {
        return new InputParameter(
            $this->name,
            new GetFloatOrDefault(-20),
            new MinIntValue(-100),
            new MaxIntValue(100),
        );
    }

//class Contrast extends ValueElement
//{
//    private $default;
//
//    public function __construct(VariableMap $variableMap, $defaultContrast = -20)
//    {
//        $this->default = $defaultContrast;
//        parent::__construct($variableMap);
//    }
//
//    protected function filterValue($value)
//    {
//        return floatval($value);
//    }
//
//    protected function getDefault()
//    {
//        return $this->default;
//    }
//
//    protected function getMin()
//    {
//        return -100;
//    }
//
//    protected function getMax()
//    {
//        return 100;
//    }
//
//    protected function getVariableName()
//    {
//        return 'contrast';
//    }
//
//    protected function getDisplayName()
//    {
//        return 'Contrast';
//    }
//
//    public function getContrast()
//    {
//        return $this->getValue();
//    }
}
