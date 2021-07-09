<?php

namespace ImagickDemo\Navigation;

use ImagickDemo\Control\NullControl;
use ImagickDemo\Helper\PageInfo;

class CategoryInfo
{
    protected $currentExample;

    public function getCurrentName(PageInfo $pageInfo)
    {
        $exampleList = CategoryInfo::getCategoryList($pageInfo->getCategory());
        $currentExample = $pageInfo->getExample();


        foreach ($exampleList as $exampleName => $exampleDefinition) {
            if (strcasecmp($currentExample, $exampleName) === 0) {
                return $exampleName;
            }
        }

        return null;
    }

    public static function getExampleName(PageInfo $pageInfo)
    {
        $navName = self::getCurrentName($pageInfo);
        if ($navName) {
            return sprintf('ImagickDemo\%s\%s', $pageInfo->getCategory(), $navName);
        }

        if ($pageInfo->getCategory()) {
            return sprintf('ImagickDemo\%s\IndexExample', $pageInfo->getCategory());
        }
        
        return 'ImagickDemo\HomePageExample';
    }

    public static function getImageFunctionName(PageInfo $pageInfo)
    {
        $category = $pageInfo->getCategory();
        if ($category == null) {
            return 'ImagickDemo\HomePageExample';
        }
        
        $example = $pageInfo->getExample();
        if ($example == null) {
            return sprintf('ImagickDemo\%s\IndexExample', $category);
        }
        
        $exampleDefinition = self::getExampleDefinition($category, $example);
        $function = $exampleDefinition[0];

        return sprintf('ImagickDemo\%s\%s', $category, $function);
    }
 
    public static function getControlClassName(PageInfo $pageInfo)
    {
        $category = $pageInfo->getCategory();
        if ($category == null) {
            return null;
        }
        
        $example = $pageInfo->getExample();
        if ($example == null) {
            return null;
        }
        
        $exampleDefinition = self::getExampleDefinition($category, $example);

        return $exampleDefinition[1];
    }
    
    
    public static function getCustomImageFunctionName(PageInfo $pageInfo)
    {
        $category = $pageInfo->getCategory();
        $example = $pageInfo->getExample();
        $exampleDefinition = self::getExampleDefinition($category, $example);
        $function = $exampleDefinition[0];

        return [sprintf('ImagickDemo\%s\%s', $category, $function), 'renderCustomImage'];
    }

    public static function getDIInfo(PageInfo $pageInfo)
    {
        $category = $pageInfo->getCategory();
        $example = $pageInfo->getExample();



        if ($category == null || $example == null) {
            return ['ImagickDemo\Control\NullControl', []];
        }
        
        $exampleDefinition = self::getExampleDefinition($category, $example);
        
        $controlClass = $exampleDefinition[1];
        $params = [];

        if (array_key_exists('defaultParams', $exampleDefinition) == true) {
            foreach ($exampleDefinition['defaultParams'] as $name => $value) {
                $defaultName = 'default' . ucfirst($name);
                $params[$defaultName] = $value;
            }
        }

        return [$controlClass, $params];
    }

    public static function getExampleDefinition($category, $example)
    {
        $examples = self::getCategoryList($category);

        if (!isset($examples[$example])) {
            throw new \Exception("Somethings borked: example [$category][$example] doesn't exist.");
        }

        return $examples[$example];
    }
    
    public static function getCategoryList($category)
    {
        switch ($category) {
            case ('Imagick'): {
                return self::$imagickExamples;
            }
            case ('ImagickDraw'): {
                return self::$imagickDrawExamples;
            }
            case ('ImagickPixel'): {
                return self::$imagickPixelExamples;
            }
            case ('ImagickPixelIterator'): {
                return self::$imagickPixelIteratorExamples;
            }
            case ('ImagickKernel'): {
                return self::$imagickKernelExamples;
            }
            case ('Tutorial'): {
                return self::$tutorialExamples;
            }
        }

        throw new \Exception("Unknown category '$category'");
    }

    public static function findExample($category, $example)
    {
        $examples = self::getCategoryList($category);

        foreach ($examples as $exampleName => $exampleDetails) {
            if (strtolower($exampleName) == strtolower($example)) {
                return [$category, $exampleName];
            }
        }

        throw new \Exception("Unknown example '$example' for category '$category'");
    }
    
    
    public static $imagickExamples = [
        'adaptiveBlurImage' => ['adaptiveBlurImage', \ImagickDemo\Imagick\Control\adaptiveBlurImage::class],

        'adaptiveResizeImage' => ['adaptiveResizeImage', \ImagickDemo\Imagick\Control\adaptiveResizeImage::class],
        'adaptiveSharpenImage' => ['adaptiveSharpenImage', \ImagickDemo\Imagick\Control\adaptiveSharpenImage::class ],
        'adaptiveThresholdImage' => [
            'adaptiveThresholdImage',
            \ImagickDemo\Imagick\Control\adaptiveThresholdImage::class
        ],
        //'addImage',
        'addNoiseImage' => ['addNoiseImage', \ImagickDemo\Imagick\Control\addNoiseImage::class],
        'affineTransformImage' => ['affineTransformImage', \ImagickDemo\Control\ImageControl::class], //Doesn't work?
        //'animateImages',
        'annotateImage' => [
            'annotateImage',
            \ImagickDemo\Imagick\Control\annotateImage::class,
            'defaultParams' => [
                'fillColor' => 'rgb(232, 227, 232)'
            ],
        ],

        'appendImages' => ['appendImages', \ImagickDemo\Control\NullControl::class],
        'autoLevelImage' => ['autoLevelImage', \ImagickDemo\Control\ImageControl::class],
        'blackThresholdImage' => ['blackThresholdImage', \ImagickDemo\Imagick\Control\blackThresholdImage::class],
        'blueShiftImage' => ['blueShiftImage', \ImagickDemo\Imagick\Control\BlueShiftControl::class],
        'blurImage' => ['blurImage', \ImagickDemo\Imagick\Control\BlurControl::class],
        'borderImage' => ['borderImage', \ImagickDemo\Imagick\Control\borderImage::class],
        'brightnessContrastImage' => ['brightnessContrastImage', \ImagickDemo\Imagick\Control\brightnessContrastImage::class],

        
        'charcoalImage' => ['charcoalImage', \ImagickDemo\Imagick\Control\charcoalImage::class],
        'chopImage' => [
            'chopImage',
            \ImagickDemo\Imagick\Control\chopImage::class,
            'defaultParams' => [ 'width' => 100 ]
        ],
        //'clear' - alias of destroy
        //'clipPathImage' - tiff image, no1curr
        'clutImage' => ['clutImage', \ImagickDemo\Control\NullControl::class],
        'coalesceImages' => ['coalesceImages', \ImagickDemo\Control\NullControl::class],
        
        //This isn't implemented yet.
        //'colorDecisionListImage' => ['colorDecisionListImage', \ImagickDemo\Control\ImageControl::class],
        'colorizeImage' => ['colorizeImage', \ImagickDemo\Imagick\Control\colorizeImage::class],
        'colorMatrixImage' => [
            'colorMatrixImage', \ImagickDemo\Imagick\Control\colorMatrixImage::class
        ],
        //'combineImages',
        //'commentImage',
        //'compareImageChannels',
        //'compareImageLayers',
        //'compareImages',
        'compositeImage' => ['compositeImage',\ImagickDemo\Control\ImageControl::class ],
        // CompositeLayers
        //__construct',
        'contrastImage' => ['contrastImage', \ImagickDemo\Imagick\Control\contrastImage::class],
        //'contrastStretchImage',
        'convolveImage' => [
            'convolveImage',
            \ImagickDemo\Imagick\Control\convolveImage::class
        ],
        'cropImage' => ['cropImage', \ImagickDemo\Imagick\Control\cropImage::class],
        //'cropThumbnailImage',
        //'current',
        //'cycleColormapImage',
        //'constituteImage' => [ 'constituteImage', \ImagickDemo\Control\NullControl::class],
        // DestroyImage

        //'debugImage' => ['debugImage', \ImagickDemo\Control\NullControl::class ],
        
        //'decipherImage' - no1curr
        //'deconstructImages',
        //'deleteImageArtifact',
        'deskewImage' => ['deskewImage', \ImagickDemo\Imagick\Control\deskewImage::class ],
        'despeckleImage' => ['despeckleImage', \ImagickDemo\Control\ImageControl::class],
        //'destroy',
        //'displayImage' - no1curr, X server,
        //'displayImages' - no1curr, X server,
        'distortImage' => ['distortImage', \ImagickDemo\Control\ControlCompositeImageDistortionType::class],
        'drawImage' => [
            'drawImage', \ImagickDemo\Control\NullControl::class
        ],
        'edgeImage' => [
            'edgeImage',
            \ImagickDemo\Imagick\Control\edgeImage::class
        ],
        'embossImage' => [
            'embossImage',
            \ImagickDemo\Imagick\Control\embossImage::class
        ],
        //'encipherImage' - no1curr
        'enhanceImage' => ['enhanceImage', \ImagickDemo\Control\ImageControl::class],
        'equalizeImage' => ['equalizeImage', \ImagickDemo\Control\ImageControl::class],
        'evaluateImage' =>  ['evaluateImage', \ImagickDemo\Control\EvaluateTypeControl::class],
        'exportImagePixels' => ['exportImagePixels', \ImagickDemo\Control\ImageControl::class],
        'extentImage' => ['extentImage',\ImagickDemo\Control\ImageControl::class],
        'filter' => ['filter', \ImagickDemo\Control\ImageControl::class],
        //FrameImage
        'flattenImages' => ['flattenImages', \ImagickDemo\Control\NullControl::class],
        'flipImage' => ['flipImage', \ImagickDemo\Control\ImageControl::class],
        'floodFillPaintImage' => [
            'floodFillPaintImage',
            \ImagickDemo\Imagick\Control\floodFillPaintImage::class,
            'defaultParams' => [
                'x' => 260,
                'y' => 150,
                'fuzz' => 0.2,
                'fillColor' => 'rgb(0, 0, 0)',
                'targetColor' => 'rgb(245, 124, 24)'
            ]
        ],
        'flopImage' => ['flopImage', \ImagickDemo\Control\ImageControl::class],
        'forwardFourierTransformImage' => ['forwardFourierTransformImage', \ImagickDemo\Control\ImageControl::class],
        'frameImage' => ['frameImage', \ImagickDemo\Imagick\Control\frameImage::class],
        'functionImage' => ['functionImage', \ImagickDemo\Control\ImagickFunctionControl::class],
        'fxImage' => ['fxImage', \ImagickDemo\Control\ImageControl::class],
        'gammaImage' => ['gammaImage', \ImagickDemo\Imagick\Control\gammaImage::class],
        'gaussianBlurImage' => ['gaussianBlurImage', \ImagickDemo\Imagick\Control\gaussianBlurImage::class],
        //'getColorspace',
        //'getCompression',
        //'getCompressionQuality',
        'getCopyright'  => ['getCopyright', \ImagickDemo\Control\NullControl::class],
        //'getFilename',
        //'getFont',
        //'getFormat',
        //'getGravity',
        //'getHomeURL',
        //'getImage',
        //'getImageAlphaChannel',
        //'getImageArtifact',
        //'getImageBackgroundColor',
        //'getImageBlob',
        //'getImageBluePrimary',
        //'getImageBorderColor',
        //'getImageChannelDepth',
        //'getImageChannelDistortion',
        //'getImageChannelDistortions',
        //'getImageChannelExtrema',
        //'getImageChannelKurtosis',
        //'getImageChannelMean',
        //'getImageChannelRange',
        'getImageChannelStatistics' => ['getImageChannelStatistics', \ImagickDemo\Control\ImageControl::class],
        //'getImageClipMask',
        //'getImageColormapColor',
        //'getImageColors',
        //'getImageColorspace',
        //'getImageCompose',
        'getImageCompression' => ['getImageCompression', \ImagickDemo\Control\ImageControl::class],
        //'getCompressionQuality',
        //'getImageDelay',
        //'getImageDepth',
        //'getImageDispose',
        //'getImageDistortion',
        //'getImageExtrema',
        //'getImageFilename',
        //'getImageFormat',
        //'getImageGamma',
        'getImageGeometry' => ['getImageGeometry', \ImagickDemo\Control\ImageControl::class],
        //'getImageGravity',
        //'getImageGreenPrimary',
        //'getImageHeight',
        'getImageHistogram' => ['getImageHistogram', \ImagickDemo\Control\ImageControl::class],
        //'getImageIndex',
        //'getImageInterlaceScheme',
        //'getImageInterpolateMethod',
        //'getImageIterations',
        //'getImageLength',
        //'getImageMagickLicense',
        //'getImageMatte',
        //'getImageMatteColor',
        //'getImageOrientation',
        //'getImagePage',
        //'getImagePixelColor',
        //'getImageProfile',
        //'getImageProfiles',
        //'getImageProperties',
        //'getImageProperty',
        //'getImageRedPrimary',
        //'getImageRegion',
        //'getImageRenderingIntent',
        //'getImageResolution',
        //'getImagesBlob',
        //'getImageScene',
        //'getImageSignature',
        //'getImageSize',
        //'getImageTicksPerSecond',
        //'getImageTotalInkDensity',
        //'getImageType',
        //'getImageUnits',
        //'getImageVirtualPixelMethod',
        //'getImageWhitePoint',
        //'getImageWidth',
        //'getInterlaceScheme',
        //'getIteratorIndex',
        //'getNumberImages',
        //'getOption',
        //'getPackageName',
        //'getPage',
        'getPixelIterator' => ['getPixelIterator', \ImagickDemo\Control\ImageControl::class],
        'getPixelRegionIterator' => ['getPixelRegionIterator', \ImagickDemo\Control\ImageControl::class],
        //'getPointSize',
        //'getQuantumDepth',
        //'getQuantumRange',
        //'getReleaseDate',
        //'getResource',
        //'getResourceLimit',
        //'getSamplingFactors',
        //'getSize',
        //'getSizeOffset',
        //'getVersion',

        'haldClutImage' => ['haldClutImage', \ImagickDemo\Control\ImageControl::class],
        //'hasNextImage',
        //'hasPreviousImage',
        'identifyImage' => ['identifyImage', \ImagickDemo\Control\ImageControl::class],
        'identifyFormat' => ['identifyFormat', \ImagickDemo\Control\NullControl::class],
        
        'inverseFourierTransformImage' => ['forwardFourierTransformImage', \ImagickDemo\Control\ImageControl::class],
        'implodeImage'  => ['implodeImage', \ImagickDemo\Control\ImageControl::class],
        'importImagePixels' => ['importImagePixels', \ImagickDemo\Control\NullControl::class],
        //'labelImage' => basically does setImageProperty("label", $text)
        
        'levelImage' => [
            'levelImage',
            \ImagickDemo\Control\blackAndWhitePoint::class,
            'defaultParams' => [
                'blackPoint' => 50,
                'whitePoint' => 100
            ]
        ],
        'linearStretchImage' => [
            'linearStretchImage',
            \ImagickDemo\Control\linearStretchControl::class
        ],
        //'liquidRescaleImage',
        'magnifyImage' => ['magnifyImage', \ImagickDemo\Control\ImageControl::class],
        //'mapImage' - deprecated
        //'matteFloodfillImage' - deprecated
        'medianFilterImage' => ['medianFilterImage', \ImagickDemo\Control\ControlCompositeRadiusImage::class],

        'mergeImageLayers'  => ['mergeImageLayers', \ImagickDemo\Imagick\Control\mergeImageLayers::class],
        //'minifyImage', //MagickMinifyImage() is a convenience method that scales an image proportionally to one-half its original size
        'modulateImage' => ['modulateImage', \ImagickDemo\Imagick\Control\modulateImage::class],
        'montageImage'  => [
            'montageImage',
            \ImagickDemo\ImagickKernel\Control\MontageTypeControl::class
        ],
        'morphImages' => ['morphImages', \ImagickDemo\Control\NullControl::class],
        
        'morphology' => [
            'morphology',
            \ImagickDemo\ImagickKernel\Control\usage::class
        ],
        
        'mosaicImages' => ['mosaicImages', \ImagickDemo\Control\NullControl::class],
        'motionBlurImage' => ['motionBlurImage', \ImagickDemo\Imagick\Control\motionBlurImage::class],
        'negateImage' => ['negateImage', \ImagickDemo\Imagick\Control\negateImage::class],
        //'newImage',
        'newPseudoImage' => ['newPseudoImage', \ImagickDemo\Imagick\Control\newPseudoImage::class],
        //'nextImage',
        'normalizeImage' => [
            'normalizeImage',
            \ImagickDemo\Imagick\Control\separateImageChannel::class
        ],
        'oilPaintImage' => ['oilPaintImage', \ImagickDemo\Imagick\Control\oilPaintImage::class],
        'opaquePaintImage' => [
            'opaquePaintImage',
            \ImagickDemo\Imagick\Control\opaquePaintImage::class,
            'defaultParams' => [
                'color' => 'rgb(39, 194, 255)'
            ]
        ],
        //'optimizeImageLayers',
        // OptimizeImageTransparency
        'orderedPosterizeImage' => [
            'orderedPosterizeImage',
            \ImagickDemo\Imagick\Control\orderedPosterizeControl::class
        ],
        //'paintOpaqueImage', //deprecated
        //'paintTransparentImage', //deprecated
        'pingImage' => ['pingImage', \ImagickDemo\Control\ImageControl::class],
        'Quantum'  => ['Quantum', \ImagickDemo\Control\NullControl::class],
        //'pingImageBlob',
        //'pingImageFile',
        'polaroidImage'  => ['polaroidImage', \ImagickDemo\Control\ImageControl::class],
        'posterizeImage' => [
            'posterizeImage',
            \ImagickDemo\Imagick\Control\posterizeControl::class
        ],
        //'previewImages',
        //'previousImage',
        //'profileImage',
        'quantizeImage' => ['quantizeImage', \ImagickDemo\Imagick\Control\quantizeImage::class],
        //'quantizeImages' => ['quantizeImages', \ImagickDemo\Imagick\Control\quantizeImage::class],
        'queryFontMetrics'=> ['queryFontMetrics', \ImagickDemo\Control\NullControl::class],
        'queryFonts'=> ['queryFonts', \ImagickDemo\Control\NullControl::class],
        'queryFormats' => ['queryFormats', \ImagickDemo\Control\NullControl::class],
        'radialBlurImage' => ['radialBlurImage', \ImagickDemo\Control\ImageControl::class],
        'raiseImage' => [
            'raiseImage',
            \ImagickDemo\Imagick\Control\raiseImage::class,
            'defaultParams' => [
                'width' => 15,
                'height' => 15
            ]
        ],
        'randomThresholdImage' => ['randomThresholdImage', \ImagickDemo\Imagick\Control\randomThresholdimage::class],
        //'readImage',
        'readImageBlob'  => ['readImageBlob', \ImagickDemo\Control\NullControl::class],
        //'readImageFile',
        'recolorImage' => ['recolorImage', \ImagickDemo\Control\ImageControl::class],
        'reduceNoiseImage' => ['reduceNoiseImage', \ImagickDemo\Imagick\Control\reduceNoiseImage::class],
        'remapImage' => [
            'remapImage',
            \ImagickDemo\Control\RemapImageControl::class
        ],
        //'removeImage',
        //'removeImageProfile',
        //'render',
        'resampleImage' => ['resampleImage', \ImagickDemo\Control\ImageControl::class],
        //'resetImagePage',
        'resizeImage' => [
            'resizeImage',
            \ImagickDemo\Imagick\Control\resizeImage::class,
            'defaultParams' => [
                'width' => 200,
                'height' => 200
            ]
        ],
        'rollImage' => ['rollImage', \ImagickDemo\Imagick\Control\rollImage::class],
        'rotateImage' => ['rotateImage', \ImagickDemo\Imagick\Control\rotateImage::class],
        'rotationalBlurImage' => ['rotationalBlurImage', \ImagickDemo\Control\ImageControl::class],
        'roundCorners' => ['roundCorners', \ImagickDemo\Control\ImageControl::class],
        //'sampleImage',
        'scaleImage' => ['scaleImage', \ImagickDemo\Control\ImageControl::class],
        'segmentImage' => ['segmentImage', \ImagickDemo\Imagick\Control\segmentImage::class],
        'selectiveBlurImage' => ['selectiveBlurImage', \ImagickDemo\Control\SelectiveBlurImage::class ],
        'separateImageChannel' => ['separateImageChannel', \ImagickDemo\Imagick\Control\separateImageChannel::class],
        'sepiaToneImage' => ['sepiaToneImage', \ImagickDemo\Imagick\Control\sepiaToneImage::class],
        //'setBackgroundColor',
        //'setColorspace',
        //'setCompression',
        'setCompressionQuality' => [
            'setCompressionQuality',
            \ImagickDemo\Imagick\Control\imageQuality::class
        ],
        //'setFilename',
        //'setFirstIterator',
        //'setFont',
        //'setFormat',
        //'setGravity',
        //'setImage',
        //'setImageAlphaChannel',
        'setImageArtifact' => [
            'setImageArtifact',
            \ImagickDemo\Control\NullControl::class
        ],
        //'setImageBackgroundColor',
        'setImageBias' => [
            'setImageBias',
            \ImagickDemo\Imagick\Control\setImageBias::class
        ],
        //'setImageBluePrimary',
        //'setImageBorderColor',
        //'setImageChannelDepth',
        'setImageClipMask' => ['setImageClipMask', \ImagickDemo\Control\ImageControl::class],
        //'setImageColormapColor',
        //'setImageColorspace',
        //'setImageCompose',
        //'setImageCompression',
        'setImageCompressionQuality' => [
            'setImageCompressionQuality',
            \ImagickDemo\Imagick\Control\imageQuality::class
        ],
        //'setImageDepth',
        'setImageDelay' => ['setImageDelay', \ImagickDemo\Control\ImageControl::class],
        //'setImageDispose',
        //'setImageExtent',
        //'setImageFilename',
        //'setImageFormat',
        //'setImageGamma',
        //'setImageGravity',
        //'setImageGreenPrimary',
        //'setImageIndex',
        //'setImageInterlaceScheme',
        //'setImageInterpolateMethod',
        //'setImageIterations',
        //'setImageMatte',
        //'setImageMatteColor',
        //'setImageOpacity',
        'setImageOrientation' => ['setImageOrientation', \ImagickDemo\Imagick\Control\setImageOrientation::class],
        //'setImagePage',
        //'setImageProfile',
        //'setImageProperty',
        //'setImageRedPrimary',
        //'setImageRenderingIntent',
        'setImageResolution' => ['setImageResolution', \ImagickDemo\Control\ImageControl::class ],
        //'setImageScene',
        'setImageTicksPerSecond' => ['setImageTicksPerSecond', \ImagickDemo\Control\ImageControl::class ],
        //'setImageType',
        //'setImageUnits',
        //'setImageVirtualPixelMethod',
        //'setImageWhitePoint',
        //'setInterlaceScheme',
        'setIteratorIndex' => ['setIteratorIndex', \ImagickDemo\Control\NullControl::class ],
        //'setLastIterator',
        'setOption' => ['setOption', \ImagickDemo\Imagick\Control\setOption::class ],
        'setProgressMonitor' => ['setProgressMonitor', \ImagickDemo\Control\NullControl::class],
        //'setPage',
        //'setPointSize',
        //'setResolution',
        //'setResourceLimit',
        'setSamplingFactors' => [
            'setSamplingFactors',
            \ImagickDemo\Imagick\Control\samplingFactors::class
        ],
        //'setSize',
        //'setSizeOffset',
        //'setType',
        'shadeImage' => ['shadeImage', \ImagickDemo\Control\ImageControl::class ],
        'shadowImage' => ['shadowImage', \ImagickDemo\Control\ImageControl::class ],
        'sharpenImage' => ['sharpenImage', \ImagickDemo\Imagick\Control\sharpenImage::class],
        'shaveImage' => ['shaveImage', \ImagickDemo\Control\ImageControl::class],
        'shearImage' => ['shearImage', \ImagickDemo\Imagick\Control\shearImage::class],
        'sigmoidalContrastImage' => [
            'sigmoidalContrastImage',
            \ImagickDemo\Imagick\Control\SigmoidalContrastControl::class
        ],
        'sketchImage' => [
            'sketchImage',
            \ImagickDemo\Imagick\Control\sketchImage::class,
            'defaultParams' => [
                'sigma' => 15
            ]
        ],
        'smushImages' => ['smushImages', \ImagickDemo\Control\ImageControl::class],
        'stripImage' => ['stripImage', \ImagickDemo\Control\NullControl::class],
        'solarizeImage' => ['solarizeImage', \ImagickDemo\Control\ControlCompositeImageSolarizeThreshold::class],
        'sparseColorImage' => ['sparseColorImage', \ImagickDemo\Control\SparseColorControl::class],
        'spliceImage' => ['spliceImage', \ImagickDemo\Imagick\Control\spliceImage::class],
        'spreadImage' => ['spreadImage', \ImagickDemo\Imagick\Control\spreadImage::class],
        'statisticImage' => ['statisticImage', \ImagickDemo\Control\StatisticControl::class],
        'subImageMatch' => ['subImageMatch', \ImagickDemo\Control\ImageControl::class],
        'swirlImage' => ['swirlImage', \ImagickDemo\Control\ControlCompositeImageSwirl::class],
        'textureImage' => ['textureImage', \ImagickDemo\Control\ImageControl::class],
        'thresholdImage' => [
            'thresholdImage',
            \ImagickDemo\Imagick\Control\thresholdImage::class
        ],
        'thumbnailImage' => ['thumbnailImage', \ImagickDemo\Control\ImageControl::class],
        'tintImage' => [
            'tintImage',
            \ImagickDemo\Control\ControlCompositeRGBA::class,
            'defaultParams' => [
                'g' => 50
            ]
        ],
        'transformImage' => ['transformImage', \ImagickDemo\Control\ImageControl::class],
        'transparentPaintImage' => [
            'transparentPaintImage',
            \ImagickDemo\Imagick\Control\transparentPaintImage::class,
            'defaultParams' => [
                'color' => 'rgb(39, 194, 255)'
            ]
        ],
        'transposeImage' => ['transposeImage', \ImagickDemo\Control\ImageControl::class],
        'transformImageColorspace' => ['transformImageColorspace', \ImagickDemo\Control\TransformColorSpaceControl::class],

        'transverseImage' => ['transverseImage', \ImagickDemo\Control\ImageControl::class],
        'trimImage' => [
            'trimImage',
            \ImagickDemo\Imagick\Control\trimImage::class,
            'defaultParams' => [
                'color' => 'rgb(39, 194, 255)'
            ]
        ],
        'uniqueImageColors' => ['uniqueImageColors', \ImagickDemo\Control\ImageControl::class],
        'unsharpMaskImage' => ['unsharpMaskImage',\ImagickDemo\Control\ControlCompositeImageRadiusSigmaAmountUnsharpThresholdChannel::class ],
        'vignetteImage' => ['vignetteImage', \ImagickDemo\Control\ControlCompositeImageBlackPointWhitePointXY::class],
        'waveImage' => ['waveImage', \ImagickDemo\Imagick\Control\waveImage::class],
        'whiteThresholdImage' => [
            'whiteThresholdImage',
            \ImagickDemo\Imagick\Control\whiteThresholdImage::class
        ],
    ];

    public static $imagickDrawExamples = [

        'affine' => [
            'affine',
            \ImagickDemo\Control\ReactControls::class
        ],

        'arc' => ['arc', \ImagickDemo\Control\ArcControl::class],
        'bezier' => ['bezier', \ImagickDemo\Control\ReactControls::class],
        'circle' => ['circle', \ImagickDemo\Control\CircleControl::class],
        'composite' => ['composite', \ImagickDemo\Control\ReactControls::class],
        'ellipse' => ['ellipse', \ImagickDemo\Control\ReactControls::class],
        //'getVectorGraphics' => ['setVectorGraphics', \ImagickDemo\Control\NullControl::class],
        'line' => ['line', \ImagickDemo\Control\ReactControls::class],
        'matte' => ['matte', \ImagickDemo\Control\ReactControls::class],

        'pathCurveToQuadraticBezierAbsolute' => [
            'pathCurveToQuadraticBezierAbsolute',
            \ImagickDemo\Control\ReactControls::class,
            'name' => "pathCurveToQuadratic BezierAbsolute",
        ],
        'pathCurveToQuadraticBezierSmoothAbsolute' => [
            'pathCurveToQuadraticBezierSmoothAbsolute',
            \ImagickDemo\Control\ReactControls::class,
            'name' => 'pathCurveToQuadratic BezierSmoothAbsolute',
        ],
        'pathStart' => [
            'pathStart',
            \ImagickDemo\Control\ReactControls::class
            //\ImagickDemo\Control\ReactControls::class
        ],
        'point' => [
            'point',
            \ImagickDemo\Control\ReactControls::class
        ],
        'polygon' => [
            'polygon',
            \ImagickDemo\Control\ReactControls::class
        ],
        'polyline' => [
            'polyline',
            \ImagickDemo\Control\ReactControls::class
        ],
        'pop' => [
            'push',
            \ImagickDemo\Control\ReactControls::class
            // \ImagickDemo\Control\ControlCompositeBackgroundColorStrokeColorFillColorFillModifiedColor::class
        ],
        'popClipPath' => ['setClipPath', \ImagickDemo\Control\ReactControls::class],
        'popPattern' => ['pushPattern', \ImagickDemo\Control\ReactControls::class],
        'popDefs' => ['popDefs', \ImagickDemo\Control\ReactControls::class],
        'push' => [
            'push',
            \ImagickDemo\Control\ReactControls::class
            // \ImagickDemo\Control\ControlCompositeBackgroundColorStrokeColorFillColorFillModifiedColor::class
        ],
        'pushClipPath' => ['setClipPath', \ImagickDemo\Control\ReactControls::class],
        'pushPattern' => ['pushPattern', \ImagickDemo\Control\ReactControls::class],
        'rectangle' => ['rectangle', \ImagickDemo\Control\ReactControls::class],
        //'render' => ['render', \ImagickDemo\Control\ReactControls::class],
        'rotate' => [
            'rotate',
            \ImagickDemo\Control\ReactControls::class
            //\ImagickDemo\Control\ControlCompositeBackgroundColorStrokeColorFillColorFillModifiedColor::class
        ],
        'roundRectangle' => ['roundRectangle', \ImagickDemo\Control\RoundRectangleControl::class],
        'scale' => [
            'scale',
            \ImagickDemo\Control\ReactControls::class
//            \ImagickDemo\Control\ControlCompositeBackgroundColorStrokeColorFillColorFillModifiedColor::class
        ],
        'setClipPath' => ['setClipPath', \ImagickDemo\Control\ReactControls::class],
        'setClipRule' => ['setClipRule', \ImagickDemo\Control\ReactControls::class],
        'setClipUnits' => ['setClipUnits', \ImagickDemo\Control\ReactControls::class],
        'setFillAlpha' => ['setFillAlpha', \ImagickDemo\Control\ReactControls::class],
        'setFillColor' => ['setFillColor', \ImagickDemo\Control\ReactControls::class],
        'setFillOpacity' => ['setFillOpacity', \ImagickDemo\Control\ReactControls::class],
        'setFillRule' => ['setFillRule', \ImagickDemo\Control\ReactControls::class],
        'setFont' => ['setFont', \ImagickDemo\Control\ReactControls::class],
        'setFontFamily' => ['setFontFamily', \ImagickDemo\Control\ReactControls::class],
        'setFontSize' => ['setFontSize', \ImagickDemo\Control\ReactControls::class],
        'setFontStretch' => ['setFontStretch', \ImagickDemo\Control\ReactControls::class],
        'setFontStyle' => ['setFontStyle', \ImagickDemo\Control\ReactControls::class],
        'setFontWeight' => ['setFontWeight', \ImagickDemo\Control\ReactControls::class],
        'setGravity' => ['setGravity', \ImagickDemo\Control\ReactControls::class],
        'setStrokeAlpha' => ['setStrokeAlpha', \ImagickDemo\Control\ReactControls::class],
        'setStrokeAntialias' => ['setStrokeAntialias', \ImagickDemo\Control\ReactControls::class],
        'setStrokeColor' => ['setStrokeColor', \ImagickDemo\Control\ReactControls::class],
        'setStrokeDashArray' => ['setStrokeDashArray', \ImagickDemo\Control\ReactControls::class],
        'setStrokeDashOffset' => ['setStrokeDashOffset', \ImagickDemo\Control\ReactControls::class],
        'setStrokeLineCap' => ['setStrokeLineCap', \ImagickDemo\Control\ReactControls::class],
        'setStrokeLineJoin' => ['setStrokeLineJoin', \ImagickDemo\Control\ReactControls::class],
        'setStrokeMiterLimit' => ['setStrokeMiterLimit', \ImagickDemo\Control\ReactControls::class],
        'setStrokeOpacity' => ['setStrokeOpacity', \ImagickDemo\Control\ReactControls::class],
        'setStrokeWidth' => ['setStrokeWidth', \ImagickDemo\Control\ReactControls::class],
        'setTextAlignment' => ['setTextAlignment', \ImagickDemo\Control\ReactControls::class],
        'setTextAntialias' => ['setTextAntialias', \ImagickDemo\Control\ReactControls::class],
        'setTextDecoration' => ['setTextDecoration', \ImagickDemo\Control\ReactControls::class],
        'setTextUnderColor' => ['setTextUnderColor', \ImagickDemo\Control\ReactControls::class],
        //'setVectorGraphics' => ['setVectorGraphics', \ImagickDemo\Control\NullControl::class],
        'setViewBox' => ['setViewBox', \ImagickDemo\Control\ReactControls::class],
        'skewX' => ['skewX', \ImagickDemo\Control\ReactControls::class],//\ImagickDemo\Control\SkewControl::class],
        'skewY' => ['skewY', \ImagickDemo\Control\ReactControls::class],//\ImagickDemo\Control\SkewControl::class],
        'translate' => [
            'translate',
            \ImagickDemo\Control\ReactControls::class
        //    \ImagickDemo\Control\TranslateControl::class
        ],
    ];


    public static $imagickPixelExamples = [
        'construct' => ['construct', \ImagickDemo\Control\NullControl::class],
        'getColor' => ['getColor', \ImagickDemo\Control\NullControl::class],
        'getColorAsString' => ['getColorAsString', \ImagickDemo\Control\NullControl::class],
        'getColorCount' => ['getColorCount', \ImagickDemo\Control\NullControl::class],
        'getColorValue' => ['getColorValue', \ImagickDemo\Control\NullControl::class],
        'getColorValueQuantum' => ['getColorValueQuantum', \ImagickDemo\Control\NullControl::class],
        'getHSL' => ['getHSL', \ImagickDemo\Control\NullControl::class],
        'isSimilar' => ['isPixelSimilar', \ImagickDemo\Control\NullControl::class],
        'isPixelSimilar' => ['isPixelSimilar', \ImagickDemo\Control\NullControl::class],
        'setColor' => ['setColor', \ImagickDemo\Control\NullControl::class],
        'setColorValue' => ['setColorValue', \ImagickDemo\Control\NullControl::class],
        'setColorValueQuantum' => ['setColorValueQuantum', \ImagickDemo\Control\NullControl::class],
        'setHSL' => ['setHSL', \ImagickDemo\Control\NullControl::class],
    ];


    public static $imagickPixelIteratorExamples = [
        'clear' => ['clear', \ImagickDemo\Control\ImageControl::class],
        'construct' => ['construct', \ImagickDemo\Control\ImageControl::class],
        //'getCurrentIteratorRow',
        //'getIteratorRow' => 'setIteratorRow',
        'getNextIteratorRow' => ['getNextIteratorRow', \ImagickDemo\Control\ImageControl::class ],
        //'getPreviousIteratorRow',
        //'newPixelIterator', deprecated
        //'newPixelRegionIterator', deprecated
        'resetIterator' => ['resetIterator', \ImagickDemo\Control\ImageControl::class],
        //'setIteratorFirstRow',
        //'setIteratorLastRow',
        'setIteratorRow' => ['setIteratorRow', \ImagickDemo\Control\ImageControl::class],
        'syncIterator' => ['construct', \ImagickDemo\Control\ImageControl::class],
    ];



    public static $imagickKernelExamples = [
        'addKernel'      => [
            'addKernel',
            \ImagickDemo\Control\ReactControls::class
            //\ImagickDemo\Control\ImageControl::class
        ],
        'addUnityKernel' => ['addUnityKernel', \ImagickDemo\Control\NullControl::class],
        'fromMatrix'     => [
            'fromMatrix',
            // \ImagickDemo\ImagickKernel\Control\fromMatrixControl::class
            \ImagickDemo\Control\ReactControls::class
        ],
        'fromBuiltin'    => [
            'fromBuiltin',
            \ImagickDemo\ImagickKernel\Control\fromBuiltIn::class
        ],
        'getMatrix'      => ['getMatrix', \ImagickDemo\Control\ReactControls::class],
        'scale'          => ['scale', \ImagickDemo\Control\NullControl::class],
        'separate'       => ['separate', \ImagickDemo\Control\NullControl::class],
        
    ];


    public static $tutorialExamples = [
        'backgroundMasking' => [
            'backgroundMasking',
            NullControl::class,
            'name' => 'Background masking'
        ],
        'composite' => ['composite', \ImagickDemo\Control\CompositeExampleControl::class ],
        //'colorspaceLinearity' => ['colorspaceLinearity', \ImagickDemo\Control\NullControl::class],
        
        'diffMarking' => [
            'diffMarking',
            \ImagickDemo\Control\NullControl::class,
            'name' => "Difference marking"
        ],
        
        'edgeExtend' => [
            'edgeExtend',
            \ImagickDemo\Control\ControlCompositeImageVirtualPixel::class,
            'name' => "Extending images"
            
        ],
        //'compressImages' => ['compressImages', \ImagickDemo\Control\NullControl::class],
        'fxAnalyzeImage' => [
            'fxAnalyzeImage',
            \ImagickDemo\Control\FXAnalyzeControl::class
        ],


        'eyeColorResolution' => [
            'EyeColourResolution',
            \ImagickDemo\Control\ReactControls::class
        ],

        //'creatingGifs' => ['creatingGifs', \ImagickDemo\Control\NullControl::class],
        'deconstructGif' => ['deconstructGif', \ImagickDemo\Control\NullControl::class],

        'fontEffect' => ['fontEffect', \ImagickDemo\Control\NullControl::class],
        //'gifGeneration' => ['gifGeneration', \ImagickDemo\Control\NullControl::class],
        'gradientGeneration' => ['gradientGeneration', \ImagickDemo\Control\NullControl::class],
        'gradientReflection' => [
            'gradientReflection',
            \ImagickDemo\Control\NullControl::class,
            'name' => "Gradient reflection"
        ],
        'imagickComposite' => ['imagickComposite', \ImagickDemo\Control\NullControl::class],
        'imagickCompositeGen' => [
            'imagickCompositeGen',
            \ImagickDemo\Control\blendComposite::class,

            'defaultParams' => [
                'contrast' => 10
            ]
        ],
        'listColors' => ['listColors', \ImagickDemo\Control\NullControl::class],
        'levelizeImage' => [
            'levelizeImage',
            \ImagickDemo\Control\blackAndWhitePoint::class,
            'defaultParams' => [
                'blackPoint' => 50,
                'whitePoint' => 100
            ]
        ],
        'layerPSD' => ['layerPSD', \ImagickDemo\Control\NullControl::class],
        'logoTshirt' => ['logoTshirt', \ImagickDemo\Control\NullControl::class],
//        'multiLineWrap' => [
//            'multiLineWrap',
//            \ImagickDemo\Control\NullControl::class,
//            'name' => "Multi-line wrap"
//        ],
        'psychedelicFont' => ['psychedelicFont', \ImagickDemo\Control\NullControl::class],
        'psychedelicFontGif' => ['psychedelicFontGif', \ImagickDemo\Control\NullControl::class],

        'whirlyGif' =>  ['whirlyGif', \ImagickDemo\Imagick\Control\loopGif::class],
        'svgExample' => ['svgExample', \ImagickDemo\Control\NullControl::class],
        'screenEmbed' => ['screenEmbed', \ImagickDemo\Control\NullControl::class],
        'imageGeometryReset' => ['imageGeometryReset', \ImagickDemo\Control\NullControl::class],


        'HumanFeelings' => [
            'HumanFeelings',
            NullControl::class,
            'name' => 'Human feelings'
        ],

    ];

//        public static $examples = [
//            'Imagick' => $imagickExamples,
//            'ImagickDraw' => $imagickDrawExamples,
//            'ImagickPixel' => $imagickPixelExamples,
//            'ImagickPixelIterator' => $imagickPixelIteratorExamples,
//            'ImagickKernel' => $imagickKernelExamples,
//            'Tutorial' => $tutorialExamples,
//        ];
}
