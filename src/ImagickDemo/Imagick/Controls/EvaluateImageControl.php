<?php

declare(strict_types = 1);

namespace ImagickDemo\Imagick\Controls;

use ImagickDemo\Params\ImagickColorParam;
use ImagickDemo\ToArray;
use Params\Create\CreateFromVarMap;
use Params\InputParameterList;
use Params\InputParameterListFromAttributes;
use Params\SafeAccess;

use ImagickDemo\Params\Channel;
use ImagickDemo\Params\Image;
use ImagickDemo\Params\Radius;
use ImagickDemo\Params\Sigma;
use ImagickDemo\Params\NoiseType;
use ImagickDemo\Params\EvaluateType;
use ImagickDemo\Params\FirstTerm;

class EvaluateImageControl implements InputParameterList
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use InputParameterListFromAttributes;

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