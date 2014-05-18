<?php

namespace ImagickDemo\ImagickPixelIterator;


class resetIterator extends \ImagickDemo\Imagick\ImagickExample {

    function renderDescription() {
        return "Reset a pixel iterator so that you can iterate over it again.";
    }

    function renderImage() {


        $imagick = new \Imagick(realpath($this->getControl()->getImagePath()));

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
}