<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Response\FileResponse;
use ImagickDemo\Response\ImageResponse;

class setSamplingFactors extends \ImagickDemo\Example {


    /**
     * @var Control\samplingFactors
     */
    private $samplingFactorControl;
    
    function __construct(\ImagickDemo\Imagick\Control\samplingFactors $samplingFactorControl) {
        parent::__construct($samplingFactorControl);
        $this->samplingFactorControl = $samplingFactorControl;
    }

    /**
     * @return string
     */
    function getOriginalImage() {
        return $this->control->getURL().'&original=true';
    }

    /**
     * @return string
     */
    function getOriginalImagePath() {
        return "../imagick/images/FineDetail.png";
    }
    
    function getOriginalImageResponse() {
        $imagePath = $this->getOriginalImagePath();

        $imagick = new \Imagick(realpath($imagePath));
        $imagick->resizeImage(
            $imagick->getImageWidth() * 4,
            $imagick->getImageHeight() * 4,
            \Imagick::FILTER_POINT,
            1
        );

        header('Content-Type: image/png');
        echo $imagick->getImageBlob();

        //return new ImageResponse('image/png', $imagick->getImageBlob());
        //return new FileResponse($imagePath, "Content-Type: image/jpeg");
    }

    function renderTitle() {
        return "Set sampling factor";
    }

    function render() {

        $options = [
            ['1x1', '1x1', '1x1'],
            ['2x1', '1x1', '1x1'],
            ['2x2', '1x1', '1x1'],
            ['1x1', '2x1', '1x1'],
            ['1x1', '2x2', '1x1'],
            ['1x2', '2x1', '1x1'],
            ['2x2', '2x2', '1x1'],
            ['1x1', '1x1', '1x2'],
            ['1x1', '1x1', '2x1'],
            ['1x1', '1x1', '2x2'],
        ];


        $imagePath = "../imagick/images/FineDetail.png";
        
        $imagick = new \Imagick($imagePath);

        $imagick->setImageFormat('jpg');
        
        $originalSize = strlen($imagick->getImageBlob());

        echo "Original size = $originalSize <br/>";

        foreach ($options as $option) {
            $new = clone $imagick;
            $new->setSamplingFactors($option);
            $blobSize = strlen($new->getImageBlob());

            echo "Option ".implode(',', $option)." new size ". $blobSize."<br/>";
            $fileName = "./setSampling".implode(',', $option).".jpg";
            $new->writeImage($fileName);
        }

        return $this->renderImageURL();
    }
}