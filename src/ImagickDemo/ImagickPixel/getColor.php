<?php

namespace ImagickDemo\ImagickPixel;


class getColor extends \ImagickDemo\Example {


    
    function render() {
        echo "Create an ImagickPixel with the predefined color 'brown' and set the color to have an alpha of 25% <br/>";

//Example ImagickPixel::getColor
        $color = new \ImagickPixel('brown');
        $color->setColorValue(\Imagick::COLOR_ALPHA, 0.25);

        echo "<h4>Standard values</h4>".PHP_EOL;
        foreach($color->getColor() as $key => $value) {
            echo "$key : $value <br/>";
        }

        echo "<br/>";

        echo "<h4>Normalized values</h4>".PHP_EOL;
        foreach($color->getColor(true) as $key => $value) {
            echo "$key : $value <br/>";
        }
//Example end
    }
}
