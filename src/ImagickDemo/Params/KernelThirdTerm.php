<?php

namespace ImagickDemo\Params;


use Params\ExtractRule\GetFloatOrDefault;
use Params\InputParameter;
use Params\Param;
use Params\ProcessRule\MaxIntValue;
use Params\ProcessRule\MinIntValue;

class KernelThirdTerm implements Param
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
            new MinIntValue(0),
            new MaxIntValue(5),
        );
    }

//class KernelThirdTerm extends ValueElement
//{
//    protected function filterValue($value)
//    {
//        return floatval($value);
//    }
//
//    protected function getDefault()
//    {
//        return false;
//    }
//
//    protected function getMin()
//    {
//        return 0;
//    }
//
//    protected function getMax()
//    {
//        return 5;
//    }
//
//    protected function getVariableName()
//    {
//        return 'kernelThirdTerm';
//    }
//
//    protected function getDisplayName()
//    {
//        return 'Third term';
//    }
//
//    public function getKernelThirdTerm()
//    {
//        return $this->getValue();
//    }
}
