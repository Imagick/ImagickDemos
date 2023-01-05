<?php

declare(strict_types = 1);

namespace ImagickDemo\ImagickDraw\Controls;

use DataType\Create\CreateFromVarMap;
use DataType\DataType;
use DataType\InputType;
use DataType\ExtractRule\GetStringOrDefault;
use DataType\SafeAccess;
use VarMap\VarMap;
use ImagickDemo\ToArray;

//use ImagickDemo\ColorValidation;
use DataType\ProcessRule\ImagickIsRgbColor;

class AffineParams implements DataType
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;

    private string $background_color;
    private string $stroke_color;
    private string $fill_color;

    public function __construct(
        string $background_color,
        string $stroke_color,
        string $fill_color
    ) {
        $this->background_color = $background_color;
        $this->stroke_color = $stroke_color;
        $this->fill_color = $fill_color;
    }

    public function toArray()
    {
        $values =  [
            'background_color'  => $this->background_color,
            'stroke_color'      => $this->stroke_color,
            'fill_color'        => $this->fill_color,
        ];

        return $values;
    }

    public function getAllParams()
    {
        $params = [];
        foreach($this as $key => $value) {
            $params[$key] = $value;
        }

        return $params;
    }

    public static function getInputTypes(): array
    {
        return [
            new InputType(
                'background_color',
                new GetStringOrDefault('rgb(225, 225, 225)'),
                new ImagickIsRgbColor()
            ),
            new InputType(
                'stroke_color',
                new GetStringOrDefault('rgb(0, 0, 0)'),
                new ImagickIsRgbColor()
            ),
            new InputType(
                'fill_color',
                new GetStringOrDefault('DodgerBlue2'),
                new ImagickIsRgbColor()
            ),
        ];
    }

    /**
     * @return string
     */
    public function getBackgroundColor()
    {
        return $this->background_color;
    }

    /**
     * @return string
     */
    public function getStrokeColor()
    {
        return $this->stroke_color;
    }

    /**
     * @return string
     */
    public function getFillColor()
    {
        return $this->fill_color;
    }
}