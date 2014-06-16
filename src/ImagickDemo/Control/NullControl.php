<?php


namespace ImagickDemo\Control;


class NullControl implements \ImagickDemo\Control {

    private $imageBaseURL;
    private $customImageBaseURL;
    
    function __construct(\Intahwebz\Request $request, $imageBaseURL, $customImageBaseURL) {
        $this->imageBaseURL = $imageBaseURL;
        $this->customImageBaseURL = $customImageBaseURL;
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

    function getCustomImageURL(array $extraParams = array()) {

        $paramString = '';
        $separator = '?';

        foreach ($extraParams as $key => $value) {
            $paramString .= $separator.$key."=".$value;
            $separator = '&';
        }

        return $this->customImageBaseURL.$paramString;
    }
}

 