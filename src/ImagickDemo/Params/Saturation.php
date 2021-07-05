<?php

namespace ImagickDemo\Params;



use Params\ExtractRule\GetFloatOrDefault;
use Params\InputParameter;
use Params\Param;
use Params\ProcessRule\RangeFloatValue;

class Saturation implements Param
{
    public function __construct(
        private string $name
    ) {
    }

    public function getInputParameter(): InputParameter
    {
        return new InputParameter(
            $this->name,
            new GetFloatOrDefault(0),
            new RangeFloatValue(-200, 200)
        );
    }

//class Saturation extends ValueElement
//{
//    protected function filterValue($value)
//    {
//        return floatval($value);
//    }
//
//    protected function getDefault()
//    {
//        return 0;
//    }
//
//    protected function getMin()
//    {
//        return -200;
//    }
//
//    protected function getMax()
//    {
//        return 200;
//    }
//
//    protected function getVariableName()
//    {
//        return 'saturation';
//    }
//
//    protected function getDisplayName()
//    {
//        return 'Saturation';
//    }
//
//    public function getSaturation()
//    {
//        return $this->getValue();
//    }
}
