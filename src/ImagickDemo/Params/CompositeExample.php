<?php

namespace ImagickDemo\Params;

use Params\ExtractRule\GetStringOrDefault;
use Params\ProcessRule\EnumMap;
use Params\InputParameter;
use Params\Param;

#[\Attribute]
class CompositeExample implements Param
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
                'multiplyGradients' => 'MULTIPLY',
                'difference'        => 'DIFFERENCE',
                'screenGradients'   => 'SCREEN',
                'modulate'          => 'MODULATE',
                'modulusAdd'        => 'MODULUS ADD',
                'modulusSubstract'  => 'MODULUS SUBSTRACT',
                'Dst_In'            => 'DSTIN',
                'Dst_Out'           => 'DSTOUT',
                'ATop'              => 'ATOP',
                'Plus'              => 'PLUS',
                'Minus'             => 'MINUS',
                'divide'            => 'COLORDODGE enhance text',
                'CopyOpacity'       => 'COPYOPACITY', //(Set transparency from gray-scale mask)
                'CopyOpacity2'      => 'COPYOPACITY version 2', //(Set transparency from gray-scale mask)
            ])
        )
    }

//class CompositeExample extends OptionKeyElement
//{
//    public function getVariableName()
//    {
//        return 'compositeExample';
//    }
//
//    public function getDefault()
//    {
//        return 'screenGradients';
//    }
//
//    public function getDisplayName()
//    {
//        return "Composite example";
//    }
//
//    public function getOptions()
//    {
//        return \ImagickDemo\Tutorial\composite::getExamples();
//    }
//
//    public function getCompositeExampleType()
//    {
//        return $this->getKey();
//    }
}
