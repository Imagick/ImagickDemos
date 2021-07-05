<?php

namespace ImagickDemo\Params;

use Params\ExtractRule\GetFloatOrDefault;
use Params\InputParameter;
use Params\Param;
use Params\ProcessRule\MaxIntValue;
use Params\ProcessRule\MinIntValue;


This is a UnitRange
class BlackThreshold implements Param
{
    public function __construct(
        private string $name
    ) {
    }

    public function getInputParameter(): InputParameter
    {
        return new InputParameter(
            $this->name,
            new GetFloatOrDefault(0.2),
            new MinIntValue(0),
            new MaxIntValue(1),
        );
    }

//
//class BlackThreshold extends ValueElement
//{
//    private $default;
//
//    public function __construct(VariableMap $variableMap, $defaultBlackThreshold = 0.2)
//    {
//        $this->default = $defaultBlackThreshold;
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
//        return 0;
//    }
//
//    protected function getMax()
//    {
//        return 1;
//    }
//
//    protected function getVariableName()
//    {
//        return 'blackThreshold';
//    }
//
//    protected function getDisplayName()
//    {
//        return 'Black threshold';
//    }
//
//    public function getBlackThreshold()
//    {
//        return $this->getValue();
//    }
}
