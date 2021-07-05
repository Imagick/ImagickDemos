<?php

namespace ImagickDemo\Params;

use Params\ExtractRule\GetFloatOrDefault;
use Params\InputParameter;
use Params\Param;
use Params\ProcessRule\MaxIntValue;
use Params\ProcessRule\MinIntValue;

class BlackPoint implements Param
{
    public function __construct(
        private string $name
    ) {
    }

    public function getInputParameter(): InputParameter
    {
        return new InputParameter(
            $this->name,
            new GetFloatOrDefault(10),
            new MinIntValue(0),
            new MaxIntValue(255),
        );
    }

//class BlackPoint extends ValueElement
//{
//    private $defaultBlackPoint;
//
//    public function __construct(VariableMap $variableMap, $defaultBlackPoint = 10)
//    {
//        $this->defaultBlackPoint = $defaultBlackPoint;
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
//        return $this->defaultBlackPoint;
//    }
//
//    protected function getMin()
//    {
//        return 0;
//    }
//
//    protected function getMax()
//    {
//        return 255;
//    }
//
//    protected function getVariableName()
//    {
//        return 'blackPoint';
//    }
//
//    protected function getDisplayName()
//    {
//        return 'Black point';
//    }
//
//    public function getBlackPoint()
//    {
//        return $this->getValue();
//    }
}
