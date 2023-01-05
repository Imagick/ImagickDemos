<?php

declare(strict_types = 1);

namespace ImagickDemo\Imagick\Controls;


use DataType\DataType;
use ImagickDemo\Params\Channel;
use ImagickDemo\ToArray;
use ImagickDemo\Params\Image;
use ImagickDemo\Params\RotationAngle;
use DataType\Create\CreateFromVarMap;
use DataType\GetInputTypesFromAttributes;
use DataType\SafeAccess;

class RotationalBlurImageControl  implements DataType
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use GetInputTypesFromAttributes;

    public function __construct(
        #[RotationAngle('rotation_angle')]
        private string $rotation_angle,
        #[Image('image_path')]
        private string $image_path,
        #[Channel('channel')]
        private string $channel,
    ) {
    }

    public function getValuesForForm(): array
    {
        return [
            'rotation_angle' => $this->rotation_angle,
            'image_path' => getOptionFromOptions($this->image_path, getImagePathOptions()),
            'channel' => getOptionFromOptions($this->channel, getChannelOptions()),
        ];
    }

    /**
     * @return string
     */
    public function getRotationAngle(): string
    {
        return $this->rotation_angle;
    }

    public function getImagePath(): string
    {
        return $this->image_path;
    }
}