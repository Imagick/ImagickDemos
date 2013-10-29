<?php

require_once "../functions.php";

$points = [
    [0.30, 0.10, 'red'],
    [0.10, 0.80, 'blue'],
    [0.70, 0.60, 'lime'],
    [0.80, 0.20, 'yellow'],
];


$imagick = createGradientImage(400, 400, $points, Imagick::SPARSECOLORMETHOD_BARYCENTRIC);

header("Content-Type: image/png");
echo $imagick->getImageBlob();


/*

Fill an image with color with the defined sparse color method.

Barycentric - Maps three colors onto a linear triangle of color. The colors outside this triangle continue as before. This method is useful for creating smooth gradients of color.

Bilinear - This method fits an equation to 4 points, over all three color channels to produce a uniform color gradient between the points, and beyond.

Shepards  - The "Shepards" method uses a ratio of the inverse squares of the distances to each of the given points to determine the color of the canvas at each point.

Voronoi - Maps each pixel in the image to the color of the closest point point provided. This basically divides the image into a set of polygonal 'cells' around each point.


http://www.imagemagick.org/Usage/canvas/#sparse-color



*/