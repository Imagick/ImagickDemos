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
use ImagickDemo\Params\Gamma;

class GammaImageControl implements DataType
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use GetInputTypesFromAttributes;

    public function __construct(
        #[Gamma(2.2, 'gamma')]
        private string $gamma,
        #[Image('image_path')]
        private string $image_path,
        #[Channel('channel')]
        private string $channel
    ) {
    }

    public function getValuesForForm(): array
    {
        return [
            'gamma' => $this->gamma,
            'channel' => getOptionFromOptions($this->channel, \getChannelOptions()),
            'image_path' => getOptionFromOptions($this->image_path, getImagePathOptions()),
        ];
    }
}