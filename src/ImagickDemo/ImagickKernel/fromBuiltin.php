<?php

namespace ImagickDemo\ImagickKernel;

class fromBuiltin extends \ImagickDemo\Example {

    function renderDescription() {
        return "Create a kernel from a builtin in kernel. See http://www.imagemagick.org/Usage/morphology/#kernel for examples. Currently the 'rotation' symbol is not supported.
    ";
    }

    function renderTitle() {
        return "";
    }

    function render() {
        return $this->renderImageURL();
    }
}