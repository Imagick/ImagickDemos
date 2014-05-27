<?php


namespace ImagickDemo\Example;


class edgeExtend extends \ImagickDemo\Example {

    function render() {
        $output = "<br/>";
        $output .= $this->renderImageURL();

        return $output;
    }
    /**
     * @return \ImagickDemo\Control
     */
    function getControl() {
        return $this->control;
    }
}