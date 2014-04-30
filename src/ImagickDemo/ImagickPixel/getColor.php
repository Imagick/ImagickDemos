<?php

namespace ImagickDemo\ImagickPixel;


class getColor extends \ImagickDemo\Example {

    function renderImageURL() {
//        return "<img src='/image/ImagickPixel/getColor'/>";
    }

//    function renderDescription() {
//        return "";
//    }

    function renderDescription() {

        echo "Create an ImagickPixel with the predefined color 'brown'<br/>";

        $color = new \ImagickPixel('brown');

        echo "Set the color to have an alpha of 25% <br/>";
        $color->setColorValue(\Imagick::COLOR_ALPHA, 64 / 256.0);

        $colorInfo = $color->getColor();

        echo "Standard values <br/>" . PHP_EOL;
        print_r($colorInfo);

        echo "<br/>";
        $colorInfo = $color->getColor(true);

        echo "Normalized values: <br/>" . PHP_EOL;
        print_r($colorInfo);


        /*
        
        <refsect1 role="examples">
          &reftitle.examples;
          <para>
           <example>
            <title>Basic <function>Imagick::getColor</function> usage</title>
            <programlisting role="php">
        <![CDATA[
        <?php
        
        //Create an ImagickPixel with the predefined color 'brown'
        $color = new \ImagickPixel('brown');
        
        //Set the color to have an alpha of 25% 
        $color->setColorValue(\Imagick::COLOR_ALPHA, 64 / 256.0);
        
        $colorInfo = $color->getColor();
        
        echo "Standard values".PHP_EOL;
        print_r($colorInfo);
        
        $colorInfo = $color->getColor(true);
        
        echo "Normalized values:".PHP_EOL;
        print_r($colorInfo);
        
        ?>
        ]]>
            </programlisting>
            &example.outputs;
            <screen>
            <![CDATA[
        Standard values
        Array
        (
            [r] => 165
            [g] => 42
            [b] => 42
            [a] => 0
        )
        Normalized values:
        Array
        (
            [r] => 0.64705882352941
            [g] => 0.16470588235294
            [b] => 0.16470588235294
            [a] => 0.25000381475547
        )
            ]]>
            </screen>
          </example>
          </para>
        </refsect1>
        
        */


    }

}
