<?php

namespace ImagickDemo\ImagickDraw;

class setStrokeMiterLimit extends ImagickDrawExample {

    function renderDescription() {
        return "";
    }

    function renderImage() {

//Create a ImagickDraw object to draw into.
        $draw = new \ImagickDraw();

        $strokeColor = new \ImagickPixel($this->strokeColor);
        $fillColor = new \ImagickPixel($this->fillColor);

        $draw->setStrokeColor($strokeColor);
        $draw->setStrokeOpacity(0.6);

        $draw->setFillColor($fillColor);
        $draw->setStrokeWidth(10);

        $yOffset = 100;

        $draw->setStrokeLineJoin(\Imagick::LINEJOIN_MITER);

        for ($y = 0; $y < 3; $y++) {

            $draw->setStrokeMiterLimit(40 * $y);

            $points = [['x' => 22 * 3, 'y' => 15 * 4 + $y * $yOffset], ['x' => 20 * 3, 'y' => 20 * 4 + $y * $yOffset], ['x' => 70 * 5, 'y' => 45 * 4 + $y * $yOffset],];

            $draw->polygon($points);
        }


//Create an image object which the draw commands can be rendered into
        $image = new \Imagick();
        $image->newImage(500, 500, $this->backgroundColor);
        $image->setImageFormat("png");

//Render the draw commands in the ImagickDraw object 
//into the image.
        $image->drawImage($draw);


        $image->setImageType(\Imagick::IMGTYPE_PALETTE);

        $image->setImageCompressionQuality(100);
        $image->stripImage();

//Send the image to the browser
        header("Content-Type: image/png");
        echo $image->getImageBlob();
//echo "size is ".strlen($image->getImageBlob());


    }
}


 