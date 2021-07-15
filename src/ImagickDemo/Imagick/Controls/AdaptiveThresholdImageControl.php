<?php

declare(strict_types = 1);

namespace ImagickDemo\Imagick\Controls;

use ImagickDemo\ToArray;
use Params\Create\CreateFromVarMap;
use Params\InputParameterList;
use Params\InputParameterListFromAttributes;
use Params\SafeAccess;

use ImagickDemo\Params\Width;
use ImagickDemo\Params\Height;
use ImagickDemo\Params\Image;
use ImagickDemo\Params\AdaptiveOffset;

class AdaptiveThresholdImageControl implements InputParameterList
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use InputParameterListFromAttributes;

    public function __construct(
        #[Width()]
        private string $width,
        #[Height()]
        private string $height,
        #[Image()]
        private string $imagePath,
        #[AdaptiveOffset()]
        private string $adaptive_offset,
    ) {
    }

    public function getValuesForForm(): array
    {
        return [
            'width' => $this->width,
            'height' => $this->height,
            'offset' => $this->adaptive_offset,
            'image_path' => getOptionFromOptions($this->imagePath, getImagePathOptions()),
        ];
    }
}