<?php

namespace ImagickDemo\Example;

class psychedelicFont extends \ImagickDemo\ExampleWithoutControl {

    function renderTitle() {
        return "";
    }

    function renderDescription() {
    }

    function renderImage() {
        $draw = new \ImagickDraw();
        $name = 'Danack';

        if (array_key_exists('name', $_REQUEST) == true) {
            $name = $_REQUEST['name'];
        }

        $draw->setStrokeOpacity(1);

        $draw->setFillColor('black');
        $draw->setFont("../fonts/CANDY.TTF");

        $draw->setfontsize(150);

        for ($strokeWidth = 25; $strokeWidth > 0; $strokeWidth--) {
            $hue = intval(170 + $strokeWidth * 360 / 25);
            $draw->setStrokeColor("hsl($hue, 255, 128)");
            $draw->setStrokeWidth($strokeWidth * 3);
            $draw->annotation(40, 150, $name);
        }

        //Create an image object which the draw commands can be rendered into
        $imagick = new \Imagick();
        $imagick->newImage(650, 230, "#eee");
        $imagick->setImageFormat("png");

//Render the draw commands in the ImagickDraw object
//into the image.
        $imagick->drawImage($draw);

//Send the image to the browser
        header("Content-Type: image/png");
        echo $imagick->getImageBlob();

    }
}