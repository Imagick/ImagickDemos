<?php

declare(strict_types = 1);

namespace ImagickDemo\Imagick\Controls;


use ImagickDemo\ToArray;
use Params\Create\CreateFromVarMap;
use Params\InputParameterList;
use Params\InputParameterListFromAttributes;
use Params\SafeAccess;
use ImagickDemo\Params\Image;
use ImagickDemo\Params\StartX;
use ImagickDemo\Params\StartY;
use ImagickDemo\Params\Height;
use ImagickDemo\Params\Width;

//

class ChopImageControl implements InputParameterList
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use InputParameterListFromAttributes;

    public function __construct(
        #[Image()]
        private string $imagePath,
        #[StartX()]
        private string $start_x,
        #[StartY()]
        private string $start_y,
        #[Width(100)]
        private string $width,
        #[Height()]
        private string $height,
    ) {
    }

    public function getValuesForForm(): array
    {
        return [
            'image_path' => getOptionFromOptions($this->imagePath, getImagePathOptions()),
            'start_x' => $this->start_x,
            'start_y' => $this->start_y,
            'width' => $this->width,
            'height' => $this->height,
        ];
    }
}