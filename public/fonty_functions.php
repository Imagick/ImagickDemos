<?php

declare(strict_types = 1);

class WordDimensions
{
    public function __construct(
        public string $word,
        public float $width,
        public float $height
    ) {

    }
}


class Fonty
{
    private \ImagickDraw $draw;

    private array $words;

    public function __construct(
        public \Imagick $imagick,
        \ImagickDraw $draw,
        public string $text,
        public int $width,
        public int $height
    ) {
        $this->draw = clone $draw;

        $words_temp = explode(" ", $text);

        $this->words = [];
        foreach ($words_temp as $word_temp) {
            if (mb_strlen($word_temp) >= 0) {
                $this->words[] = $word_temp;
            }
        }
    }

    private function getInitialFontSize()
    {
        return 128;
    }

    /**
     * @return WordDimensions[]
     */
    private function getWordDimensions(): array
    {
        $word_dimensions = [];

        foreach ($this->words as $word) {

            $fontMetrics = $this->imagick->queryFontMetrics(
                $this->draw,
                $word,
                true
            );

            $word_dimensions[] = new WordDimensions(
                $word,
                $fontMetrics["textWidth"],
                $fontMetrics["textHeight"],
            );
        }

        return $word_dimensions;
    }

    private function getSpaceSize(): WordDimensions
    {
        $fontMetrics = $this->imagick->queryFontMetrics(
            $this->draw,
            " ",
            true
        );

        return new WordDimensions(
            " ",
            $fontMetrics["textWidth"],
            $fontMetrics["textHeight"],
        );

    }


    public function process()
    {

        $font_size = $this->getInitialFontSize();

        $space_size = $this->getSpaceSize();
        $word_dimensions = $this->getWordDimensions();

        $lines = [];

        $current_width = 0;

        $current_line = [];

        foreach ($word_dimensions as $word_dimension) {

            $next_width = $current_width + $space_size->width + $word_dimension->width;

            if ($next_width > $this->width) {
                $lines[] = $current_line;
                $current_line = [];
                $current_width = 0;
                echo "new line<br/>";
            }
            else {
                $current_line[] = $word_dimension;
                echo "fits<br/>";
            }
        }

        var_dump($lines);
        exit(0);

    }
}

function fit_text_inside_width(
    \ImagickDraw $draw,
    string $text,
    int $width,
    int $height
) : string {

    $imagick = new \Imagick();
    $imagick->newPseudoImage($width, $height, "canvas:black");



    // pick a font size
        // start adding words to lines until the line is too long
        //

    $fonty = new Fonty($imagick, $draw, $text, $width, $height);

    $fonty->process();

    exit(0);

    return $text;
}


//    ["characterWidth"]=> float(64)
//    ["characterHeight"]=> float(64)
//    ["ascender"]=> float(54)
//    ["descender"]=> float(-10)
//    ["textWidth"]=> float(3458)
//    ["textHeight"]=> float(64)
//    ["maxHorizontalAdvance"]=> float(75)
//    ["boundingBox"]=> array(4) {
//            ["x1"]=> float(1.96875)
//            ["y1"]=> float(-0.15625)
//            ["x2"]=> float(16.375)
//            ["y2"]=> float(14.328125)
//     }
//     ["originX"]=> float(3458)
//    ["originY"]=> float(0) }

