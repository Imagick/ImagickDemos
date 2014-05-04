<?php


namespace ImagickDemo\Navigation;

class NavOption {

    private $name;
    private $control;
    
    function __construct($name, $control) {
        $this->name = $name;
        $this->control = $control;
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

abstract class Nav {

    protected $currentExample;

    abstract function getNavOptions();
    abstract function getBaseURI();
    
    /**
     * @param $array
     * @param $current
     * @return NavOption
     */
    function getPrevious($current) {
        $previous = null;
        $array = $this->getNavOptions();

        foreach ($array as $element) {
            if (strcmp($current, $element[0]) === 0) {
                if ($previous) {
                    return new NavOption($previous[0], $previous[1]);
                }
            }
            $previous = $element;
        }

        return null;
    }
    
    function getCurrent($current) {
        $array = $this->getNavOptions();

        foreach ($array as $element) {

            if (strcmp($current, $element[0]) === 0) {
                return new NavOption($element[0], $element[1]);
            }
        }

        return null;
    }

    function getNext($current) {
        $next = false;

        $array = $this->getNavOptions();
        
        foreach ($array as $element) {

            if ($next == true) {
                return new NavOption($element[0], $element[1]);
            }
            if (strcmp($current,$element[0]) === 0) {
                $next = true;
            }
        }

        return null;
    }

    function renderPreviousButton() {
        $previousNavOption = $this->getPrevious($this->currentExample);

        if ($previousNavOption) {
            return "<a href='/Imagick/".$previousNavOption->getName()."'>
            <button type='button' class='btn btn-primary'>
             <span class='glyphicon glyphicon-arrow-left'></span> ".$previousNavOption->getName()."
            </button>
            </a>";
        }

        return "";
    }

    function renderNextButton() {
        $nextNavOption = $this->getNext($this->currentExample);

        if ($nextNavOption) {
            echo "<a href='/Imagick/".$nextNavOption->getName()."'>
            <button type='button' class='btn btn-primary'>
            ".$nextNavOption->getName()." <span class='glyphicon  glyphicon-arrow-right'></span>
            </button>
            </a>";
        }

        return "";
    }
}

 