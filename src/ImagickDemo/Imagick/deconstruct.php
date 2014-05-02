<?php

namespace ImagickDemo\Imagick;


class deconstruct extends \ImagickDemo\Example {

    function renderImageURL() {
        return "<img src='/image/Imagick/deconstruct'/>";
    }

    function renderDescription() {

        return "     Given a sequence of images all the same size, such as produced by - coalesce, replace the second and later images, with a smaller image of just the area that changed relative to the previous image .

        The resulting sequence of images can be used to optimize an animation sequence, though will not work correctly for GIF animations when parts of the animation can go from opaque to transparent .";
    }

    function renderImage() {

    }
}