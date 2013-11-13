<?php




$imagick = new Imagick();

//echo "file size is ".filesize(realpath("../images/16212separata.eps"));


//$imagick->readimage(realpath("../images/separate.eps"));
$imagick->readimage(realpath("../images/16212separata.eps"));
//$imagick->trimimage(0);

//$imagick->stripimage();

$imagick->clipimage();


//$draw = new ImagickDraw(); // Create draw object
//
//$draw->pushClipPath('#wholeImage'); // Start clipping path
//$draw->rectangle(0, 0, $imagick->getImageWidth(), $imagick->getImageWidth());
//$draw->popClipPath();
//$draw->setClipPath('#wholeImage');
//

//$canvas->clipimagepath()


$imagick->setImageFormat("png");
$imagick->scaleImage(200,200);
//$img->writeimage($uploaddir . $thumb . ".jpg");


//header("Content-Type: image/jpg");
$imagick->writeImage('outputClip.png');
//echo $imagick->getImageBlob();