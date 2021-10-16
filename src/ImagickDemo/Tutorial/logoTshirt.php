<?php

namespace ImagickDemo\Tutorial;

use Room11\HTTP\VariableMap;

function getAverageColorString(\Imagick $imagick)
{
    $tshirtCrop = clone $imagick;
    $tshirtCrop->cropimage(100, 100, 90, 50);
    $stats = $tshirtCrop->getImageChannelStatistics();
    $averageRed = $stats[\Imagick::CHANNEL_RED]['mean'];
    $averageRed = intval(255 * $averageRed / \Imagick::getQuantum());
    $averageGreen = $stats[\Imagick::CHANNEL_GREEN]['mean'];
    $averageGreen = intval(255 * $averageGreen / \Imagick::getQuantum());
    $averageBlue = $stats[\Imagick::CHANNEL_BLUE]['mean'];
    $averageBlue = intval(255 * $averageBlue / \Imagick::getQuantum());
    $colorString = "rgb($averageRed, $averageGreen, $averageBlue)";

    return $colorString;
}

class logoTshirt extends \ImagickDemo\Example
{
    private $type = 'simple';

    public function __construct(\ImagickDemo\Control $control, VariableMap $variableMap)
    {
        $this->control = $control;
        $this->type = $variableMap->getVariable('type', 'simple');
    }

    public function renderTitle(): string
    {
        return "Tshirt logo";
    }

    public function getCustomImageParams()
    {
        return ['type' => $this->type];
    }

    /**
     * @param string|null $activeCategory
     * @param string|null $activeExample
     * @return string
     */
    public function render(
        ?string $activeCategory,
        ?string $activeExample
    )
    {
        $output = $this->renderDescription();
        $output .= $this->renderCustomImageURL(['type' => 'simple']);
        $output .= $this->renderCustomImageURL(['type' => 'creases']);

        return $output;
    }


    public function renderDescription()
    {
        $output = <<< END

END;
        return $output;
    }

    public function renderCustomImage()
    {
        switch ($this->type) {
            case ('simple'): {
                $this->renderCustomImageSimple();
                return;
            }

            case ('creases'): {
                $this->renderCustomImageCreases();
                return;
            }
        }
    }

    //TODO - this is a little borked
    public function renderCustomImageSimple()
    {
        $tshirt = new \Imagick(realpath("images/tshirt/tshirt.jpg"));
        $logo = new \Imagick(realpath("images/tshirt/Logo.png"));
        $logo->resizeImage(100, 100, \Imagick::FILTER_LANCZOS, 1, true);

        $tshirt->setImageFormat('png');

        //Create a mask by cloning the shirt,
        $mask = clone $tshirt;
        //Negating the image,
        $mask->negateimage(true);
        //Make it transparent everywhere that it is now white.
        $mask->transparentPaintImage(
            'black',
            0,
            0.1 * \Imagick::getQuantum(),
            false
        );

//        //Paint the result of the logo + mask onto the tshirt.
//        $tshirt->compositeimage($mask, \Imagick::COMPOSITE_DEFAULT, 0, 0);

        $shading = clone $tshirt;

        $shading->transformimagecolorspace(\Imagick::COLORSPACE_GRAY);


        $shading->statisticImage(
            \Imagick::STATISTIC_GRADIENT,
            5,
            2
        );

        $shading->setImageFormat('png');

        //Paint the logo onto the mask, SRCIN just uses the logo's color
        $mask->compositeimage($logo, \Imagick::COMPOSITE_SRCIN, 110, 75);
        $mask->compositeimage($shading, \Imagick::COMPOSITE_MODULATE, 0, 0);
        $tshirt->compositeimage($mask, \Imagick::COMPOSITE_DEFAULT, 0, 0);

//        //Paint the result of the logo + mask onto the tshirt.
//        $tshirt->compositeimage($logo, \Imagick::COMPOSITE_ATOP, 110, 75);

        //Merge the image with a non-deprecated function.
        $tshirt->mergeimagelayers(\Imagick::LAYERMETHOD_COALESCE);

        header("Content-Type: image/png");
        echo $tshirt->getImageBlob();
    }

    /**
     *
     */
    public function renderCustomImageCreases()
    {
        $tshirt = new \Imagick(realpath("images/tshirt/tshirt.jpg"));
        $logo = new \Imagick(realpath("images/tshirt/Logo.png"));
        $logo->resizeImage(100, 100, \Imagick::FILTER_LANCZOS, 1, true);

        $tshirt->setImageFormat('png');

        //First lets find the creases
        //Get the average color of the tshirt and make a new image from it.
        $colorString = getAverageColorString($tshirt);
        $creases = new \Imagick();
        $creases->newpseudoimage(
            $tshirt->getImageWidth(),
            $tshirt->getImageHeight(),
            "XC:" . $colorString
        );

        //Composite difference finds the creases
        $creases->compositeimage($tshirt, \Imagick::COMPOSITE_DIFFERENCE, 0, 0);
        $creases->setImageFormat('png');
        //We need the image negated for the maths to work later.
        $creases->negateimage(true);
        //We also want "no crease" to equal 50% gray later
        //$creases->brightnessContrastImage(-50, 0);

        $creases->modulateImage(50, 100, 100);

        //Copy the logo into an image the same size as the shirt image
        //to make life easier
        $logoCentre = new \Imagick();
        $logoCentre->newpseudoimage(
            $tshirt->getImageWidth(),
            $tshirt->getImageHeight(),
            "XC:none"
        );
        $logoCentre->setImageFormat('png');
        $logoCentre->compositeimage($logo, \Imagick::COMPOSITE_SRCOVER, 110, 75);

        //Save a copy of the tshirt sized logo
        $logoCentreMask = clone $logoCentre;

        //Blend the creases with the logo
        $logoCentre->compositeimage($creases, \Imagick::COMPOSITE_MODULATE, 0, 0);

        //Mask the logo so that only the pixels under the logo come through
        $logoCentreMask->compositeimage($logoCentre, \Imagick::COMPOSITE_SRCIN, 0, 0);

        //Composite the creased logo onto the shirt
        $tshirt->compositeimage($logoCentreMask, \Imagick::COMPOSITE_DEFAULT, 0, 0);

        //And Robert is your father's brother
        header("Content-Type: image/png");
        echo $tshirt->getImageBlob();
    }
//Example end
}
