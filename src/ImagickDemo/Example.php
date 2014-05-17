<?php


namespace ImagickDemo;


interface renderableExample {

    /**
     * @return \ImagickDemo\Control
     */
    function getControl();
}

abstract class Example implements renderableExample {

    function renderImageURL() {
        return $this->getControl()->getURL();
    }

    function renderTitle() {
        return getClassName(get_class($this));
    }
    
    abstract function renderImage();
    
    function renderImageSafe() {
        try {
            /** @noinspection PhpVoidFunctionResultUsedInspection */
            $this->renderImage();
        }
        catch(\Exception $e) {
            //tODO set a header
            $draw = new \ImagickDraw();

            $strokeColor = new \ImagickPixel('none');
            $lightColor = new \ImagickPixel('brown');

            $draw->setStrokeColor($strokeColor);
            $draw->setFillColor($lightColor);
            $draw->setStrokeWidth(1);
            $draw->setFontSize(24);
            $draw->setFont("../fonts/Arial.ttf");

            $draw->setTextAntialias(false);
            $draw->annotation(50, 75, $e->getMessage());

            $imagick = new \Imagick();
            $imagick->newImage(500, 250, "SteelBlue2");
            $imagick->setImageFormat("png");
            $imagick->drawImage($draw);

            header("Content-Type: image/png");
            echo $imagick->getImageBlob();
        }
    }
    
    function renderDescription() {
        return "";
    }
    
}

 