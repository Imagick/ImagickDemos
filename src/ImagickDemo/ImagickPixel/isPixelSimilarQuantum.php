<?php

namespace ImagickDemo\ImagickPixel;

define('NL', '<br/>');
//These tests need a modern version of Imagick due to the https://github.com/mkoppanen/imagick/issues/10

class isPixelSimilarQuantum extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "is pixel similar";
    }

    public function renderDescription()
    {
        return "<p>A distance of '1' is the maximum distance in the color space e.g. from 0, 0, 0 to 255, 255, 255 in RGB color space.</p> <p>The only difference between ImagickPixel::isSimilar and ImagickPixel::isPixelSimilar is that isSimilar needs to be scaled by the quantum value.</p>";
    }

    public function render(
        ?string $activeCategory,
        ?string $activeExample
    )
    {

//Example ImagickPixel::isSimilar
        // The tests below are written with the maximum distance expressed as 255
        // so we need to scale them by the square root of 3 - the diagonal length
        // of a unit cube.
        $root3 = 1.732050807568877;
        $quantum = \Imagick::getQuantum();

        $tests = array(
            ['rgb(245, 0, 0)', 'rgb(255, 0, 0)', 9 / $root3, false,],
            ['rgb(245, 0, 0)', 'rgb(255, 0, 0)', 10 / $root3, true,],
            ['rgb(0, 0, 0)', 'rgb(7, 7, 0)', 9 / $root3, false,],
            ['rgb(0, 0, 0)', 'rgb(7, 7, 0)', 10 / $root3, true,],
            ['rgba(0, 0, 0, 1)', 'rgba(7, 7, 0, 1)', 9 / $root3, false,],
            ['rgba(0, 0, 0, 1)', 'rgba(7, 7, 0, 1)', 10 / $root3, true,],
            ['rgb(128, 128, 128)', 'rgb(128, 128, 120)', 7 / $root3, false,],
            ['rgb(128, 128, 128)', 'rgb(128, 128, 120)', 8 / $root3, true,],
            ['rgb(0, 0, 0)', 'rgb(255, 255, 255)', 254.9, false,],
            ['rgb(0, 0, 0)', 'rgb(255, 255, 255)', 255, true,],
            ['rgb(255, 0, 0)', 'rgb(0, 255, 255)', 254.9, false,],
            ['rgb(255, 0, 0)', 'rgb(0, 255, 255)', 255, true,],
            ['black', 'rgba(0, 0, 0)', 0.0, true],
            ['black', 'rgba(10, 0, 0, 1.0)', 10.0 / $root3, true],);

        $output = "<table width='100%' class='infoTable'><thead>
                <tr>
                <th>
                Color 1
                </th>
                <th>
                Color 2
                </th>
                <th>
                    Test distance * 255
                </th>
                <th>
                    Is within distance
                </th>
                </tr>
        </thead>";

        $output .= "<tbody>";

        foreach ($tests as $testInfo) {
            $color1 = $testInfo[0];
            $color2 = $testInfo[1];
            $distance = $testInfo[2];
            $expectation = $testInfo[3];
            $testDistance = ($distance / 255.0);

            $color1Pixel = new \ImagickPixel($color1);
            $color2Pixel = new \ImagickPixel($color2);

            $isSimilar = $color1Pixel->isPixelSimilarQuantum($color2Pixel, $quantum * $testDistance);

            if ($isSimilar !== $expectation) {
                echo "Test distance failed. Color [$color1] compared to color [$color2] is not within distance $testDistance FAILED." . NL;
            }

            $layout = "<tr>
                <td>%s</td>
                <td>%s</td>
                <td>%s</td>
                <td style='text-align: center;'>%s</td>
            </tr>";

            $output .= sprintf(
                $layout,
                $color1,
                $color2,
                $distance,
                $isSimilar ? 'yes' : 'no'
            );
        }

        $output .= "</tbody></table>";

        return $output;
//Example end
    }
}
