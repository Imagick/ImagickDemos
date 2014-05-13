<?php


namespace ImagickDemo;


interface Control {

    function renderFormElement();

    function getParams();

    //function getURL(); //{
        //return sprintf("<img src='%s?%s' />", $this->imageBaseURL, $this->getParamString() );
    //}
    
}

 