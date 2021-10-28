<?php

declare(strict_types = 1);

namespace ImagickDemo\Imagick\Controls;


use ImagickDemo\ToArray;
use Params\Create\CreateFromVarMap;
use Params\InputParameterListFromAttributes;
use Params\SafeAccess;

use ImagickDemo\Params\Channel;
use ImagickDemo\Params\Image;
use ImagickDemo\Params\Radius;
use ImagickDemo\Params\Strength;


class LocalContrastImageControl
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use InputParameterListFromAttributes;

    public function __construct(
        #[Radius(2, 'radius')]
        private string $radius,
        #[Strength('strength')]
        private string $strength,
        #[Channel('channel')]
        private string $channel,
        #[Image('image_path')]
        private string $image_path,
    ) {
    }

    public function getValuesForForm(): array
    {
        return [
            'radius' => $this->radius,
            'strength' => $this->strength,
            'channel' => getOptionFromOptions($this->channel, getChannelOptions()),
            'image_path' => getOptionFromOptions($this->image_path, getImagePathOptions()),
        ];
    }

    public function getRadius(): string
    {
        return $this->radius;
    }

    public function getSigma(): string
    {
        return $this->sigma;
    }

    public function getChannel(): string
    {
        return $this->channel;
    }

    public function getImagePath(): string
    {
        return $this->image_path;
    }
}