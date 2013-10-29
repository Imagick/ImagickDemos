<?php
$imagick = new Imagick(realpath("../images/TestImage.jpg"));

//Need some stereo image to work with.
//$imagick->stereoImage(true, 45, 20);

header("Content-Type: image/jpg");
echo $imagick->getImageBlob();