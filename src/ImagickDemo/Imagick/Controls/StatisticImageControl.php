<?php

declare(strict_types = 1);

namespace ImagickDemo\Imagick\Controls;


use ImagickDemo\ToArray;
use Params\Create\CreateFromVarMap;
use Params\InputParameterListFromAttributes;
use Params\SafeAccess;

use ImagickDemo\Params\Channel;
use ImagickDemo\Params\Image;
use ImagickDemo\Params\Radius;
use ImagickDemo\Params\Width;
use ImagickDemo\Params\Height;
use ImagickDemo\Params\StatisticType;


class StatisticImageControl
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use InputParameterListFromAttributes;

    public function __construct(
        #[StatisticType('statistic_type')]
        private string $statistic_type,
        #[Width(10, 'width')]
        private string $width,
        #[Height(10, 'height')]
        private string $height,
        #[Image('image_path')]
        private string $image_path,
        #[Channel('channel')]
        private string $channel,
    ) {
    }

    public function getValuesForForm(): array
    {
        return [
            'width' => $this->width,
            'height' => $this->height,
            'statistic_type' => getOptionFromOptions($this->statistic_type, getStatisticTypeOptions()),
            'image_path' => getOptionFromOptions($this->image_path, getImagePathOptions()),
            'channel' => getOptionFromOptions($this->channel, getChannelOptions()),
        ];
    }
}