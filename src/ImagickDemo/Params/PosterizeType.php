<?php

namespace ImagickDemo\Params;


use Params\ExtractRule\GetIntOrDefault;
use Params\InputParameter;
use Params\Param;
use Params\ProcessRule\EnumMap;

class PosterizeType implements Param
{
    public function __construct(
        private string $name
    ) {
    }

    public function getInputParameter(): InputParameter
    {
        return new InputParameter(
            $this->name,
            new GetIntOrDefault(\Imagick::DITHERMETHOD_RIEMERSMA),
            new EnumMap([
                \Imagick::DITHERMETHOD_NO => 'None',
                \Imagick::DITHERMETHOD_RIEMERSMA => 'Riemersma',
                \Imagick::DITHERMETHOD_FLOYDSTEINBERG => 'Floydsteinberg',
            ])
        );
    }

//class PosterizeType extends OptionKeyElement
//{
//    protected function getDefault()
//    {
//        return \Imagick::DITHERMETHOD_RIEMERSMA;
//    }
//
//    protected function getVariableName()
//    {
//        return 'posterizeType';
//    }
//
//    protected function getDisplayName()
//    {
//        return "Posterize type";
//    }
//
//    protected function getOptions()
//    {
//        $images = [
//            \Imagick::DITHERMETHOD_NO => 'None',
//            \Imagick::DITHERMETHOD_RIEMERSMA => 'Riemersma',
//            \Imagick::DITHERMETHOD_FLOYDSTEINBERG => 'Floydsteinberg',
//        ];
//
//        return $images;
//    }
//
//    public function getPosterizeType()
//    {
//        return $this->getKey();
//    }
}
