<?php
//$imagick = new Imagick(realpath("../images/TestImage.jpg"));



$imagick = new Imagick(realpath("../images/fnord.png"));

$identifyInfo = $imagick->identifyimage();


foreach ($identifyInfo as $key => $value) {

    echo "$key :";

    if (is_array($value) == true) {
        var_dump($value);
    }
    else {
        echo $value;
    }

    echo "<br/>";
}

//var_dump($identifyInfo);

//header("Content-Type: image/jpg");
//echo $imagick->getImageBlob();