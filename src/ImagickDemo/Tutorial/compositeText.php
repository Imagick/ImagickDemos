<?php

namespace ImagickDemo\Tutorial;

class compositeText extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Composite text";
    }

    public function render()
    {
        return "";
    }

    public function renderDescription()
    {

    }

    public function renderImage()
    {
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
