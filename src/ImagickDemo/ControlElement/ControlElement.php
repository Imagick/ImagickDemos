<?php


namespace ImagickDemo\ControlElement;


interface ControlElement {

    const FIRST_ELEMENT_SIZE = 7;
    const MIDDLE_ELEMENT_SIZE = 5;

    const FIRST_ELEMENT_CLASS = "";
    const MIDDLE_ELEMENT_CLASS = "";
    const THIRD_ELEMENT_CLASS = "";

    /**
     * @return array
     */
    function getParams();
    
    /**
     * @return string
     */
    function renderFormElement();
} 