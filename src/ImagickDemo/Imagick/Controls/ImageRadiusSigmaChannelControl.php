<?php

declare(strict_types = 1);

namespace ImagickDemo\Imagick\Controls;


use ImagickDemo\Params\Channel;
use ImagickDemo\ToArray;
use DataType\Create\CreateFromVarMap;
use DataType\DataType;
use DataType\GetInputTypesFromAttributes;
use DataType\SafeAccess;

use ImagickDemo\Params\Image;
use ImagickDemo\Params\Radius;
use ImagickDemo\Params\Sigma;

class ImageRadiusSigmaChannelControl implements DataType
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use GetInputTypesFromAttributes;

    public function __construct(
        #[Radius(5, 'radius')]
        private string $radius,
        #[Sigma(4, 'sigma')]
        private string $sigma,
        #[Image('image_path')]
        private string $image_path,
        #[Channel('channel')]
        private string $channel
    ) {
    }

    public function getValuesForForm(): array
    {
        return [
            'radius' => $this->radius,
            'sigma' => $this->sigma,
            'image_path' => getOptionFromOptions($this->image_path, getImagePathOptions()),
            'channel' => getOptionFromOptions($this->channel, \getChannelOptions()),
        ];
    }
}