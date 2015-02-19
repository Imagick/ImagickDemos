<?php


namespace ImagickDemo\ControlElement;


class MorphologyType extends OptionKeyElement {

    protected function getDefault() {
        return \Imagick::MORPHOLOGY_EDGE;
    }

    protected function getVariableName() {
        return 'morphologyType';
    }

    protected function getDisplayName() {
        return "Morphology type";
    }

    function getOptions() {
        return [
            \Imagick::MORPHOLOGY_CONVOLVE => "Convolve",
            \Imagick::MORPHOLOGY_CORRELATE  => "Correlate",

            \Imagick::MORPHOLOGY_ERODE => "Erode",
            \Imagick::MORPHOLOGY_DILATE => "Dilate",
            \Imagick::MORPHOLOGY_ERODE_INTENSITY => "Erode intensity",
            \Imagick::MORPHOLOGY_DILATE_INTENSITY => "Dilate intensity",

            \Imagick::MORPHOLOGY_DISTANCE."Chebyshev" => "Distance - Chebyshev",
            \Imagick::MORPHOLOGY_DISTANCE."Manhattan" => "Distance - Manhattan",
            \Imagick::MORPHOLOGY_DISTANCE."Octagonal" => "Distance - Octagonal",
            \Imagick::MORPHOLOGY_DISTANCE."Euclidian" => "Distance - Euclidian",
            \Imagick::MORPHOLOGY_ITERATIVE => "Iterative",

            \Imagick::MORPHOLOGY_OPEN => "Open",
            \Imagick::MORPHOLOGY_CLOSE => "Close",
            \Imagick::MORPHOLOGY_OPEN_INTENSITY => "Open intensity",
            \Imagick::MORPHOLOGY_CLOSE_INTENSITY => "Close intensity",
            \Imagick::MORPHOLOGY_SMOOTH => "Smooth",

            \Imagick::MORPHOLOGY_EDGE_IN => "Edge in",
            \Imagick::MORPHOLOGY_EDGE_OUT => "Edge out",
            \Imagick::MORPHOLOGY_EDGE => "Edge",
            \Imagick::MORPHOLOGY_TOP_HAT => "Top hat",
            \Imagick::MORPHOLOGY_BOTTOM_HAT  => "Bottom hat",
            \Imagick::MORPHOLOGY_HIT_AND_MISS => "Hit and miss",
            \Imagick::MORPHOLOGY_THINNING => "Thinning",
            \Imagick::MORPHOLOGY_THICKEN."Standard"  => "Thicken",
            \Imagick::MORPHOLOGY_THICKEN."Convex" => "Thicken - convex hull",

//            \Imagick::MORPHOLOGY_VORONOI => "Voronoi",

        ];
    }

    function getMorphologyType() {
        return $this->getKey();
    }
}

 