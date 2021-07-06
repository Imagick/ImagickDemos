<?php

namespace ImagickDemo\Params;

use Params\ExtractRule\GetFloatOrDefault;
use Params\InputParameter;
use Params\Param;
use Params\ProcessRule\RangeFloatValue;

#[\Attribute]
class ShearX implements Param
{
    public function __construct(
        private string $name
    ) {
    }

    public function getInputParameter(): InputParameter
    {
        return new InputParameter(
            $this->name,
            new GetFloatOrDefault(15),
            new RangeFloatValue(0, 255)
        );
    }

//class ShearX extends ValueElement
//{
//    protected function filterValue($value)
//    {
//        return floatval($value);
//    }
//
//    protected function getDefault()
//    {
//        return 15;
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
//        return 'shearX';
//    }
//
//    protected function getDisplayName()
//    {
//        return 'Shear X';
//    }
//
//    public function getShearX()
//    {
//        return $this->getValue();
//    }
}
