<?php


namespace ImagickDemo\Control;


class NullControl implements \ImagickDemo\Control {

    private $imageBaseURL;
    
    function __construct(\Intahwebz\Request $request, $imageBaseURL) {
        $this->imageBaseURL = $imageBaseURL;
    }
    
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
    
    function getURL() {
        return sprintf("<img src='%s?%s' />", $this->imageBaseURL, $this->getParamString() );
    }
}

 