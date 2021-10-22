<?php

declare(strict_types = 1);

namespace ImagickDemo\Imagick\Controls;

use ImagickDemo\ToArray;
use Params\Create\CreateFromVarMap;
use Params\InputParameterList;
use Params\InputParameterListFromAttributes;
use Params\SafeAccess;
use ImagickDemo\Params\Image;
use ImagickDemo\Params\MagnifyType;

class MagnifyImageControl implements InputParameterList
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use InputParameterListFromAttributes;

    public function __construct(
        #[Image('image_path')]
        private string $image_path,
//        #[MagnifyType('magnify_type')]
//        private string $magnify_type,
    ) {
    }

    public function getValuesForForm(): array
    {
        return [
//            'magnify_type' => getOptionFromOptions($this->magnify_type, getMagnifyOptions()),
            'image_path' => getOptionFromOptions($this->image_path, getImagePathOptions()),
        ];
    }

    /**
     * @return string
     */
    public function getImagePath(): string
    {
        return $this->image_path;
    }
}