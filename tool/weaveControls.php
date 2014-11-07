<?php


if (defined('LOW_MEM_CLASS_LOADER') && LOW_MEM_CLASS_LOADER == true) {
    require __DIR__.'/../vendor/intahwebz/lowmemoryclassloader/LowMemoryClassloader.php';
}
else {
    require __DIR__.'/../vendor/autoload.php';
}

$controls = [

    'ImagickDemo\Imagick\Control\adaptiveBlurImage' => [
        'ImagickDemo\ControlElement\Radius',
        'ImagickDemo\ControlElement\Sigma',
        'ImagickDemo\ControlElement\Image',
        'ImagickDemo\ControlElement\Channel'
    ],

    'ImagickDemo\Imagick\Control\adaptiveResizeImage' => [
        'ImagickDemo\ControlElement\ResizeWidth',
        'ImagickDemo\ControlElement\ResizeHeight',
        'ImagickDemo\ControlElement\Image',
        'ImagickDemo\ControlElement\BestFit'
    ],

    'ImagickDemo\Imagick\Control\adaptiveSharpenImage' => [
        'ImagickDemo\ControlElement\Radius',
        'ImagickDemo\ControlElement\Sigma',
        'ImagickDemo\ControlElement\Image',
        'ImagickDemo\ControlElement\Channel'
    ],

    'ImagickDemo\Imagick\Control\adaptiveThresholdImage' => [
        'ImagickDemo\ControlElement\Width',
        'ImagickDemo\ControlElement\Height',
        'ImagickDemo\ControlElement\Image',
        'ImagickDemo\ControlElement\AdaptiveOffset'
    ],
    
    'ImagickDemo\Imagick\Control\addNoiseImage' => [
        'ImagickDemo\ControlElement\Image',
        'ImagickDemo\ControlElement\Noise',
        'ImagickDemo\ControlElement\Channel'
    ],

    'ImagickDemo\Imagick\Control\annotateImage' => [
        'ImagickDemo\ControlElement\Image',
        'ImagickDemo\ControlElement\StrokeColor',
        'ImagickDemo\ControlElement\FillColor',
    ],

    'ImagickDemo\Imagick\Control\blackThresholdImage' => [
        'ImagickDemo\ControlElement\Image',
        'ImagickDemo\ControlElement\ThresholdColor',
    ],

    'ImagickDemo\Imagick\Control\BlueShiftControl' => [
        'ImagickDemo\ControlElement\Image',
        'ImagickDemo\ControlElement\BlueShift',
    ],


    'ImagickDemo\Imagick\Control\BlurControl' => [
        'ImagickDemo\ControlElement\Image',
        'ImagickDemo\ControlElement\Radius',
        'ImagickDemo\ControlElement\Sigma',
        'ImagickDemo\ControlElement\Channel',
    ],

    'ImagickDemo\Imagick\Control\borderImage' => [
        'ImagickDemo\ControlElement\Image',
        'ImagickDemo\ControlElement\Width',
        'ImagickDemo\ControlElement\Height',
        'ImagickDemo\ControlElement\Color',
    ],

    'ImagickDemo\Imagick\Control\brightnessContrastImage' => [
        'ImagickDemo\ControlElement\Image',
        'ImagickDemo\ControlElement\Brightness',
        'ImagickDemo\ControlElement\Contrast',
        'ImagickDemo\ControlElement\Channel',
    ],

    
    'ImagickDemo\Imagick\Control\charcoalImage' => [
        'ImagickDemo\ControlElement\Radius',
        'ImagickDemo\ControlElement\Sigma',
        'ImagickDemo\ControlElement\Image'
    ],
    

    'ImagickDemo\Imagick\Control\chopImage' => [
        'ImagickDemo\ControlElement\Image',
        'ImagickDemo\ControlElement\StartX',
        'ImagickDemo\ControlElement\StartY',
        'ImagickDemo\ControlElement\Width',
        'ImagickDemo\ControlElement\Height50',
    ],

    'ImagickDemo\Imagick\Control\colorizeImage' => [
        'ImagickDemo\ControlElement\Image',
        'ImagickDemo\ControlElement\Color',
        'ImagickDemo\ControlElement\Opacity',
    ],


    
    
    'ImagickDemo\Imagick\Control\colorMatrixImage' => [
        'ImagickDemo\ControlElement\Image',
        'ImagickDemo\ControlElement\ColorMatrix',
    ],
    

    'ImagickDemo\Imagick\Control\contrastImage' => [
        'ImagickDemo\ControlElement\Image',
        'ImagickDemo\ControlElement\ContrastType',
    ],


    'ImagickDemo\Imagick\Control\cropImage' => [
        'ImagickDemo\ControlElement\Image',
        'ImagickDemo\ControlElement\StartX',
        'ImagickDemo\ControlElement\StartY',
        'ImagickDemo\ControlElement\Width',
        'ImagickDemo\ControlElement\Height50',
    ],

    'ImagickDemo\Imagick\Control\deskewImage' => [
        'ImagickDemo\ControlElement\Threshold',
    ],

    'ImagickDemo\Imagick\Control\floodFillPaintImage' => [

        'ImagickDemo\ControlElement\FillColor', //$fill,
        'ImagickDemo\ControlElement\Fuzz', //$fuzz, 
        'ImagickDemo\ControlElement\TargetColor', // $target,
        'ImagickDemo\ControlElement\PictureX',  // $x,
        'ImagickDemo\ControlElement\PictureY',  // $y,  
        'ImagickDemo\ControlElement\Inverse', //       $invert, 
        'ImagickDemo\ControlElement\Channel', //$channel
    ],

    'ImagickDemo\Imagick\Control\frameImage' => [
        'ImagickDemo\ControlElement\Image',
        'ImagickDemo\ControlElement\Color',
        'ImagickDemo\ControlElement\Width5',
        'ImagickDemo\ControlElement\Height5',
        'ImagickDemo\ControlElement\InnerBevel',
        'ImagickDemo\ControlElement\OuterBevel',
    ],

    'ImagickDemo\Imagick\Control\gammaImage' => [
        'ImagickDemo\ControlElement\Image',
        'ImagickDemo\ControlElement\Gamma',
        'ImagickDemo\ControlElement\Channel',
    ],
    
    'ImagickDemo\Imagick\Control\gaussianBlurImage' => [
        'ImagickDemo\ControlElement\Image',
        'ImagickDemo\ControlElement\Radius',
        'ImagickDemo\ControlElement\Sigma',
        'ImagickDemo\ControlElement\Channel',
    ],

    
    
    'ImagickDemo\Imagick\Control\mergeImageLayers' => [
        'ImagickDemo\ControlElement\LayerMethodType',
    ],

        
     'ImagickDemo\Imagick\Control\modulateImage' => [
         'ImagickDemo\ControlElement\Image',
         'ImagickDemo\ControlElement\ModulateHue',
         'ImagickDemo\ControlElement\ModulateSaturation',
         'ImagickDemo\ControlElement\ModulateBrightness',
    ],

    'ImagickDemo\Imagick\Control\motionBlurImage' => [
        'ImagickDemo\ControlElement\Image',
        'ImagickDemo\ControlElement\Radius20',
        'ImagickDemo\ControlElement\Sigma20',
        'ImagickDemo\ControlElement\Angle',
        'ImagickDemo\ControlElement\Channel',
    ],

    'ImagickDemo\Imagick\Control\negateImage' => [
        'ImagickDemo\ControlElement\Image',
        'ImagickDemo\ControlElement\GrayOnly',
        'ImagickDemo\ControlElement\Channel',
    ],
    

    'ImagickDemo\Imagick\Control\newPseudoImage' => [
        'ImagickDemo\ControlElement\CanvasType',
    ],

    'ImagickDemo\Imagick\Control\oilPaintImage' => [
        'ImagickDemo\ControlElement\Image',
        'ImagickDemo\ControlElement\Radius'
    ],

    
    
    'ImagickDemo\Imagick\Control\raiseImage' => [
        'ImagickDemo\ControlElement\Image',
        'ImagickDemo\ControlElement\Width',
        'ImagickDemo\ControlElement\Height',
        'ImagickDemo\ControlElement\X',
        'ImagickDemo\ControlElement\Y',
        'ImagickDemo\ControlElement\Raise',
    ],

    
    'ImagickDemo\Imagick\Control\randomThresholdimage' => [
        'ImagickDemo\ControlElement\Image',
        'ImagickDemo\ControlElement\LowThreshold',
        'ImagickDemo\ControlElement\HighThreshold',
        'ImagickDemo\ControlElement\Channel',
    ],

    
    'ImagickDemo\Imagick\Control\reduceNoiseImage' => [
        'ImagickDemo\ControlElement\Image',
        'ImagickDemo\ControlElement\ReduceNoise',
    ],

    
    'ImagickDemo\Imagick\Control\resizeImage' => [
        'ImagickDemo\ControlElement\Image',
        'ImagickDemo\ControlElement\FilterType',
        'ImagickDemo\ControlElement\Width',
        'ImagickDemo\ControlElement\Height',
        'ImagickDemo\ControlElement\Blur',
        'ImagickDemo\ControlElement\BestFit',
        'ImagickDemo\ControlElement\CropZoom',
        
    ],


    'ImagickDemo\Imagick\Control\rollImage' => [
        'ImagickDemo\ControlElement\Image',
        'ImagickDemo\ControlElement\RollX',
        'ImagickDemo\ControlElement\RollY',
    ],

    'ImagickDemo\Imagick\Control\rotateImage' => [
        'ImagickDemo\ControlElement\Image',
        'ImagickDemo\ControlElement\Angle',
        'ImagickDemo\ControlElement\Color',
    ],

    'ImagickDemo\Imagick\Control\quantizeImage' => [
        'ImagickDemo\ControlElement\Image',
        'ImagickDemo\ControlElement\NumberColors',
        'ImagickDemo\ControlElement\ColorSpace',
        'ImagickDemo\ControlElement\TreeDepth',
        'ImagickDemo\ControlElement\Dither',
    ],
    
    

    'ImagickDemo\Imagick\Control\segmentImage' => [
        'ImagickDemo\ControlElement\Image',
        'ImagickDemo\ControlElement\ClusterThreshold',
        'ImagickDemo\ControlElement\SmoothThreshold',
        'ImagickDemo\ControlElement\ColorSpace',
    ],


    'ImagickDemo\Imagick\Control\separateImageChannel' => [
        'ImagickDemo\ControlElement\Image',
        'ImagickDemo\ControlElement\Channel',
    ],

    'ImagickDemo\Imagick\Control\sepiaToneImage' => [
        'ImagickDemo\ControlElement\Image',
        'ImagickDemo\ControlElement\Sepia',
    ],

   
    'ImagickDemo\Imagick\Control\setImageOrientation' => [
        'ImagickDemo\ControlElement\Image',
        '\ImagickDemo\ControlElement\OrientationType'
    ],
    
    'ImagickDemo\Imagick\Control\setOption' => [
        'ImagickDemo\ControlElement\Image',
        'ImagickDemo\ControlElement\ImageOption',
    ],

    'ImagickDemo\Imagick\Control\sharpenImage' => [
        'ImagickDemo\ControlElement\Image',
        'ImagickDemo\ControlElement\Radius',
        'ImagickDemo\ControlElement\Sigma',
        'ImagickDemo\ControlElement\Channel'
    ],

    'ImagickDemo\Imagick\Control\shearImage' => [
        'ImagickDemo\ControlElement\Image',
        'ImagickDemo\ControlElement\ShearX',
        'ImagickDemo\ControlElement\ShearY',
        'ImagickDemo\ControlElement\Color'
    ],

    'ImagickDemo\Imagick\Control\SigmoidalContrastControl' => [
        'ImagickDemo\ControlElement\Image',
        'ImagickDemo\ControlElement\Sharpening',
        'ImagickDemo\ControlElement\Midpoint',
        'ImagickDemo\ControlElement\SigmoidalContrast'
    ],


  


    'ImagickDemo\Imagick\Control\sketchImage' => [
        'ImagickDemo\ControlElement\Image',
        'ImagickDemo\ControlElement\radius',
        'ImagickDemo\ControlElement\sigma',
        'ImagickDemo\ControlElement\angle'
    ],



    'ImagickDemo\Imagick\Control\spliceImage' => [
        'ImagickDemo\ControlElement\Image',
        'ImagickDemo\ControlElement\StartX',
        'ImagickDemo\ControlElement\StartY',
        'ImagickDemo\ControlElement\Width',
        'ImagickDemo\ControlElement\Height50',
    ],



    'ImagickDemo\Imagick\Control\spreadImage' => [
        'ImagickDemo\ControlElement\Image',
        'ImagickDemo\ControlElement\Radius',
    ],
    
    'ImagickDemo\Imagick\Control\thresholdImage' => [
        'ImagickDemo\ControlElement\Image',
        'ImagickDemo\ControlElement\Threshold',
        'ImagickDemo\ControlElement\Channel',
    ],
    

    'ImagickDemo\Imagick\Control\transparentPaintImage' => [
        'ImagickDemo\ControlElement\Color',
        'ImagickDemo\ControlElement\Alpha',
        'ImagickDemo\ControlElement\Fuzz'
    ],
    
    'ImagickDemo\Imagick\Control\trimImage' => [
        'ImagickDemo\ControlElement\Color',
        'ImagickDemo\ControlElement\Fuzz'
    ],
    
    
    'ImagickDemo\Imagick\Control\waveImage' => [
        'ImagickDemo\ControlElement\Image',
        'ImagickDemo\ControlElement\Amplitude',
        'ImagickDemo\ControlElement\Length'
    ],
    


    'ImagickDemo\Imagick\Control\whiteThresholdImage' => [
        'ImagickDemo\ControlElement\Image',
        'ImagickDemo\ControlElement\Color',
    ],
    
    
    
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
        'ImagickDemo\ControlElement\VirtualPixel'
    ],
    [
        'ImagickDemo\ControlElement\Image',
        'ImagickDemo\ControlElement\Swirl'
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



    'ImagickDemo\Control\SelectiveBlurImage' => [
        'ImagickDemo\ControlElement\Image',
        'ImagickDemo\ControlElement\Radius',
        'ImagickDemo\ControlElement\Sigma',
        'ImagickDemo\ControlElement\Threshold',
        'ImagickDemo\ControlElement\Channel',
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


    'ImagickDemo\ImagickDraw\Control\matte' => [
        'ImagickDemo\ControlElement\PaintType',
        'ImagickDemo\ControlElement\BackgroundColor',
        'ImagickDemo\ControlElement\StrokeColor',
        'ImagickDemo\ControlElement\FillColor',
    ],


    'ImagickDemo\Control\blackAndWhitePoint' => [
        '\ImagickDemo\ControlElement\BlackPoint',
        '\ImagickDemo\ControlElement\WhitePoint',
        'ImagickDemo\ControlElement\Gamma'
    ],
];

\Intahwebz\Functions::load();

foreach ($controls as $outputClassname => $components) {
    $compositeWeaveInfo = new \Weaver\CompositeWeaveInfo(
        'ImagickDemo\Control\ControlComposite',
        [
            'renderFormElement' => 'string',
            'getParams' => 'array',
        ],
        ['get.*']
    );

    $weave = \Weaver\Weaver::weave($components, $compositeWeaveInfo);

    if (is_int($outputClassname) == false) {
        $weave->writeFile('../var/compile/', $outputClassname);
    }
    else {
        $weave->writeFile('../var/compile/');
    }
}


 