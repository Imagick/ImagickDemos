<?php

declare(strict_types = 1);

namespace ImagickDemo\Tutorial\Controls;

use ImagickDemo\Params\Image;
use ImagickDemo\Params\VirtualPixel;
use ImagickDemo\ToArray;
use DataType\Create\CreateFromVarMap;
use DataType\DataType;
use DataType\GetInputTypesFromAttributes;
use DataType\SafeAccess;


class EdgeExtendControls implements InputParameterList
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use GetInputTypesFromAttributes;

    public function __construct(
        #[Image('image_path')]
        private string $image_path,
        #[VirtualPixel('virtual_pixel_type')]
        private string $virtualPixelType,
    ) {
    }

    public function getValuesForForm(): array
    {
        return [
            'image_path' => getOptionFromOptions($this->image_path, getImagePathOptions()),
            'virtual_pixel_type' => getOptionFromOptions($this->virtualPixelType, getVirtualPixelOptions()),
        ];
    }

    /**
     * @return string
     */
    public function getImagePath(): string
    {
        return $this->image_path;
    }

    /**
     * @return string
     */
    public function getVirtualPixelType(): string
    {
        return $this->virtualPixelType;
    }
}