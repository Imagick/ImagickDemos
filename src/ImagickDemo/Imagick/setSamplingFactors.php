<?php

namespace ImagickDemo\Imagick;

use Room11\HTTP\VariableMap;
use ImagickDemo\Imagick\Control\samplingFactors as samplingFactorsControl;

class setSamplingFactors extends \ImagickDemo\Example
{
    /**
     * @var Control\samplingFactors
     */
    private $samplingFactorControl;

    /**
     * @var Request
     */
    private $request;

    public function __construct(samplingFactorsControl $samplingFactorControl, VariableMap $variableMap)
    {
        parent::__construct($samplingFactorControl);
        $this->samplingFactorControl = $samplingFactorControl;
        $this->request = $variableMap;
    }

    /**
     * @return string
     */
    public function getOriginalImage()
    {
        return $this->control->getURL() . '&original=true';
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

    public function renderTitle()
    {
        return "Set sampling factor";
    }

//    public function renderOriginalImage()
//    {
//        $imagick = new \Imagick(realpath("../public/images/FineDetail.png"));
//
//        $imagick->resizeImage(
//            $imagick->getImageWidth() * 4,
//            $imagick->getImageHeight() * 4,
//            \Imagick::FILTER_POINT,
//            1
//        );
//
//        \header('Content-Type: image/png');
//        echo $imagick->getImageBlob();
//    }

    /**
     * @return mixed
     */
    public function render()
    {
        $image_path = "../public/images/FineDetail.png";
        $imagick = new \Imagick(realpath($image_path));

        $imagick->setImageFormat('jpg');
        $originalSize = strlen($imagick->getImageBlob());
        echo "Original size = $originalSize <br/>";

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

        return $this->renderImageURL();
    }
}
