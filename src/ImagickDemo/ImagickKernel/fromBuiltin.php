<?php

namespace ImagickDemo\ImagickKernel;

class fromBuiltin extends \ImagickDemo\Example {

    function renderDescription() {
        return "Create a kernel from a builtin in kernel. See http://www.imagemagick.org/Usage/morphology/#kernel for examples. Currently the 'rotation' symbol are not supported.
    ";
        // $diamondKernel = ImagickKernel::fromBuiltIn(\Imagick::KERNEL_DIAMOND, "2");
    }

    function renderTitle() {
        return "";
    }

    function render() {
        return $this->renderImageURL();
    }
}