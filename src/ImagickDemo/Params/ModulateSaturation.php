<?php

namespace ImagickDemo\Params;

use Params\ExtractRule\GetFloatOrDefault;
use Params\InputParameter;
use Params\Param;
use Params\ProcessRule\RangeIntValue;

#[\Attribute]
class ModulateSaturation implements Param
{
    public function __construct(
        private string $name
    ) {
    }

    public function getInputParameter(): InputParameter
    {
        return new InputParameter(
            $this->name,
            new GetFloatOrDefault(100),
            new RangeIntValue(0, 200)
        );
    }

//class ModulateSaturation extends ValueElement
//{
//    protected function filterValue($value)
//    {
//        return floatval($value);
//    }
//
//    protected function getDefault()
//    {
//        return 100;
//    }
//
//    protected function getMin()
//    {
//        return 0;
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
