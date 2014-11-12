<?php

namespace ImagickDemo\Imagick;

class queryFormats extends \ImagickDemo\Example {

    function getOriginalImage() {
        return $this->control->getURL().'&original=true';
    }
    
    function renderDescription() {
        $output = "";
        $input = \Imagick::queryformats();
        $columns = 6;

        echo "<table border='2' >";

        for ($i=0; $i < count($input); $i += $columns) {
            echo "<tr>";
            for ($c=0; $c<$columns; $c++) {
                echo "<td>";
                if (($i + $c) <  count($input)) {
                    echo $input[$i + $c];
                }
                echo "</td>";
            }
            echo "</tr>";
        }

        echo "</table>";

        return $output;
    }
    
    
    function render() {
        return "";
    }
}