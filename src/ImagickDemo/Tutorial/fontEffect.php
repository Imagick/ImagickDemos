<?php

namespace ImagickDemo\Tutorial;

//Example Tutorial::fontEffect Make some nice looking text
function drawText(\Imagick $imagick, $shadow = false)
{
    $draw = new \ImagickDraw();
    
    if ($shadow == true) {
        $draw->setStrokeColor('black');
        $draw->setStrokeWidth(8);
        $draw->setFillColor('black');
    }
    else {
        $draw->setStrokeColor('none');
        $draw->setStrokeWidth(1);
        $draw->setFillColor('lightblue');
    }

    $draw->setFontSize(96);
    $text = "Imagick\nExample";
    $draw->setFont("../fonts/CANDY.TTF");
    $draw->setGravity(\Imagick::GRAVITY_SOUTHWEST);
    $imagick->annotateimage($draw, 40, 40, 0, $text);

    if ($shadow == true) {
        $imagick->blurImage(10, 5);
    }
    
    return $imagick;
}

function getSilhouette(\Imagick $imagick)
{
    $character = new \Imagick();
    $character->newPseudoImage(
        $imagick->getImageWidth(),
        $imagick->getImageHeight(),
        "canvas:white"
    );
    $canvas = new \Imagick();
    $canvas->newPseudoImage(
        $imagick->getImageWidth(),
        $imagick->getImageHeight(),
        "canvas:black"
    );
    $character->compositeimage(
        $imagick,
        \Imagick::COMPOSITE_COPYOPACITY,
        0, 0
    );
    $canvas->compositeimage(
        $character,
        \Imagick::COMPOSITE_ATOP,
        0, 0
    );
    $canvas->setFormat('png');

    return $canvas;
}

function renderFontEffect()
{
    $canvas = new \Imagick();
    $canvas->newPseudoImage(
        500,
        300,
        "canvas:none"
    );

    $canvas->setImageFormat('png');
    $shadow = clone $canvas;

    $text = clone $canvas;
    drawText($text);
    drawText($shadow, true);

    $edge = getSilhouette($text);
    $kernel = \ImagickKernel::fromBuiltIn(\Imagick::KERNEL_OCTAGON, "2");
    $edge->morphology(\Imagick::MORPHOLOGY_EDGE_IN, 1, $kernel);
    $edge->compositeImage(
        $text,
        \Imagick::COMPOSITE_ATOP,
        0, 0
    );

    $canvas->compositeImage(
        $shadow,
        \Imagick::COMPOSITE_COPY,
        0, 0
    );

    $canvas->compositeImage(
        $text,
        \Imagick::COMPOSITE_ATOP,
        0, 0
    );

    header("Content-Type: image/png");
    echo $canvas->getImageBlob();
}
//Example end

class fontEffect extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Font effect";
    }

    public function renderDescription()
    {
        $output = "Font effects are cool.";

        return $output;
    }

    public function render(
        ?string $activeCategory,
        ?string $activeExample
    )
    {
        return "<img src='/customImage/$activeCategory/$activeExample'/>";
    }

    public function renderCustomImage()
    {
        renderFontEffect();
    }
}
