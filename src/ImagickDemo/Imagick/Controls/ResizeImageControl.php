<?php

declare(strict_types = 1);

namespace ImagickDemo\Imagick\Controls;


use DataType\DataType;
use ImagickDemo\Params\BestFit;
use ImagickDemo\Params\Height;
use ImagickDemo\Params\Width;
use ImagickDemo\ToArray;
use DataType\Create\CreateFromVarMap;
use DataType\GetInputTypesFromAttributes;
use DataType\SafeAccess;

use ImagickDemo\Params\ImagickColorParam;
use ImagickDemo\Params\Image;
use ImagickDemo\Params\Crop;
use ImagickDemo\Params\FilterType;
use ImagickDemo\Params\ResizeBlur;

class ResizeImageControl implements DataType
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use GetInputTypesFromAttributes;

    public function __construct(
        #[Width(250, 'width')]
        private string $width,
        #[Height(150, 'height')]
        private string $height,
        #[ResizeBlur('blur')]
        private string $blur,
        #[BestFit('best_fit')]
        private string $best_fit,
        #[FilterType('filter_type')]
        private string $filter_type,
        #[Crop('crop')]
        private string $crop,
        #[Image('image_path')]
        private string $image_path,
    ) {
    }

    public function getValuesForForm(): array
    {
        return [
            'width' => $this->width,
            'height' => $this->height,
            'blur' => $this->blur,
            'filter_type' => getOptionFromOptions($this->filter_type, getFilterOptions()),
            'crop' => getOptionFromOptions($this->crop, getCropOptions()),
            'best_fit' => getOptionFromOptions($this->best_fit, getEnabledOptions()),
            'image_path' => getOptionFromOptions($this->image_path, getImagePathOptions()),
        ];
    }

    public function getImagePath(): string
    {
        return $this->image_path;
    }
}