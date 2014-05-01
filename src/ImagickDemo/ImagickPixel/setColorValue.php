<?php

namespace ImagickDemo\ImagickPixel;


class setColorValue extends \ImagickDemo\Example {

    function renderImageURL() {
        return "<img src='/image/ImagickPixel/setColorValue'/>";
    }

    function renderDescription() {
        return "";
    }

    function renderImage() {

        $image = new \Imagick();



        $draw = new \ImagickDraw();

    
        $color = new \ImagickPixel('blue');
        $color->setcolorValue(\Imagick::COLOR_RED, 128);


        //Set the stroke and fill colour and draw a rectangle
        $draw->setstrokewidth(1.0);
        $draw->setStrokeColor($color);
        $draw->setFillColor($color);
        $draw->rectangle(200, 200, 300, 300);

        //Create an image object which the draw commands can be rendered into
        $image->newImage(500, 500, "SteelBlue2");
        $image->setImageFormat("png");

        //Render the draw commands in the ImagickDraw object 
        //into the image.
        $image->drawImage($draw);

//Send the image to the browser
        header("Content-Type: image/png");
        echo $image->getImageBlob();

        /*
        
        <refsect1 role="examples">
          &reftitle.examples;
          <para>
           <example>
            <title>Basic <function>substr</function> usage</title>
            <programlisting role="php">
        <![CDATA[
        <?php
        
        $color  = new \ImagickPixel('firebrick');
        
        $color->setColorValue(\Imagick::COLOR_ALPHA, 0.5);
        
        print_r($color->getcolor(true));
        ?>
        ]]>
            </programlisting>
            &example.outputs;
            <screen>
        <![CDATA[
        Array
        (
            [r] => 0.69803921568627
            [g] => 0.13333333333333
            [b] => 0.13333333333333
            [a] => 0.50000762951095
        )
        ]]>
            </screen>
           </example>
          </para>
         </refsect1>
*/
    }
}

