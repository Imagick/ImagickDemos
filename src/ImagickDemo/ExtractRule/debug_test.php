<?php

declare(strict_types = 1);

use ImagickDemo\ExtractRule\GetKernelMatrixOrDefault;
use Params\InputStorage\ArrayInputStorage;
use Params\ProcessedValues;

require_once __DIR__ . "/../../../vendor/autoload.php";

$default = [
    [-1, -1, -1],
    [-1, 8, -1],
    [-1, -1, -1],
];

$obj = new GetKernelMatrixOrDefault($default);

$values = [
    [1, 2, 3],
    [4, 5, 6],
    [7, 8, 9],
];

$input = ['foo' => $values];

$dataLocator = ArrayInputStorage::fromArraySetFirstValue($input);

$processedValues = new ProcessedValues();

$validation_result = $obj->process($processedValues, $dataLocator);


if ( $validation_result->anyErrorsFound() === true) {
    echo "Errors\n";
    var_dump($validation_result->getValidationProblems());
}
else {
    echo "Success!\n";
    var_dump($validation_result->getValue());
}