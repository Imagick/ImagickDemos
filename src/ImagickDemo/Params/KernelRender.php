<?php

namespace ImagickDemo\Params;


use Params\ExtractRule\GetStringOrDefault;
use Params\ProcessRule\EnumMap;
use Params\InputParameter;
use Params\Param;

class KernelRender implements Param
{
    public function __construct(
        private string $name
    ) {
    }

    public function getInputParameter(): InputParameter
    {
        return new InputParameter(
            $this->name,
            new GetStringOrDefault('image'),
            new EnumMap([
                'image' => 'Image',
                'values' => 'Values',
            ])
        );
    }

//class KernelRender extends OptionKeyElement
//{
//    const KERNEL_RENDER_IMAGE = 0;
//    const KERNEL_RENDER_VALUES = 1;
//
//    protected function getDefault()
//    {
//        return 0;
//    }
//
//    protected function getVariableName()
//    {
//        return 'kernelRender';
//    }
//
//    protected function getDisplayName()
//    {
//        return 'Render kernel as';
//    }
//
//    protected function getOptions()
//    {
//        return [
//            self::KERNEL_RENDER_IMAGE => 'Image',
//            self::KERNEL_RENDER_VALUES => 'Values',
//        ];
//    }
//
//    public function getKernelRender()
//    {
//        return $this->key;
//    }
}
