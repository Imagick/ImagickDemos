<?php

namespace ImagickDemo\ImagickDraw;


class affine extends \ImagickDemo\Example {

    function getDescription() {
        $output = nl2br("Adjusts the current affine transformation matrix with the specified affine transformation matrix.
        
            sx - The amount to scale the drawing in the x direction.
            sy - The amount to scale the drawing in the y direction.
            rx - The amount to rotate the drawing for each unit in the x direction.
            ry - The amount to rotate the drawing for each unit in the y direction.
            tx - The amount to translate the drawing in the x direction.
            ty - The amount to translate the drawing in the y direction.");

        
        return $output;
    }

    function render() {
        $output = $this->getDescription();
        $output .= $this->renderImageURL();

        return $output;
    }
    

}


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