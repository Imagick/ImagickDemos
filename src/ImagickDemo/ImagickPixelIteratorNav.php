<?php


namespace ImagickDemo;


class ImagickPixelIteratorNav {

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

    function render() {
        echo "<h2>ImagickPixelIteratorExample</h2>";
        foreach($this->imagickPixelIteratorExamples as $key => $ImagickPixelIteratorExample) {

            echo "<div>";
            
            if ($key === intval($key)){
            echo "<a href='?image=/ImagickPixelIterator/$ImagickPixelIteratorExample.php'>".$ImagickPixelIteratorExample."</a>";
            }
            else {
                echo "<a href='?image=/ImagickPixelIterator/$ImagickPixelIteratorExample.php'>".$key."</a>";
            }
            echo "</div>";

        }
                
    }

}

 