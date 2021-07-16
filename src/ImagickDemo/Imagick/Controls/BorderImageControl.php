<?php

declare(strict_types = 1);

namespace ImagickDemo\Imagick\Controls;

use ImagickDemo\Params\ImagickColorParam;
use ImagickDemo\ToArray;
use Params\Create\CreateFromVarMap;
use Params\InputParameterList;
use Params\InputParameterListFromAttributes;
use Params\SafeAccess;
use ImagickDemo\Params\Height;
use ImagickDemo\Params\Width;
use ImagickDemo\Params\BestFit;
use ImagickDemo\Params\Image;

class BorderImageControl implements InputParameterList
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use InputParameterListFromAttributes;

    public function __construct(
        #[Width(50)]
        private string $width,
        #[Height()]
        private string $height,
        #[Image()]
        private string $imagePath,
        #[ImagickColorParam('rgb(127, 127, 127)')]
        private string $color,
    ) {
    }

    public function getValuesForForm(): array
    {
        return [
            'width' => $this->width,
            'height' => $this->height,
            'image_path' => getOptionFromOptions($this->imagePath, getImagePathOptions()),
            'color' => $this->color,
        ];
    }
}