<?php

namespace ImagickDemo\ImagickKernel;

class addKernel extends \ImagickDemo\Example {

    function renderDescription() {
        return "Attach another kernel to this kernel to allow them to both be applied in a single morphology or filter function.";

    }

    function render() {
        return $this->renderImageURL();
    }
}