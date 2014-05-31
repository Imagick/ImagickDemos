<?php


namespace ImagickDemo;


class NullExample extends \ImagickDemo\Example {

    function __construct(\ImagickDemo\Control\NullControl $control) {
        $this->control = $control;
    }

    function render() {
        return "";
    }

}

 