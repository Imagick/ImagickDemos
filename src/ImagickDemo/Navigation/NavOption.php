<?php


namespace ImagickDemo\Navigation;


class NavOption {

    private $name;
    private $control;
    private $hasImage;

    function __construct($name, $control, $hasImage, $urlName = null) {
        $this->name = $name;
        $this->control = $control;
        $this->hasImage = $hasImage;
        $this->urlName = $urlName;
    }

    function hasImage() {
        return $this->hasImage;
    }
    
    /**
     * @return mixed
     */
    function getControl() {
        return $this->control;
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