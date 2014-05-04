<?php


namespace ImagickDemo;


interface Control {

    /**
     * @return array
     */
    function render();

    function getParams();

    /**
     * @return string
     */
    function getParamString();
    
    function getURL();
}

 