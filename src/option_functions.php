<?php

declare(strict_types = 1);


/**
 * @param string|int $value
 * @param array<string, int> $values
 * @return string
 */
function getOptionFromOptions(string|int $option, array $values): string
{
    foreach ($values as $key => $value) {
        if (strcmp((string)$option, (string)$value) === 0) {
            return $key;
        }
    }

    throw new \Exception("Unknown option [$option]" . json_encode($values));
}


/**
 * @return array<string, int>
 */
function getPaintTypeOptions(): array
{
    return [
        "Point" => \Imagick::PAINT_POINT,
        "Replace" => \Imagick::PAINT_REPLACE,
        "Floodfill"=> \Imagick::PAINT_FLOODFILL,
        "Fill to border" => \Imagick::PAINT_FILLTOBORDER,
        "Reset" => \Imagick::PAINT_RESET,
    ];
}


/**
 * @return array<string, int>
 */
function getTextDecorationOptions(): array
{
    return [
        'None' => \Imagick::DECORATION_NO,
        'Underline' =>  \Imagick::DECORATION_UNDERLINE,
        'Overline' =>  \Imagick::DECORATION_OVERLINE,
        'Linethrough' => \Imagick::DECORATION_LINETROUGH
    ];
}


function getDistortionOptions()
{
    return [
         'Affine' => \Imagick::DISTORTION_AFFINE,
         'Affine projection' => \Imagick::DISTORTION_AFFINEPROJECTION,
         'Scale rotate translate' => \Imagick::DISTORTION_SCALEROTATETRANSLATE,
         'Perspective' => \Imagick::DISTORTION_PERSPECTIVE,
         'Perspective Projection' => \Imagick::DISTORTION_PERSPECTIVEPROJECTION,
         'Bilinear' => \Imagick::DISTORTION_BILINEAR,
         'Bilinear reverse' => \Imagick::DISTORTION_BILINEARREVERSE,
         'Polynomial' => \Imagick::DISTORTION_POLYNOMIAL,
         'Arc' => \Imagick::DISTORTION_ARC,
         'Polar' => \Imagick::DISTORTION_POLAR,
         'Depolar' => \Imagick::DISTORTION_DEPOLAR,
         'Cyclinder to plane' => \Imagick::DISTORTION_CYLINDER2PLANE,
         'Plane to cylinder' => \Imagick::DISTORTION_PLANE2CYLINDER,
         'Barrel' => \Imagick::DISTORTION_BARREL,
         'Barrel inverse' => \Imagick::DISTORTION_BARRELINVERSE,
         'Shepards' => \Imagick::DISTORTION_SHEPARDS,
         "Resize" => \Imagick::DISTORTION_RESIZE,
    ];
}

function getEvaluateOptions()
{
    return [
         'Add' => \Imagick::EVALUATE_ADD,
         'And' => \Imagick::EVALUATE_AND,
         'Divide' => \Imagick::EVALUATE_DIVIDE,
         'Leftshift' => \Imagick::EVALUATE_LEFTSHIFT,
         'Max' => \Imagick::EVALUATE_MAX,
         'Min' => \Imagick::EVALUATE_MIN,
         'Multiply' => \Imagick::EVALUATE_MULTIPLY,
         'Or' => \Imagick::EVALUATE_OR,
         'Rightshift' => \Imagick::EVALUATE_RIGHTSHIFT,
         'Set' => \Imagick::EVALUATE_SET,
         'Subtract' => \Imagick::EVALUATE_SUBTRACT,
         'Xor' => \Imagick::EVALUATE_XOR,
         'Pow' => \Imagick::EVALUATE_POW,
         'Log' => \Imagick::EVALUATE_LOG,
         'Threshold' => \Imagick::EVALUATE_THRESHOLD,
         'Threshold black' => \Imagick::EVALUATE_THRESHOLDBLACK,
         'Threshold white' => \Imagick::EVALUATE_THRESHOLDWHITE,
         'Gaussian noise' => \Imagick::EVALUATE_GAUSSIANNOISE,
         'Impulse noise' => \Imagick::EVALUATE_IMPULSENOISE,
         'Laplacian noise' => \Imagick::EVALUATE_LAPLACIANNOISE,
         'Multiplicative noise' => \Imagick::EVALUATE_MULTIPLICATIVENOISE,
         'Poisson noise' => \Imagick::EVALUATE_POISSONNOISE,
         'Uniform noise' => \Imagick::EVALUATE_UNIFORMNOISE,
         'Cosine' => \Imagick::EVALUATE_COSINE,
         'Sine' => \Imagick::EVALUATE_SINE,
         'Add modulus' => \Imagick::EVALUATE_ADDMODULUS,
    ];
}

function getFunctionImageOptions()
{
    return [
         'Polynomial' => "renderImagePolynomial",
         'Sinusoid' => "renderImageSinusoid",
         "Arc sin" => "renderImageArcsin",
         "Arc tan" => "renderImageArctan",
    ];
}

/**
 * @return array<string, string>
 */
function getImagePathOptions()
{
    $images = [
        'Skyline' => realpath(__DIR__ . "/../public/images/Skyline_400.jpg"),
        'Lorikeet' => realpath(__DIR__ . "/../public/images/Biter_500.jpg"),
        'People' => realpath(__DIR__ . "/../public/images/SydneyPeople_400.jpg"),
        'Low contrast' => realpath(__DIR__ . "/../public/images/LowContrast.jpg"),
    ];

    return $images;
}

/**
 * @return array<string, string>
 */
function getKernelRenderOptions()
{
    $images = [
        'image' => 'Image',
        'values' => 'Values',
    ];

    return $images;
}

function getKernelTypes(): array
{
    return [
        "Unity" => \Imagick::KERNEL_UNITY,
        "Gaussian" => \Imagick::KERNEL_GAUSSIAN,
        "Difference of Gaussians" => \Imagick::KERNEL_DIFFERENCE_OF_GAUSSIANS,
        "Laplacian of Gaussians" => \Imagick::KERNEL_LAPLACIAN_OF_GAUSSIANS,
        "Blur" => \Imagick::KERNEL_BLUR,
        "Comet" => \Imagick::KERNEL_COMET,
        "Laplacian" => \Imagick::KERNEL_LAPLACIAN,
        "Sobel" => \Imagick::KERNEL_SOBEL,
        "FreiChen" => \Imagick::KERNEL_FREI_CHEN,
        "Roberts" => \Imagick::KERNEL_ROBERTS,
        "Prewitt" => \Imagick::KERNEL_PREWITT,
        "Compass" => \Imagick::KERNEL_COMPASS,
        "Kirsch" => \Imagick::KERNEL_KIRSCH,
        "Diamond" => \Imagick::KERNEL_DIAMOND,
        "Square" => \Imagick::KERNEL_SQUARE,
        "Rectangle" => \Imagick::KERNEL_RECTANGLE,
        "Octagon" => \Imagick::KERNEL_OCTAGON,
        "Disk" => \Imagick::KERNEL_DISK,
        "Plus" => \Imagick::KERNEL_PLUS,
        "Cross" => \Imagick::KERNEL_CROSS,
        "Ring" => \Imagick::KERNEL_RING,
        "Peaks" => \Imagick::KERNEL_PEAKS,
        "Edges" => \Imagick::KERNEL_EDGES,
        "Corners" => \Imagick::KERNEL_CORNERS,
        "Diagonals" => \Imagick::KERNEL_DIAGONALS,
        "Line Ends" => \Imagick::KERNEL_LINE_ENDS,
        "Line Junctions" => \Imagick::KERNEL_LINE_JUNCTIONS,
        "Ridges" => \Imagick::KERNEL_RIDGES,
        "Convex Hull" => \Imagick::KERNEL_CONVEX_HULL,
        "Thin SE" => \Imagick::KERNEL_THIN_SE,
        "Skeleton" => \Imagick::KERNEL_SKELETON,
        "Chebyshev" => \Imagick::KERNEL_CHEBYSHEV,
        "Manhattan" => \Imagick::KERNEL_MANHATTAN,
        "Octagonal" => \Imagick::KERNEL_OCTAGONAL,
        "Euclidean" => \Imagick::KERNEL_EUCLIDEAN,
        "Binomial" => \Imagick::KERNEL_BINOMIAL,
        // \Imagick::KERNEL_USER_DEFINED => "User Defined", This isn't needed
        // Imagick has fromMatrix which is far saner to use.
    ];
}


function getTutorialCompositeOptions()
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


function getVirtualPixelOptions()
{
    return [
        'Background color' => \Imagick::VIRTUALPIXELMETHOD_BACKGROUND,
        // 'Constant' => \Imagick::VIRTUALPIXELMETHOD_CONSTANT, // IM 7 only
        'Edge' => \Imagick::VIRTUALPIXELMETHOD_EDGE,
        'Mirror' => \Imagick::VIRTUALPIXELMETHOD_MIRROR,
        'Tile' => \Imagick::VIRTUALPIXELMETHOD_TILE,
        'Transparent' => \Imagick::VIRTUALPIXELMETHOD_TRANSPARENT,
        'Mask' => \Imagick::VIRTUALPIXELMETHOD_MASK,
        'Black' => \Imagick::VIRTUALPIXELMETHOD_BLACK,
        'Gray' => \Imagick::VIRTUALPIXELMETHOD_GRAY,
        'White' => \Imagick::VIRTUALPIXELMETHOD_WHITE,
        'Horizontal tile' => \Imagick::VIRTUALPIXELMETHOD_HORIZONTALTILE,
        'Vertical tile' => \Imagick::VIRTUALPIXELMETHOD_VERTICALTILE,
        'Checker tile' => \Imagick::VIRTUALPIXELMETHOD_CHECKERTILE,
        'Dither' => \Imagick::VIRTUALPIXELMETHOD_DITHER,
        'Random' => \Imagick::VIRTUALPIXELMETHOD_RANDOM,

    ];
}


function getFXAnalyzeOptions()
{
    return [
        'Sinusoid' => 'example1',
        'Linear gradient' => 'example2',
        'Gamma gradient' => 'example3',
        'Squished sinusoid' => 'example4',
    ];
}

function getBackgroundColorChoiceOptions()
{
    return [
        "white" => "White",
        "black" => "Black",
        //"none" => "Transparent", //This needs webp to be nice.
    ];
}

function getChannelOptions()
{
    return [
        'Red' => \Imagick::CHANNEL_RED,
        //\Imagick::CHANNEL_GRAY      => 'Gray',
        //\Imagick::CHANNEL_CYAN      => 'Cyan',
        'Green' => \Imagick::CHANNEL_GREEN,
        //\Imagick::CHANNEL_MAGENTA   => 'Magenta',
        'Blue' => \Imagick::CHANNEL_BLUE,
        //\Imagick::CHANNEL_YELLOW    => 'Yellow',
        'Alpha' => \Imagick::CHANNEL_ALPHA,
        //\Imagick::CHANNEL_OPACITY   => 'Opacity',
        //\Imagick::CHANNEL_MATTE     => 'Matte',
        //\Imagick::CHANNEL_BLACK     => 'Black',
        //\Imagick::CHANNEL_INDEX     => 'Index',
        'All' => \Imagick::CHANNEL_ALL,
        //\Imagick::CHANNEL_DEFAULT   => 'Default',
    ];
}



function getEnabledOptions()
{
    return [
        'Disabled' => 0,
        'Enabled' => 1,
    ];
}


function getNoiseOptions()
{
    return [
        'Uniform'  => \Imagick::NOISE_UNIFORM,
        'Gaussian'  => \Imagick::NOISE_GAUSSIAN,
        'Multiplicative gaussian'  => \Imagick::NOISE_MULTIPLICATIVEGAUSSIAN,
        'Impulse'  => \Imagick::NOISE_IMPULSE,
        'Laplacian'  => \Imagick::NOISE_LAPLACIAN,
        'Poisson'  => \Imagick::NOISE_POISSON,
        'Random'  => \Imagick::NOISE_RANDOM,
    ];
}


function getContrastOptions()
{
    return [
        'Enabled - unsharpen' => 0,
        'Enabled - sharpen' => 1,
        'Disabled' => 2
    ];
}

//Example Imagick::newPseudoImage - getCanvasOptions
function getCanvasOptions()
{
    return [
        "magick:GRANITE" => "magick:GRANITE",
        "magick:LOGO" => "magick:LOGO",
        "NETSCAPE: - Netscape web safe colors" => "NETSCAPE:",
        "magick:WIZARD" =>   "magick:WIZARD",
        "canvas:khaki - Canvas constant" => "canvas:khaki",
        "xc:wheat - Canvas constant shorthand" => "xc:wheat",
        "magick:rose" => "magick:rose",
        "gradient:" => "gradient:",
        "gradient:black-fuchsia" => "gradient:black-fuchsia",
        "radial-gradient:" => "radial-gradient:",
        "radial-gradient:red-blue" => "radial-gradient:red-blue",
        "plasma:" => "plasma:",
        "plasma:tomato-steelblue" => "plasma:tomato-steelblue",
        "plasma:fractal" => "plasma:fractal",
        "pattern:hexagons" => "pattern:hexagons",
        "pattern:checkerboard" => "pattern:checkerboard",
        "pattern:leftshingle" => "pattern:leftshingle",
        "hald:[8] - identity hald clut, with 8 levels" => "hald:[8]",  // Identity Hald CLUT Image	Select levels like this: hald:[8] for level 8.
        "hald:[6] - identity hald clut, with 6 levels " => "hald:[6]",
    ];
}
//Example end

function getHaldClutOptions()
{
    return [
        "hald_8" => realpath(__DIR__ . "/../public/images/hald/hald_8.png"),

        "contrast" => realpath(__DIR__ . "/../public/images/hald/quelsolaar/contrast.HCLUT.png"),
        "Dark_blue" => realpath(__DIR__ . "/../public/images/hald/quelsolaar/Dark_blue.HCLUT.png"),
        "Deep_dark_blue" => realpath(__DIR__ . "/../public/images/hald/quelsolaar/Deep_dark_blue.HCLUT.png"),
        "Desat_dark" => realpath(__DIR__ . "/../public/images/hald/quelsolaar/Desat_dark.HCLUT.png"),
        "Desat_edge" => realpath(__DIR__ . "/../public/images/hald/quelsolaar/Desat_edge.HCLUT.png"),
        "desaturate" => realpath(__DIR__ . "/../public/images/hald/quelsolaar/desaturate.HCLUT.png"),
        "End_twist_left" => realpath(__DIR__ . "/../public/images/hald/quelsolaar/End_twist_left.HCLUT.png"),
        "End_twist_right" => realpath(__DIR__ . "/../public/images/hald/quelsolaar/End_twist_right.HCLUT.png"),
        "Identity_level_8" => realpath(__DIR__ . "/../public/images/hald/quelsolaar/Identity_level_8.HCLUT.png"),

        "Anime" => realpath(__DIR__ . "/../public/images/hald/creative/Anime.png"),
        "BleachBypass1" => realpath(__DIR__ . "/../public/images/hald/creative/BleachBypass1.png"),
        "CandleLight" => realpath(__DIR__ . "/../public/images/hald/creative/CandleLight.png"),
        "ColorNegative" => realpath(__DIR__ . "/../public/images/hald/creative/ColorNegative.png"),
        "CrispWarm" => realpath(__DIR__ . "/../public/images/hald/creative/CrispWarm.png"),
        "CrispWinter" => realpath(__DIR__ . "/../public/images/hald/creative/CrispWinter.png"),
        "DropBlues" => realpath(__DIR__ . "/../public/images/hald/creative/DropBlues.png"),
        "EdgyEmber" => realpath(__DIR__ . "/../public/images/hald/creative/EdgyEmber.png"),
        "FallColors" => realpath(__DIR__ . "/../public/images/hald/creative/FallColors.png"),
        "FoggyNight" => realpath(__DIR__ . "/../public/images/hald/creative/FoggyNight.png"),
        "FuturisticBleak1" => realpath(__DIR__ . "/../public/images/hald/creative/FuturisticBleak1.png"),
        "HorrorBlue" => realpath(__DIR__ . "/../public/images/hald/creative/HorrorBlue.png"),
        "LateSunset" => realpath(__DIR__ . "/../public/images/hald/creative/LateSunset.png"),
        "Moonlight" => realpath(__DIR__ . "/../public/images/hald/creative/Moonlight.png"),
        "NightFromDay" => realpath(__DIR__ . "/../public/images/hald/creative/NightFromDay.png"),
        "RedBlueYellow" => realpath(__DIR__ . "/../public/images/hald/creative/RedBlueYellow.png"),
        "Smokey" => realpath(__DIR__ . "/../public/images/hald/creative/Smokey.png"),
        "SoftWarming" => realpath(__DIR__ . "/../public/images/hald/creative/SoftWarming.png"),
        "TealMagentaGold" => realpath(__DIR__ . "/../public/images/hald/creative/TealMagentaGold.png"),
        "TealOrange" => realpath(__DIR__ . "/../public/images/hald/creative/TealOrange.png"),
        "TealOrange1" => realpath(__DIR__ . "/../public/images/hald/creative/TealOrange1.png"),
        "TensionGreen1" => realpath(__DIR__ . "/../public/images/hald/creative/TensionGreen1.png"),
    ];
}

function getGrayOnlyOptions()
{
    return [
        'All pixels' => 0,
        'Gray pixels only' => 1,
    ];
}