<?php

namespace ImagickDemo\Params;

use Params\ExtractRule\GetStringOrDefault;
use Params\ProcessRule\EnumMap;
use Params\InputParameter;
use Params\Param;

#[\Attribute]
class DitherMethod implements Param
{
    public function __construct(
        private string $name
    ) {
    }

    public function getInputParameter(): InputParameter
    {
        return new InputParameter(
            $this->name,
            new GetStringOrDefault(\Imagick::DITHERMETHOD_NO),
            new EnumMap([
                \Imagick::DITHERMETHOD_NO => 'None',
                \Imagick::DITHERMETHOD_RIEMERSMA => 'Riemersma',
                \Imagick::DITHERMETHOD_FLOYDSTEINBERG => 'Floydsteinberg',
            ])
        );
    }

//class DitherMethod extends OptionKeyElement
//{
//    protected function getDefault()
//    {
//        return \Imagick::DITHERMETHOD_NO;
//    }
//
//    protected function getVariableName()
//    {
//        return 'ditherMethod';
//    }
//
//    protected function getDisplayName()
//    {
//        return 'Dither method';
//    }
//
//    protected function getOptions()
//    {
//        return [
//            \Imagick::DITHERMETHOD_NO => 'None',
//            \Imagick::DITHERMETHOD_RIEMERSMA => 'Riemersma',
//            \Imagick::DITHERMETHOD_FLOYDSTEINBERG => 'Floydsteinberg',
//        ];
//    }
//
//    public function getDitherMethod()
//    {
//        return $this->key;
//    }
}
