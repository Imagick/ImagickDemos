<?php

declare(strict_types = 1);

namespace ImagickDemo\Imagick\Controls;


use ImagickDemo\ToArray;
use Params\Create\CreateFromVarMap;
use Params\InputParameterList;
use Params\InputParameterListFromAttributes;
use Params\SafeAccess;

use ImagickDemo\Params\Image;
use ImagickDemo\Params\RollX;
use ImagickDemo\Params\RollY;

class RollImageControl implements InputParameterList
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use InputParameterListFromAttributes;

    public function __construct(
        #[RollX('roll_x')]
        private string $roll_x,
        #[RollY('roll_y')]
        private string $roll_y,
        #[Image('image_path')]
        private string $image_path,
    ) {
    }

    public function getValuesForForm(): array
    {
        return [
            'roll_x' => $this->roll_x,
            'roll_y' => $this->roll_y,
            'image_path' => getOptionFromOptions($this->image_path, getImagePathOptions()),
        ];
    }
}