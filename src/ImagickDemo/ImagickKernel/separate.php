<?php

namespace ImagickDemo\ImagickKernel;

class separate extends \ImagickDemo\Example {

    function renderDescription() {
        return "Separates a linked set of kernels and returns an array of ImagickKernels.";
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

        $kernelList = $kernel->separate();
        
        $output = '';
        
        foreach ($kernelList as $kernel) {

            $output .= renderKernelTable($kernel->getValues());
        }

        return $output;
    }
}