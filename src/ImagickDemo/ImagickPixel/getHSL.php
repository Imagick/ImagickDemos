<?php


namespace ImagickDemo\ImagickPixel;


class getHSL extends \ImagickDemo\Example {

    function renderImageURL() {
//        return "<img src='/image/ImagickPixel/getHSL'/>";
    }
 
    function renderDescription() {

//Create an ImagickPixel color
        $color = new \ImagickPixel('rgb(90%, 10%, 10%)');

        $colorInfo = $color->getHSL();

        print_r($colorInfo);


        /*
        
        Array 
        ( 
            [hue] => 0 
            [saturation] => 0.80001220740379 
            [luminosity] => 0.50000762951095 
        )
        
        
        
        <refsect1 role="examples">
            &reftitle.examples;
            <para>
                <example>
                    <title>Basic <function>Imagick::getHSL</function> example</title>
                    <programlisting role="php">
                        <![CDATA[
        <?php
        //Create an ImagickPixel color
        $color = new \ImagickPixel('rgb(90%, 10%, 10%)');
        
        $colorInfo = $color->getHSL();
        
        print_r($colorInfo);
        ?>
                        ]]>
                    </programlisting>
                    &example.outputs;
                    <screen>
                        <![CDATA[
        Array
        (
            [hue] => 0
            [saturation] => 0.80001220740379
            [luminosity] => 0.50000762951095
        )
                        ]]>
                    </screen>
                </example>
            </para>
        </refsect1>
         
        
        
        */

    }

}