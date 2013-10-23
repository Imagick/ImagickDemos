<?php
$imagick = new Imagick(realpath("../images/TestImage.jpg"));

//http://www.imagemagick.org/script/fx.php

$fx = "(1.0/(1.0+exp(10.0*(0.5-u)))-0.006693)*1.0092503";

$imagick->fxImage($fx);


header("Content-Type: image/jpg");
echo $imagick->getImageBlob();