<?php

declare(strict_types = 1);

namespace ImagickDemo\Imagick\Controls;


use ImagickDemo\ToArray;
use Params\Create\CreateFromVarMap;
use Params\InputParameterListFromAttributes;
use Params\SafeAccess;

use ImagickDemo\Params\CanvasType;
use ImagickDemo\Params\Image;
use ImagickDemo\Params\HaldClutType;

class HaldClutImageControl
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use InputParameterListFromAttributes;

    public function __construct(
        #[HaldClutType('hald_clut_type')]
        private string $hald_clut_type,
        #[Image('image_path')]
        private string $image_path,
    ) {
    }

    public function getValuesForForm(): array
    {
        return [
            'image_path' => getOptionFromOptions($this->image_path, getImagePathOptions()),
            'hald_clut_type' => getOptionFromOptions($this->hald_clut_type, getHaldClutOptions()),
        ];
    }

    public function getHaldClutType(): string
    {
        return $this->hald_clut_type;
    }

    public function getImagePath(): string
    {
        return $this->image_path;
    }
}