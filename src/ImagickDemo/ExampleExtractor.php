<?php

declare(strict_types = 1);

namespace ImagickDemo;

class ExampleExtractor
{
    private int $current_line = 0;

    const EXAMPLE_END_PATTERN = "#\w*//Example end.*#";

    /**
     *
     * @param string[] $file_lines
     * @param int $current_line
     */
    public function __construct(
        /** @var string[]  */
        private array $file_lines,
        private string $category,
        private string $example)
    {
    }

    /**
     * @return CodeExample[]
     */
    public function getAllCodeExamples()
    {
        $foundExamples = [];

        while (($nextExample = $this->getNextExample()) !== null) {
            $foundExamples[] = $nextExample;
        }

        return $foundExamples;
    }

    public function getNextExample(): ?CodeExample
    {
        $description = null;
        $exampleStartLine = null;

        $exampleStartPattern = sprintf(
            "#\w*//Example %s::%s\s?(.*)?#",
            $this->category,
            $this->example
        );

        for ($i = $this->current_line; $i < count($this->file_lines); $i += 1) {
            $fileLine = $this->file_lines[$i];
            $matchCount = preg_match($exampleStartPattern, $fileLine, $matches);
            if ($matchCount === 1) {
                $exampleStartLine = $i;
                $description = $matches[1];
            }

            // We haven't found the start of an example yet, so can't
            // end it.
            if ($exampleStartLine === null) {
                continue;
            }

            $matchCount = preg_match(self::EXAMPLE_END_PATTERN, $fileLine, $matches);

            if ($matchCount === 1) {
                if ($exampleStartLine === null) {
                    $message = sprintf(
                        "An example ends on line %d, but there isn't a corresponding start from %d " . $exampleStartPattern,
                        $i,
                        $this->current_line
                    );
                    throw new \Exception($message);
                }

                $lines = [];
                for ($j = $exampleStartLine + 1; $j<$i; $j += 1) {
                    $lines[] = $this->file_lines[$j];
                }

                $codeExample = new CodeExample(
                    $this->category,
                    $this->example,
                    $lines,
                    $description,
                    $exampleStartLine
                );

                $this->current_line = $i + 1;

                return $codeExample;
            }
        }

        return null;
    }
}
