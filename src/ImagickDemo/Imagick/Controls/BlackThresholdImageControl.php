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


class BlackThresholdImageControl implements InputParameterList
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use InputParameterListFromAttributes;

    public function __construct(
        #[Image()]
        private string $imagePath,
        #[ImagickColorParam('rgb(127, 127, 127)')]
        private string $threshold_color,
    ) {
    }

    public function getValuesForForm(): array
    {
        return [
            'threshold_color' => $this->threshold_color,
            'image_path' => getOptionFromOptions($this->imagePath, getImagePathOptions()),
        ];
    }
}