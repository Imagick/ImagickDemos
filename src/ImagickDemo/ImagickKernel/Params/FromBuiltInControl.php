<?php

declare(strict_types = 1);

namespace ImagickDemo\ImagickKernel\Params;


use ImagickDemo\Params\Image;
use ImagickDemo\Params\KernelRender;
use ImagickDemo\Params\KernelType;
use ImagickDemo\Params\KernelFirstTerm;
use ImagickDemo\Params\KernelSecondTerm;
use ImagickDemo\Params\KernelThirdTerm;
use ImagickDemo\ToArray;
use Params\Create\CreateFromVarMap;
use Params\InputParameterList;
use Params\InputParameterListFromAttributes;
use Params\SafeAccess;

class FromBuiltInControl implements InputParameterList
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use InputParameterListFromAttributes;

    public function __construct(
        #[KernelType()]
        private string $kernel_type,
        #[KernelFirstTerm()]
        private float $first_term,
        #[KernelSecondTerm()]
        private float $second_term,
        #[KernelThirdTerm()]
        private float $third_term,
        #[KernelRender()]
        private string $kernel_render
    ) {
    }

    public function getValuesForForm(): array
    {
        return [
            'kernel_type' => getOptionFromOptions($this->kernel_type, getKernelTypes()),
            'kernel_render' => getOptionFromOptions($this->kernel_render, getKernelRenderOptions()),
            'first_term' => $this->first_term,
            'second_term' => $this->second_term,
            'third_term' => $this->third_term
        ];
    }

    /**
     * @return string
     */
    public function getKernelType(): string
    {
        return $this->kernel_type;
    }

    /**
     * @return float
     */
    public function getFirstTerm(): float
    {
        return $this->first_term;
    }

    /**
     * @return float
     */
    public function getSecondTerm(): float
    {
        return $this->second_term;
    }

    /**
     * @return float
     */
    public function getThirdTerm(): float
    {
        return $this->third_term;
    }

    /**
     * @return string
     */
    public function getKernelRender(): string
    {
        return $this->kernel_render;
    }
}