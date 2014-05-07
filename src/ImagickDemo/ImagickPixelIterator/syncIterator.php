<?php


namespace ImagickDemo\ImagickPixelIterator;


class Pixel {

    public $r;
    public $g;
    public $b;

    function __construct($r, $g, $b) {
        $this->r = $r;
        $this->g = $g;
        $this->b = $b;
    }
}

class PixelStack {

    /**
     * @var Pixel[]
     */
    private $pixels = array();

    function getAverageRed() {
        $total = 0;
        $count = 0;

        foreach ($this->pixels as $pixel) {
            $total += $pixel->r;
            $count++;
        }

        return $total / $count;
    }

    function getAverageGreen() {
        $total = 0;
        $count = 0;

        foreach ($this->pixels as $pixel) {
            $total += $pixel->g;
            $count++;
        }

        return $total / $count;
    }

    function getAverageBlue() {
        $total = 0;
        $count = 0;

        foreach ($this->pixels as $pixel) {
            $total += $pixel->b;
            $count++;
        }

        return $total / $count;
    }

    function pushPixel($r, $g, $b) {
        $pixel = new Pixel($r, $g, $b);
        array_push($this->pixels, $pixel);

        if (count($this->pixels) > 20) {
            array_shift($this->pixels);
        }
    }
}


class syncIterator extends \ImagickDemo\ExampleWithoutControl {

    function renderDescription() {
        return "";
    }

    function renderImage() {


        $imagick = new \Imagick(realpath("../images/TestImage.jpg"));
        $count = 0;

        $imageIterator = $imagick->getPixelRegionIterator(125, 100, 275, 200);

        foreach ($imageIterator as $row => $pixels) { /* Loop trough pixel rows */

            $pixelStatck = new PixelStack();

            foreach ($pixels as $column => $pixel) { /* Loop through the pixels in the row (columns) */
                /** @var $pixel \ImagickPixel */
                $pixelStatck->pushPixel($pixel->getColorValue(\Imagick::COLOR_RED), $pixel->getColorValue(\Imagick::COLOR_GREEN), $pixel->getColorValue(\Imagick::COLOR_BLUE));

                $color = sprintf("rgb(%d, %d, %d)", intval($pixelStatck->getAverageRed() * 255), intval($pixelStatck->getAverageGreen() * 255), intval($pixelStatck->getAverageBlue() * 255));

                $pixel->setColor($color);
            }

            $imageIterator->syncIterator(); /* Sync the iterator, this is important to do on each iteration */
        }

        header("Content-Type: image/jpg");
        echo $imagick;
    }
}