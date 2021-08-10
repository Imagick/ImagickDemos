<?php

declare(strict_types = 1);

namespace ImagickDemo\Tutorial\Params;

use ImagickDemo\Params\ImagickColorParam;
use ImagickDemo\Params\Image;
use ImagickDemo\Params\VirtualPixel;
use ImagickDemo\ToArray;
use Params\Create\CreateFromVarMap;
use Params\InputParameterList;
use Params\InputParameterListFromAttributes;
use Params\SafeAccess;


class EdgeExtendControls implements InputParameterList
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use InputParameterListFromAttributes;

    public function __construct(
        #[Image()]
        private string $image_path,
        #[VirtualPixel()]
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
}