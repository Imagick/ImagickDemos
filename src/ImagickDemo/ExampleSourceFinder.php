<?php

declare(strict_types = 1);

namespace ImagickDemo;

class ExampleSourceFinder
{

    /**
     * @var \SplFileInfo[]
     */
    private $files;

    function __construct() {
        // TODO - scan all PHP files again.
//        $directory = new \RecursiveDirectoryIterator(__DIR__ . '/../../src');
//        $iterator = new \RecursiveIteratorIterator($directory);
//        $this->files = new \RegexIterator($iterator, '/^.+\.php$/i', \RecursiveRegexIterator::GET_MATCH);

        $this->files = [
            realpath(__DIR__ . "/../../src/ImagickDemo/Imagick/functions.php"),
            realpath(__DIR__ . "/../../src/ImagickDemo/ImagickDraw/functions.php"),
            realpath(__DIR__ . "/../../src/ImagickDemo/ImagickKernel/functions.php"),
            realpath(__DIR__ . "/../../src/ImagickDemo/ImagickPixel/functions.php"),
            realpath(__DIR__ . "/../../src/ImagickDemo/ImagickPixelIterator/functions.php"),
            realpath(__DIR__ . "/../../src/ImagickDemo/Tutorial/functions.php"),
            realpath(__DIR__ . "/../../src/ImagickDemo/Imagick/distortImage.php")
        ];
    }

    /**
     * @param string $category
     * @param string $example
     * @return CodeExample[]
     */
    public function findExamples(string $category, string $example)
    {
        $examples = [];

        foreach ($this->files as $filename) {
            // open the file
            $fileLines = file($filename);
            if (!$fileLines) {
                throw new \Exception("Failed to open [" . $filename . "]");
            }
            $exampleExtractor = new ExampleExtractor($fileLines, $category, $example);
            $found_examples = $exampleExtractor->getAllCodeExamples();
            array_push($examples, ...$found_examples);
        }

        return $examples;
    }
}