<?php

declare(strict_types = 1);

namespace ImagickDemo\Imagick\Controls;


use DataType\DataType;
use ImagickDemo\ToArray;
use DataType\Create\CreateFromVarMap;
use DataType\GetInputTypesFromAttributes;
use DataType\SafeAccess;
use ImagickDemo\Params\MorphologyType;

class MorphologyControl implements DataType
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use GetInputTypesFromAttributes;

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