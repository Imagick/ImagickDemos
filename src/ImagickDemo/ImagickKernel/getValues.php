<?php

namespace ImagickDemo\ImagickKernel;

class getValues extends \ImagickDemo\Example {

    function renderDescription() {
        return "Get the 2d matrix of values used in this kernel. The elements are either float for elements that are used or 'false' if the element should be skipped.";
    }

    function renderTitle() {
        return "";
    }

    function render() {
        $output = '';

        $diamondKernel = ImagickKernel::fromBuiltIn(
            \Imagick::KERNEL_DIAMOND,
            "3,2"
        );

        $matrix = $diamondKernel->getValues();

        renderKernelTable($matrix);
        
        return $output;
    }
}