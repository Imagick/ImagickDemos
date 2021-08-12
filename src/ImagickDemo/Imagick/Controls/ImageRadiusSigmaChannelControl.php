<?php

declare(strict_types = 1);

namespace ImagickDemo\Imagick\Controls;


use ImagickDemo\Params\Channel;
use ImagickDemo\ToArray;
use Params\Create\CreateFromVarMap;
use Params\InputParameterList;
use Params\InputParameterListFromAttributes;
use Params\SafeAccess;

use ImagickDemo\Params\Image;
use ImagickDemo\Params\Radius;
use ImagickDemo\Params\Sigma;

class ImageRadiusSigmaChannelControl implements InputParameterList
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use InputParameterListFromAttributes;

    public function __construct(
        #[Radius('radius')]
        private string $radius,
        #[Sigma('sigma')]
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