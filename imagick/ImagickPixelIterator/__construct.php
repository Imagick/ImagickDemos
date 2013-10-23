<?php

try {


//    define('ROOT_3', 1.732050807568877);
    
/* Create new object with the image */
$im = new Imagick(realpath("TestImage.jpg"));
//$im = new Imagick(realpath("GreenScreen.jpg"));

$greenPixel = new ImagickPixel('rgb(0, 210, 0, 0.5)');



$im->orderedPosterizeImage("o8x8");// imagick::CHANNEL_GREEN);
    
/* Get iterator */
$imageIterator = $im->getPixelIterator();

    

foreach ($imageIterator as $row => $pixels) {      /* Loop trough pixel rows */
  //if ($row % 2) {/* For every second row */
      foreach ($pixels as $column => $pixel) {  /* Loop through the pixels in the row (columns) */
    //      if ($column % 2) {
          
          if ($greenPixel->issimilar($pixel, (80 / 255.0))) {
//             $pixel->setColor("rgba(0, 0, 0, 0)"); /* Paint every second pixel black*/
            }
      //    }
      }
  //}

  /* Sync the iterator, this is important to do on each iteration */
    $imageIterator->syncIterator();
}

/* Display the image */
header( "Content-Type: image/jpg" );
echo $im;
    
    
}

catch(\Exception $e) {
    echo "Exception: ".$e->getMessage();
}