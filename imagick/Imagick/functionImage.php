<?php
$imagick = new Imagick();

//$imagick->newpseudoimage(100, 100, "black");

//$imagick->setBackgroundColor('yellow');
$imagick->newPseudoImage(500, 500, 'gradient:black-white');

try {
    
    $quanta = pow(2, 16);
    
    //$channel = Imagick::CHANNEL_RED | Imagick::CHANNEL_GREEN |Imagick::CHANNEL_BLUE;
    
//    if (false) {
    //convert -size 100x100 gradient: -function sinusoid 4,-90  gradient_bands.jpg
        $arguments = array(7 , -90);
        //$result = $imagick->functionImage(Imagick::FUNCTION_SINUSOID, $arguments);
//    }
//    else {
        //$arguments = array( -4.0 , 4.0, 0.5);
        //$arguments = array(3.5,-5.05,2.05,0.3);
//        $arguments = array(0.5, 1, 0);
//        $result = $imagick->functionImage(Imagick::FUNCTION_POLYNOMIAL, $arguments);

    $arguments = array(10);
    $result = $imagick->functionImage(Imagick::FUNCTION_ARCTAN, $arguments);
        
    //}
    
//    echo "Result is ".$result."<br/>";
//    echo "<br/>Fin.";
//    exit(0);

    $imagick->setimageformat('png');
    
    header("Content-Type: image/png");
    echo $imagick->getImageBlob();
    exit(0);
}
catch(\Exception $e) {
    var_dump($e);
}