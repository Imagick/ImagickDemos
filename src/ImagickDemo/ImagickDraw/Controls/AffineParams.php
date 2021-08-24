<?php

declare(strict_types = 1);

namespace ImagickDemo\ImagickDraw\Controls;

use Params\Create\CreateFromRequest;
use Params\Create\CreateFromVarMap;
use Params\Create\CreateOrErrorFromVarMap;
use Params\InputParameter;
use Params\ExtractRule\GetStringOrDefault;
use Params\SafeAccess;
use VarMap\VarMap;
use ImagickDemo\ToArray;
use Params\InputParameterList;
use ImagickDemo\ColorValidation;

class AffineParams implements InputParameterList
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

    /**
     * @param VarMap $variableMap
     * @return \Params\InputParameter[]
     */
    public static function getInputParameterList(): array
    {
        return [
            new InputParameter(
                'background_color',
                new GetStringOrDefault('rgb(225, 225, 225)'),
                new ColorValidation()
            ),
            new InputParameter(
                'stroke_color',
                new GetStringOrDefault('rgb(0, 0, 0)'),
                new ColorValidation()
            ),
            new InputParameter(
                'fill_color',
                new GetStringOrDefault('DodgerBlue2'),
                new ColorValidation()
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