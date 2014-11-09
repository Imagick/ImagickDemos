<?php

namespace ImagickDemo\Tutorial;

class compositeText extends \ImagickDemo\Example {

    function render() {
        return "";
    }

    function renderDescription() {

    }

    function renderImage() {


//Create a ImagickDraw object to draw into.
        $draw = new \ImagickDraw();

        $darkColor = new \ImagickPixel('brown');
        //http://www.imagemagick.org/Usage/compose/#compose_terms

        $draw->setStrokeColor($darkColor);
        $draw->setFillColor('white');

        $draw->setStrokeWidth(2);
        $draw->setFontSize(72);


        $draw->setStrokeOpacity(1);
        $draw->setStrokeColor($darkColor);


        $draw->setStrokeWidth(2);

        $draw->setFont("../fonts/CANDY.TTF");

        $draw->setFontSize(140);

        $draw->setFillColor('none');
        $draw->rectangle(0, 0, 1000, 300);


        $draw->setFillColor('white');

        $draw->annotation(50, 180, "Lorem Ipsum!");


        $imagick = new \Imagick(realpath("images/TestImage.jpg"));

//        $compositeModes = [
//
//            \Imagick::COMPOSITE_NO, \Imagick::COMPOSITE_ADD, \Imagick::COMPOSITE_ATOP, \Imagick::COMPOSITE_BLEND, \Imagick::COMPOSITE_BUMPMAP, \Imagick::COMPOSITE_CLEAR, \Imagick::COMPOSITE_COLORBURN, \Imagick::COMPOSITE_COLORDODGE, \Imagick::COMPOSITE_COLORIZE, \Imagick::COMPOSITE_COPYBLACK, \Imagick::COMPOSITE_COPYBLUE, \Imagick::COMPOSITE_COPY, \Imagick::COMPOSITE_COPYCYAN, \Imagick::COMPOSITE_COPYGREEN, \Imagick::COMPOSITE_COPYMAGENTA, \Imagick::COMPOSITE_COPYOPACITY, \Imagick::COMPOSITE_COPYRED, \Imagick::COMPOSITE_COPYYELLOW, \Imagick::COMPOSITE_DARKEN, \Imagick::COMPOSITE_DSTATOP, \Imagick::COMPOSITE_DST, \Imagick::COMPOSITE_DSTIN, \Imagick::COMPOSITE_DSTOUT, \Imagick::COMPOSITE_DSTOVER, \Imagick::COMPOSITE_DIFFERENCE, \Imagick::COMPOSITE_DISPLACE, \Imagick::COMPOSITE_DISSOLVE, \Imagick::COMPOSITE_EXCLUSION, \Imagick::COMPOSITE_HARDLIGHT, \Imagick::COMPOSITE_HUE, \Imagick::COMPOSITE_IN, \Imagick::COMPOSITE_LIGHTEN, \Imagick::COMPOSITE_LUMINIZE, \Imagick::COMPOSITE_MINUS, \Imagick::COMPOSITE_MODULATE, \Imagick::COMPOSITE_MULTIPLY, \Imagick::COMPOSITE_OUT, \Imagick::COMPOSITE_OVER, \Imagick::COMPOSITE_OVERLAY, \Imagick::COMPOSITE_PLUS, \Imagick::COMPOSITE_REPLACE, \Imagick::COMPOSITE_SATURATE, \Imagick::COMPOSITE_SCREEN, \Imagick::COMPOSITE_SOFTLIGHT, \Imagick::COMPOSITE_SRCATOP, \Imagick::COMPOSITE_SRC, \Imagick::COMPOSITE_SRCIN, \Imagick::COMPOSITE_SRCOUT, \Imagick::COMPOSITE_SRCOVER, \Imagick::COMPOSITE_SUBTRACT, \Imagick::COMPOSITE_THRESHOLD, \Imagick::COMPOSITE_XOR,
//
//        ];


        $draw->composite(\Imagick::COMPOSITE_MULTIPLY, -500, -200, 2000, 600, $imagick);


//Create an image object which the draw commands can be rendered into
        $imagick = new \Imagick();
        $imagick->newImage(1000, 300, "SteelBlue2");
        $imagick->setImageFormat("png");

//Render the draw commands in the ImagickDraw object 
//into the image.
        $imagick->drawImage($draw);

//Send the image to the browser
        header("Content-Type: image/png");
        echo $imagick->getImageBlob();


    }

}