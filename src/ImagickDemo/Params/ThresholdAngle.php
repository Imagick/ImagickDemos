<?php

namespace ImagickDemo\Params;


use Params\ExtractRule\GetFloatOrDefault;
use Params\InputParameter;
use Params\Param;
use Params\ProcessRule\RangeFloatValue;

// ugh - think this needs to default to empty string or null

#[\Attribute]
class ThresholdAngle implements Param
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
            new RangeFloatValue(0, 90)
        );
    }

//class ThresholdAngle extends ValueElement
//{
//    protected function filterValue($value)
//    {
//        return floatval($value);
//    }
//
//    protected function getDefault()
//    {
//        return 10;
//    }
//
//    protected function getMin()
//    {
//        return 0;
//    }
//
//    protected function getMax()
//    {
//        return 90;
//    }
//
//    protected function getVariableName()
//    {
//        return 'thresholdAngle';
//    }
//
//    protected function getDisplayName()
//    {
//        return 'Threshold angle';
//    }
//
//    public function getThresholdAngle()
//    {
//        return $this->getValue();
//    }
}
