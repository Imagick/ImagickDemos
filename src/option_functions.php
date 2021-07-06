<?php

declare(strict_types = 1);


/**
 * @param string|int $value
 * @param array<string, int> $values
 * @return string
 */
function getOptionFromOptions(string|int $option, array $values): string
{
    foreach ($values as $key => $value) {
        if ($option === $value) {
            return $key;
        }
    }

    throw new \Exception("Unknown option [$option]");
}


/**
 * @return array<string, int>
 */
function getPaintTypeOptions(): array
{
    return [
        "Point" => \Imagick::PAINT_POINT,
        "Replace" => \Imagick::PAINT_REPLACE,
        "Floodfill"=> \Imagick::PAINT_FLOODFILL,
        "Fill to border" => \Imagick::PAINT_FILLTOBORDER,
        "Reset" => \Imagick::PAINT_RESET,
    ];
}

