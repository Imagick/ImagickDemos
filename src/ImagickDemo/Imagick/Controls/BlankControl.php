<?php

declare(strict_types = 1);

namespace ImagickDemo\Imagick\Controls;

use ImagickDemo\ToArray;
use Params\Create\CreateFromVarMap;
use Params\InputParameterList;
use Params\InputParameterListFromAttributes;
use Params\SafeAccess;

class BlankControl implements InputParameterList
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use InputParameterListFromAttributes;

    public function __construct(
        #[()]
        private string $,
    ) {
    }

//    public function getValuesForForm(): array
//    {
//        return [
//            'image_path' => getOptionFromOptions($this->imagePath, getImagePathOptions()),
//        ];
//    }


}