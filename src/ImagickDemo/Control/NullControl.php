<?php


namespace ImagickDemo\Control;


class NullControl implements \ImagickDemo\Control {

    function render() { }

    /**
     * @return array
     */
    function getParams() {
        return [];
    }

    /**
     * @return string
     */
    function getParamString() {
        return "";
    }
}

 