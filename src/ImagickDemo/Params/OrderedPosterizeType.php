<?php

namespace ImagickDemo\Params;


use Params\ExtractRule\GetStringOrDefault;
use Params\ProcessRule\EnumMap;
use Params\InputParameter;
use Params\Param;

class OrderedPosterizeType implements Param
{
    public function __construct(
        private string $name
    ) {
    }

    public function getInputParameter(): InputParameter
    {
        return new InputParameter(
            $this->name,
            new GetStringOrDefault('o8x8'),
            new EnumMap([
                'o4x4' => 'o4x4',
                'o4x4,3,3' => 'o4x4,3,3',
                'o4x4,8,8,8' => 'o4x4,8,8,8',

                'o8x8' => 'o8x8',
                'o8x8,3' => 'o8x8,3',
                'o8x8,6,6' => 'o8x8,6,6',

                'h8x8a' => 'h8x8a',
                'h8x8a,3,3' => 'h8x8a,3,3',
                'h8x8a,8,8' => 'h8x8a,8,8',
                'checks' => 'checks',
                'checks,3,3' => 'checks,3,3',
                'checks,8,8' => 'checks,8,8',
            ])
        );
    }

//class OrderedPosterizeType extends OptionKeyElement
//{
//    protected function getDefault()
//    {
//        return 'o8x8';
//    }
//
//    protected function getVariableName()
//    {
//        return 'orderedPosterizeType';
//    }
//
//    protected function getDisplayName()
//    {
//        return "Posterize type";
//    }
//
//    protected function getOptions()
//    {
//        $orderedPosterizeOptions = [
//            'o4x4' => 'o4x4',
//            'o4x4,3,3' => 'o4x4,3,3',
//            'o4x4,8,8,8' => 'o4x4,8,8,8',
//
//
//            'o8x8' => 'o8x8',
//            'o8x8,3' => 'o8x8,3',
//            'o8x8,6,6' => 'o8x8,6,6',
//
//            'h8x8a' => 'h8x8a',
//            'h8x8a,3,3' => 'h8x8a,3,3',
//            'h8x8a,8,8' => 'h8x8a,8,8',
//            'checks' => 'checks',
//            'checks,3,3' => 'checks,3,3',
//            'checks,8,8' => 'checks,8,8',
//        ];
//
//        return $orderedPosterizeOptions;
//    }
//
//    public function getOrderedPosterizeType()
//    {
//        return $this->getKey();
//    }
}
