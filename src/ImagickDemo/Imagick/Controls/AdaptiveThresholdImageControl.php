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
        #[Width(50, 'width')]
        private string $width,
        #[Height(20, 'height')]
        private string $height,
        #[Image('image_path')]
        private string $image_path,
        #[AdaptiveOffset('adaptive_offset')]
        private string $adaptive_offset,
    ) {
    }

    public function getValuesForForm(): array
    {
        return [
            'width' => $this->width,
            'height' => $this->height,
            'offset' => $this->adaptive_offset,
            'image_path' => getOptionFromOptions($this->image_path, getImagePathOptions()),
        ];
    }
}