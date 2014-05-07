<?php

namespace ImagickDemo\ImagickPixelIterator;


class setIteratorRow extends \ImagickDemo\ExampleWithoutControl {

    function renderDescription() {
        return "";
    }

    function renderImage() {

        $imagick = new \Imagick(realpath("../images/TestImage.jpg"));

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
}