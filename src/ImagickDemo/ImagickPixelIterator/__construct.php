<?php


$imagick = new Imagick(realpath("../images/TestImage.jpg"));


$imageIterator = $imagick->getPixelIterator();

foreach ($imageIterator as $row => $pixels) { /* Loop trough pixel rows */
    foreach ($pixels as $column => $pixel) { /* Loop through the pixels in the row (columns) */
        if ($column % 2) {
            $pixel->setColor("rgba(0, 0, 0, 0)"); /* Paint every second pixel black*/
        }
    }
    $imageIterator->syncIterator(); /* Sync the iterator, this is important to do on each iteration */
}


header("Content-Type: image/jpg");
echo $imagick;
