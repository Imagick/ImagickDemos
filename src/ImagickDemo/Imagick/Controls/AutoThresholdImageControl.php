<?php

declare(strict_types = 1);

namespace ImagickDemo\Imagick\Controls;

use ImagickDemo\ToArray;
use Params\Create\CreateFromVarMap;
use Params\InputParameterListFromAttributes;
use Params\SafeAccess;
use ImagickDemo\Params\Image;
use ImagickDemo\Params\AutoThresholdMethod;

class AutoThresholdImageControl
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use InputParameterListFromAttributes;

    public function __construct(
        #[AutoThresholdMethod('auto_threshold_method')]
        private int $auto_threshold_method,
        #[Image('image_path')]
        private string $image_path,
    ) {
    }

    public function getValuesForForm(): array
    {
        return [
            'auto_threshold_method' => getOptionFromOptions($this->auto_threshold_method, getAutoThresholdOptions()),
            'image_path' => getOptionFromOptions($this->image_path, getImagePathOptions()),
        ];
    }

    public function getImagePath(): string
    {
        return $this->image_path;
    }
}