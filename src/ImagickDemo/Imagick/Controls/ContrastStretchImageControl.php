<?php

declare(strict_types = 1);

namespace ImagickDemo\Imagick\Controls;


use DataType\DataType;
use ImagickDemo\Params\Channel;
use ImagickDemo\Params\ComponentRangeFloat;
use ImagickDemo\Params\Threshold;
use ImagickDemo\ToArray;
use DataType\Create\CreateFromVarMap;
use DataType\GetInputTypesFromAttributes;
use DataType\SafeAccess;
use ImagickDemo\Params\Image;
use ImagickDemo\Params\Percent;

class ContrastStretchImageControl implements DataType
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use GetInputTypesFromAttributes;

    public function __construct(
        #[Percent(20, 'black_point')]
        private string $black_point,
        #[Percent(90, 'white_point')]
        private string $white_point,
        #[Channel('channel')]
        private string $channel,
        #[Image('image_path')]
        private string $image_path,
    ) {
    }

    public function getValuesForForm(): array
    {
        return [
            'black_point' => $this->black_point,
            'white_point' => $this->white_point,
            'channel' => getOptionFromOptions($this->channel, getChannelOptions()),
            'image_path' => getOptionFromOptions($this->image_path, getImagePathOptions()),
        ];
    }

    public function getChannel(): string
    {
        return $this->channel;
    }

    public function getImagePath(): string
    {
        return $this->image_path;
    }
}