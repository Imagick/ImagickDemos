<?php

declare(strict_types = 1);

namespace ImagickDemo\Imagick\Controls;


use ImagickDemo\ToArray;
use Params\Create\CreateFromVarMap;
use Params\InputParameterListFromAttributes;
use Params\SafeAccess;
use ImagickDemo\Params\MorphologyType;

class MorphologyControl
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use InputParameterListFromAttributes;

    public function __construct(
        #[MorphologyType('morphology_type')]
        private string $morphology_type,
    ) {
    }

    public function getValuesForForm(): array
    {
        return [
            'morphology_type' => getOptionFromOptions($this->morphology_type, getMorphologyTypeOptions()),
        ];
    }

    /**
     * @return string
     */
    public function getMorphologyType(): string
    {
        return $this->morphology_type;
    }
}