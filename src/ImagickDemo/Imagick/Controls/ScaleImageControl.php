<?php

declare(strict_types = 1);

namespace ImagickDemo\Imagick\Controls;


use DataType\DataType;
use ImagickDemo\ToArray;
use DataType\Create\CreateFromVarMap;
use DataType\GetInputTypesFromAttributes;
use DataType\SafeAccess;


use ImagickDemo\Params\Image;
use ImagickDemo\Params\ScaleHeight;
use ImagickDemo\Params\ScaleWidth;

class ScaleImageControl implements DataType
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use GetInputTypesFromAttributes;

    public function __construct(
        #[ScaleWidth(200, 'scale_width')]
        private string $scale_width,
        #[ScaleHeight(0, 'scale_height')]
        private string $scale_height,
        #[Image('image_path')]
        private string $image_path,
    ) {
    }

    public function getValuesForForm(): array
    {
        return [
            'scale_height' => $this->scale_height,
            'scale_width' => $this->scale_width,
            'image_path' => getOptionFromOptions($this->image_path, getImagePathOptions()),
        ];
    }
}