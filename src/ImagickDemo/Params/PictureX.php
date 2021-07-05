<?php

namespace ImagickDemo\Params;

use Room11\HTTP\VariableMap;

use Params\ExtractRule\GetFloatOrDefault;
use Params\InputParameter;
use Params\Param;
use Params\ProcessRule\RangeFloatValue;

class PictureX implements Param
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

//class PictureX extends ValueElement
//{
//    private $defaultX;
//
//    public function __construct(VariableMap $variableMap, $defaultX = 10)
//    {
//        $this->defaultX = $defaultX;
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
//        return $this->defaultX;
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
//        return 'x';
//    }
//
//    protected function getDisplayName()
//    {
//        return 'X';
//    }
//
//    public function getX()
//    {
//        return $this->getValue();
//    }
}
