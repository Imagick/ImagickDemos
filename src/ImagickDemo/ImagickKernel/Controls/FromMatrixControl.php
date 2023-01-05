<?php

declare(strict_types = 1);

namespace ImagickDemo\ImagickKernel\Controls;


use ImagickDemo\Params\KernelRender;

use ImagickDemo\ToArray;
use DataType\Create\CreateFromVarMap;
use DataType\DataType;
use DataType\GetInputTypesFromAttributes;
use DataType\SafeAccess;

class FromMatrixControl implements DataType
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use GetInputTypesFromAttributes;

    public function __construct(
        #[KernelRender('kernel_render')]
        private string $kernel_render
    ) {
    }

    public function getValuesForForm(): array
    {
        return [
            'kernel_render' => getOptionFromOptions($this->kernel_render, getKernelRenderOptions()),
        ];
    }

    /**
     * @return string
     */
    public function getKernelRender(): string
    {
        return $this->kernel_render;
    }
}