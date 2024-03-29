<?php

declare(strict_types = 1);

namespace ImagickDemo\Imagick\Controls;

use ImagickDemo\ToArray;
use DataType\Create\CreateFromVarMap;
use DataType\DataType;
use DataType\GetInputTypesFromAttributes;
use DataType\SafeAccess;
use ImagickDemo\Params\FirstTerm;
use ImagickDemo\Params\SecondTerm;
use ImagickDemo\Params\ThirdTerm;
use ImagickDemo\Params\FourthTerm;
use ImagickDemo\Params\FunctionType;

class FunctionImageControl implements DataType
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use GetInputTypesFromAttributes;

    public function __construct(
        #[FunctionType('function_type')]
        private string $function_type,
        #[FirstTerm(5, 'first_term')]
        private float $first_term,
        #[SecondTerm('0.5', 'second_term')]
        private ?float $second_term,
        #[ThirdTerm('0.5', 'third_term')]
        private ?float $third_term,
        #[FourthTerm('', 'fourth_term')]
        private ?float $fourth_term
    ) {
    }

    public function getValuesForForm(): array
    {
        return [
            'first_term' => $this->first_term,
            'second_term' => $this->second_term,
            'third_term' => $this->third_term,
            'fourth_term' => $this->fourth_term,
            'function_type' => getOptionFromOptions($this->function_type, getFunctionImageOptions()),
        ];
    }

    /**
     * @return string
     */
    public function getFunctionType(): string
    {
        return $this->function_type;
    }

    public function getFirstTerm(): float
    {
        return $this->first_term;
    }

    public function getSecondTerm(): ?float
    {
        return $this->second_term;
    }

    public function getThirdTerm(): ?float
    {
        return $this->third_term;
    }

    public function getFourthTerm(): ?float
    {
        return $this->fourth_term;
    }
}