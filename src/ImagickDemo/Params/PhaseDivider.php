<?php

namespace ImagickDemo\Params;

use Params\ExtractRule\GetIntOrDefault;
use Params\InputParameter;
use Params\Param;
use Params\ProcessRule\RangeIntValue;

#[\Attribute]
class PhaseDivider implements Param
{
    public function __construct(
        private string $name
    ) {
    }

    public function getInputParameter(): InputParameter
    {
        return new InputParameter(
            $this->name,
            new GetIntOrDefault(8),
            new RangeIntValue(-30, 30)
        );
    }

//class PhaseDivider extends ValueElement
//{
//    protected function getDefault()
//    {
//        return 8;
//    }
//
//    protected function getMin()
//    {
//        return -30;
//    }
//
//    protected function getMax()
//    {
//        return 30;
//    }
//
//    protected function filterValue($value)
//    {
//        return intval($value);
//    }
//
//    protected function getVariableName()
//    {
//        return 'phaseDivider';
//    }
//
//    protected function getDisplayName()
//    {
//        return 'Phase divider';
//    }
//
//    public function getPhaseDivider()
//    {
//        return $this->getValue();
//    }
}
