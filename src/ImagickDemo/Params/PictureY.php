<?php

namespace ImagickDemo\Params;

use Room11\HTTP\VariableMap;


use Params\ExtractRule\GetFloatOrDefault;
use Params\InputParameter;
use Params\Param;
use Params\ProcessRule\RangeFloatValue;

class PictureY implements Param
{
    public function __construct(
        private string $name
    ) {
    }

    public function getInputParameter(): InputParameter
    {
        return new InputParameter(
            $this->name,
            new GetFloatOrDefault(10),
            new RangeFloatValue(0, 100)
        );
    }

//class PictureY extends ValueElement
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
//        return floatval($value);
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
//        return 1000;
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
