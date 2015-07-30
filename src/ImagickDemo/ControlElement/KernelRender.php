<?php

namespace ImagickDemo\ControlElement;

class KernelRender extends OptionKeyElement
{
    const KERNEL_RENDER_IMAGE = 0;
    const KERNEL_RENDER_VALUES = 1;

    protected function getDefault()
    {
        return 0;
    }

    protected function getVariableName()
    {
        return 'kernelRender';
    }

    protected function getDisplayName()
    {
        return 'Render kernel as';
    }

    protected function getOptions()
    {
        return [
            self::KERNEL_RENDER_IMAGE => 'Image',
            self::KERNEL_RENDER_VALUES => 'Values',
        ];
    }

    public function getKernelRender()
    {
        return $this->key;
    }
}
