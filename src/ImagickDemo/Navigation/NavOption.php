<?php


namespace ImagickDemo\Navigation;


class NavOption {

    private $name;

    function __construct($name, $urlName = null) {
        $this->name = $name;
        $this->urlName = $urlName;
    }

    /**
     * @return mixed
     */
    function getName() {
        return $this->name;
    }
    
    function getURLName() {
        return $this->urlName;
    }
}