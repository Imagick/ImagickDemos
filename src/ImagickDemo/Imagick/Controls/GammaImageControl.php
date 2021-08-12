<?php

declare(strict_types = 1);

namespace ImagickDemo\Imagick\Controls;


use ImagickDemo\ToArray;
use Params\Create\CreateFromVarMap;
use Params\InputParameterList;
use Params\InputParameterListFromAttributes;
use Params\SafeAccess;

use ImagickDemo\Params\Channel;
use ImagickDemo\Params\Image;
use ImagickDemo\Params\Gamma;

class GammaImageControl implements InputParameterList
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use InputParameterListFromAttributes;

    public function __construct(
        #[Gamma('gamma')]
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