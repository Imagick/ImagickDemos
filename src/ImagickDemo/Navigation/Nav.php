<?php


namespace ImagickDemo\Navigation;



class Nav implements ActiveNav {

    protected $currentExample;

    /** @var \ImagickDemo\Navigation\NavOption[]  */
    private $examples;

    /**
     * @var \ImagickDemo\Control
     */
    private $control;

    function __construct($examples = null, $category, $example) {
        $this->examples = $examples;
        $this->category = $category;
        $this->currentExample = $example;
    }

    function getNavOptions() {
        return $this->examples;
    }

    function getBaseURI() {
        return $this->category;
    }

    function getURL() {
        $navOption = $this->getCurrent();

        if ($navOption) {

            if ($navOption->hasImage() == false) {
                return "";
            }

            $imageBaseURL = sprintf('/image/%s/%s', $this->category, $navOption->getName());
            $params = '';
            if ($this->control) {
                $params = '?'.$this->control->getParamString();
            }

            return sprintf("<img src='%s%s' />", $imageBaseURL, $params );
        }

        return "";
    }

    function renderTitle() {
        if ($this->currentExample) {
            return $this->currentExample;
        }
        return $this->category;
    }

    function setupControlAndExample(\Auryn\Provider $injector) {
        $navOption = $this->getCurrent();

        if ($navOption) {
            $exampleClassname = sprintf('ImagickDemo\%s\%s', $this->category, $navOption->getName());
            if($navOption->getURLName()) {
                $exampleClassname = sprintf('ImagickDemo\%s\%s', $this->category, $navOption->getURLName());
            }

            $injector->alias(\ImagickDemo\Example::class, $exampleClassname);

//            $controlName = $navOption->getControl();
//            
//            if ($controlName) {
//                //TODO - this is totally wrong.
//                //Examples can have multiple controls?
//                $injector->alias(\ImagickDemo\Control::class, $controlName);
//                $injector->share(\ImagickDemo\Control::class);
////                $this->control = $injector->make(\ImagickDemo\Control::class);
////
////                foreach($this->control->getParams() as $key => $value) {
////                    $injector->defineParam($key, $value);
////                }
//            }
        }
    }


    /**
     * @param $current
     * @internal param $array
     * @return NavOption
     */
    function getPrevious($current) {
        $previous = null;
        foreach ($this->examples as $element) {
            if (strcmp($current, $element->getName()) === 0) {
                if ($previous) {
                    return $element;
                }
            }
            $previous = $element;
        }

        return null;
    }

    /**
     * @return NavOption|null
     */
    function getCurrent() {
        foreach ($this->examples as $element) {
            if (strcmp($this->currentExample, $element->getName()) === 0) {
                return $element;
            }
        }

        return null;
    }

    function getNext($current) {
        $next = false;        
        foreach ($this->examples as $element) {

            if ($next == true) {
                return $element;
            }
            if (strcmp($current,$element->getName()) === 0) {
                $next = true;
            }
        }

        return null;
    }

    function renderPreviousButton() {
        $previousNavOption = $this->getPrevious($this->currentExample);

        if ($previousNavOption) {
            return "<a href='/".$this->category."/".$previousNavOption->getName()."'>
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
            echo "<a href='/".$this->category."/".$nextNavOption->getName()."'>
            <button type='button' class='btn btn-primary'>
            ".$nextNavOption->getName()." <span class='glyphicon  glyphicon-arrow-right'></span>
            </button>
            </a>";
        }

        return "";
    }

    function renderNav() {
        echo "<ul class='nav nav-sidebar smallPadding'>";

        foreach ($this->examples as $imagickExampleOption) {
            $imagickExample = $imagickExampleOption->getName();
            echo "<li>";
            echo "<a class='smallPadding' href='/".$this->category."/$imagickExample'>".$imagickExample."</a>";
            echo "</li>";
        }

        echo "</ul>";
    }
}

 