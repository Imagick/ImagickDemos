<?php
$imagick = new Imagick(realpath("../../images/Biter_500.jpg"));



//$imagick = new Imagick($image_path);
//$imagickGrey = clone $imagick;
//$imagickGrey->setimagetype(\Imagick::IMGTYPE_GRAYSCALE);
//
//$differenceInfo = $imagick->compareimages($imagickGrey, \Imagick::METRIC_MEANABSOLUTEERROR);
//
//if ($differenceInfo['mean'] <= 0.0000001) {
//    echo "Grey enough";
//}
//
//
//var_dump($result);

//$imagick->setColorspace(imagick::COLORSPACE_HSL);


//echo "Type is ".$imagick->getimagetype();


//$imagick->separateImageChannel(imagick::CHANNEL_GREEN);

//$imagick = @$imagick->flattenimages();



//var_dump($blah);

$info = $imagick->identifyImage(true);
$info = $imagick->getImageChannelStatistics();


foreach ($info as $key => $value) {
    
    if (is_array($value)) {
        echo "$key => ".print_r($value)." <br/>";
    }
    else {
        echo "$key => $value <br/>";
    }
}

//
//header("Content-Type: image/jpg");
//echo $imagick->getImageBlob();  