<?php

declare(strict_types = 1);

namespace ImagickDemo\Imagick\Controls;

use ImagickDemo\ToArray;
use DataType\Create\CreateFromVarMap;
use DataType\DataType;
use DataType\GetInputTypesFromAttributes;
use DataType\SafeAccess;
use ImagickDemo\Params\Channel;
use ImagickDemo\Params\Image;
use ImagickDemo\Params\NoiseType;
use ImagickDemo\Params\RangeFloat;

class AddNoiseImageWithAttenuateControl implements DataType
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use GetInputTypesFromAttributes;

    public function __construct(
        #[Image('image_path')]
        private string $image_path,
        #[RangeFloat(-100000000.0, 100000000, 1.0, 'attenuate')]
        private string $attenuate,
        #[NoiseType('noise_type')]
        private string $noise_type,
        #[Channel('channel')]
        private string $channel,
    ) {
    }

    public function getValuesForForm(): array
    {
        return [
            'noise_type' => getOptionFromOptions($this->noise_type, getNoiseOptions()),
            'attenuate' => $this->attenuate,
            'channel' => getOptionFromOptions($this->channel, getChannelOptions()),
            'image_path' => getOptionFromOptions($this->image_path, getImagePathOptions()),
        ];
    }
}