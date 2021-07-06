<?php

namespace ImagickDemo\Params;

use Params\ExtractRule\GetIntOrDefault;
use Params\InputParameter;
use Params\Param;
use Params\ProcessRule\RangeIntValue;

#[\Attribute]
class PhaseMultiplier implements Param
{
    public function __construct(
        private string $name
    ) {
    }

    public function getInputParameter(): InputParameter
    {
        return new InputParameter(
            $this->name,
            new GetIntOrDefault(16),
            new RangeIntValue(-100, 1000)
        );
    }

//class PhaseMultiplier extends ValueElement
//{
//    protected function getDefault()
//    {
//        return 16;
//    }
//
//    protected function getMin()
//    {
//        return -100;
//    }
//
//    protected function getMax()
//    {
//        return 1000;
//    }
//
//    protected function filterValue($value)
//    {
//        return intval($value);
//    }
//
//    protected function getVariableName()
//    {
//        return 'phaseMultiplier';
//    }
//
//    protected function getDisplayName()
//    {
//        return 'Phase multiplier';
//    }
//
//    public function getPhaseMultiplier()
//    {
//        return $this->getValue();
//    }
}
