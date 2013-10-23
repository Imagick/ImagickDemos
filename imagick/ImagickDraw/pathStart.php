<?php

//Create a ImagickDraw object to draw into.
$draw = new ImagickDraw();

$darkColor = new \ImagickPixel('brown');
$lightColor = new \ImagickPixel('LightCoral');


$draw->setStrokeColor($darkColor);
$draw->setFillColor($lightColor);

$draw->setStrokeWidth(2);
$draw->setFontSize(72);


$draw->pathStart();
$draw->pathMoveToAbsolute(50, 50);
$draw->pathLineToAbsolute(100, 50);
$draw->pathLineToRelative(0, 50);
$draw->pathLineToHorizontalRelative(-50);
$draw->pathFinish();


$draw->pathStart();
$draw->pathMoveToAbsolute(50, 50);
$draw->pathMoveToRelative(300, 0);
$draw->pathLineToRelative(50, 0);
$draw->pathLineToVerticalRelative(50);
$draw->pathLineToHorizontalAbsolute(350);

$draw->pathclose();

$draw->pathFinish();



$draw->pathStart();
$draw->pathMoveToAbsolute(50, 300);
$draw->pathCurveToAbsolute(
     50, 300, 
     100, 200,    
     300, 300    
);

$draw->pathLineToVerticalAbsolute(350);

$draw->pathFinish();


//	 * @param float $x2 <p>
//	 * x coordinate of the second control point
//* </p>
//	 * @param float $y2 <p>
//	 * y coordinate of the first control point
//* </p>
//	 * @param float $x <p>
//	 * x coordinate of the curve end
//* </p>
//	 * @param float $y <p>
//	 * y coordinate of the curve end




//ImagickDraw.pathCurveToQuadraticBezierAbsolute
//ImagickDraw.pathCurveToQuadraticBezierRelative
//ImagickDraw.pathCurveToQuadraticBezierSmoothAbsolute
//ImagickDraw.pathCurveToQuadraticBezierSmoothRelative
//ImagickDraw.pathCurveToRelative
//ImagickDraw.pathCurveToSmoothAbsolute
//ImagickDraw.pathCurveToSmoothRelative
//
//






//


//ImagickDraw.pathLineToAbsolute
//ImagickDraw.pathLineToHorizontalRelative
//ImagickDraw.pathLineToRelative




//Create an image object which the draw commands can be rendered into
$imagick = new Imagick();
$imagick->newImage(500, 500, "SteelBlue2");
$imagick->setImageFormat("png");

//Render the draw commands in the ImagickDraw object 
//into the image.
$imagick->drawImage($draw);

//Send the image to the browser
header("Content-Type: image/png");
echo $imagick->getImageBlob();





 