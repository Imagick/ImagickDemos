<?php

namespace ImagickDemo\Params;

use Params\ExtractRule\GetStringOrDefault;
use Params\ProcessRule\EnumMap;
use Params\InputParameter;
use Params\Param;

#[\Attribute]
class GrayOnly implements Param
{
    public function __construct(
        private string $name
    ) {
    }

    public function getInputParameter(): InputParameter
    {
        return new InputParameter(
            $this->name,
            new GetStringOrDefault('0'),
            new EnumMap([
                0 => 'All pixels',
                1 => 'Gray pixels only',
            ])
        );
    }

//class GrayOnly extends OptionKeyElement
//{
//    protected function getDefault()
//    {
//        return 0;
//    }
//
//    protected function getVariableName()
//    {
//        return 'grayOnly';
//    }
//
//    protected function getDisplayName()
//    {
//        return 'Pixels';
//    }
//
//    protected function getOptions()
//    {
//        return [
//            0 => 'All pixels',
//            1 => 'Gray pixels only',
//        ];
//    }
//
//    public function getGrayOnly()
//    {
//        return $this->key;
//    }
}
