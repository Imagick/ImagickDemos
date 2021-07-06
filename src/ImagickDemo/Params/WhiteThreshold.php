<?php

namespace ImagickDemo\Params;

use Room11\HTTP\VariableMap;


use Params\ExtractRule\GetFloatOrDefault;
use Params\InputParameter;
use Params\Param;
use Params\ProcessRule\RangeFloatValue;

#[\Attribute]
class WhiteThreshold implements Param
{
    public function __construct(
        private string $name
    ) {
    }

    public function getInputParameter(): InputParameter
    {
        return new InputParameter(
            $this->name,
            new GetFloatOrDefault(0.2),
            new RangeFloatValue(0, 100)
        );
    }

//class WhiteThreshold extends ValueElement
//{
//    private $default;
//
//    public function __construct(VariableMap $variableMap, $defaultWhiteThreshold = 0.2)
//    {
//        $this->default = $defaultWhiteThreshold;
//        parent::__construct($variableMap);
//    }
//
//    protected function filterValue($value)
//    {
//        return floatval($value);
//    }
//
//    protected function getDefault()
//    {
//        return $this->default;
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
//        return 'whiteThreshold';
//    }
//
//    protected function getDisplayName()
//    {
//        return 'White threshold';
//    }
//
//    public function getWhiteThreshold()
//    {
//        return $this->getValue();
//    }
}
