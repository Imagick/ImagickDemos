<?php


if (defined('LOW_MEM_CLASS_LOADER') && LOW_MEM_CLASS_LOADER == true) {
    require_once('../vendor/intahwebz/lowmemoryclassloader/LowMemoryClassloader.php');
}
else {
    require_once('../vendor/autoload.php');
}



use Weaver\CompositeWeaveGenerator;

$controls = [

    [
        'ImagickDemo\ControlElement\Radius',
        'ImagickDemo\ControlElement\Sigma',
        'ImagickDemo\ControlElement\Image'
    ],
    [
        'ImagickDemo\ControlElement\Radius',
        'ImagickDemo\ControlElement\Image'
    ],
    [
        'ImagickDemo\ControlElement\R',
        'ImagickDemo\ControlElement\G',
        'ImagickDemo\ControlElement\B',
        'ImagickDemo\ControlElement\A'
    ],
    [
        'ImagickDemo\ControlElement\Image',
        'ImagickDemo\ControlElement\R',
        'ImagickDemo\ControlElement\G',
        'ImagickDemo\ControlElement\B',
        'ImagickDemo\ControlElement\A'
    ],
    [
        'ImagickDemo\ControlElement\Image',
        '\ImagickDemo\ControlElement\BlackPoint',
        '\ImagickDemo\ControlElement\WhitePoint',
        '\ImagickDemo\ControlElement\X',
        '\ImagickDemo\ControlElement\Y' 
    ],
    [
        'ImagickDemo\ControlElement\Image',
        'ImagickDemo\ControlElement\Noise', 
    ],

    [
        'ImagickDemo\ControlElement\Image',
        'ImagickDemo\ControlElement\VirtualPixel'
    ],
    [
        'ImagickDemo\ControlElement\Image',
        'ImagickDemo\ControlElement\Swirl'
    ],
    [
        'ImagickDemo\ControlElement\Image',
        'ImagickDemo\ControlElement\Amplitude',
        'ImagickDemo\ControlElement\Length'
    ],

    [
        'ImagickDemo\ControlElement\Radius',
        'ImagickDemo\ControlElement\Sigma',
        'ImagickDemo\ControlElement\MeanOffset',
        'ImagickDemo\ControlElement\Image'
    ],

    [
        'ImagickDemo\ControlElement\Image',
        'ImagickDemo\ControlElement\Radius',
        'ImagickDemo\ControlElement\Sigma',
        'ImagickDemo\ControlElement\Amount',
        'ImagickDemo\ControlElement\UnsharpThreshold',
        'ImagickDemo\ControlElement\Channel',
    ],

    [
        'ImagickDemo\ControlElement\Image',
        'ImagickDemo\ControlElement\SolarizeThreshold',
    ],
    'ImagickDemo\Control\TransformColorSpaceControl' => [
        'ImagickDemo\ControlElement\Image',
        'ImagickDemo\ControlElement\ColorSpace',
        'ImagickDemo\ControlElement\ChannelNumber'
    ],

    'ImagickDemo\Control\StatisticControl' => [
        'ImagickDemo\ControlElement\Image',
        'ImagickDemo\ControlElement\StatisticType',
        'ImagickDemo\ControlElement\W20',
        'ImagickDemo\ControlElement\H20',
        'ImagickDemo\ControlElement\Channel'
        
    ],
    [
        'ImagickDemo\ControlElement\BackgroundColor',
        'ImagickDemo\ControlElement\StrokeColor',
        'ImagickDemo\ControlElement\FillColor',
    ],
   
    [
        'ImagickDemo\ControlElement\BackgroundColor',
        'ImagickDemo\ControlElement\StrokeColor',
        'ImagickDemo\ControlElement\FillColor',
        'ImagickDemo\ControlElement\FillModifiedColor',
    ],
    [
        'ImagickDemo\ControlElement\Image',
        'ImagickDemo\ControlElement\DistortionType',
    ],


    'ImagickDemo\Control\ImageControl' => [
        'ImagickDemo\ControlElement\Image',
    ],

    'ImagickDemo\Control\ImagickFunctionControl' => [
        'ImagickDemo\ControlElement\FunctionType',
        'ImagickDemo\ControlElement\FirstTerm',
        'ImagickDemo\ControlElement\SecondTerm',
        'ImagickDemo\ControlElement\ThirdTerm',
        'ImagickDemo\ControlElement\FourthTerm'
    ],

    'ImagickDemo\Control\SparseColorControl' => [
        'ImagickDemo\ControlElement\SparseColorType',
    ],

    'ImagickDemo\Control\ArcControl' => [
        'ImagickDemo\ControlElement\BackgroundColor',
        'ImagickDemo\ControlElement\StrokeColor',
        'ImagickDemo\ControlElement\FillColor',
        'ImagickDemo\ControlElement\StartX',
        'ImagickDemo\ControlElement\StartY',
        'ImagickDemo\ControlElement\EndX',
        'ImagickDemo\ControlElement\EndY',
        'ImagickDemo\ControlElement\StartAngle',
        'ImagickDemo\ControlElement\EndAngle',
    ],

    'ImagickDemo\Control\CircleControl' => [
        'ImagickDemo\ControlElement\BackgroundColor',
        'ImagickDemo\ControlElement\StrokeColor',
        'ImagickDemo\ControlElement\FillColor',
        'ImagickDemo\ControlElement\OriginX',
        'ImagickDemo\ControlElement\OriginY',
        'ImagickDemo\ControlElement\EndX',
        'ImagickDemo\ControlElement\EndY',
    ],


    'ImagickDemo\Control\TranslateControl' => [
        'ImagickDemo\ControlElement\BackgroundColor',
        'ImagickDemo\ControlElement\StrokeColor',
        'ImagickDemo\ControlElement\FillColor',
        'ImagickDemo\ControlElement\FillModifiedColor',
        'ImagickDemo\ControlElement\StartX',
        'ImagickDemo\ControlElement\StartY',
        'ImagickDemo\ControlElement\EndX',
        'ImagickDemo\ControlElement\EndY',
        'ImagickDemo\ControlElement\TranslateX',
        'ImagickDemo\ControlElement\TranslateY',
    ],


    
    'ImagickDemo\Control\SkewControl' => [
        'ImagickDemo\ControlElement\BackgroundColor',
        'ImagickDemo\ControlElement\StrokeColor',
        'ImagickDemo\ControlElement\FillColor',
        'ImagickDemo\ControlElement\FillModifiedColor',
        'ImagickDemo\ControlElement\StartX',
        'ImagickDemo\ControlElement\StartY',
        'ImagickDemo\ControlElement\EndX',
        'ImagickDemo\ControlElement\EndY',
        'ImagickDemo\ControlElement\Skew',
    ],

    
    
    'ImagickDemo\Control\TextUnderControl' => [
        'ImagickDemo\ControlElement\BackgroundColor',
        'ImagickDemo\ControlElement\StrokeColor',
        'ImagickDemo\ControlElement\FillColor',
        'ImagickDemo\ControlElement\TextUnderColor',
    ],

    'ImagickDemo\Control\TextDecoration' => [
        'ImagickDemo\ControlElement\BackgroundColor',
        'ImagickDemo\ControlElement\StrokeColor',
        'ImagickDemo\ControlElement\FillColor',
        'ImagickDemo\ControlElement\TextDecoration',
    ],


    'ImagickDemo\Control\RoundRectangleControl' => [
        'ImagickDemo\ControlElement\BackgroundColor',
        'ImagickDemo\ControlElement\StrokeColor',
        'ImagickDemo\ControlElement\FillColor',
        'ImagickDemo\ControlElement\StartX',
        'ImagickDemo\ControlElement\StartY',
        'ImagickDemo\ControlElement\EndX',
        'ImagickDemo\ControlElement\EndY',
        'ImagickDemo\ControlElement\RoundX',
        'ImagickDemo\ControlElement\RoundY',
    ],

    'ImagickDemo\Control\BrightnessContrastImage' => [
        'ImagickDemo\ControlElement\Image',
        '\ImagickDemo\ControlElement\Brightness',
        '\ImagickDemo\ControlElement\Contrast',
    ],

    'ImagickDemo\Control\SelectiveBlurImage' => [
        'ImagickDemo\ControlElement\Image',
        'ImagickDemo\ControlElement\Radius',
        'ImagickDemo\ControlElement\Sigma',
        'ImagickDemo\ControlElement\Threshold',
        'ImagickDemo\ControlElement\Channel',
    ],


    'ImagickDemo\Control\BlurControl' => [
        'ImagickDemo\ControlElement\Image',
        'ImagickDemo\ControlElement\Radius',
        'ImagickDemo\ControlElement\Sigma',
        'ImagickDemo\ControlElement\Channel',
    ],
    
    
    'ImagickDemo\Control\BlueShiftControl' => [
        'ImagickDemo\ControlElement\Image',
        'ImagickDemo\ControlElement\BlueShift',
    ],

   
    'ImagickDemo\Control\EvaluateTypeControl' => [
        'ImagickDemo\ControlElement\EvaluateType',
        'ImagickDemo\ControlElement\FirstTerm',
        'ImagickDemo\ControlElement\GradientStartColor',
        'ImagickDemo\ControlElement\GradientEndColor',
    ],

    'ImagickDemo\Control\CompositeExampleControl' => [
        'ImagickDemo\ControlElement\CompositeExample',
    ],
    
    'ImagickDemo\Control\AnnotateImageControl' => [
        'ImagickDemo\ControlElement\Image',
        'ImagickDemo\ControlElement\StrokeColor',
        'ImagickDemo\ControlElement\FillColor',
    ],

    'ImagickDemo\Control\SigmoidalContrastControl' => [
        'ImagickDemo\ControlElement\Image',
        'ImagickDemo\ControlElement\Sharpening',
        'ImagickDemo\ControlElement\Midpoint',
        'ImagickDemo\ControlElement\SigmoidalContrast'
    ],

    'ImagickDemo\Control\ChopControl' => [
        'ImagickDemo\ControlElement\Image',
        'ImagickDemo\ControlElement\StartX',
        'ImagickDemo\ControlElement\StartY',
        'ImagickDemo\ControlElement\Width',
        'ImagickDemo\ControlElement\Height',
    ],
];

\Intahwebz\Functions::load();

foreach ($controls as $outputClassname => $components) {
    $lazyWeaveInfo = new \Weaver\CompositeWeaveInfo(
        'ImagickDemo\Control\ControlComposite',
        $components, 
        [
            'renderFormElement' => 'string',
            'getParams' => 'array',
        ]
    );
    $weaveMethod = new CompositeWeaveGenerator($lazyWeaveInfo);
    
    if (is_int($outputClassname) == false) {
        $weaveMethod->writeClass('../var/compile/', $outputClassname);
    }
    else {
        $weaveMethod->writeClass('../var/compile/');
    }
    
    
}



//
////This always needs to be last
//$weaver->writeClosureFactories(
//       '../generated/',
//           'Example',
//           'ClosureFactory',
//           $weaver->getClosureFactories()
//);




 