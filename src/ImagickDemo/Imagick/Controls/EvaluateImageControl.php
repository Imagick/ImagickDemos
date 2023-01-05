<?php

declare(strict_types = 1);

namespace ImagickDemo\Imagick\Controls;

use ImagickDemo\Params\ImagickColorParam;
use ImagickDemo\ToArray;
use DataType\Create\CreateFromVarMap;
use DataType\DataType;
use DataType\GetInputTypesFromAttributes;
use DataType\SafeAccess;

use ImagickDemo\Params\EvaluateType;
use ImagickDemo\Params\FirstTerm;

class EvaluateImageControl implements DataType
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use GetInputTypesFromAttributes;

    public function __construct(
        #[EvaluateType('evaluate_type')]
        private string $evaluate_type,
        #[FirstTerm(0.5, 'first_term')]
        private string $first_term,
        #[ImagickColorParam('rgb(0, 0, 0)', 'gradient_start_color')]
        private string $gradient_start_color,
        #[ImagickColorParam('rgb(225, 225, 225)', 'gradient_end_color')]
        private string $gradient_end_color,
    ) {
    }

    public function getValuesForForm(): array
    {
        return [
            'evaluate_type' => getOptionFromOptions($this->evaluate_type, getEvaluateOptions()),
            'first_term' => $this->first_term,
            'gradient_start_color' => $this->gradient_start_color,
            'gradient_end_color' => $this->gradient_end_color,
        ];
    }
}