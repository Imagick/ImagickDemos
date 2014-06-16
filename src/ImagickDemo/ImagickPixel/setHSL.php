<?php


namespace ImagickDemo\ImagickPixel;


class setHSL extends \ImagickDemo\Example {

    function render() {

        //Create an almost pure red color
        $color = new \ImagickPixel('rgb(90%, 10%, 10%)');

        //Get it's HSL values
        $colorInfo = $color->getHSL();

        //Rotate the hue by 180 degrees
        $newHue = $colorInfo['hue'] + 0.5;
        if ($newHue > 1) {
            $newHue = $newHue - 1;
        }

        //Set the ImagickPixel to the new color
        $color->setHSL($newHue, $colorInfo['saturation'], $colorInfo['luminosity']);

        //Check that the new color is blue/green
        $colorInfo = $color->getcolor();
        print_r($colorInfo);

        /*
        
        <refsect1 role="examples">
          &reftitle.examples;
          <para>
          
        <example>
            <title>Use <function>ImagickPixel::setHSL</function> to modify a color</title>
            <programlisting role="php">
                <![CDATA[
                <?php
                //Create an almost pure red color
                $color = new \ImagickPixel('rgb(90%, 10%, 10%)');
        
                //Get it's HSL values
                $colorInfo = $color->getHSL();
        
                //Rotate the hue by 180 degrees
                $newHue = $colorInfo['hue'] + 0.5;
                if ($newHue > 1) {
                    $newHue = $newHue - 1;
                }
        
                //Set the ImagickPixel to the new color
                $colorInfo = $color->setHSL($newHue, $colorInfo['saturation'], $colorInfo['luminosity']);
        
                //Check that the new color is 
                $colorInfo = $color->getcolor();
                print_r($colorInfo);
                ?>
                ]]>
            </programlisting>
            &example.outputs;
            <screen>
        <![CDATA[
        Array 
        ( 
            [r] => 26 
            [g] => 230 
            [b] => 230 
            [a] => 255 
        )
        ]]>
            </screen>
        </example>
        </para>
        </refsect1>
        
        */

    }
}