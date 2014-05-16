<?php

namespace ImagickDemo\ImagickPixel;


class getColorValue extends \ImagickDemo\ExampleWithoutControl {

    function renderImageURL() { 
    }
    
    function renderImage() {
    }
    
    function renderDescription() {
        $color = new \ImagickPixel('rgba(90%, 20%, 20%, 0.75)');

        echo "Alpha value is " . $color->getColorValue(\Imagick::COLOR_ALPHA) . "<br/>";
        echo ""  . "<br/>";
        echo "Red value is " . $color->getColorValue(\Imagick::COLOR_RED)  . "<br/>";
        echo "Green value is " . $color->getColorValue(\Imagick::COLOR_GREEN)  . "<br/>";
        echo "Blue value is " . $color->getColorValue(\Imagick::COLOR_BLUE)  . "<br/>";
        echo "" . "<br/>";
        echo "Cyan value is " . $color->getColorValue(\Imagick::COLOR_CYAN)  . "<br/>";
        echo "Magenta value is " . $color->getColorValue(\Imagick::COLOR_MAGENTA)  . "<br/>";
        echo "Yellow value is " . $color->getColorValue(\Imagick::COLOR_YELLOW)  . "<br/>";
        echo "Black value is " . $color->getColorValue(\Imagick::COLOR_BLACK)  . "<br/>";

        /*
        
        
        Alpha value is 0.74999618524453
        
        Red value is 0.90000762951095
        Green value is 0.2
        Blue value is 0.2
        
        Cyan value is 0.90000762951095
        Magenta value is 0.2
        Yellow value is 0.2
        Black value is 0
        
        
        
        <refsect1 role="examples">
          &reftitle.examples;
          <para>
           <example>
            <title>Basic <function>substr</function> usage</title>
            <programlisting role="php">
        <![CDATA[
        <?php
            
        $color = new \ImagickPixel('rgba(90%, 20%, 20%, 0.75)');
        
        echo "Alpha value is ".$color->getColorValue(\Imagick::COLOR_ALPHA).PHP_EOL;
        echo "".PHP_EOL;
        echo "Red value is ".$color->getColorValue(\Imagick::COLOR_RED).PHP_EOL;
        echo "Green value is ".$color->getColorValue(\Imagick::COLOR_GREEN).PHP_EOL;
        echo "Blue value is ".$color->getColorValue(\Imagick::COLOR_BLUE).PHP_EOL;
        echo "".PHP_EOL;
        echo "Cyan value is ".$color->getColorValue(\Imagick::COLOR_CYAN).PHP_EOL;
        echo "Magenta value is ".$color->getColorValue(\Imagick::COLOR_MAGENTA).PHP_EOL;
        echo "Yellow value is ".$color->getColorValue(\Imagick::COLOR_YELLOW).PHP_EOL;
        echo "Black value is ".$color->getColorValue(\Imagick::COLOR_BLACK).PHP_EOL;
        
        ?>
        ]]>
            </programlisting>
            &example.outputs;
            <screen>
        <![CDATA[
        Alpha value is 0.74999618524453
        
        Red value is 0.90000762951095
        Green value is 0.2
        Blue value is 0.2
        
        Cyan value is 0.90000762951095
        Magenta value is 0.2
        Yellow value is 0.2
        Black value is 0
        ]]>
            </screen>
           </example>
          </para>
         </refsect1>
        
        */

    }

}