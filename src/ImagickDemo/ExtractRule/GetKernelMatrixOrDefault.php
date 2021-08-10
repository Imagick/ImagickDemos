<?php

declare(strict_types=1);

namespace ImagickDemo\ExtractRule;

use Params\InputStorage\InputStorage;
use Params\OpenApi\ParamDescription;
use Params\ProcessedValues;
use Params\ProcessRule\FloatInput;
use Params\ValidationResult;

use Params\ExtractRule\ExtractRule;

class GetKernelMatrixOrDefault implements ExtractRule
{
    private ?array $default;

    /**
     * @param ?array $default
     */
    public function __construct(array $default)
    {
        foreach ($default as $row) {
            if(is_array($row) !== true) {
                throw new \Exception("KernelMatrix must be a 2d array of floats.");
            }

            foreach ($row as $value) {
                if (is_float($value) === false && is_int($value) === false) {
                    throw new \Exception("KernelMatrix must be a 2d array of floats.");
                }
            }
        }

        $this->default = $default;
    }

    public function process(
        ProcessedValues $processedValues,
        InputStorage $dataLocator
    ): ValidationResult {
        if ($dataLocator->isValueAvailable() !== true) {
            return ValidationResult::valueResult($this->default);
        }

        $floatRule = new FloatInput();
        $currentValue = $dataLocator->getCurrentValue();

        $value = json_decode($currentValue, $associative = true, 4);
        $lastError = json_last_error();
        if ($lastError !== JSON_ERROR_NONE) {
            return ValidationResult::errorResult($dataLocator, "Error parsing matrix" . json_last_error_msg());
        }

        var_dump($currentValue, $value);
        exit(0);

        if (is_array($value) !== true) {
            return ValidationResult::errorResult($dataLocator, "2d array expected but value is " . var_export($value));
        }

        $validationProblems = [];
        $row_count = 0;

        foreach ($currentValue as $row) {
            if(is_array($row) !== true) {
                return ValidationResult::errorResult($dataLocator, "Row $row_count - 2d array expected");
            }

            $column_count = 0;
            foreach ($row as $value) {



                if (is_float($value) === false && is_int($value) === false) {
                    $message = sprintf("Row %s column %s 2d array expected",
                        $row_count,
                        $column_count,
                    );

                    return ValidationResult::errorResult($dataLocator, $message);
                }

                $column_count += 1;
            }

            foreach ($row as $value) {
                echo "Processing: " . $value;
                $floatRuleResult = $floatRule->process(
                    $value,
                    $processedValues,
                    $dataLocator
                );

                if ($floatRuleResult->anyErrorsFound()) {
                    foreach ($floatRuleResult->getValidationProblems() as $validationProblem) {
                        $validationProblems[] = $validationProblem;
                    }
                }
            }

            $row_count += 1;
        }

        if (count($validationProblems) !== 0) {
            return ValidationResult::fromValidationProblems($validationProblems);
        }

        return ValidationResult::valueResult($currentValue);
    }

    public function updateParamDescription(ParamDescription $paramDescription): void
    {
        $paramDescription->setType(ParamDescription::TYPE_ARRAY);
        $paramDescription->setFormat('kernel_matrix');
//        $paramDescription->setDefault($this->default);
//        $paramDescription->setRequired(false);
    }
}
