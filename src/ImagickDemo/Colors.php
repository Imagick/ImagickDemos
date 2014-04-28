<?php


namespace ImagickDemo;


class Colors {
    
    
    public $background ;
    public $outline;
    public $fill;

    function __construct($background, $outline, $fill) {
        $this->background = $background ;
        $this->outline = $outline;
        $this->fill = $fill;
    }
    
    
    /**
     * @return mixed
     */
    public function getBackground() {
        return $this->background;
    }

    /**
     * @return mixed
     */
    public function getFill() {
        return $this->fill;
    }

    /**
     * @return mixed
     */
    public function getOutline() {
        return $this->outline;
    }

    
    
    
}

 