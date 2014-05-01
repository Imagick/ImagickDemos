<?php

namespace ImagickDemo\Example;

class psychdelicFontGif extends \ImagickDemo\Example {

    function renderImageURL() {
        return "<img src='/image/Example/psychdelicFontGif'/>";
    }

    function renderTitle() {
        return "";
    }

    function renderDescription() {

    }

    function renderImage() {


        set_time_limit(3000);

        $aniGif = new \Imagick();
        $aniGif->setFormat("gif");


        $maxFrames = 20;

        for ($frame = 0; $frame < $maxFrames; $frame++) {

            $draw = new \ImagickDraw();

            $darkColor = new \ImagickPixel('rgb(0, 0, 0)');
            $lightColor = new \ImagickPixel('white');

            $name = 'Danack';

            if (array_key_exists('name', $_REQUEST) == true) {
                $name = $_REQUEST['name'];
            }

            $draw->setStrokeOpacity(1);

            $draw->setFillColor('black');
            $draw->setFont("../fonts/CANDY.TTF");

            $draw->setfontsize(150);

            echo "Frame $frame \n";

            for ($strokeWidth = 25; $strokeWidth > 0; $strokeWidth--) {
                $hue = intval(fmod(($frame * 360 / $maxFrames) + 170 + $strokeWidth * 360 / 25, 360));
                $draw->setStrokeColor("hsl($hue, 255, 128)");
                $draw->setStrokeWidth($strokeWidth * 3);
                $draw->annotation(60, 165, $name);
            }

            //Create an image object which the draw commands can be rendered into
            $imagick = new \Imagick();
            $imagick->newImage(650, 230, "#eee");
            $imagick->setImageFormat("png");

            //Render the draw commands in the ImagickDraw object
            //into the image.
            $imagick->drawImage($draw);

            $imagick->setImageDelay(5);
            $aniGif->addImage($imagick);

            $imagick->destroy();
        }


        $aniGif->setImageIterations(0);


        $aniGif->deconstructImages();

//there more than one file, so must be using writeImages()
        $aniGif->writeImages("/home/intahwebz/intahwebz/basereality/imagick/Danack.gif", true);

//$aniGif->writeimagesfile();
        echo "done";

    }
}