<?php


namespace ImagickDemo\Tutorial;


class edgeExtend extends \ImagickDemo\Example {

    function renderDescription() {
        $output = "Sometimes it is necessary to make an image fill a larger space than it currently occupies, without distorting the image. This can be accomplished by setting an appropriate virtualPixelMethod, and then resizing the image using the distortImage method, and the Imagick::DISTORTION_AFFINEPROJECTION constant.";

        return $output;
    }
    
    function render() {
        return $this->renderImageURL();
    }
}