<?php

namespace ImagickDemo\Params;


use Params\ExtractRule\GetStringOrDefault;
use Params\ProcessRule\EnumMap;
use Params\InputParameter;
use Params\Param;

class Dither implements Param
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
                1 => 'Enabled',
                0 => 'Disabled',
            ])
        );
    }

//class Dither extends OptionKeyElement
//{
//    protected function getDefault()
//    {
//        return 1;
//    }
//
//    protected function getVariableName()
//    {
//        return 'dither';
//    }
//
//    protected function getDisplayName()
//    {
//        return 'Dither';
//    }
//
//    protected function getOptions()
//    {
//        return [
//            1 => 'Enabled',
//            0 => 'Disabled',
//        ];
//    }
//
//    public function getDither()
//    {
//        return $this->key;
//    }
}
