<?php


namespace ImagickDemo\ImagickPixelIterator;


class clear extends \ImagickDemo\Imagick\ImagickExample {

    function renderDescription() {
        return "";
    }

    function renderImage() {
        $imagick = new \Imagick(realpath($this->imagePath));

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
}