<?php

declare(strict_types = 1);

namespace ImagickDemo\Tutorial\Controls;

use ImagickDemo\Params\Image;
use DataType\Create\CreateFromVarMap;
use DataType\GetInputTypesFromAttributes;
use DataType\SafeAccess;
use ImagickDemo\ToArray;
use DataType\DataType;
use ImagickDemo\Params\SampleFactor;
use ImagickDemo\Params\EyeColorSpace;
use ImagickDemo\Params\Smaller;

class EyeColourResolutionParams implements DataType
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use GetInputTypesFromAttributes;

    public function __construct(
        #[Image('image_path')]
        private string $image_path,
        #[SampleFactor(1, 'channel_1_sample')]
        private string $channel_1_sample,
        #[SampleFactor(8, 'channel_2_sample')]
        private string $channel_2_sample,
        #[SampleFactor(4, 'channel_3_sample')]
        private string $channel_3_sample,
        #[EyeColorSpace('colorspace')]
        private string $colorspace,
        #[Smaller('smaller')]
        private string $smaller,
    ) {
    }

    public function getValuesForForm(): array
    {
        $values =  [
            'channel_1_sample' => $this->channel_1_sample,
            'channel_2_sample' => $this->channel_2_sample,
            'channel_3_sample' => $this->channel_3_sample,
            'colorspace' => getOptionFromOptions($this->colorspace, getEyeColourSpaceOptions()),
            'image_path' => getOptionFromOptions($this->image_path, getImagePathOptions()),
            'smaller' => getOptionFromOptions($this->smaller, getEnabledOptions()),
        ];

        return $values;
    }
}