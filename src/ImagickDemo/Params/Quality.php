<?php

namespace ImagickDemo\Params;

use Params\ExtractRule\GetIntOrDefault;
use Params\InputParameter;
use Params\Param;
use Params\ProcessRule\RangeIntValue;

#[\Attribute]
class Quality implements Param
{
    public function __construct(
        private string $name
    ) {
    }

    public function getInputParameter(): InputParameter
    {
        return new InputParameter(
            $this->name,
            new GetIntOrDefault(15),
            new RangeIntValue(0, 100)
        );
    }

//class Quality extends ValueElement
//{
//    protected function filterValue($value)
//    {
//        return intval($value);
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
//        return 100;
//    }
//
//    protected function getVariableName()
//    {
//        return 'quality';
//    }
//
//    protected function getDisplayName()
//    {
//        return 'Quality';
//    }
//
//    public function getQuality()
//    {
//        return $this->getValue();
//    }
}
