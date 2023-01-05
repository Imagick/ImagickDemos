<?php

declare(strict_types = 1);

namespace ImagickDemo\Imagick\Controls;

use DataType\DataType;
use ImagickDemo\ToArray;
use DataType\Create\CreateFromVarMap;
use DataType\GetInputTypesFromAttributes;
use DataType\SafeAccess;
use ImagickDemo\Params\Height;
use ImagickDemo\Params\Width;
use ImagickDemo\Params\Image;
use \ImagickDemo\Params\Preshrink;

class SampleImageControl implements DataType
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use GetInputTypesFromAttributes;

    public function __construct(
        #[Width(500, 'width')]
        private string $width,
        #[Height(500, 'height')]
        private string $height,
        #[Preshrink('preshrink')]
        private string $preshrink,
        #[Image('image_path')]
        private string $image_path,
    ) {
    }

    public function getValuesForForm(): array
    {
        return [
            'width' => $this->width,
            'height' => $this->height,
            'preshrink' => getOptionFromOptions($this->preshrink, getPreshrinkOptions()),
            'image_path' => getOptionFromOptions($this->image_path, getImagePathOptions()),
        ];
    }


    public function getImagePath(): string
    {
        return $this->image_path;
    }
}