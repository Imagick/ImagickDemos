<?php


namespace ImagickDemo;


class ImagickPixelNav {


    private $imagePixelExamples = array(
        '__construct',
            //'ImagickPixel.clear', 
        'getColor',// ([ bool $normalized = false ] )
        'getColorAsString',// ( void )
            //No idea    'ImagickPixel.getColorCount',// ( void )
        'getColorValue',// ( int $color )
        'getColorValueQuantum',// ( int $color )
        'getHSL',// ( void )
        'isSimilar',// ( ImagickPixel $color , float $fuzz )
        'setColor',// ( string $color )
        'setColorValue',// ( int $color , float $value )
        'setcolorValueQuantum',// ( int $color , float $value )
        'setHSL',// ( float $hue , float $saturation , float $luminosity )
    );
    
    function render() {
        echo "<h2>ImagePixel</h2>";
        foreach($this->imagePixelExamples as $imagePixelExample) {
            echo "<div>";
            echo "<a href='/ImagickPixel/$imagePixelExample.php'>".$imagePixelExample."</a>";
            echo "</div>";
        }
    }


}

 