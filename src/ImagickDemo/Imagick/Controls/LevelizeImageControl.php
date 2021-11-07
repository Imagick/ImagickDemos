<?php

declare(strict_types = 1);

namespace ImagickDemo\Imagick\Controls;


use ImagickDemo\Params\Image;
use ImagickDemo\ToArray;
use Params\Create\CreateFromVarMap;
use Params\InputParameterList;
use Params\InputParameterListFromAttributes;
use Params\SafeAccess;
use ImagickDemo\Params\ComponentRangeFloat;
use ImagickDemo\Params\Gamma;

class LevelizeImageControl implements InputParameterList
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use InputParameterListFromAttributes;

    public function __construct(
        #[ComponentRangeFloat(30, 'black_point')]
        private string $black_point,
        #[ComponentRangeFloat(200, 'white_point')]
        private string $white_point,
        #[Gamma(1.0, 'gamma')]
        private string $gamma,
        #[Image('image_path')]
        private string $image_path,
    ) {
    }

    public function getValuesForForm(): array
    {
        return [
            'black_point' => $this->black_point,
            'white_point' => $this->white_point,
            'gamma' => $this->gamma,
            'image_path' => getOptionFromOptions($this->image_path, getImagePathOptions()),
        ];
    }
}