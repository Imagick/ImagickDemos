<?php

namespace ImagickDemo\Params;

use Room11\HTTP\VariableMap;

use Params\ExtractRule\GetFloatOrDefault;
use Params\InputParameter;
use Params\Param;
use Params\ProcessRule\RangeFloatValue;

#[\Attribute]
class Sigma implements Param
{
    public function __construct(
        private string $name
    ) {
    }

    public function getInputParameter(): InputParameter
    {
        return new InputParameter(
            $this->name,
            new GetFloatOrDefault(1),
            new RangeFloatValue(0, 100)
        );
    }

//class Sigma extends ValueElement
//{
//    private $defaultSigma;
//
//    public function __construct(VariableMap $variableMap, $defaultSigma = 1)
//    {
//        $this->defaultSigma = $defaultSigma;
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
//        return 1;
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
