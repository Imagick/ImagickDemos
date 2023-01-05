<?php

declare(strict_types = 1);

namespace ImagickDemo\Imagick\Controls;


use ImagickDemo\Params\ImagickColorParam;
use ImagickDemo\ToArray;
use DataType\Create\CreateFromVarMap;
use DataType\DataType;
use DataType\GetInputTypesFromAttributes;
use DataType\SafeAccess;
use ImagickDemo\Params\Image;


class WhiteThresholdImageControl implements DataType
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use GetInputTypesFromAttributes;

    public function __construct(
        #[Image('image_path')]
        private string $image_path,
        #[ImagickColorParam('rgb(127, 127, 127)', 'threshold_color')]
        private string $threshold_color,
    ) {
    }

    public function getValuesForForm(): array
    {
        return [
            'threshold_color' => $this->threshold_color,
            'image_path' => getOptionFromOptions($this->image_path, getImagePathOptions()),
        ];
    }
}