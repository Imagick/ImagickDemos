<?php

declare(strict_types = 1);

namespace ImagickDemo\Tutorial\Params;

use Params\Create\CreateFromRequest;
use Params\Create\CreateFromVarMap;
use Params\Create\CreateOrErrorFromVarMap;
use Params\OpenApi\ParamDescription;
use Params\FirstRule\GetStringOrDefault;
use Params\FirstRule\GetBoolOrDefault;
use Params\ParamValues;
use Params\SubsequentRule\MaxIntValue;
use Params\SubsequentRule\MinIntValue;
use Params\SafeAccess;
use Params\ValidationResult;
use VarMap\VarMap;
use Params\FirstRule\GetIntOrDefault;
use Params\SubsequentRule\Enum;
use Params\SubsequentRule\EnumMap;
use Params\SubsequentRule\SubsequentRule;
use ImagickDemo\ToArray;

/**
 * @return array<string, int>
 */
function getEyeColourSpaceOptions()
{
    $colorSpaceTypes = [
        'RGB' => \Imagick::COLORSPACE_RGB,
//        \Imagick::COLORSPACE_GRAY => 'Gray',
//        \Imagick::COLORSPACE_TRANSPARENT => 'Transparent',
//        \Imagick::COLORSPACE_OHTA => 'OHTA',
//        \Imagick::COLORSPACE_LAB => 'LAB',
//        \Imagick::COLORSPACE_XYZ => 'XYZ',
//        \Imagick::COLORSPACE_YCBCR => 'YCBCR',
//        \Imagick::COLORSPACE_YCC => 'YCC',
        'YIC' => \Imagick::COLORSPACE_YIQ,
//        \Imagick::COLORSPACE_YPBPR => 'YPBPR',
        'YUV' => \Imagick::COLORSPACE_YUV,
//        \Imagick::COLORSPACE_CMYK => 'CMYK',
        'SRGB' => \Imagick::COLORSPACE_SRGB,
        'HSB' => \Imagick::COLORSPACE_HSB,
        'HSL' => \Imagick::COLORSPACE_HSL,
//        \Imagick::COLORSPACE_HWB => 'HWB',
//        \Imagick::COLORSPACE_REC601LUMA => 'REC601LUMA',
//        \Imagick::COLORSPACE_REC709LUMA => 'REC709LUMA',
//        \Imagick::COLORSPACE_LOG => 'LOG',
        'CMY' => \Imagick::COLORSPACE_CMY,
    ];

    return $colorSpaceTypes;
}

function getEyeColorSpaceStringFromValue(int $value)
{
    $colorspaceOptions = getEyeColourSpaceOptions();

    foreach ($colorspaceOptions as $string => $int) {
        if ($value === $int) {
            return $string;
        }
    }

    throw new \Exception("Bad option for getEyeColorSpaceStringFromValue $value");
}

function getImagePathOptions()
{
    $images = [
        realpath(__DIR__ . "/../../../../public/images/Skyline_400.jpg") => 'Skyline',
        realpath(__DIR__ . "/../../../../public/images/Biter_500.jpg") => 'Lorikeet',
        realpath(__DIR__ . "/../../../../public/images/SydneyPeople_400.jpg") => 'People',
        realpath(__DIR__ . "/../../../../public/images/LowContrast.jpg") => 'Low contrast',
    ];


    return $images;
}

function getImagePathForOption(string $selected_option)
{
    $imageOptions = getImagePathOptions();

    foreach ($imageOptions as $path => $option) {
        if ($option === $selected_option) {
            return $path;
        }
    }

    foreach ($imageOptions as $key => $value) {
        return $key;
    }

    // ugh - bring on 7.3
    return array_key_first($imageOptions);
}


function getImagepathRules()
{
    return [
        new GetStringOrDefault('Lorikeet'),
        new Enum(getImagePathOptions())
    ];
}



class SleepyRule implements SubsequentRule
{
    public function process(string $name, $value, ParamValues $validator) : ValidationResult
    {
        if ($value === 'true') {
            return \Params\ValidationResult::finalValueResult(1);
        }

        return \Params\ValidationResult::finalValueResult(0);
    }

    public function updateParamDescription(ParamDescription $paramDescription) {
    }
}


class EyeColourResolutionParams
{
    use SafeAccess;
    use CreateFromRequest;
    use CreateFromVarMap;
    use CreateOrErrorFromVarMap;
    use ToArray;

    /** @var int */
    private $channel_1_sample;

    /** @var int */
    private $channel_2_sample;

    /** @var int */
    private $channel_3_sample;

    /** @var int */
    private $colorspace;

    /** @var string */
    private $imagepath;

    /** @var bool */
    private $smaller;

    public function __construct(
        int $channel_1_sample,
        int $channel_2_sample,
        int $channel_3_sample,
        int $colorspace,
        string $imagepath,
        bool $smaller
    ) {
        $this->channel_1_sample = $channel_1_sample;
        $this->channel_2_sample = $channel_2_sample;
        $this->channel_3_sample = $channel_3_sample;

        $this->colorspace = $colorspace;
        $this->imagepath = $imagepath;
        $this->smaller = $smaller;
    }

    public function toArray()
    {
        $values =  [
            'channel_1_sample' => $this->channel_1_sample,
            'channel_2_sample' => $this->channel_2_sample,
            'channel_3_sample' => $this->channel_3_sample,
            'colorspace' => getEyeColorSpaceStringFromValue($this->colorspace),
            'imagepath' => $this->imagepath,
            'smaller' => $this->smaller,
        ];

        return $values;
    }

    public function getAllParams()
    {
        $params = [];
        foreach($this as $key => $value) {
            $params[$key] = $value;
        }

        $params['imagepath'] = getImagePathForOption($this->imagepath);

        return $params;
    }

    /**
     * @param VarMap $variableMap
     * @return array
     */
    public static function getRules()
    {
        return [
            'channel_1_sample' => [
                new GetIntOrDefault(1),
                new MinIntValue(1),
                new MaxIntValue(40),
            ],
            'channel_2_sample' => [
                new GetIntOrDefault(8),
                new MinIntValue(1),
                new MaxIntValue(40),
            ],
            'channel_3_sample' => [
                new GetIntOrDefault(2),
                new MinIntValue(1),
                new MaxIntValue(40),
            ],

            'colorspace' => [
                new GetStringOrDefault('RGB'),
                new EnumMap(getEyeColourSpaceOptions())
            ],
            'imagepath' => getImagepathRules(),
            'smaller' => [
                new GetBoolOrDefault(true),
            ],
        ];
    }

    /**
     * @return int
     */
    public function getChannel1Sample(): int
    {
        return $this->channel_1_sample;
    }

    /**
     * @return int
     */
    public function getChannel2Sample(): int
    {
        return $this->channel_2_sample;
    }

    /**
     * @return int
     */
    public function getChannel3Sample(): int
    {
        return $this->channel_3_sample;
    }

    /**
     * @return string
     */
    public function getColorSpace(): string
    {
        return $this->colorspace;
    }

    /**
     * @return string
     */
    public function getImagepath(): string
    {
        return getImagePathForOption($this->imagepath);
    }
}