<?php


namespace ImagickDemo\Tutorial;


class edgeExtend extends \ImagickDemo\Example {

    function render() {
        $output = "Sometimes it is necessary to make an image fill a larger space than it currently occupies, without distoring the image. This can be accomplished by setting an appropriate virtualPixelMethod, and then resizing the image using the distortImage method, and the Imagick::DISTORTION_AFFINEPROJECTION constant.";
        
        $output .= "<br/>";
        $output .= $this->renderImageURL();

        return $output;
    }
    /**
     * @return \ImagickDemo\Control
     */
    function getControl() {
        return $this->control;
    }
}