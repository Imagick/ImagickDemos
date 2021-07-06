<?php

namespace ImagickDemo\Params;

use Params\ExtractRule\GetFloatOrDefault;
use Params\InputParameter;
use Params\Param;
use Params\ProcessRule\RangeFloatValue;
use Params\ProcessRule\MaxFloatValue;

#[\Attribute]
class Gamma implements Param
{
    public function __construct(
        private string $name
    ) {
    }

    public function getInputParameter(): InputParameter
    {
        return new InputParameter(
            $this->name,
            new GetFloatOrDefault(2.2),
            new RangeFloatValue(0.01, 10),
        );
    }

//class Gamma extends ValueElement
//{
//    protected function filterValue($value)
//    {
//        return floatval($value);
//    }
//
//    protected function getDefault()
//    {
//        return 2.2;
//    }
//
//    protected function getMin()
//    {
//        return 0.01;
//    }
//
//    protected function getMax()
//    {
//        return 10;
//    }
//
//    protected function getVariableName()
//    {
//        return 'gamma';
//    }
//
//    protected function getDisplayName()
//    {
//        return 'Gamma';
//    }
//
//    public function getGamma()
//    {
//        return $this->getValue();
//    }
}
