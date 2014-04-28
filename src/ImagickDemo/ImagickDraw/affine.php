<?php

namespace ImagickDemo\ImagickDraw;

class affine extends \ImagickDemo\Example {

    function renderImageURL() {
        return "<img src='/image/ImagickDraw/affine'/>";
    }

    function renderDescription() {
        return "Adjusts the current affine transformation matrix with the specified affine transformation matrix.
        
            sx - The amount to scale the drawing in the x direction.<br/>
            sy - The amount to scale the drawing in the y direction,<br/>
            rx - The amount to rotate the drawing for ,<br/>
            ry - 0,<br/>
            tx - The amount to translate the drawing in the x direction.<br/>
            ty - The amount to translate the drawing in the y direction.<br/>";
    }

    function renderImage() {

        //Create a ImagickDraw object to draw into.
        $draw = new \ImagickDraw();

        $draw->setStrokeWidth(1);

        $darkColor = new \ImagickPixel('black');
        $lightColor = new \ImagickPixel('LightCoral');

        $draw->setStrokeOpacity(1);
        $draw->setStrokeColor($darkColor);
        $draw->setFillColor($lightColor);

        $draw->setStrokeWidth(2);

        $PI = 3.141592653589794;
        $angle = 60 * $PI / 360;


        //Scale the drawing co-ordinates.
        $affineScale = array("sx" => 1.75, "sy" => 1.75, "rx" => 0, "ry" => 0, "tx" => 0, "ty" => 0);

        //Shear the drawing co-ordinates.
        $affineShear = array("sx" => 1, "sy" => 1, "rx" => sin($angle), "ry" => -sin($angle), "tx" => 0, "ty" => 0);

        //Rotate the drawing co-ordinates. The shear affine matrix
        //produces incorrectly scaled drawings.
        $affineRotate = array("sx" => cos($angle), "sy" => cos($angle), "rx" => sin($angle), "ry" => -sin($angle), "tx" => 0, "ty" => 0,);

        //Translate (offset) the drawing
        $affineTranslate = array("sx" => 1, "sy" => 1, "rx" => 0, "ry" => 0, "tx" => 30, "ty" => 30);

        //The identiy affine matrix
        $affineIdentity = array("sx" => 1, "sy" => 1, "rx" => 0, "ry" => 0, "tx" => 0, "ty" => 0);


        $examples = [$affineScale, $affineShear, $affineRotate, $affineTranslate, $affineIdentity,];

        $count = 0;

        foreach ($examples as $example) {
            $draw->push();
            $draw->translate(($count % 2) * 250, intval($count / 2) * 250);
            $draw->translate(100, 100);
            $draw->affine($example);
            $draw->rectangle(-50, -50, 50, 50);
            $draw->pop();
            $count++;
        }

        //Create an image object which the draw commands can be rendered into
        $image = new \Imagick();
        $image->newImage(500, 750, "SteelBlue2");
        $image->setImageFormat("png");

        //Render the draw commands in the ImagickDraw object 
        //into the image.
        $image->drawImage($draw);

        //Send the image to the browser
        header("Content-Type: image/png");
        echo $image->getImageBlob();


        /*
        
        Adjusts the current affine transformation matrix with the specified affine transformation matrix.
        
            sx - The amount to scale the drawing in the x direction.
            sy - The amount to scale the drawing in the y direction,
            rx - The amount to rotate the drawing for ,
            ry - 0,
            tx - The amount to translate the drawing in the x direction.
            ty - The amount to translate the drawing in the y direction.
        
        
        
        <refsect1 role="examples">
          &reftitle.examples;
          <para>
           <example>
            <title>Basic <function>substr</function> usage</title>
            <programlisting role="php">
        <![CDATA[
        <?php
        
        
        
        ]]>
            </screen>
           </example>
          </para>
         </refsect1>
        
        
        
        */

    }


}