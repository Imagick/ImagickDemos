<?php

namespace ImagickDemo\ImagickPixel;


class getColorAsString extends \ImagickDemo\ExampleWithoutControl {

    function renderImageURL() {
        return "";
    }

    function renderDescription() {

        //Create an ImagickPixel with the predefined color 'brown'
        $color = new \ImagickPixel('brown');
        $color->setColorValue(\Imagick::COLOR_ALPHA, 64 / 256.0);
        $colorInfo = $color->getColorAsString();
        print_r($colorInfo);
    //Outputs

    //Note - currently it is not possible to get the alpha of the color through this method.


        /*

        <refsect1 role="examples">
          &reftitle.examples;
          <para>
           <example>
            <title>Basic <function>Imagick::getColorAsString</function> usage</title>
            <programlisting role="php">
        <![CDATA[
        <?php
        //Create an ImagickPixel with the predefined color 'brown'
        $color = new \ImagickPixel('brown');
        
        $color->setColorValue(\Imagick::COLOR_ALPHA, 64 / 256.0);
        
        $colorInfo = $color->getColorAsString();
        
        print_r($colorInfo);
        ?>
        ]]>
            </programlisting>
            &example.outputs;
            <screen>
        <![CDATA[
        rgb(165,42,42)
        ]]>
            </screen>
           </example>
          </para>
         </refsect1>
        
        
        
         */

    }

}