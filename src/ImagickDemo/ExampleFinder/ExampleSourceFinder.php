<?php

declare(strict_types = 1);

namespace ImagickDemo\ExampleFinder;

use ImagickDemo\CodeExample;
use ImagickDemo\ExampleExtractor;

class ExampleSourceFinder implements ExampleFinder
{
    /**
     * @var \SplFileInfo[]
     */
    private $directories;

    function __construct() {
        // TODO - scan all PHP files again.
        $directory = new \RecursiveDirectoryIterator(__DIR__ . '/../../../src');
        $iterator = new \RecursiveIteratorIterator($directory);
        $this->directories = new \RegexIterator(
            $iterator, '/^.+\.php$/i',
            \RecursiveRegexIterator::GET_MATCH
        );
    }

    /**
     * @param string $category
     * @param string $example
     * @return CodeExample[]
     */
    public function findExamples(string $category, string $example)
    {
        $examples = [];

        foreach ($this->directories as $directory) {
            foreach ($directory as $filename) {
                // open the file
                $fileLines = file($filename);
                if (!$fileLines) {
                    throw new \Exception("Failed to open [" . $filename . "]");
                }
                $exampleExtractor = new ExampleExtractor($fileLines, $category, $example);
                $found_examples = $exampleExtractor->getAllCodeExamples();
                array_push($examples, ...$found_examples);
            }
        }

        return $examples;
    }
}