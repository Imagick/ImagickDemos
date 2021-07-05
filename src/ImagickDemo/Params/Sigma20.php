<?php

namespace ImagickDemo\Params;

use Params\ExtractRule\GetFloatOrDefault;
use Params\InputParameter;
use Params\Param;
use Params\ProcessRule\RangeFloatValue;

class Sigma20 implements Param
{
    public function __construct(
        private string $name
    ) {
    }

    public function getInputParameter(): InputParameter
    {
        return new InputParameter(
            $this->name,
            new GetFloatOrDefault(20),
            new RangeFloatValue(0, 200)
        );
    }

//class Sigma20 extends ValueElement
//{
//    protected function filterValue($value)
//    {
//        return floatval($value);
//    }
//
//    protected function getDefault()
//    {
//        return 20;
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
//        return 'sigma';
//    }
//
//    protected function getDisplayName()
//    {
//        return 'Sigma';
//    }
//
//    public function getSigma()
//    {
//        return $this->getValue();
//    }
}
