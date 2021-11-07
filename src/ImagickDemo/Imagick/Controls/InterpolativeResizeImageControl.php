<?php

declare(strict_types = 1);

namespace ImagickDemo\Imagick\Controls;

use ImagickDemo\ToArray;
use Params\Create\CreateFromVarMap;
use Params\InputParameterListFromAttributes;
use Params\SafeAccess;
use ImagickDemo\Params\Image;
use ImagickDemo\Params\PositiveInt;
use ImagickDemo\Params\InterpolateType;

class InterpolativeResizeImageControl
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use InputParameterListFromAttributes;

    public function __construct(
        #[PositiveInt(600, 1000, 'columns')]
        private string $columns,
        #[PositiveInt(600, 1000, 'rows')]
        private string $rows,
        #[InterpolateType('interpolate_type')]
        private string $interpolate_type,
        #[Image('image_path')]
        private string $image_path,
    ) {
    }

    public function getValuesForForm(): array
    {
        return [
            'columns' => $this->columns,
            'rows' => $this->rows,
            'interpolate_type' => getOptionFromOptions($this->interpolate_type, getInterpolateOptions()),
            'image_path' => getOptionFromOptions($this->image_path, getImagePathOptions()),
        ];
    }

    public function getImagePath(): string
    {
        return $this->image_path;
    }
}