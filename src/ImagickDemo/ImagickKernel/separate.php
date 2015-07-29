<?php

namespace ImagickDemo\ImagickKernel;

class separate extends \ImagickDemo\Example
{
    public function renderDescription()
    {
        return "Separates a linked set of kernels and returns an array of ImagickKernels.";
    }

    public function render()
    {
//Example ImagickKernel::separate
        $matrix = [
            [-1, 0, -1],
            [0, 4, 0],
            [-1, 0, -1],
        ];

        $kernel = \ImagickKernel::fromMatrix($matrix);
        $kernel->scale(4, \Imagick::NORMALIZE_KERNEL_VALUE);
        $diamondKernel = \ImagickKernel::fromBuiltIn(
            \Imagick::KERNEL_DIAMOND,
            "2"
        );

        $kernel->addKernel($diamondKernel);

        $kernelList = $kernel->separate();

        $output = '';
        $count = 0;
        foreach ($kernelList as $kernel) {
            $output .= "<br/>Kernel $count<br/>";
            $output .= renderKernelTable($kernel->getMatrix());
            $count++;
        }

        return $output;
//Example end
    }
}
