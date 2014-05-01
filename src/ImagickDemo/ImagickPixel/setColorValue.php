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


        /*
        $color  = new \ImagickPixel('firebrick');
        
        $color->setColorValue(\Imagick::COLOR_ALPHA, 0.5);
        
        print_r($color->getcolor(true));
        
        
        ?>
        
        
        
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
        
        
        
        
        
        
        
        //icc-color(cmyk, 0.11, 0.48, 0.83, 0.00)
        
        //
        //$color->setColorValue(\Imagick::COLOR_RED, 256 / 256.0);
        //$color->setColorValue(\Imagick::COLOR_GREEN, 25 / 256.0);
        //$color->setColorValue(\Imagick::COLOR_BLUE, 0);
        //$color->setColorValue(\Imagick::COLOR_ALPHA, 128 / 256.0);
        //
        ////Set the stroke and fill colour and draw a rectangle
        //$draw->setstrokewidth(8.0);
        //$draw->setStrokeColor($color);
        //$draw->setFillColor($fillColor);
        //$draw->rectangle(200, 200, 300, 300);
        //
        ////FILLRULE_EVENODD", EvenOddRule);
        ////	IMAGICK_REGISTER_CONST_LONG("FILLRULE_NONZERO
        //
        ////Create an image object which the draw commands can be rendered into
        //$image = new \Imagick();
        //$image->newImage(500, 500, "white");
        //$image->setImageFormat("png");
        //
        ////Render the draw commands in the ImagickDraw object 
        ////into the image.
        //$image->drawImage($draw);
        //
        ////Send the image to the browser
        //header("Content-Type: image/png");
        //echo $image->getImageBlob();
        
        /*
        
        The above is produces the same image as running ImageMagick command:
        
        convert -size 500x500 xc:white -strokewidth 8.0 -stroke "rgba(100%, 25%, 0%, 0.5)" -fill "rgba(0%, 25%, 100%, 1.0)" -draw "rectangle 200,200, 300, 300" draw_rect.png
        
        convert -size 500x500 xc:red -fill "rgb(0, 255, 255)" -stroke black -strokewidth 8 \
            -draw "stroke-opacity 0.1       path 'M 0, 0 L 500, 500" \
            -draw "stroke-linecap butt      path 'M 40,20 L 40,70'" \
            crossTest.png
        
        
        convert -size 100x60 xc:skyblue -fill white -stroke black -strokewidth 8 \
                  -draw "                           path 'M 20,20 L 20,70'" \
                  -draw "stroke-linecap butt        path 'M 40,20 L 40,70'" \
                  -draw "stroke-linecap round       path 'M 60,20 L 60,70'" \
                  -draw "stroke-linecap square      path 'M 80,20 L 80,70'" \
                  set_endcaps.gif
        
        
        */

        $draw = new \ImagickDraw();
        $draw->setStrokeWidth(1);
        $draw->setStrokeColor("rgba(0, 0, 0, 0.1)");
//$draw->setStrokeOpacity(0.1);
        $draw->setFillColor("rgba(0, 0, 0, 0.1)");
        $draw->line(0, 0, 500, 500);
        $draw->line(500, 0, 0, 500);

        $drawing = new \Imagick();
        $drawing->newImage(500, 500, "red");
        $drawing->setImageFormat("png");
        $drawing->drawImage($draw);

        $drawing->setImageFormat("png");

        $written = $drawing->writeimage("/home/intahwebz/intahwebz/crossTestAgain.png");

//$image->writeImage('/home/intahwebz/intahwebz/arc.png');

        echo "written is :" . $written;

    }
}

