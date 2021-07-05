<?php

namespace ImagickDemo\Params;


use Params\ExtractRule\GetFloatOrDefault;
use Params\InputParameter;
use Params\Param;
use Params\ProcessRule\RangeFloatValue;

class Swirl implements Param
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
            new RangeFloatValue(-3600, 3600)
        );
    }

//class Swirl extends ValueElement
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
//        return -3600;
//    }
//
//    protected function getMax()
//    {
//        return 3600;
//    }
//
//    protected function getVariableName()
//    {
//        return 'swirl';
//    }
//
//    protected function getDisplayName()
//    {
//        return 'Swirl';
//    }
//
//    public function getSwirl()
//    {
//        return $this->getValue();
//    }
}
