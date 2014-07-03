<?php


namespace ImagickDemo\ControlElement;




class FilterType extends OptionKeyElement {
    protected function getDefault() {
        return \Imagick::FILTER_LANCZOS;
    }

    protected function getVariableName() {
        return 'filterType';
    }

    protected function getDisplayName() {
        return "Filter type";
    }

    protected function getOptions() {
        return [
            \Imagick::FILTER_POINT => "Point",
            \Imagick::FILTER_BOX => "Box",
            \Imagick::FILTER_TRIANGLE => "Triangle",
            \Imagick::FILTER_HERMITE => "Hermite",
            \Imagick::FILTER_HANNING  => "Hanning",
            \Imagick::FILTER_HAMMING  => "Hamming",
            \Imagick::FILTER_BLACKMAN => "Blackman",
            \Imagick::FILTER_GAUSSIAN => "Gaussian",
            \Imagick::FILTER_QUADRATIC => "Quadratic",
            \Imagick::FILTER_CUBIC => "Cubic",
            \Imagick::FILTER_CATROM => "Catrom",
            \Imagick::FILTER_MITCHELL => "Mitchell",
            \Imagick::FILTER_LANCZOS => "Lanczos",
            \Imagick::FILTER_BESSEL => "Bessel/Jinc Filter",
            \Imagick::FILTER_SINC => "Sinc",
            \Imagick::FILTER_KAISER => "Kaiser ",
            \Imagick::FILTER_WELSH => "Welsh",
            \Imagick::FILTER_PARZEN => "Parzen",
            \Imagick::FILTER_LAGRANGE => "Lagrange",
            \Imagick::FILTER_BOHMAN => "Bohman",
            \Imagick::FILTER_BARTLETT => "Bartlett",
            \Imagick::FILTER_SINCFAST => "SincFast",
            \Imagick::FILTER_ROBIDOUX => "Robidoux",
            \Imagick::FILTER_LANCZOSSHARP => "LanczosSharp",
            \Imagick::FILTER_LANCZOS2 => "Lanczos2",
            \Imagick::FILTER_LANCZOS2SHARP => "Lanczos2Sharp",
            \Imagick::FILTER_ROBIDOUXSHARP => "RobidouxSharp",
            \Imagick::FILTER_COSINE => "Cosine",
            \Imagick::FILTER_SPLINE => "Spline",
            \Imagick::FILTER_LANCZOSRADIUS => "LanczosRadius",
        ];
    }

    function getFilterType() {
        return $this->getKey();
    }
}

 