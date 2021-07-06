<?php

namespace ImagickDemo\Params;

use Params\ExtractRule\GetFloatOrDefault;
use Params\InputParameter;
use Params\Param;
use Params\ProcessRule\RangeFloatValue;

#[\Attribute]
class ShearY implements Param
{
    public function __construct(
        private string $name
    ) {
    }

    public function getInputParameter(): InputParameter
    {
        return new InputParameter(
            $this->name,
            new GetFloatOrDefault(5),
            new RangeFloatValue(0, 255)
        );
    }

//class ShearY extends ValueElement
//{
//    protected function filterValue($value)
//    {
//        return floatval($value);
//    }
//
//    protected function getDefault()
//    {
//        return 5;
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
//        return 'shearY';
//    }
//
//    protected function getDisplayName()
//    {
//        return 'Shear Y';
//    }
//
//    public function getShearY()
//    {
//        return $this->getValue();
//    }
}
