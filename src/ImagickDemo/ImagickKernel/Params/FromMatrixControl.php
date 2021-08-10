<?php

declare(strict_types = 1);

namespace ImagickDemo\ImagickKernel\Params;


use ImagickDemo\Params\Image;
use ImagickDemo\Params\KernelRender;

use ImagickDemo\ToArray;
use Params\Create\CreateFromVarMap;
use Params\InputParameterList;
use Params\InputParameterListFromAttributes;
use Params\SafeAccess;

class FromMatrixControl implements InputParameterList
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use InputParameterListFromAttributes;

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