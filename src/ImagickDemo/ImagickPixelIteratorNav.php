<?php


namespace ImagickDemo;


class ImagickPixelIteratorNav implements ActiveNav, DemoNav {

    private $currentExample;
    
    private $imagickPixelIteratorExamples = array(
        'clear' => 'resetIterator',
        '__construct',
            //'getCurrentIteratorRow',
        //'getIteratorRow' => 'setIteratorRow',
            //'getNextIteratorRow',
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

    }

    function renderNextButton() {
    }

    function renderImage($example, \Auryn\Provider $provider) {
        $classname = '\ImagickDemo\ImagickPixelIterator\\' . $example;
        $provider->execute([$classname, 'renderImageSafe']);
    }

    function display($example, \Auryn\Provider $provider) {
        $this->currentExample = $example;
        $classname = 'ImagickDemo\ImagickPixelIterator\\' . $example;
        $provider->alias('ImagickDemo\Example', $classname);
        $provider->alias('ImagickDemo\ActiveNav', get_class($this));
        $provider->share($this);
    }


    function displayIndex(\Auryn\Provider $provider) {
        $provider->alias('ImagickDemo\ActiveNav', get_class($this));
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

 