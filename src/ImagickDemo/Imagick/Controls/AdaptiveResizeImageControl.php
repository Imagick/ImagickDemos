<?php

declare(strict_types = 1);

namespace ImagickDemo\Imagick\Controls;

use ImagickDemo\ToArray;
use DataType\Create\CreateFromVarMap;
use DataType\DataType;
use DataType\GetInputTypesFromAttributes;
use DataType\SafeAccess;
use \ImagickDemo\Params\ResizeHeight;
use \ImagickDemo\Params\ResizeWidth;
use ImagickDemo\Params\BestFit;
use ImagickDemo\Params\Image;

class AdaptiveResizeImageControl implements DataType
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use GetInputTypesFromAttributes;

    public function __construct(
        #[ResizeWidth('width')]
        private string $width,
        #[ResizeHeight('height')]
        private string $height,
        #[Image('image_path')]
        private string $image_path,
        #[BestFit('best_fit')]
        private string $best_fit,
    ) {
    }

    public function getValuesForForm(): array
    {
        return [
            'width' => $this->width,
            'height' => $this->height,
            'image_path' => getOptionFromOptions($this->image_path, getImagePathOptions()),
            'best_fit' => getOptionFromOptions($this->best_fit, getEnabledOptions()),
        ];
    }
}