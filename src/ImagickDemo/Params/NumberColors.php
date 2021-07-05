<?php

namespace ImagickDemo\Params;

use Params\ExtractRule\GetIntOrDefault;
use Params\InputParameter;
use Params\Param;
use Params\ProcessRule\RangeIntValue;

class NumberColors implements Param
{
    public function __construct(
        private string $name
    ) {
    }

    public function getInputParameter(): InputParameter
    {
        return new InputParameter(
            $this->name,
            new GetIntOrDefault(64),
            new RangeIntValue(0, 256)
        );
    }

//class NumberColors extends ValueElement
//{
//    protected function getDefault()
//    {
//        return 64;
//    }
//
//    protected function getMin()
//    {
//        return 0;
//    }
//
//    protected function getMax()
//    {
//        return 256;
//    }
//
//    protected function filterValue($value)
//    {
//        return intval($value);
//    }
//
//    protected function getVariableName()
//    {
//        return 'numberColors';
//    }
//
//    protected function getDisplayName()
//    {
//        return 'Number colors';
//    }
//
//    public function getNumberColors()
//    {
//        return $this->getValue();
//    }
}
