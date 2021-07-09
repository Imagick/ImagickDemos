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

    throw new \Exception("Unknown option [$option]" . json_encode($values));
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


/**
 * @return array<string, int>
 */
function getTextDecorationOptions(): array
{
    return [
        'None' => \Imagick::DECORATION_NO,
        'Underline' =>  \Imagick::DECORATION_UNDERLINE,
        'Overline' =>  \Imagick::DECORATION_OVERLINE,
        'Linethrough' => \Imagick::DECORATION_LINETROUGH
    ];
}

/**
 * @return array<string, string>
 */
function getImagePathOptions()
{
    $images = [
        'Skyline' => realpath(__DIR__ . "/../public/images/Skyline_400.jpg"),
        'Lorikeet' => realpath(__DIR__ . "/../public/images/Biter_500.jpg"),
        'People' => realpath(__DIR__ . "/../public/images/SydneyPeople_400.jpg"),
        'Low contrast' => realpath(__DIR__ . "/../public/images/LowContrast.jpg"),
    ];

    return $images;
}

/**
 * @return array<string, string>
 */
function getKernelRenderOptions()
{
    $images = [
        'image' => 'Image',
        'values' => 'Values',
    ];

    return $images;
}

