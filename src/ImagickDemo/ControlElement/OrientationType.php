<?php


namespace ImagickDemo\ControlElement;




class OrientationType extends OptionKeyElement {
    protected function getDefault() {
        \Imagick::ORIENTATION_TOPLEFT;
    }

    protected function getVariableName() {
        return 'orientationType';
    }

    protected function getDisplayName() {
        return "Orientation type";
    }

    protected function getOptions() {
        return [
            \Imagick::ORIENTATION_TOPLEFT => "TopLeftOrientation",
            \Imagick::ORIENTATION_TOPRIGHT => "TopRightOrientation",
            \Imagick::ORIENTATION_BOTTOMRIGHT => "BottomRightOrientation",
            \Imagick::ORIENTATION_BOTTOMLEFT => "BottomLeftOrientation",
            \Imagick::ORIENTATION_LEFTTOP => "LeftTopOrientation",
            \Imagick::ORIENTATION_RIGHTTOP => "RightTopOrientation",
            \Imagick::ORIENTATION_RIGHTBOTTOM => "RightBottomOrientation",
            \Imagick::ORIENTATION_LEFTBOTTOM => "LeftBottomOrientation",
        ];
    }

    function getOrientationType() {
        return $this->getKey();
    }
}

 