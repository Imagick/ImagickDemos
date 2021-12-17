<?php

declare(strict_types = 1);

namespace ImagickDemo\Tutorial\Controls;

use ImagickDemo\Params\UserText;

use ImagickDemo\ToArray;
use Params\Create\CreateFromVarMap;
use Params\InputParameterList;
use Params\InputParameterListFromAttributes;
use Params\SafeAccess;


class RetroControls implements InputParameterList
{
//    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use InputParameterListFromAttributes;

    public function __construct(
        #[UserText('first_line', 32, "First line")]
        private string $first_line,

        #[UserText('second_line', 32, "Second line")]
        private string $second_line,
    ) {
    }

    /**
     * @return string
     */
    public function getFirstLine(): string
    {
        return $this->first_line;
    }

    /**
     * @return string
     */
    public function getSecondLine(): string
    {
        return $this->second_line;
    }





//    public function getValuesForForm(): array
//    {
//        return [
//            'image_path' => getOptionFromOptions($this->image_path, getImagePathOptions()),
//            'virtual_pixel_type' => getOptionFromOptions($this->virtualPixelType, getVirtualPixelOptions()),
//        ];
//    }


}