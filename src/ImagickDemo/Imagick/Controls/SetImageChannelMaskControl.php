<?php

declare(strict_types = 1);

namespace ImagickDemo\Imagick\Controls;


use ImagickDemo\Params\RotationAngle;
use ImagickDemo\ToArray;
use Params\Create\CreateFromVarMap;
use Params\InputParameterListFromAttributes;
use Params\SafeAccess;
use ImagickDemo\Params\ChannelWithDefault;
use ImagickDemo\Params\Image;
use ImagickDemo\Params\ChannelWithDefaultOrNone;


class SetImageChannelMaskControl
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use InputParameterListFromAttributes;

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