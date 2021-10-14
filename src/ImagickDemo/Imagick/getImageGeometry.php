<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Control\ReactControls;
use VarMap\VarMap;
use ImagickDemo\Imagick\Controls\ImageControl;


class getImageGeometry extends \ImagickDemo\Example
{

    private ImageControl $imageControl;

    public function __construct(
        VarMap $varMap
    ) {
        $this->imageControl = ImageControl::createFromVarMap($varMap);
    }

    public function renderTitle(): string
    {
        return "Get image geometry";
    }

    public function renderDescription()
    {
        $output = <<< END
 
END;

        return nl2br($output);
    }

    public function renderImageURL()
    {
        $url = sprintf(
            "<img src='/Imagick/getImageGeometry?%s",
            http_build_query($this->imageControl->getValuesForForm())
        );


//        return \ImagickDemo\Route::renderImageURL(
//            $this->taskQueue->isActive(),
//            $this->getURL(),
//            $originalImageURL,
//            $this->getImageStatusURL()
//        )

        return $url;
    }

    public function bespokeRender(ReactControls $reactControls)
    {
        $output = createReactImagePanel(
            "/customImage/Imagick/getImageGeometry",
            "/Imagick/getImageGeometry",
            true,
            $this
        );

        $text = "The values of getImageGeometry for the image below are:\n";
//Example Imagick::getImageGeometry
        $imagick = new \Imagick(realpath($this->imageControl->getImagePath()));
        foreach ($imagick->getImageGeometry() as $key => $value) {
            $text .= "$key : $value\n";
        }
//Example end
        $output .= nl2br($text);

        $output .= $this->renderImageURL();

        return $output;
    }

    public function hasBespokeRender()
    {
        return true;
    }



    public static function getParamType(): string
    {
        return ImageControl::class;
    }
}
