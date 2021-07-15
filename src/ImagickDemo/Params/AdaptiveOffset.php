<?php

namespace ImagickDemo\Params;


use Params\ExtractRule\GetFloatOrDefault;
use Params\InputParameter;
use Params\Param;
use Params\ProcessRule\MaxFloatValue;
use Params\ProcessRule\MinFloatValue;

#[\Attribute]
class AdaptiveOffset implements Param
{
    public function __construct(
        private string $name
    ) {
    }

    public function getInputParameter(): InputParameter
    {
        return new InputParameter(
            $this->name,
            new GetFloatOrDefault(1 / 8),
            new MinFloatValue(0),
            new MaxFloatValue(1),
        );
    }

//    public function __construct(VariableMap $variableMap)
//    {
//        $this->default = 1 / 8;
//        parent::__construct($variableMap);
//    }
//
//    protected function getDefault()
//    {
//        return $this->default;
//    }
//
//    protected function filterValue($value)
//    {
//        return floatval($value);
//    }
//
//    protected function getMin()
//    {
//        return 0;
//    }
//
//    protected function getMax()
//    {
//        return 1;
//    }
//
//    protected function getVariableName()
//    {
//        return 'adaptiveOffset';
//    }
//
//    protected function getDisplayName()
//    {
//        return 'Offset';
//    }
//
//    protected function getHelpText()
//    {
//        return "";
//    }
//
//    public function getAdaptiveOffset()
//    {
//        return $this->getValue();
//    }
}
