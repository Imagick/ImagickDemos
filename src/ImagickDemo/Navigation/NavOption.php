<?php


namespace ImagickDemo\Navigation;


class NavOption {

    private $name;
    private $control;
    private $hasImage;

    function __construct($name, $control, $hasImage) {
        $this->name = $name;
        $this->control = $control;
        $this->hasImage = $hasImage;
    }

    function hasImage() {
        return $this->hasImage;
    }
    
    /**
     * @return mixed
     */
    public function getControl() {
        return $this->control;
    }

    /**
     * @return mixed
     */
    public function getName() {
        return $this->name;
    }
}