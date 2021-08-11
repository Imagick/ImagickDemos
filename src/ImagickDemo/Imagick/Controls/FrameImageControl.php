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
use ImagickDemo\Params\Width;
use ImagickDemo\Params\Height;
use ImagickDemo\Params\InnerBevel;
use ImagickDemo\Params\OuterBevel;

class FrameImageControl implements InputParameterList
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use InputParameterListFromAttributes;

    public function __construct(
        #[Image('image_path')]
        private string $image_path,
        #[ImagickColorParam('rgb(127, 127, 127)', 'color')]
        private string $color,
        #[Height(5, 'height')]
        private int $height,
        #[Width(5, 'width')]
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
            'color' => $this->color,
            'height' => $this->height,
            'width' => $this->width,
            'inner_bevel' => $this->inner_bevel,
            'outer_bevel' => $this->outer_bevel,
            'image_path' => getOptionFromOptions($this->image_path, getImagePathOptions()),
        ];
    }
}