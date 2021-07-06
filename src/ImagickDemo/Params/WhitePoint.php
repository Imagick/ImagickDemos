<?php

namespace ImagickDemo\Params;

use Room11\HTTP\VariableMap;

use Params\ExtractRule\GetFloatOrDefault;
use Params\InputParameter;
use Params\Param;
use Params\ProcessRule\RangeFloatValue;

#[\Attribute]
class WhitePoint implements Param
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
            new RangeFloatValue(0, 255)
        );
    }

//class WhitePoint extends ValueElement
//{
//    private $defaultWhitePoint;
//
//    public function __construct(VariableMap $variableMap, $defaultWhitePoint = 10)
//    {
//        $this->defaultWhitePoint = $defaultWhitePoint;
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
//        return $this->defaultWhitePoint;
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
//        return 'whitePoint';
//    }
//
//    protected function getDisplayName()
//    {
//        return 'WhitePoint';
//    }
//
//    public function getWhitePoint()
//    {
//        return $this->getValue();
//    }
}
