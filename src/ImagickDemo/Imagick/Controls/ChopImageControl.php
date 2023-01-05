<?php

declare(strict_types = 1);

namespace ImagickDemo\Imagick\Controls;


use ImagickDemo\ToArray;
use DataType\Create\CreateFromVarMap;
use DataType\DataType;
use DataType\GetInputTypesFromAttributes;
use DataType\SafeAccess;
use ImagickDemo\Params\Image;
use ImagickDemo\Params\StartX;
use ImagickDemo\Params\StartY;
use ImagickDemo\Params\Height;
use ImagickDemo\Params\Width;

//

class ChopImageControl implements DataType
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use GetInputTypesFromAttributes;

    public function __construct(
        #[Image('image_path')]
        private string $image_path,
        #[StartX(50, 'start_x')]
        private string $start_x,
        #[StartY(50, 'start_y')]
        private string $start_y,
        #[Width(100, 'width')]
        private string $width,
        #[Height(20, 'height')]
        private string $height,
    ) {
    }

    public function getValuesForForm(): array
    {
        return [
            'image_path' => getOptionFromOptions($this->image_path, getImagePathOptions()),
            'start_x' => $this->start_x,
            'start_y' => $this->start_y,
            'width' => $this->width,
            'height' => $this->height,
        ];
    }
}