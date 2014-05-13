<?php


namespace ImagickDemo\Control;


class NullNoImageControl implements \ImagickDemo\Control {

    private $imageBaseURL;
    
    function __construct(\Intahwebz\Request $request, $imageBaseURL) {
        $this->imageBaseURL = $imageBaseURL;
    }
    
    function renderForm() { }

    /**
     * @return array
     */
    function getParams() {
        return [];
    }

    function getURL() {
        return "";
    }
}

 