<?php

declare(strict_types = 1);

namespace ImagickDemo\ImagickKernel\Params;

use ImagickDemo\Params\ImagickColorParam;
use ImagickDemo\Params\Image;

use ImagickDemo\ToArray;
use Params\Create\CreateFromVarMap;
use Params\InputParameterList;
use Params\InputParameterListFromAttributes;
use Params\SafeAccess;

class ImageControl implements InputParameterList
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use InputParameterListFromAttributes;

    public function __construct(
        #[Image()]
        private string $imagePath
    ) {
    }

    public function getValuesForForm(): array
    {
        return [
            'paint_type' => getOptionFromOptions($this->imagePath, getImagePathOptions()),
        ];
    }
}