<?php

namespace ImagickDemo\ImagickPixelIterator {

    class functions {
        static function load() {
        }
    }
}

namespace {



function clear($imagePath) {
    $imagick = new \Imagick(realpath($imagePath));

    $imageIterator = $imagick->getPixelRegionIterator(100, 100, 250, 200);

    foreach ($imageIterator as $row => $pixels) { /* Loop trough pixel rows */
        /** @var $pixel \ImagickPixel */
        foreach ($pixels as $column => $pixel) { /* Loop through the pixels in the row (columns) */
            if ($column % 2) {
                $pixel->setColor("rgba(0, 0, 0, 0)"); /* Paint every second pixel black*/
            }
        }
        $imageIterator->syncIterator(); /* Sync the iterator, this is important to do on each iteration */
    }

    $imageIterator->clear();

    header("Content-Type: image/jpg");
    echo $imagick;
}


function construct($imagePath) {
    $imagick = new \Imagick(realpath($imagePath));
    //$imageIterator = $imagick->getPixelIterator();

    $imageIterator = new \ImagickPixelIterator($imagick);

    foreach ($imageIterator as $row => $pixels) { /* Loop trough pixel rows */
        foreach ($pixels as $column => $pixel) { /* Loop through the pixels in the row (columns) */
            /** @var $pixel \ImagickPixel */
            if ($column % 2) {
                $pixel->setColor("rgba(0, 0, 0, 0)"); /* Paint every second pixel black*/
            }
        }
        $imageIterator->syncIterator(); /* Sync the iterator, this is important to do on each iteration */
    }

    header("Content-Type: image/jpg");
    echo $imagick;
}


function getNextIteratorRow($imagePath) {
    $imagick = new \Imagick(realpath($imagePath));
    $imageIterator = $imagick->getPixelIterator();

    $count = 0;
    while ($pixels = $imageIterator->getNextIteratorRow()) {
        if (($count % 3) == 0) {
            foreach ($pixels as $column => $pixel) { /* Loop through the pixels in the row (columns) */
                /** @var $pixel \ImagickPixel */
                if ($column % 2) {
                    $pixel->setColor("rgba(0, 0, 0, 0)"); /* Paint every second pixel black*/
                }
            }
            $imageIterator->syncIterator(); /* Sync the iterator, this is important to do on each iteration */
        }

        $count += 1;
    }

    header("Content-Type: image/jpg");
    echo $imagick;
}


function resetIterator($imagePath) {

    $imagick = new \Imagick(realpath($imagePath));

    $imageIterator = $imagick->getPixelIterator();

    foreach ($imageIterator as $row => $pixels) { /* Loop trough pixel rows */
        foreach ($pixels as $column => $pixel) { /* Loop through the pixels in the row (columns) */
            /** @var $pixel \ImagickPixel */
            if ($column % 2) {
                //$pixel->setColor("rgba(0, 0, 0, 0)"); /* Paint every second pixel black*/
                $pixel->setColorValue(\Imagick::COLOR_RED, 64); /* Make every second pixel a little blue*/
            }
        }
        $imageIterator->syncIterator(); /* Sync the iterator, this is important to do on each iteration */
    }

    $imageIterator->resetiterator();

    foreach ($imageIterator as $row => $pixels) { /* Loop trough pixel rows */
        foreach ($pixels as $column => $pixel) { /* Loop through the pixels in the row (columns) */
            /** @var $pixel \ImagickPixel */
            if ($column % 3) {
                $pixel->setColorValue(\Imagick::COLOR_BLUE, 64); /* Make every second pixel a little blue*/
                //$pixel->setColor("rgba(0, 0, 128, 0)"); /* Paint every second pixel black*/
            }
        }
        $imageIterator->syncIterator(); /* Sync the iterator, this is important to do on each iteration */
    }

    $imageIterator->clear();

    header("Content-Type: image/jpg");
    echo $imagick;
}

function setIteratorRow($imagePath) {
    $imagick = new \Imagick(realpath($imagePath));
    $imageIterator = $imagick->getPixelRegionIterator(200, 200, 200, 200);

    for ($x = 0; $x < 20; $x++) {
        $imageIterator->setIteratorRow(rand(0, 100));
        $pixels = $imageIterator->getCurrentIteratorRow();
        foreach ($pixels as $column => $pixel) { /* Loop through the pixels in the row (columns) */
            /** @var $pixel \ImagickPixel */
            $pixel->setColor("rgba(0, 0, 0, 0)"); /* Paint every second pixel black*/
        }

        $imageIterator->syncIterator(); /* Sync the iterator, this is important to do on each iteration */
    }

    header("Content-Type: image/jpg");
    echo $imagick;
}



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


function syncIteratorImage($imagePath) {

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