<?php

namespace ImagickDemo\ImagickKernel;

use ImagickDemo\Display;

class addUnityKernel extends \ImagickDemo\Example
{

    public function renderTitle(): string
    {
        return "ImagickKernel::addUnityKernel";
    }

    public function renderDescription()
    {
        return "";
    }

    public function render(
        ?string $activeCategory,
        ?string $activeExample
    )
    {
//Example ImagickKernel::addUnityKernel
        $matrix = [
            [-1, 0, -1],
            [0, 4, 0],
            [-1, 0, -1],
        ];

        $kernel = \ImagickKernel::fromMatrix($matrix);
        $kernel->scale(1, \Imagick::NORMALIZE_KERNEL_VALUE);
        $output = "Before adding unity kernel: <br/>";
        $output .= Display::renderKernelTable($kernel->getMatrix());
        $kernel->addUnityKernel(0.5);
        $output .= "After adding unity kernel: <br/>";
        $output .= Display::renderKernelTable($kernel->getMatrix());

        $kernel->scale(1, \Imagick::NORMALIZE_KERNEL_VALUE);
        $output .= "After renormalizing kernel: <br/>";
        $output .= Display::renderKernelTable($kernel->getMatrix());

        return $output;
//Example end
    }
}
