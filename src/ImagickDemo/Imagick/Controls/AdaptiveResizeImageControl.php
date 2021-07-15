<?php

declare(strict_types = 1);

namespace ImagickDemo\Imagick\Controls;

use ImagickDemo\ToArray;
use Params\Create\CreateFromVarMap;
use Params\InputParameterList;
use Params\InputParameterListFromAttributes;
use Params\SafeAccess;
use \ImagickDemo\Params\ResizeHeight;
use \ImagickDemo\Params\ResizeWidth;
use ImagickDemo\Params\BestFit;
use ImagickDemo\Params\Image;

class AdaptiveResizeImageControl implements InputParameterList
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use InputParameterListFromAttributes;

    public function __construct(
        #[ResizeWidth()]
        private string $width,
        #[ResizeHeight()]
        private string $height,
        #[Image()]
        private string $imagePath,
        #[BestFit()]
        private string $best_fit,
    ) {
    }

    public function getValuesForForm(): array
    {
        return [
            'width' => $this->width,
            'height' => $this->height,
            'image_path' => getOptionFromOptions($this->imagePath, getImagePathOptions()),
            'best_fit' => getOptionFromOptions($this->best_fit, getEnabledOptions()),
        ];
    }
}