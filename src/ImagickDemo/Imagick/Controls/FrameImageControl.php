<?php

declare(strict_types = 1);

namespace ImagickDemo\Imagick\Controls;

use ImagickDemo\Params\ImagickColorParam;
use ImagickDemo\ToArray;
use DataType\Create\CreateFromVarMap;
use DataType\DataType;
use DataType\GetInputTypesFromAttributes;
use DataType\SafeAccess;
use ImagickDemo\Params\Image;
use ImagickDemo\Params\Width;
use ImagickDemo\Params\Height;
use ImagickDemo\Params\InnerBevel;
use ImagickDemo\Params\OuterBevel;

class FrameImageControl implements DataType
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use GetInputTypesFromAttributes;

    public function __construct(
        #[Image('image_path')]
        private string $image_path,
        #[ImagickColorParam('rgb(127, 127, 127)', 'frame_color')]
        private string $frame_color,
        #[ImagickColorParam('rgba(127, 0, 0, 0.2)', 'matte_color')]
        private string $matte_color,
        #[Height(10, 'height')]
        private int $height,
        #[Width(10, 'width')]
        private int $width,
        #[InnerBevel('inner_bevel')]
        private int $inner_bevel,
        #[OuterBevel('outer_bevel')]
        private int $outer_bevel
    ) {
    }

    public function getValuesForForm(): array
    {
        return [
            'frame_color' => $this->frame_color,
            'matte_color' => $this->matte_color,
            'height' => $this->height,
            'width' => $this->width,
            'inner_bevel' => $this->inner_bevel,
            'outer_bevel' => $this->outer_bevel,
            'image_path' => getOptionFromOptions($this->image_path, getImagePathOptions()),
        ];
    }
}