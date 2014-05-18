<?php


namespace ImagickDemo\Navigation;



class Nav implements ActiveNav {

    protected $currentExample;

    /**
     * @var \ImagickDemo\ExampleList
     */
    private $exampleList;

    /**
     * @param \ImagickDemo\ExampleList $exampleList
     * @param $category
     * @param $example
     */
    function __construct(\ImagickDemo\ExampleList $exampleList, $category, $example) {
        $this->exampleList = $exampleList;
        $this->category = $category;
        $this->currentExample = $example;
    }

    function getCategory() {
        return $this->category;
    }
    
    /**
     * @return NavOption[]
     */
    function getNavOptions() {
        return $this->exampleList->getExamples();
    }

    /**
     * @return mixed
     */
    function getBaseURI() {
        return $this->category;
    }

    /**
     * @return mixed
     */
    function renderTitle() {
        if ($this->currentExample) {
            return $this->currentExample;
        }
        return $this->category;
    }

    /**
     * @param \Auryn\Provider $injector
     */
    function setupControlAndExample(\Auryn\Provider $injector) {
        $navOption = $this->getCurrent();

        if ($navOption) {
            if ($navOption->getURLName()) {
                $exampleClassname = sprintf('ImagickDemo\%s\%s', $this->category, $navOption->getURLName());
            }
            else {
                $exampleClassname = sprintf('ImagickDemo\%s\%s', $this->category, $navOption->getName());
            }
        }
        else {
            $exampleClassname = sprintf('ImagickDemo\%s\nullExample', $this->category);
        }

        $injector->alias(\ImagickDemo\Example::class, $exampleClassname);
    }

    /**
     * @param $current
     * @internal param $array
     * @return NavOption
     */
    function getPrevious($current) {
        $previous = null;
        foreach ($this->exampleList->getExamples() as $element) {
            if (strcmp($current, $element->getName()) === 0) {
                if ($previous) {
                    return $previous;
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
        foreach ($this->exampleList->getExamples() as $element) {
            if (strcmp($this->currentExample, $element->getName()) === 0) {
                return $element;
            }
        }

        return null;
    }

    /**
     * @param $current
     * @return NavOption|null
     */
    function getNext($current) {
        $next = false;        
        foreach ($this->exampleList->getExamples() as $element) {
            if ($next == true) {
                return $element;
            }
            if (strcmp($current,$element->getName()) === 0) {
                $next = true;
            }
        }

        return null;
    }

    /**
     * @return string
     */
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

    /**
     * @return string
     */
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

    
    function renderVertical() {

        echo "<ul class='nav nav-sidebar smallPadding'>";

        foreach ($this->exampleList->getExamples() as $imagickExampleOption) {

            $imagickExample = $imagickExampleOption->getName();
            
            $active = '';
            
            if ($this->currentExample === $imagickExample) {
                $active = 'navActive';
            }

            echo "<li>";
            echo "<a class='smallPadding $active' href='/".$this->category."/$imagickExample'>".$imagickExample."</a>";
            echo "</li>";
        }

        echo "</ul>";
    }

    function renderHorizontal() {
        foreach ($this->exampleList->getExamples() as $imagickExampleOption) {
            $imagickExample = $imagickExampleOption->getName();
            printf(
                "<a class='smallPadding' href='/%s/%s'>%s</a> ",
                $this->category,
                $imagickExample,
                str_replace('Image', '', $imagickExample)
            );
        }
    }
    
    /**
     * 
     */
    function renderNav($horizontal = false) {
        
        if ($horizontal == true) {
            $this->renderHorizontal();   
        }
        else {
            $this->renderVertical();
        }
        
        
  
    }
}

 