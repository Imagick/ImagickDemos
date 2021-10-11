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
use ImagickDemo\Params\GrayOnly;

class NegateImageControl implements InputParameterList
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use InputParameterListFromAttributes;

    public function __construct(
        #[Image('image_path')]
        private string $image_path,
        #[Channel('channel')]
        private string $channel,
        #[GrayOnly('gray_only')]
        private string $gray_only,
    ) {
    }

    public function getValuesForForm(): array
    {
        return [
            'image_path' => getOptionFromOptions($this->image_path, getImagePathOptions()),
            'gray_only' => getOptionFromOptions($this->gray_only, getGrayOnlyOptions()),
            'channel' => getOptionFromOptions($this->channel, getChannelOptions()),
        ];
    }

//    /**
//     * @return string
//     */
//    public function getImagePath(): string
//    {
//        return $this->image_path;
//    }

}