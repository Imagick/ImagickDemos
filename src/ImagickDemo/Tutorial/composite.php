<?php

namespace ImagickDemo\Tutorial;

use ImagickDemo\Control\CompositeExampleControl;
use ImagickDemo\Control\ReactControls;
use ImagickDemo\ImagickKernel\Params\FromMatrixControl;
use Room11\HTTP\VariableMap;
use ImagickDemo\Tutorial\Params\TutorialCompositeParams;
use VarMap\VarMap;

//function compositeImageExample()
//{
////Example Tutorial::composite
//    $imagick = new Imagick(realpath($imagePath1));
//    $imagick2 = new Imagick(realpath($imagePath2));
//    $imagick1->compositeImage($imagick2, $type, 0, 0);
//    $imagick1->setImageFormat('png');
//
//    $image->setImageFormat("png");
//    header("Content-Type: image/png");
//    echo $imagick->getImageBlob();
////Example end
//}

class composite extends \ImagickDemo\Example
{
    private $width = 200;
    private $height = 200;

    const SOURCE_1 = 'source1';
    const SOURCE_2 = 'source2';
    const OUTPUT = 'output';
    
//    /**
//     * @var \ImagickDemo\Control\CompositeExampleControl
//     */
//    private $compositeExampleControl;

    private TutorialCompositeParams $tutorialCompositeParams;
    
    private VarMap $variableMap;

    public function __construct(
//        CompositeExampleControl $compositeExampleControl,
        VarMap $variableMap
    ) {
        $this->tutorialCompositeParams = TutorialCompositeParams::createFromVarMap($variableMap);
        $this->variableMap = $variableMap;
//        $this->compositeExampleControl = $compositeExampleControl;
//        $this->type = $variableMap->getVariable('type', self::SOURCE_1);
    }

    public static function getExamples()
    {
        $listOfExamples = [
            'multiplyGradients' => 'MULTIPLY',
            'difference'        => 'DIFFERENCE',
            'screenGradients'   => 'SCREEN',
            'modulate'          => 'MODULATE',
            'modulusAdd'        => 'MODULUS ADD',
            'modulusSubstract'  => 'MODULUS SUBSTRACT',
            'Dst_In'            => 'DSTIN',
            'Dst_Out'           => 'DSTOUT',
            'ATop'              => 'ATOP',
            'Plus'              => 'PLUS',
            'Minus'             => 'MINUS',
            'divide'            => 'COLORDODGE enhance text',
            'CopyOpacity'       => 'COPYOPACITY', //(Set transparency from gray-scale mask)
            'CopyOpacity2'      => 'COPYOPACITY version 2', //(Set transparency from gray-scale mask)
        ];

        return $listOfExamples;
    }

//    public function getCustomImageParams()
//    {
//        return ['type' => $this->type];
//    }
    

    /**
     * @return string
     */
//    public function render()
    public function bespokeRender(/*ReactControls $reactControls*/)
    {
        $layout = <<< END

<div class='row'>
    <div class='col-md-6'>
        Input 1<br/>
        %s
    </div>
    <div class='col-md-6'>
    Input 2<br/>
        %s
    </div>
</div>

<div class='row'>
<div class='col-md-6 col-md-offset-3'>
    Output<br/>
    %s
    </div>
</div>
END;

        $output = createReactImagePanel(
            "/image/Tutorial/composite",
            "/Tutorial/composite",
            true
        );

        $output .= sprintf(
            $layout,
            $this->renderCustomImageURL(['type' => self::SOURCE_1]),
            $this->renderCustomImageURL(['type' => self::SOURCE_2]),
            $this->renderCustomImageURL(['type' => self::OUTPUT])
        );

        return $output;
    }

    public function renderCustomImageURL($extraParams = [], $originalImageURL = null)
    {
        $params = $this->tutorialCompositeParams->getValuesForForm();

        foreach($extraParams as $key => $value) {
            $params[$key] = $value;
        }

        return sprintf(
            "<img src='%s' />",
            '/customImage/Tutorial/composite?' . http_build_query($params)
        );
    }

    public function getExampleDescription()
    {
        $descriptions = [
            'multiplyGradients' => 'multiplies the values of the pixels in each image together.',
            'screenGradients' => "This is almost exactly like 'Multiply' except both input images are negated before the compose, and the final result is also then negated again to return the image to normal. In technical terms the two methods are 'Duals' of each other.
That makes its formula:   1-(1-Src)*(1-Dest)",
            'divide' => "",
            'Dst_In' => "
            The 'Dst_In' method is like using the source image as a 'Copy_Opacity' mask for the background image. It will remove the overlay image's shape from the background image like a cookie cutter which cuts out a cookie's shape from cookie dough.
            
            Unlike the 'Copy_Opacity' method you can NOT use a greyscale image as the mask as only the overlay image's alpha channel is used in this operation. Any color in the overlay is completely ignored.",

            'Dst_Out' => "
            Using the 'cookie dough' metaphor of 'Dst_In' the result of the 'Dst_Out' method is the dough that was left behind once a cookie has been cut out.
It can be used to cut holes, or take bites out of the background image, using the shape of the overlay. Any color in the overlay is again completely ignored.
            ",

            'ATop' => "Like 'Over' but limit the result to the original shape of the background image. In other words, the alpha channel on the destination is unchanged but the image colors are overlaid by any non-transparent parts of the source image.
If the background image is fully opaque (no transparency), this operation will act exactly like the normal 'Over' composition. It only differs when the background contains transparency which also clips the overlay.
What makes this useful is for overlaying lighting and shading effects that are limited to the object (shape) of the destination.",
//            'Plus' => '',
//            'Minus' => '',
            'CopyOpacity' => '',
            'CopyOpacity2' => '',
        ];
        
//        $customImage  = $this->compositeExampleControl->getCompositeExampleType();
        $customImage = $this->tutorialCompositeParams->getCompositeExample();

        if (array_key_exists($customImage, $descriptions) == false) {
            return null;
        }

        return "<br/>".nl2br($descriptions[$customImage]);
    }

    /**
     * @throws \Exception
     */
    public function renderCustomImage()
    {
        $composite_example_input = $this->tutorialCompositeParams->getCompositeExample();

        $composite_example = getOptionFromOptions($composite_example_input, getTutorialCompositeOptions());
//        var_dump($blah);
//        exit(0);
        
        $methods = [
            'multiplyGradients' => ['gradientDown', 'gradientRight', \Imagick::COMPOSITE_MULTIPLY],
            'difference' => ['gradientDown', 'gradientRight', \Imagick::COMPOSITE_DIFFERENCE],
            'modulate' => ['gradientDown', 'gradientRight', \Imagick::COMPOSITE_MODULATE],
            'modulusAdd' => ['gradientDown', 'gradientRight', \Imagick::COMPOSITE_MODULUSADD],
            'modulusSubstract' => ['gradientDown', 'gradientRight', \Imagick::COMPOSITE_MODULUSSUBTRACT],
            'screenGradients' => ['gradientDown', 'gradientRight', \Imagick::COMPOSITE_SCREEN],
            'divide' => [ 'getTextScan', 'getTextScanBlurred', \Imagick::COMPOSITE_COLORDODGE],
            'Dst_In' => ['gradientDown', 'getWhiteDiscAlpha',  \Imagick::COMPOSITE_DSTIN],
            'Dst_Out' => ['gradientDown', 'getWhiteDiscAlpha', \Imagick::COMPOSITE_DSTOUT],
            'ATop' => ['getTestImage', 'getWhiteDiscAlpha', \Imagick::COMPOSITE_ATOP],
            'Plus' => ['getRedDiscAlpha', 'getBlueDiscAlpha', \Imagick::COMPOSITE_PLUS],
            'Minus' => ['getRGBDisc', 'getRedDiscAlpha', \Imagick::COMPOSITE_MINUS],
            'CopyOpacity' => ['gradientDown', 'getWhiteDiscAlpha', \Imagick::COMPOSITE_COPYOPACITY],
            'CopyOpacity2' => ['getBiter', 'getWhiteDiscAlpha', \Imagick::COMPOSITE_COPYOPACITY],
        ];


        if (array_key_exists($composite_example, $methods) == false) {
            throw new \Exception("Unknown composite method $composite_example");
        }

        $methodInfo = $methods[$composite_example];
        
        $firstImage = $this->{$methodInfo[0]}();
        $secondImage = $this->{$methodInfo[1]}();

        $type = $this->variableMap->getWithDefault('type', self::SOURCE_1);

        switch ($type) {
            case (self::SOURCE_1): {
                $this->showImage($firstImage);
                //$this->outputImage($firstImage);
                break;
            }

            case (self::SOURCE_2): {
                $this->showImage($secondImage);
                break;
            }

            default:
            case (self::OUTPUT): {
                break;
            }
        }

        $this->genericComposite($firstImage, $secondImage, $methodInfo[2]);
    }
    
    
    private function outputImage(\Imagick $imagick)
    {
        $imagick->setImageFormat('png');
        header("Content-Type: image/png");
        echo $imagick->getImageBlob();
    }

    public function genericComposite(\Imagick $imagick1, \Imagick $imagick2, $type)
    {
        $imagick1->compositeImage($imagick2, $type, 0, 0);
        $imagick1->setImageFormat('png');

        $this->showImage($imagick1);
    }

    public function showImage(\Imagick $imagick1)
    {
        $backGround = new \Imagick();
        $backGround->newPseudoImage(
            $imagick1->getImageWidth(),
            $imagick1->getImageHeight(),
            'pattern:checkerboard'
        );

        $backGround->compositeimage($imagick1, \Imagick::COMPOSITE_ATOP, 0, 0);
        $backGround->setImageFormat('png');

        header("Content-Type: image/png");
        echo $backGround->getImageBlob();
    }

    public function renderDescription()
    {
        $output = "The Imagick::compositeImage function allows you to blend images together in many different ways.";

        $output .= " Please see http://www.imagemagick.org/Usage/compose/ for details ";
        
        return $output;
    }

    private function gradientDown()
    {
        $imagick = new \Imagick();
        $imagick->newpseudoimage($this->width, $this->height, 'gradient:black-white');

        return $imagick;
    }

    private function gradientRight()
    {
        $imagick = new \Imagick();
        $imagick->newpseudoimage($this->width, $this->height, 'gradient:black-white');
        $imagick->rotateimage('black', -90);

        return $imagick;
    }

    public function getTextScan()
    {
        $imagick = new \Imagick(realpath("images/text_scan.png"));
        $imagick->resizeImage(
            2 * $imagick->getImageWidth() / 3,
            2 * $imagick->getImageHeight() / 3,
            \Imagick::FILTER_LANCZOS,
            1
        );
        return $imagick;
    }

    public function getTextScanBlurred()
    {
        $imagick = $this->getTextScan();
        $imagick->blurImage(0x20, 1);

        return $imagick;
    }

    public function getWhiteDiscAlpha()
    {
        $width = $this->width;
        $height = $this->height;
        $imagick = new \Imagick();
        $imagick->newImage($width, $height, 'none');

        $draw = new \ImagickDraw();

        $draw->setStrokeOpacity(0);
        $draw->setFillColor('white');
        $draw->circle($width / 2, $height / 2, $width / 4, $height / 2);

        $imagick->drawImage($draw);

        return $imagick;
    }
    
    
    public function getTestImage()
    {
        $imagick = new \Imagick(realpath("images/Biter_500.jpg"));
        return $imagick;
    }

    public function getRedDiscAlpha()
    {
        $width = $this->width;
        $height = $this->height;
        
        $imagick = new \Imagick();
        $imagick->newImage($width, $height, 'none');

        $draw = new \ImagickDraw();

        $draw->setStrokeOpacity(0);
        $draw->setFillColor('red');
        $draw->circle($width / 2, $height / 3, $width / 2, ($height / 3 - $height / 4));

        $imagick->drawImage($draw);

        return $imagick;
    }


    public function getGreenDiscAlpha()
    {
        $width = $this->width;
        $height = $this->height;
        $imagick = new \Imagick();
        $imagick->newImage($width, $height, 'none');

        $draw = new \ImagickDraw();

        $draw->setStrokeOpacity(0);
        $draw->setFillColor('lime');
        $draw->circle($width / 3, 2 * $height / 3, ($width / 3 - $width / 4), 2 * $height / 3);

        $imagick->drawImage($draw);

        return $imagick;
    }

    public function getBlueDiscAlpha()
    {
        $width = $this->width;
        $height = $this->height;
        
        $imagick = new \Imagick();
        $imagick->newImage($width, $height, 'none');

        $draw = new \ImagickDraw();

        $draw->setStrokeOpacity(0);
        $draw->setFillColor('blue');
        $draw->circle(2 * $width / 3, 2 * $height / 3, $width - ($width / 3 - $width / 4), 2 * $height / 3);

        $imagick->drawImage($draw);

        return $imagick;
    }

    public function getRGBDisc()
    {
        $width = $this->width;
        $height = $this->height;

        $imagick = new \Imagick();
        $imagick->newImage($width, $height, 'none');

        $draw = new \ImagickDraw();

        $draw->setStrokeOpacity(0);
        $draw->setFillColor('red');
        //$draw->setFillOpacity(0.5);
        $draw->circle($width / 2, $height / 3, $width / 2, ($height / 3 - $height / 4));
        
        $draw->setStrokeOpacity(0);
        $draw->setFillColor('blue');
        //$draw->setFillOpacity(0.5);
        $draw->circle(2 * $width / 3, 2 * $height / 3, $width - ($width / 3 - $width / 4), 2 * $height / 3);

        $draw->setStrokeOpacity(0);
        $draw->setFillColor('lime');
        //$draw->setFillOpacity(0.5);
        $draw->circle($width / 3, 2 * $height / 3, ($width / 3 - $width / 4), 2 * $height / 3);

        $imagick->drawImage($draw);

        return $imagick;
    }

    public function getBiter()
    {
        $imagick = new \Imagick(realpath("images/Biter_500.jpg"));

        //This is vital - the image must have an alpha channel.
        $imagick->setImageFormat('png');
        $imagick->resizeImage($this->width, $this->height, \Imagick::FILTER_LANCZOS, 1);

        return $imagick;
    }

    public function getWhiteDisc()
    {
        $width = $this->width;
        $height = $this->height;
        $imagick = new \Imagick();
        $imagick->newImage($width, $height, 'black');
        $draw = new \ImagickDraw();
        $draw->setStrokeOpacity(0);
        $draw->setFillColor('white');
        $draw->circle($width / 2, $height / 2, $width / 4, $height / 2);
        $imagick->drawImage($draw);

        return $imagick;
    }


    public function hasReactControls(): bool
    {
        return true;
    }

    public static function getParamType(): string
    {
        return TutorialCompositeParams::class;
    }

    public function hasBespokeRender()
    {
        return true;
    }
}
