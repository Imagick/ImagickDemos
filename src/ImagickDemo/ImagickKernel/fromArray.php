<?php

namespace ImagickDemo\ImagickKernel;

class fromArray extends \ImagickDemo\Example {

    function renderDescription() {
        return "Create a kernel from an 2d matrix of values. Each value should either be a float (if the element should be used) or 'false' if the element should be skipped.";
    }

    function renderTitle() {
        return "";
    }

    function render() {
        return $this->renderImageURL();
    }
}