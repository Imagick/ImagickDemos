<?php

declare(strict_types=1);

namespace ImagickDemo\ExampleFinder;

use ImagickDemo\CodeExample;

interface ExampleFinder
{
    /**
     * @param string $category
     * @param string $example
     * @return CodeExample[]
     */
    public function findExamples(string $category, string $example);
}