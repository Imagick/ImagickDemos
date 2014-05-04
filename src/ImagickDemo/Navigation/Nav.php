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

class Nav {

    protected $currentExample;

    private $examples;

    /**
     * @var \ImagickDemo\Control
     */
    private $control;

    function __construct($examples, $category, $example) {
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
            
            $injector->alias(\ImagickDemo\Example::class, $exampleClassname);

            $controlName = $navOption->getControl();
            
            if ($controlName) {
                $injector->alias(\ImagickDemo\Control::class, $controlName);
                $this->control = $injector->make(\ImagickDemo\Control::class);

                foreach($this->control->getParams() as $key => $value) {
                    $injector->defineParam($key, $value);
                }
            }
        }
    }

    
    
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

    /**
     * @return NavOption|null
     */
    function getCurrent() {

        $array = $this->getNavOptions();
        foreach ($array as $element) {

            if (strcmp($this->currentExample, $element[0]) === 0) {
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

    function renderNav() {
        echo "<ul class='nav nav-sidebar smallPadding'>";

        foreach ($this->examples as $imagickExampleOption) {

            $imagickExample = $imagickExampleOption[0];
            echo "<li>";
            echo "<a class='smallPadding' href='/".$this->category."/$imagickExample'>".$imagickExample."</a>";
            echo "</li>";
        }

        echo "</ul>";
    }
}

 