<?php

define('DS', '/');


// Re-sizes images //
function resize($file_src) {
    try {
        // Set bigger time limit for bigger gifs //
        set_time_limit(180);
        // Original Image //
        $image = new Imagick($file_src);
        // Destination to save to //
        //$destination = dirname(__FILE__) . DS . 'images' . DS . basename($file_src);
        // Set the re-size values //
        $size_w = 250;
        $size_h = 250;
        // Separate the frames //
        $images = $image->coalesceImages();
        // Loop through each frame and resize //
        foreach ($images as $frame) {
            $frame->thumbnailImage($size_w, $size_h);
        }

        //$images = $images->deconstructImages();
        // Save the images to a single file //
        //$images->writeImages($destination, true);
        
        //TODO - send to the browser again
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

// Image in base dir //
//$image = 'original.gif';
$image = '../../smarties.gif';

// resize image and send to image dir //
resize($image);