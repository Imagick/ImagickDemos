<?php


namespace ImagickDemo\Imagick;


function header($string, $replace = true, $http_response_code = null) {
    global $imageType;

    if (stripos($string, "Content-Type: image/") === 0) {
        $imageType = substr($string, strlen("Content-Type: image/"));
    }

    \header($string, $replace, $http_response_code);
}

use \ImagickDemo\Control\ImageControl;

class ImagickNav extends \ImagickDemo\Navigation\Nav implements \ImagickDemo\Navigation\ActiveNav   {


    
    private $imagickExamples = [
        
        ['adaptiveBlurImage', ImageControl::class],
        ['adaptiveResizeImage', ImageControl::class],
        ['adaptiveSharpenImage', ImageControl::class],
        ['adaptiveThresholdImage',  ImageControl::class],
//'addImage',
        ['addNoiseImage',  ImageControl::class],
        ['affineTransformImage',  ImageControl::class], //Doesn't work?
//'animateImages',
//'annotateImage',
//'appendImages',
        ['averageImages',  ImageControl::class],
        ['blackThresholdImage',  ImageControl::class],
        ['blurImage',  ImageControl::class],
        ['borderImage', ImageControl::class],
        ['charcoalImage', ImageControl::class],
        ['chopImage', ImageControl::class],
//'clear',
        ['clipImage', ImageControl::class],
//'clipPathImage',
        ['clutImage', ImageControl::class],
//'coalesceImages',
        ['colorFloodfillImage', ImageControl::class],
        ['colorizeImage', ImageControl::class],
//'combineImages',
//'commentImage',
//'compareImageChannels',
//'compareImageLayers',
//'compareImages',
//'compositeImage',
//__construct',
        ['contrastImage', ImageControl::class],
//'contrastStretchImage',
        ['convolveImage', ImageControl::class],
        ['cropImage', ImageControl::class],
//'cropThumbnailImage',
//'current',
//'cycleColormapImage',
//'decipherImage',
//'deconstructImages',
//'deleteImageArtifact',
        ['deskewImage', ImageControl::class],
        ['despeckleImage', ImageControl::class],
//'destroy',
//'displayImage',
//'displayImages',
//'distortImage',
//'drawImage',
//'edgeImage',
//'embossImage',
//'encipherImage',
        ['edgeExtend', ImageControl::class],
        ['enhanceImage', ImageControl::class],
        ['equalizeImage', ImageControl::class],
//'evaluateImage',
//'exportImagePixels',
//'extentImage',
//'flattenImages',
        ['flipImage', ImageControl::class],
//'floodFillPaintImage',
        ['flopImage', ImageControl::class],
//'frameImage',
        ['functionImage', ImageControl::class],
        ['fxImage', ImageControl::class],
        ['gammaImage', ImageControl::class],
        ['gaussianBlurImage', ImageControl::class],
//'getColorspace',
//'getCompression',
//'getCompressionQuality',
//'getCopyright',
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
        ['getImageChannelStatistics', ImageControl::class],
//'getImageClipMask',
//'getImageColormapColor',
//'getImageColors',
//'getImageColorspace',
//'getImageCompose',
//'getImageCompression',
//'getCompressionQuality',
//'getImageDelay',
//'getImageDepth',
//'getImageDispose',
//'getImageDistortion',
//'getImageExtrema',
//'getImageFilename',
//'getImageFormat',
//'getImageGamma',
//'getImageGeometry',
//'getImageGravity',
//'getImageGreenPrimary',
//'getImageHeight',
        ['getImageHistogram', ImageControl::class],
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
        ['getPixelIterator', ImageControl::class],
        ['getPixelRegionIterator', ImageControl::class],
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
//'haldClutImage',
//'hasNextImage',
//'hasPreviousImage',
        ['identifyImage', ImageControl::class],
//'implodeImage',
//'importImagePixels',
//'labelImage',
//'levelImage',
//'linearStretchImage',
//'liquidRescaleImage',
        ['magnifyImage', ImageControl::class],
//'mapImage',
//'matteFloodfillImage',
//'medianFilterImage',
//'mergeImageLayers',
//'minifyImage',
        ['modulateImage', ImageControl::class],
//'montageImage',
//'morphImages',
//'mosaicImages',
        ['motionBlurImage', ImageControl::class],
        ['negateImage', ImageControl::class],
//'newImage',
        ['newPseudoImage', ImageControl::class],
        ['newPseudoImage2', ImageControl::class],
//'nextImage',
        ['normalizeImage', ImageControl::class],
        ['oilPaintImage', ImageControl::class],
//'opaquePaintImage',
//'optimizeImageLayers',
//'orderedPosterizeImage',
//'paintFloodfillImage',
//'paintOpaqueImage',
//'paintTransparentImage',
        ['pingImage', ImageControl::class],
        ['Quantum', null],
//'pingImageBlob',
//'pingImageFile',
//'polaroidImage',
//'posterizeImage',
//'previewImages',
//'previousImage',
//'profileImage',
//'quantizeImage',
//'quantizeImages',
//'queryFontMetrics',
//'queryFonts',
//'queryFormats',
        ['radialBlurImage', ImageControl::class],
//'raiseImage',
//'randomThresholdImage',
//'readImage',
//'readImageBlob',
//'readImageFile',
        ['recolorImage', ImageControl::class],
//'reduceNoiseImage',
        ['remapImage', ImageControl::class],
//'removeImage',
//'removeImageProfile',
//'render',
        ['resampleImage', ImageControl::class],
//'resetImagePage',
//'resizeImage',
//'rollImage',
        ['rotateImage', ImageControl::class],
//'roundCorners',
//'sampleImage',
        ['scaleImage', ImageControl::class],
        ['screenEmbed', ImageControl::class],
        ['segmentImage', ImageControl::class],
//'separateImageChannel',
        ['sepiaToneImage', ImageControl::class],
//'setBackgroundColor',
//'setColorspace',
//'setCompression',
//'setCompressionQuality',
//'setFilename',
//'setFirstIterator',
//'setFont',
//'setFormat',
//'setGravity',
//'setImage',
//'setImageAlphaChannel',
        ['setImageArtifact', ImageControl::class],
//'setImageBackgroundColor',
//'setImageBias',
//'setImageBluePrimary',
//'setImageBorderColor',
//'setImageChannelDepth',
//'setImageClipMask',
//'setImageColormapColor',
//'setImageColorspace',
//'setImageCompose',
//'setImageCompression',
//'setImageCompressionQuality',

//'setImageDepth',
        ['setImageDelay', ImageControl::class],
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
//'setImageOrientation',
//'setImagePage',
//'setImageProfile',
//'setImageProperty',
//'setImageRedPrimary',
//'setImageRenderingIntent',
//'setImageResolution',
//'setImageScene',

        ['setImageTicksPerSecond', ImageControl::class],
//'setImageType',
//'setImageUnits',
//'setImageVirtualPixelMethod',
//'setImageWhitePoint',
//'setInterlaceScheme',
//'setIteratorIndex',
//'setLastIterator',
        ['setOption', ImageControl::class],
//'setPage',
//'setPointSize',
//'setResolution',
//'setResourceLimit',
//'setSamplingFactors',
//'setSize',
//'setSizeOffset',
//'setType',
        ['shadeImage', ImageControl::class],
        ['shadowImage', ImageControl::class],
        ['sharpenImage', ImageControl::class],
        ['shaveImage', ImageControl::class],
        ['shearImage', ImageControl::class],
//'sigmoidalContrastImage',
        ['sketchImage', ImageControl::class],
        ['solarizeImage', ImageControl::class],
        ['sparseColorImage', ImageControl::class],
//        'sparseColorImage_bilinear',
//        'sparseColorImage_shepards',
//        'sparseColorImage_voronoi',
        ['spliceImage', ImageControl::class],
        ['spreadImage', ImageControl::class],
//'steganoImage',
//'stereoImage',
//'stripImage',
        ['swirlImage', ImageControl::class],
//'textureImage',
//'thresholdImage',
        ['thumbnailImage', ImageControl::class],
        ['tintImage',  ImageControl::class],//what is this
        ['transformImage', ImageControl::class],
//'transparentPaintImage',
        ['transposeImage', ImageControl::class],
        ['transverseImage', ImageControl::class],
        ['trimImage', ImageControl::class],
        ['uniqueImageColors', ImageControl::class],
        ['unsharpMaskImage', ImageControl::class],
//'valid',
        ['vignetteImage', ImageControl::class],
        ['waveImage', ImageControl::class],
//'whiteThresholdImage',
//'writeImage',
//'writeImageFile',
//'writeImages',
//'writeImagesFile',
    ];


    function getNavOptions() {
        return $this->imagickExamples;
    }
    
    
    function display($example, \Auryn\Provider $provider) {
        $this->currentExample = $example;
        
        $classname = 'ImagickDemo\Imagick\\' . $example;
        $provider->defineParam('imageBaseURL', '/image/Imagick/'.$example);
        $provider->alias(\ImagickDemo\Example::class, $classname);
        $provider->alias(\ImagickDemo\Navigation\ActiveNav::class, get_class($this));
        $currentNavOption = $this->getCurrent($this->currentExample);
        $provider->alias(\ImagickDemo\Control::class, $currentNavOption->getControl());
        $provider->share(\ImagickDemo\Control::class);
        $provider->share($this);
        $provider->defineParam('pageTitle', "Imagick - $example");
    }

    function displayIndex(\Auryn\Provider $provider) {
        $provider->alias(\ImagickDemo\Navigation\ActiveNav::class, get_class($this));
        $provider->share($this);
    }

    function renderImage($example, \Auryn\Provider $provider) {
        $classname = '\ImagickDemo\Imagick\\' . $example;

        $provider->defineParam('imageBaseURL', '/image/Imagick/'.$example);
        
        $provider->alias(\ImagickDemo\Example::class, $classname);
        $provider->execute([\ImagickDemo\ImageExampleCache::class, 'renderImageSafe']);
    }

    function getBaseURI() {
        return "Imagick";
    }

    function renderTitle() {
        if ($this->currentExample) {
            return $this->currentExample;
        }
        return 'Imagick';
    }

    function renderNav() {
        echo "<ul class='nav nav-sidebar smallPadding'>";

        foreach ($this->imagickExamples as $imagickExampleOption) {

            $imagickExample = $imagickExampleOption[0];
            echo "<li>";
                echo "<a class='smallPadding' href='/Imagick/$imagickExample'>".$imagickExample."</a>";
            echo "</li>";
        }
        
        echo "</ul>";
    }
}

 