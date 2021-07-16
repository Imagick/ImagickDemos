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
use ImagickDemo\Params\Brightness;
use ImagickDemo\Params\Contrast;

class BrightnessContrastImageControl implements InputParameterList
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use InputParameterListFromAttributes;

    public function __construct(
        #[Image()]
        private string $imagePath,
        #[Brightness()]
        private string $brightness,
        #[Contrast(-20)]
        private string $contrast,
        #[Channel()]
        private string $channel,
    ) {
    }

    public function getValuesForForm(): array
    {
        return [
            'brightness' => $this->brightness,
            'contrast' => $this->contrast,
            'channel' => getOptionFromOptions($this->channel, getChannelOptions()),
            'image_path' => getOptionFromOptions($this->imagePath, getImagePathOptions()),
        ];
    }

}