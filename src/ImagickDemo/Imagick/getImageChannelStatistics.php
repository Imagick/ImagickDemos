<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\ImageControl;

function dumpInfo(\Imagick $imagick)
{
    $channels = [
        \Imagick::CHANNEL_RED => 'Red',
        \Imagick::CHANNEL_GREEN => 'Green',
        \Imagick::CHANNEL_BLUE => 'Blue',
        \Imagick::CHANNEL_ALPHA => 'Alpha',
        \Imagick::CHANNEL_BLACK => 'Black/index',
    ];

    $identifyInfo = $imagick->getImageChannelStatistics();

    $output = '<table>';

    $headers = [
        'mean',
        'minima',
        'maxima',
        'standardDeviation',
        'depth'
    ];

    $output .= '<thead><th></th>';
    foreach ($headers as $header) {
        $output .= '<th>';
        $output .= $header;
        $output .= '</th>';
    }
    $output .= '</thead>';


    foreach ($identifyInfo as $key => $value) {
        $output .= '<tr>';
        $output .= '<td>';
        if (array_key_exists($key, $channels)) {
            $output .= $channels[$key];
        } else {
            $output .= $key;
        }
        $output .= '</td>';

        foreach ($headers as $header) {
            $output .= '<td>';
            if (array_key_exists($header, $value)) {
                $valueString = sprintf("%0.2f", $value[$header]);
                if (strlen($valueString) > 10) {
                    $valueString = sprintf("%0.2e", $value[$header]);
                }

                $output .= $valueString;
            } else {
                $output .= '-';
            }
            $output .= '</td>';
        }

        $output .= '</tr>';
    }

    $output .= '</table>';

    return $output;
}

class getImageChannelStatistics extends \ImagickDemo\Example
{
    private $imageControl;

    public function __construct(\ImagickDemo\Control\ImageControl $imageControl)
    {
        $this->imageControl = $imageControl;
    }

    public function renderImage()
    {
        $imagick = new \Imagick(realpath("images/fnord.png"));
        header("Content-Type: image/png");
        echo $imagick->getimageblob();
    }

    public function renderDescription()
    {
        $imagick = new \Imagick(realpath($this->imageControl->getImagePath()));

        return dumpInfo($imagick);
    }

    public function hasReactControls(): bool
    {
        return false;
    }

    public static function getParamType(): string
    {
        return ImageControl::class;
    }

}
