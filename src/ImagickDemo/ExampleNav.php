<?php


namespace ImagickDemo;


function getPrevious($array, $current) {

    $previous = null;

    foreach ($array as $element) {
        if ($current == $element) {
            return $previous;
        }
        $previous = $element;
    }

    return null;
}

function getNext($array, $current) {
    $next = false;
    
    foreach ($array as $element) {
        
        if ($next == true) {
            return $element;
        }
        if ($current == $element) {
            $next = true;
        }
    }

    return null;
}


class ExampleNav implements ActiveNav {

    private $currentExample;
    
    private $imagickExamples = [
        'gradientReflection',
        'psychedelicFont',
        'imagickComposite',
        'imagickCompositeGen',
        'composite' => 'composite',
    ];

    function display($example, \Auryn\Provider $provider) {
        $this->currentExample = $example;
        $classname = 'ImagickDemo\Example\\' . $example;
        $provider->alias('ImagickDemo\Example', $classname);
        $provider->alias('ImagickDemo\ActiveNav', get_class($this));
        $provider->share($this);
    }

    function displayIndex(\Auryn\Provider $provider) {
        $provider->alias('ImagickDemo\ActiveNav', get_class($this));
        $provider->share($this);
    }

    function renderImage($example, \Auryn\Provider $provider) {
        $classname = '\ImagickDemo\Example\\' . $example;
        $provider->execute([$classname, 'renderImageSafe']);
    }

    function renderPreviousButton() {
        $previous = getPrevious($this->imagickExamples, $this->currentExample);

        if ($previous) {
            return "<a href='/Example/$previous'>
            <button type='button' class='btn btn-primary'>
             <span class='glyphicon  glyphicon-arrow-left'></span> $previous
            </button>
            </a>";
        }

        return "";
    }

    function renderNextButton() {
        $next = getNext($this->imagickExamples, $this->currentExample);

        if ($next) {
            echo "<a href='/Example/$next'>
            <button type='button' class='btn btn-primary'>
            $next <span class='glyphicon  glyphicon-arrow-right'></span>
            </button>
            </a>";
        }

        return "";
    }
    
    function renderTitle() {
        if ($this->currentExample) {
            return $this->currentExample;
        }
        return 'Example';
    }

    function renderNav() {
        echo "<ul class='nav nav-sidebar smallPadding'>";

        foreach ($this->imagickExamples as $imagickExample) {
            echo "<li>";
                echo "<a class='smallPadding' href='/Example/$imagickExample'>".$imagickExample."</a>";
            echo "</li>";
        }
        
        echo "</ul>";
    }
}

 