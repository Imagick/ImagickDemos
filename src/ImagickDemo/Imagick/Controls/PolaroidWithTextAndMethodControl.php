<?php

declare(strict_types = 1);

namespace ImagickDemo\Imagick\Controls;

use ImagickDemo\Params\ImagickColorParam;
use ImagickDemo\Params\UserText;
use ImagickDemo\ToArray;
use DataType\Create\CreateFromVarMap;
use DataType\DataType;
use DataType\GetInputTypesFromAttributes;
use DataType\SafeAccess;
use ImagickDemo\Params\Image;
use ImagickDemo\Params\Angle;
use ImagickDemo\Params\InterpolateType;

class PolaroidWithTextAndMethodControl implements DataType
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use GetInputTypesFromAttributes;

    public function __construct(
        #[UserText('text', 100, 'shamone')]
        private string $text,
        #[InterpolateType('interpolate_type')]
        private int $interpolate_type,
        #[Angle('angle')]
        private string $angle,
        #[Image('image_path')]
        private string $image_path,
        #[ImagickColorParam('rgb(0, 0, 0)', 'stroke_color')]
        private string $stroke_color,
        #[ImagickColorParam('white', 'fill_color')]
        private string $fill_color,
    ) {
    }

    public function getValuesForForm(): array
    {
        return [
            'text' => $this->text,
            'interpolate_type' => getOptionFromOptions($this->interpolate_type, getInterpolateOptions()),
            'angle' => $this->angle,
            'image_path' => getOptionFromOptions($this->image_path, getImagePathOptions()),
            'stroke_color' => $this->stroke_color,
            'fill_color' => $this->fill_color,
        ];
    }
}