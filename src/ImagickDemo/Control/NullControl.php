<?php


namespace ImagickDemo\Control;


class NullControl implements \ImagickDemo\Control {


    private $activeCategory;
    private $activeExample;
    
    
    function __construct(\Intahwebz\Request $request, $activeCategory, $activeExample) {
        $this->activeCategory = $activeCategory;
        $this->activeExample = $activeExample;
    }
    
    function renderForm() { }

    /**
     * @return array
     */
    function getParams() {
        return [];
    }

    function getInjectionParams() {
        return [];
    }
    

    function getFullParams(array $extraParams = []) {
        return $extraParams;
    }

    function getURL() {
        return getImageURL($this->activeCategory, $this->activeExample);
    }

    function getCustomImageURL(array $extraParams = array()) {
        $paramString = '';
        $separator = '?';

        foreach ($extraParams as $key => $value) {
            $paramString .= $separator.$key."=".$value;
            $separator = '&';
        }

        return getCustomImageURL($this->activeCategory, $this->activeExample).$paramString;
    }

    function getImageStatusURL() {
        return getImageStatusURL($this->activeCategory, $this->activeExample);
    }
}

 