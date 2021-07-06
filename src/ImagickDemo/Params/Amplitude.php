<?php

namespace ImagickDemo\Params;

use Params\ExtractRule\GetFloatOrDefault;
use Params\InputParameter;
use Params\Param;
use Params\ProcessRule\MaxIntValue;
use Params\ProcessRule\MinIntValue;

#[\Attribute]
class Amplitude implements Param
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
            new MinIntValue(0),
            new MaxIntValue(20),
        );
    }

//class  extends ValueElement
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
//        return 20;
//    }
//
//    protected function getVariableName()
//    {
//        return 'amplitude';
//    }
//
//    protected function getDisplayName()
//    {
//        return 'Amplitude';
//    }
//
//    public function getAmplitude()
//    {
//        return $this->getValue();
//    }
}
