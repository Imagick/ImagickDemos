<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\NullControl;
use VarMap\VarMap;

class setSamplingFactors extends \ImagickDemo\Example
{
//    private SetSamplingFactorsControl $samplingFactorControl;
//
//    public function __construct(VarMap $varMap)
//    {
//        $this->samplingFactorControl = SetSamplingFactorsControl::createFromVarMap($varMap);
//    }

    public function useImageControlAsOriginalImage()
    {
        return false;
    }

    public static function getParamType(): string
    {
        return NullControl::class;
    }


    public function renderDescription()
    {
        $output = "Theoretically, this function allows you to set the sampling factors to be used by the JPEG compressor. In practice though, it does not seem to function particuarly well.
        
I recommend using `Imagick::setImageProperty()` to set  'jpeg:sampling-factor' to one of the standard down-sampling types. e.g. 4:2:0

<ul>
   <li>4:4:4</li>
   <li>4:4:1</li>
   <li>4:4:0</li>
   <li>4:2:2</li>
   <li>4:2:0</li>
   <li>4:2:1</li>
   <li>4:2:0</li>
   <li>4:1:1</li>
   <li>4:1:0</li>
</ul>

e.g. Imagick::setImageProperty('jpeg:sampling-factor', '4:2:0');
";

        return $output;
    }


    /**
     * @return string
     */
    public function getOriginalImagePath()
    {
        return "../public/images/FineDetail.png";
    }

    public function getOriginalImageResponse()
    {
        $image_path = $this->getOriginalImagePath();
        $imagick = new \Imagick(realpath($image_path));
        $imagick->resizeImage(
            $imagick->getImageWidth() * 4,
            $imagick->getImageHeight() * 4,
            \Imagick::FILTER_POINT,
            1
        );

        header('Content-Type: image/png');
        echo $imagick->getImageBlob();
    }

    public function renderTitle(): string
    {
        return "Set sampling factor";
    }

    /**
     * @param string|null $activeCategory
     * @param string|null $activeExample
     * @return mixed
     */
    public function render(
        ?string $activeCategory,
        ?string $activeExample
    )
    {
        $image_path = "../public/images/FineDetail.png";
        $imagick = new \Imagick(realpath($image_path));

        $imagick->setImageFormat('jpg');
        $originalSize = strlen($imagick->getImageBlob());
        $output = "Original size = $originalSize <br/>";

        $options = [
            ['1', '1', '1'],
            ['1', '1', '2'],
            ['1', '2', '1'],
            ['1', '2', '2'],
            ['2', '1', '1'],
            ['2', '1', '2'],
            ['2', '2', '1'],
        ];

        foreach ($options as $option) {
            $new = clone $imagick;
            $new->setSamplingFactors($option);
            $blobSize = strlen($new->getImageBlob());

            echo "Option " . implode(',', $option) . " new size " . $blobSize . "<br/>";
        }

        $output .= image(
            $activeCategory,
            $activeExample,
            [],
            $this
        );

//        $output .= "/image/Imagick/setSamplingFactors";

        return $output;
    }
}
