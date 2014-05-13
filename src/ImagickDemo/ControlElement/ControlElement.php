<?php


namespace ImagickDemo\ControlElement;


interface ControlElement {

    /**
     * @return array
     */
    function getParams();
    
    /**
     * @return string
     */
    function renderFormElement();
} 