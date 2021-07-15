<?php

declare(strict_types = 1);

namespace ImagickDemo\Imagick\Controls;

use ImagickDemo\Params\ImagickColorParam;
use ImagickDemo\ToArray;
use Params\Create\CreateFromVarMap;
use Params\InputParameterList;
use Params\InputParameterListFromAttributes;
use Params\SafeAccess;

use ImagickDemo\Params\Image;

class AnnotateImageControl implements InputParameterList
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use InputParameterListFromAttributes;

    public function __construct(
        #[Image()]
        private string $imagePath,
        #[ImagickColorParam('rgb(0, 0, 0)')]
        private string $stroke_color,
        #[ImagickColorParam('white')]
        private string $fill_color,
    ) {
    }

    public function getValuesForForm(): array
    {
        return [
            'stroke_color' => $this->stroke_color,
            'fill_color' => $this->fill_color,
            'image_path' => getOptionFromOptions($this->imagePath, getImagePathOptions()),
        ];
    }
}