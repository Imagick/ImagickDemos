<?php


namespace ImagickDemo\ImagickPixelIterator;


use ImagickDemo\Navigation\ActiveNav;
use ImagickDemo\Navigation\DemoNav;

class ImagickPixelIteratorNav implements ActiveNav, DemoNav {

    private $currentExample;
    
    private $imagickPixelIteratorExamples = array(
        'clear', // => 'resetIterator',
        'construct',
            //'getCurrentIteratorRow',
        //'getIteratorRow' => 'setIteratorRow',
        'getNextIteratorRow',
            //'getPreviousIteratorRow',
            //'newPixelIterator', deprecated
            //'newPixelRegionIterator', deprecated
        'resetIterator',
            //'setIteratorFirstRow',
            //'setIteratorLastRow',
        'setIteratorRow',
        'syncIterator',// => '__construct',
    );




    function renderPreviousButton() {
        $previous = getPrevious($this->imagickPixelIteratorExamples, $this->currentExample);

        if ($previous) {
            return "<a href='/ImagickPixelIterator/$previous'>
            <button type='button' class='btn btn-primary'>
             <span class='glyphicon glyphicon-arrow-left'></span> $previous
            </button>
            </a>";
        }

        return "";
    }

    function renderNextButton() {
        $next = getNext($this->imagickPixelIteratorExamples, $this->currentExample);

        if ($next) {
            echo "<a href='/ImagickPixelIterator/$next'>
            <button type='button' class='btn btn-primary'>
            $next <span class='glyphicon  glyphicon-arrow-right'></span>
            </button>
            </a>";
        }

        return "";
    }


    function renderImage($example, \Auryn\Provider $provider) {
        $classname = '\ImagickDemo\ImagickPixelIterator\\' . $example;
        //$provider->execute([$classname, 'renderImageSafe']);
        $provider->alias(\ImagickDemo\Example::class, $classname);
        $provider->execute([\ImagickDemo\ImageExampleCache::class, 'renderImageSafe']);
    }

    function display($example, \Auryn\Provider $provider) {
        $this->currentExample = $example;
        $classname = 'ImagickDemo\ImagickPixelIterator\\' . $example;
        $provider->alias(\ImagickDemo\Example::class, $classname);
        $provider->alias(\ImagickDemo\Navigation\ActiveNav::class, get_class($this));
        $provider->share($this);
    }

    function displayIndex(\Auryn\Provider $provider) {
        $provider->alias(\ImagickDemo\Navigation\ActiveNav::class, get_class($this));
        $provider->share($this);
    }


    function renderTitle() {
        if ($this->currentExample) {
            return $this->currentExample;
        }
        return 'ImagickPixelIterator';
    }


    function renderNav() {
        echo "<ul class='nav nav-sidebar smallPadding'>";

        foreach($this->imagickPixelIteratorExamples as $key => $ImagickPixelIteratorExample) {
            echo "<li>";
            echo "<a href='/ImagickPixelIterator/$ImagickPixelIteratorExample'>".$ImagickPixelIteratorExample."</a>";
            echo "</li>";
        }

        echo "</ul>";
    }

}

 