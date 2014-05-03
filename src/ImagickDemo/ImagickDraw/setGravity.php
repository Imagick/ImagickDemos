<?php

namespace ImagickDemo\ImagickDraw;

class setGravity extends \ImagickDemo\Example {

    function renderImageURL() {
        return "<img src='/image/ImagickDraw/setGravity'/>";
    }

    function renderDescription() {
        return "";
    }

    function renderImage() {

        $draw = new \ImagickDraw();

        $darkColor = new \ImagickPixel('brown');
        $lightColor = new \ImagickPixel('LightCoral');

        $draw->setStrokeColor($darkColor);
        $draw->setFillColor($lightColor);

        $draw->setStrokeWidth(1);

        $draw->setFontSize(24);

        $gravitySettings = array(
            \Imagick::GRAVITY_NORTHWEST => 'NorthWest', 
            \Imagick::GRAVITY_NORTH => 'North', 
            \Imagick::GRAVITY_NORTHEAST => 'NorthEast', 
            \Imagick::GRAVITY_WEST => 'West', 
            \Imagick::GRAVITY_CENTER => 'Centre', 
            \Imagick::GRAVITY_SOUTHWEST => 'SouthWest', 
            \Imagick::GRAVITY_SOUTH => 'South', 
            \Imagick::GRAVITY_SOUTHEAST => 'SouthEast', 
            \Imagick::GRAVITY_EAST => 'East'
        );


        $draw->setFont("../fonts/Arial.ttf");

        foreach ($gravitySettings as $type => $description) {
            $draw->setGravity($type);
            $draw->annotation(50, 50, '"' . $description . '"');
        }


//Create an image object which the draw commands can be rendered into
        $imagick = new \Imagick();
        $imagick->newImage(500, 500, "SteelBlue2");
        $imagick->setImageFormat("png");

//Render the draw commands in the ImagickDraw object 
//into the image.
        $imagick->drawImage($draw);

//Send the image to the browser
        header("Content-Type: image/png");
        echo $imagick->getImageBlob();


    }

}


 