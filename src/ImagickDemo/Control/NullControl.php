<?php


namespace ImagickDemo\Control;


class NullControl implements \ImagickDemo\Control {

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
        return $this->imageBaseURL;
    }

    function getCustomImageURL() {
        return $this->imageBaseURL;
    }
}

 