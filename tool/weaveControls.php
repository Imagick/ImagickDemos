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
    [
        'ImagickDemo\ControlElement\Image',
        'ImagickDemo\ControlElement\ColorSpace',
    ],

    [
        'ImagickDemo\ControlElement\Image',
        'ImagickDemo\ControlElement\StatisticType',
        'ImagickDemo\ControlElement\W20',
        'ImagickDemo\ControlElement\H20',
    ],

    [
        'ImagickDemo\ControlElement\BackgroundColor',
        'ImagickDemo\ControlElement\StrokeColor',
        'ImagickDemo\ControlElement\FillColor',
    ],
    [
        'ImagickDemo\ControlElement\Image',
        'ImagickDemo\ControlElement\DistortionExample',
    ],
];

\Intahwebz\Functions::load();

foreach ($controls as $components) {
    $lazyWeaveInfo = new \Weaver\CompositeWeaveInfo(
        'ImagickDemo\Control\ControlComposite',
        $components, 
        [
            'renderFormElement' => 'string',
            'getParams' => 'array',
        ]
    );
    $weaveMethod = new CompositeWeaveGenerator($lazyWeaveInfo);
    $weaveMethod->writeClass('../var/compile/');
}



//
////This always needs to be last
//$weaver->writeClosureFactories(
//       '../generated/',
//           'Example',
//           'ClosureFactory',
//           $weaver->getClosureFactories()
//);




 