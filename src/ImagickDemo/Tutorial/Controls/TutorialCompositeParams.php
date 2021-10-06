<?php

declare(strict_types = 1);


declare(strict_types = 1);

namespace ImagickDemo\Tutorial\Controls;


use ImagickDemo\ToArray;
use Params\Create\CreateFromVarMap;
use Params\InputParameterList;
use Params\InputParameterListFromAttributes;
use Params\SafeAccess;

class TutorialCompositeParams implements InputParameterList
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use InputParameterListFromAttributes;

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