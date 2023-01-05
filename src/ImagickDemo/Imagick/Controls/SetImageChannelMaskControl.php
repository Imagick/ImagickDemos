<?php

declare(strict_types = 1);

namespace ImagickDemo\Imagick\Controls;


use DataType\DataType;
use ImagickDemo\Params\RotationAngle;
use ImagickDemo\ToArray;
use DataType\Create\CreateFromVarMap;
use DataType\GetInputTypesFromAttributes;
use DataType\SafeAccess;
use ImagickDemo\Params\ChannelWithDefault;
use ImagickDemo\Params\Image;
use ImagickDemo\Params\ChannelWithDefaultOrNone;


class SetImageChannelMaskControl implements DataType
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use GetInputTypesFromAttributes;

    public function __construct(
        #[RotationAngle('rotation_angle')]
        private string $rotation_angle,
        #[ChannelWithDefault('Red', 'channel')]
        private int $channel,

        #[ChannelWithDefaultOrNone('Skip', 'rotation_channel')]
        private int $rotation_channel,

        #[Image('image_path')]
        private string $image_path,
    ) {
    }

    public function getValuesForForm(): array
    {
        return [
            'rotation_angle' => $this->rotation_angle,
            'rotation_channel' => getOptionFromOptions($this->rotation_channel, getChannelOrNoneOptions()),
            'channel' => getOptionFromOptions($this->channel, getChannelOptions()),
            'image_path' => getOptionFromOptions($this->image_path, getImagePathOptions()),
        ];
    }

    public function getImagePath(): string
    {
        return $this->image_path;
    }
}