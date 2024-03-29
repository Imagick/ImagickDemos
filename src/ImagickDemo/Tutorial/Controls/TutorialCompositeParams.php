<?php

declare(strict_types = 1);

namespace ImagickDemo\Tutorial\Controls;

use ImagickDemo\ToArray;
use DataType\Create\CreateFromVarMap;
use DataType\DataType;
use DataType\GetInputTypesFromAttributes;
use DataType\SafeAccess;

class TutorialCompositeParams implements DataType
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use GetInputTypesFromAttributes;

    public function __construct(
        #[\ImagickDemo\Params\TutorialComposite('composite_example')]
        private string $composite_example
    ) {
    }

    public function getValuesForForm(): array
    {
        return [
            'composite_example' => getOptionFromOptions($this->composite_example, getTutorialCompositeOptions()),
        ];
    }

    /**
     * @return string
     */
    public function getCompositeExample(): string
    {
        return $this->composite_example;
    }
}