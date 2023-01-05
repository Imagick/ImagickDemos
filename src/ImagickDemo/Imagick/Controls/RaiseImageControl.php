<?php

declare(strict_types = 1);

namespace ImagickDemo\Imagick\Controls;


use DataType\DataType;
use ImagickDemo\ToArray;
use DataType\Create\CreateFromVarMap;
use DataType\GetInputTypesFromAttributes;
use DataType\SafeAccess;
use ImagickDemo\Params\Image;
use ImagickDemo\Params\Width;
use ImagickDemo\Params\Height;
use ImagickDemo\Params\X;
use ImagickDemo\Params\Y;
use ImagickDemo\Params\Raise;



class RaiseImageControl implements DataType
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use GetInputTypesFromAttributes;

    public function __construct(
        #[Width(10, 'width')]
        private string $width,
        #[Height(10, 'height')]
        private string $height,
        #[X('x')]
        private string $x,
        #[Y('y')]
        private string $y,
        #[Raise('raise')]
        private string $raise,
        #[Image('image_path')]
        private string $image_path,
    ) {
    }

    public function getValuesForForm(): array
    {
        return [
            'width' => $this->width,
            'height' => $this->height,
            'x' => $this->x,
            'y' => $this->y,
            'raise' => getOptionFromOptions($this->raise, getRaiseOptions()),
            'image_path' => getOptionFromOptions($this->image_path, getImagePathOptions()),
        ];
    }

    public function getImagePath(): string
    {
        return $this->image_path;
    }
}