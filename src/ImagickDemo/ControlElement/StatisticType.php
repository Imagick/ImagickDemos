<?php


namespace ImagickDemo\ControlElement;




class StatisticType extends OptionKeyElement {
    protected function getDefault() {
        return \Imagick::STATISTIC_GRADIENT;
    }

    protected function getVariableName() {
        return 'statisticType';
    }

    protected function getDisplayName() {
        return 'Statistic type';
    }

    protected function getOptions() {
        return [
            \Imagick::STATISTIC_GRADIENT => "Gradient",
            \Imagick::STATISTIC_MAXIMUM => "Maximum",
            \Imagick::STATISTIC_MEAN => "Mean",
            \Imagick::STATISTIC_MEDIAN => "Median",
            \Imagick::STATISTIC_MINIMUM => "Minimum",
            \Imagick::STATISTIC_MODE => "Mode",
            \Imagick::STATISTIC_NONPEAK => "Non-peak",
            \Imagick::STATISTIC_STANDARD_DEVIATION => "Standard deviation",
        ];
    }

    function getStatisticType() {
        return $this->key;
    }
}