<?php

declare(strict_types = 1);

namespace ImagickDemo\Imagick\Controls;


use ImagickDemo\ToArray;
use Params\Create\CreateFromVarMap;
use Params\InputParameterList;
use Params\InputParameterListFromAttributes;
use Params\SafeAccess;

use \ImagickDemo\Params\ChannelNumber;
use ImagickDemo\Params\Image;
use ImagickDemo\Params\ColorSpace;

class TransformImageColorspaceControl implements InputParameterList
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use InputParameterListFromAttributes;

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