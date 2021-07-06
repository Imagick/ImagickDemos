<?php

namespace ImagickDemo\Params;


use Params\ExtractRule\GetStringOrDefault;
use Params\ProcessRule\EnumMap;
use Params\InputParameter;
use Params\Param;
use Params\ProcessRule\MaxIntValue;
use Params\ProcessRule\MinIntValue;

#[\Attribute]
class BestFit implements Param
{
    public function __construct(
        private string $name
    ) {
    }

    public function getInputParameter(): InputParameter
    {
        return new InputParameter(
            $this->name,
            new GetStringOrDefault('1'),
            new EnumMap([
                0 => 'Disabled',
                1 => 'Enabled',
            ])
        );
    }

//class  extends OptionKeyElement
//{
//    protected function getDefault()
//    {
//        return 1;
//    }
//
//    protected function getVariableName()
//    {
//        return 'bestFit';
//    }
//
//    protected function getDisplayName()
//    {
//        return 'Best fit';
//    }
//
//    protected function getOptions()
//    {
//        return ;
//    }
//
//    public function getBestFit()
//    {
//        return $this->key;
//    }
}
