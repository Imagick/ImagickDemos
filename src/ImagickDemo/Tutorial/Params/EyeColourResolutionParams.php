<?php

declare(strict_types = 1);

namespace ImagickDemo\Tutorial\Params;

use ImagickDemo\ReactParamType;
use Params\Create\CreateFromRequest;
use Params\Create\CreateFromVarMap;
use Params\Create\CreateOrErrorFromVarMap;
use Params\InputParameter;
use Params\ExtractRule\GetBoolOrDefault;
use Params\ExtractRule\GetIntOrDefault;
use Params\ExtractRule\GetStringOrDefault;
use Params\ProcessRule\MaxIntValue;
use Params\ProcessRule\MinIntValue;
use Params\SafeAccess;
use VarMap\VarMap;
use Params\ProcessRule\EnumMap;
use ImagickDemo\ToArray;
use Params\InputParameterList;

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
    private $image_path = 'huh';

    /** @var bool */
    private $smaller;

    public function __construct(
        int $channel_1_sample,
        int $channel_2_sample,
        int $channel_3_sample,
        int $colorspace,
        string $image_path,
        bool $smaller
    ) {
        $this->channel_1_sample = $channel_1_sample;
        $this->channel_2_sample = $channel_2_sample;
        $this->channel_3_sample = $channel_3_sample;

        $this->colorspace = $colorspace;
        $this->image_path = $image_path;
        $this->smaller = $smaller;
    }

    public function toArray()
    {
        $values =  [
            'channel_1_sample' => $this->channel_1_sample,
            'channel_2_sample' => $this->channel_2_sample,
            'channel_3_sample' => $this->channel_3_sample,
            'colorspace' => getEyeColorSpaceStringFromValue($this->colorspace),
            'imagepath' => getImagePathForOption($this->image_path),
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


        //$params['imagepath'] = getImagePathForOption($this->image_path);

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
            getImagepathInputParameter(),
            new InputParameter(
                'smaller',
                new GetBoolOrDefault(true),
            ),
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

    public function getColorSpace(): int
    {
        return $this->colorspace;
    }

    /**
     * @return string
     */
    public function getImagepath(): string
    {
        return getImagePathForOption($this->image_path);
    }
}