<?php


namespace ImagickDemo;


class ImagickPixelIteratorNav implements ActiveNav {

    private $imagickPixelIteratorExamples = array(
        'clear' => 'resetIterator',
        '__construct',
            //'getCurrentIteratorRow',
        'getIteratorRow' => 'setIteratorRow',
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


    function renderNav() {
 
        echo "<ul class='nav nav-sidebar smallPadding'>";

        foreach($this->imagickPixelIteratorExamples as $key => $ImagickPixelIteratorExample) {
            echo "<li>";
            if ($key === intval($key)){
                echo "<a href='?image=/ImagickPixelIterator/$ImagickPixelIteratorExample.php'>".$ImagickPixelIteratorExample."</a>";
            }
            else {
                echo "<a href='?image=/ImagickPixelIterator/$ImagickPixelIteratorExample.php'>".$key."</a>";
            }

            echo "</li>";
        }

        echo "</ul>";
                
    }

}

 