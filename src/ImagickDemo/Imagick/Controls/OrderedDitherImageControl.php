<?php

declare(strict_types = 1);

namespace ImagickDemo\Imagick\Controls;


use ImagickDemo\Params\NumberLevels;
use ImagickDemo\ToArray;
use DataType\Create\CreateFromVarMap;
use DataType\DataType;
use DataType\GetInputTypesFromAttributes;
use DataType\SafeAccess;

use ImagickDemo\Params\DitherFormat;
use ImagickDemo\Params\Image;

class OrderedDitherImageControl implements DataType
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use GetInputTypesFromAttributes;

    public function __construct(
        #[DitherFormat('dither_format')]
        private string $dither_format,
        #[Image('image_path')]
        private string $image_path,
    ) {
    }

    public function getValuesForForm(): array
    {
        return [
            'dither_format' => $this->dither_format,
            'image_path' => getOptionFromOptions($this->image_path, getImagePathOptions()),
        ];
    }
}