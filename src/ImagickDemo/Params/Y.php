<?php

namespace ImagickDemo\Params;

use Params\ExtractRule\GetIntOrDefault;
use Params\InputParameter;
use Params\Param;
use Params\ProcessRule\RangeIntValue;

#[\Attribute]
class Y implements Param
{
    public function __construct(
        private string $name
    ) {
    }

    public function getInputParameter(): InputParameter
    {
        return new InputParameter(
            $this->name,
            new GetIntOrDefault(10),
            new RangeIntValue(0, 255)
        );
    }
//
//class Y extends ValueElement
//{
//    private $defaultY;
//
//    public function __construct(VariableMap $variableMap, $defaultY = 10)
//    {
//        $this->defaultY = $defaultY;
//        parent::__construct($variableMap);
//    }
//
//    protected function filterValue($value)
//    {
//        return intval($value);
//    }
//
//    protected function getDefault()
//    {
//        return $this->defaultY;
//    }
//
//    protected function getMin()
//    {
//        return 0;
//    }
//
//    protected function getMax()
//    {
//        return 255;
//    }
//
//    protected function getVariableName()
//    {
//        return 'y';
//    }
//
//    protected function getDisplayName()
//    {
//        return 'Y';
//    }
//
//    public function getY()
//    {
//        return $this->getValue();
//    }
}
