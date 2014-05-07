<?php


namespace ImagickDemo;



class Example {

    protected $colors;

    /**
     * @var \ImagickDemo\Control Control
     */
    protected $control;

    function __construct(\ImagickDemo\Control\NullControl $control) {
        $this->control = $control;
    }

    function renderControl() {}
    
    function getURL() {}

    function getControl() {
        return $this->control;
    }

    function renderTitle() {
        return getClassName(get_class($this));
    }
    
    function renderImageURL() {
        return $this->control->getURL();
    }

    function renderImage() {
        echo "Hmm this should never be seen.";
        return "Image goes here?";
    }
    
    function renderImageSafe() {
        try {
            /** @noinspection PhpVoidFunctionResultUsedInspection */
            $this->renderImage();
        }
        catch(\Exception $e) {
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
        //return "Choose something mofo.";
        return "";
    }
    
}

 