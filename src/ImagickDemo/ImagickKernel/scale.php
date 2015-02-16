<?php

namespace ImagickDemo\ImagickKernel;

class scale extends \ImagickDemo\Example {

    function renderDescription() {
        return "Scales a kernel";

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

        return renderKernelTable($kernel->getValues());
    }
}