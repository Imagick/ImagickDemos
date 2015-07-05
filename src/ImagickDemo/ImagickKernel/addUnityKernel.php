<?php

namespace ImagickDemo\ImagickKernel;

class addUnityKernel extends \ImagickDemo\Example {

    function renderDescription() {
        return "Adds a given amount of the 'Unity' Convolution Kernel to the given pre-scaled and normalized Kernel. In effect this adds that amount of the original image  into the resulting convolution kernel. The resulting effect is to convert the defined kernels into blended soft-blurs, unsharp kernels or into sharpening kernels.";
    }

    function render() {
//Example ImagickKernel::addUnityKernel
        $matrix = [
            [-1, 0, -1],
            [ 0, 4,  0],
            [-1, 0, -1],
        ];

        $kernel = \ImagickKernel::fromMatrix($matrix);
        $kernel->scale(1, \Imagick::NORMALIZE_KERNEL_VALUE);
        $output = "Before adding unity kernel: <br/>";
        $output .= renderKernelTable($kernel->getMatrix());
        $kernel->addUnityKernel(0.5);
        $output .= "After adding unity kernel: <br/>";
        $output .= renderKernelTable($kernel->getMatrix());
        
        
        $kernel->scale(1, \Imagick::NORMALIZE_KERNEL_VALUE);
        $output .= "After renormalizing kernel: <br/>";
        $output .= renderKernelTable($kernel->getMatrix());

        return $output;
//Example end
    }
}