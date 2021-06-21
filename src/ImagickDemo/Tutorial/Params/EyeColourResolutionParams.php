<?php

declare(strict_types = 1);

namespace ImagickDemo\Tutorial\Params;

use Params\Create\CreateFromRequest;
use Params\Create\CreateFromVarMap;
use Params\Create\CreateOrErrorFromVarMap;
use Params\ExtractRule\GetString;
use Params\InputParameter;
use Params\InputStorage\InputStorage;
use Params\OpenApi\ParamDescription;
use Params\ExtractRule\GetBoolOrDefault;
use Params\ExtractRule\GetIntOrDefault;
use Params\ExtractRule\GetStringOrDefault;
use Params\ProcessedValues;
use Params\ProcessRule\MaxIntValue;
use Params\ProcessRule\MaxLength;
use Params\ProcessRule\MinIntValue;
use Params\ProcessRule\MinLength;
use Params\ProcessRule\ProcessRule;
use Params\ParamValues;
use Params\SafeAccess;
use Params\ValidationResult;
use VarMap\VarMap;
use Params\ProcessRule\Enum;
use Params\ProcessRule\EnumMap;
use ImagickDemo\ToArray;
use Params\InputParameterList;

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
        'Skyline' => realpath(__DIR__ . "/../../../../public/images/Skyline_400.jpg"),
        'Lorikeet' => realpath(__DIR__ . "/../../../../public/images/Biter_500.jpg"),
        'People' => realpath(__DIR__ . "/../../../../public/images/SydneyPeople_400.jpg"),
        'Low contrast' => realpath(__DIR__ . "/../../../../public/images/LowContrast.jpg"),
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


    return array_key_first($imageOptions);
}


function getImagepathInputParameter()
{
    return new InputParameter(
        'imagepath',
        new GetStringOrDefault('Lorikeet'),
        new EnumMap(getImagePathOptions())
    );
}

class SleepyRule implements ProcessRule
{
   public function process(
        $value,
        ProcessedValues $processedValues,
        InputStorage $inputStorage
    ): ValidationResult {
        if ($value === 'true') {
            return \Params\ValidationResult::finalValueResult(1);
        }

        return \Params\ValidationResult::finalValueResult(0);
    }

    public function updateParamDescription(ParamDescription $paramDescription): void {
    }
}


class EyeColourResolutionParams implements InputParameterList
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
            'imagepath' => getImagePathForOption($this->imagepath),
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

        //$params['imagepath'] = getImagePathForOption($this->imagepath);

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
                'channel_1_sample',
                new GetIntOrDefault(1),
                new MinIntValue(1),
                new MaxIntValue(40),
            ),
            new InputParameter(
                'channel_2_sample',
                new GetIntOrDefault(8),
                new MinIntValue(1),
                new MaxIntValue(40),
            ),
            new InputParameter(
                'channel_3_sample',
                new GetIntOrDefault(2),
                new MinIntValue(1),
                new MaxIntValue(40),
            ),

            new InputParameter(
                'colorspace',
                new GetStringOrDefault('RGB'),
                new EnumMap(getEyeColourSpaceOptions())
            ),
            'imagepath' => getImagepathInputParameter(),
            new InputParameter(
                'smaller',
                new GetBoolOrDefault(true),
            ),
        ];
    }

    public function getReactControlInfo()
    {
        echo "dump json api here.";
        exit(0);
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

    public function getColorSpace(): int
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