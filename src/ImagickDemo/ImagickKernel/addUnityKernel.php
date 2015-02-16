<?php

namespace ImagickDemo\ImagickKernel;

class addUnityKernel extends \ImagickDemo\Example {

    function renderDescription() {
        return "Adds a given amount of the 'Unity' Convolution Kernel to the given pre-scaled and normalized Kernel. In effect this adds that amount of the original image  into the resulting convolution kernel. The resulting effect is to convert the defined kernels into blended soft-blurs, unsharp kernels or into sharpening kernels.
    ";

    }

    function renderTitle() {
        return "";
    }

    function render() {
        $matrix = [
            [-1, 0, -1],
            [ 0, 4,  0],
            [-1, 0, -1],
        ];

        $kernel = ImagickKernel::fromArray($matrix);

        $kernel->scale(4, \Imagick::NORMALIZE_KERNEL_VALUE);
        $kernel->addUnityKernel(0.5);

        return renderKernelTable($kernel->getValues());
    }
}