<?php

declare(strict_types = 1);

namespace ImagickDemo\Imagick\Controls;

use ImagickDemo\ToArray;
use Params\Create\CreateFromVarMap;
use Params\InputParameterList;
use Params\InputParameterListFromAttributes;
use Params\SafeAccess;
use ImagickDemo\Params\Image;

use ImagickDemo\Params\Height;
use ImagickDemo\Params\Width;
use ImagickDemo\Params\StartX;
use ImagickDemo\Params\StartY;


class CropImageControl implements InputParameterList
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use InputParameterListFromAttributes;

    public function __construct(
        #[Width(250, 'width')]
        private string $width,
        #[Height(150, 'height')]
        private string $height,

        #[StartX(50, 'start_x')]
        private string $start_x,
        #[StartY(50, 'start_y')]
        private string $start_y,

        #[Image('image_path')]
        private string $image_path,

    ) {
    }

    public function getValuesForForm(): array
    {
        return [
            'width' => $this->width,
            'height' => $this->height,
            'start_x' => $this->start_x,
            'start_y' => $this->start_y,
            'image_path' => getOptionFromOptions($this->image_path, getImagePathOptions()),
        ];
    }
}