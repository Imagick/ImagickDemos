<?php

namespace ImagickDemo\Imagick;

class debugImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Debugging....";
    }

    public function renderDescription()
    {
        $output = "I r debugging.";
        $output .= "<br/>";

        return $output;
    }

    /**
     * @param string|null $activeCategory
     * @param string|null $activeExample
     * @return string
     */
    public function render(
        ?string $activeCategory,
        ?string $activeExample
    )
    {
        $output = sprintf("<img src='%s' />", $this->control->getCustomImageURL());

        return $output;
    }

    /**
     *
     */
    public function renderCustomImage()
    {
        //$function = $this->control->getFunctionType();

        $this->renderImage();
    }

    /**
     *
     *    const GRAVITY_NORTHWEST = 1;
     * const GRAVITY_NORTH = 2;
     * const GRAVITY_NORTHEAST = 3;
     * const GRAVITY_WEST = 4;
     * const GRAVITY_CENTER = 5;
     * const GRAVITY_EAST = 6;
     * const GRAVITY_SOUTHWEST = 7;
     * const GRAVITY_SOUTH = 8;
     * const GRAVITY_SOUTHEAST = 9;
     */
    public function renderImage()
    {
        $imagick = new \Imagick(realpath("../public/images/Biter_500.jpg"));
        $imagick->setGravity(\Imagick::GRAVITY_SOUTHEAST);
        $imagick->cropImage(400, 300, 0, 0);

        $imagick->setimageformat('png');

        header("Content-Type: image/png");
        echo $imagick->getImageBlob();
    }
}
