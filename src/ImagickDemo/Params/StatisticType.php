<?php

namespace ImagickDemo\Params;

use Params\ExtractRule\GetIntOrDefault;
use Params\InputParameter;
use Params\Param;
use Params\ProcessRule\EnumMap;

#[\Attribute]
class StatisticType implements Param
{
    public function __construct(
        private string $name
    ) {
    }

    public function getInputParameter(): InputParameter
    {
        return new InputParameter(
            $this->name,
            new GetIntOrDefault(\Imagick::STATISTIC_GRADIENT),
            new EnumMap([
                \Imagick::STATISTIC_GRADIENT => "Gradient",
                \Imagick::STATISTIC_MAXIMUM => "Maximum",
                \Imagick::STATISTIC_MEAN => "Mean",
                \Imagick::STATISTIC_MEDIAN => "Median",
                \Imagick::STATISTIC_MINIMUM => "Minimum",
                \Imagick::STATISTIC_MODE => "Mode",
                \Imagick::STATISTIC_NONPEAK => "Non-peak",
                \Imagick::STATISTIC_STANDARD_DEVIATION => "Standard deviation",
            ])
        );
    }
}
