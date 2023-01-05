<?php

declare(strict_types = 1);

namespace ImagickDemo\Imagick\Controls;


use ImagickDemo\ToArray;
use DataType\Create\CreateFromVarMap;
use DataType\DataType;
use DataType\GetInputTypesFromAttributes;
use DataType\SafeAccess;

use \ImagickDemo\Params\ChannelNumber;
use ImagickDemo\Params\Image;
use ImagickDemo\Params\ColorSpace;

class TransformImageColorspaceControl implements DataType
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use GetInputTypesFromAttributes;

    public function __construct(
        #[ChannelNumber('channel_number')]
        private string $channel_number,
        #[ColorSpace('colorspace')]
        private string $colorspace,
        #[Image('image_path')]
        private string $image_path,
    ) {
    }

    public function getValuesForForm(): array
    {
        return [
            'channel_number' => getOptionFromOptions($this->channel_number, getChannelNumberOptions()),
            'colorspace' => getOptionFromOptions($this->colorspace, getColorSpaceOptions()),
            'image_path' => getOptionFromOptions($this->image_path, getImagePathOptions()),
        ];
    }
}