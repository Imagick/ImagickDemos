<?php

namespace ImagickDemo;

class CodeExample
{
    public array $lines;

    public function __construct(
        public string $category,
        public string $function,
        array $lines,
        public ?string $description,
        public int $startLine
    ) {
        $this->lines = $lines;
        if (count($lines) === 0) {
            return;
        }

        $firstLine = $lines[0];
        $firstLineTrimmed = trim($firstLine);

        $offset = strpos($firstLine, $firstLineTrimmed, 0);
        if ($offset === false) {
            return;
        }

        $linesToUse = [];

        foreach ($lines as $line) {
            $linesToUse[] = substr($line, $offset);
        }
        $this->lines = $linesToUse;
    }
}
