<?php


namespace ImagickDemo\Imagick;


function header($string, $replace = true, $http_response_code = null) {
    global $imageType;

    if (stripos($string, "Content-Type: image/") === 0) {
        $imageType = substr($string, strlen("Content-Type: image/"));
    }

    \header($string, $replace, $http_response_code);
}



class ImagickNav implements \ImagickDemo\Navigation\ActiveNav {

    private $currentExample;
    
    private $imagickExamples = array(
        
        'adaptiveBlurImage',
        'adaptiveResizeImage',
        'adaptiveSharpenImage',
        'adaptiveThresholdImage',
//'addImage',
        'addNoiseImage',
        'affineTransformImage', //Doesn't work?
//'animateImages',
//'annotateImage',
//'appendImages',
        'averageImages',
        'blackThresholdImage',
        'blurImage',
        'borderImage',
        'charcoalImage',
        'chopImage',
//'clear',
        'clipImage',
//'clipPathImage',
        'clutImage',
//'coalesceImages',
        'colorFloodfillImage',
        'colorizeImage',
//'combineImages',
//'commentImage',
//'compareImageChannels',
//'compareImageLayers',
//'compareImages',
//'compositeImage',
//__construct',
        'contrastImage',
//'contrastStretchImage',
        'convolveImage',
        'cropImage',
//'cropThumbnailImage',
//'current',
//'cycleColormapImage',
//'decipherImage',
//'deconstructImages',
//'deleteImageArtifact',
        'deskewImage',
        'despeckleImage',
//'destroy',
//'displayImage',
//'displayImages',
//'distortImage',
//'drawImage',
//'edgeImage',
//'embossImage',
//'encipherImage',
        'edgeExtend',
        'enhanceImage',
        'equalizeImage',
//'evaluateImage',
//'exportImagePixels',
//'extentImage',
//'flattenImages',
        'flipImage',
//'floodFillPaintImage',
        'flopImage',
//'frameImage',
        'functionImage',
        'fxImage',
        'gammaImage',
        'gaussianBlurImage',
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
        'getImageChannelStatistics',
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
        'getImageHistogram',
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
        'getPixelIterator',
        'getPixelRegionIterator',
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
        'identifyImage',
//'implodeImage',
//'importImagePixels',
//'labelImage',
//'levelImage',
//'linearStretchImage',
//'liquidRescaleImage',
        'magnifyImage',
//'mapImage',
//'matteFloodfillImage',
//'medianFilterImage',
//'mergeImageLayers',
//'minifyImage',
        'modulateImage',
//'montageImage',
//'morphImages',
//'mosaicImages',
        'motionBlurImage',
        'negateImage',
//'newImage',
        'newPseudoImage',
        'newPseudoImage2',
//'nextImage',
        'normalizeImage',
        'oilPaintImage',
//'opaquePaintImage',
//'optimizeImageLayers',
//'orderedPosterizeImage',
//'paintFloodfillImage',
//'paintOpaqueImage',
//'paintTransparentImage',
        'pingImage',
        'Quantum',
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
        'radialBlurImage',
//'raiseImage',
//'randomThresholdImage',
//'readImage',
//'readImageBlob',
//'readImageFile',
        'recolorImage',
//'reduceNoiseImage',
        'remapImage',
//'removeImage',
//'removeImageProfile',
//'render',
        'resampleImage',
//'resetImagePage',
//'resizeImage',
//'rollImage',
        'rotateImage',
//'roundCorners',
//'sampleImage',
        'scaleImage',
        'screenEmbed',
        'segmentImage',
//'separateImageChannel',
        'sepiaToneImage',
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
        'setImageArtifact',
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
        'setImageDelay',
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

        'setImageTicksPerSecond',
//'setImageType',
//'setImageUnits',
//'setImageVirtualPixelMethod',
//'setImageWhitePoint',
//'setInterlaceScheme',
//'setIteratorIndex',
//'setLastIterator',
        'setOption',
//'setPage',
//'setPointSize',
//'setResolution',
//'setResourceLimit',
//'setSamplingFactors',
//'setSize',
//'setSizeOffset',
//'setType',
        'shadeImage',
        'shadowImage',
        'sharpenImage',
        'shaveImage',
        'shearImage',
//'sigmoidalContrastImage',
        'sketchImage',
        'solarizeImage',
        'sparseColorImage',
//        'sparseColorImage_bilinear',
//        'sparseColorImage_shepards',
//        'sparseColorImage_voronoi',
        'spliceImage',
        'spreadImage',
//'steganoImage',
//'stereoImage',
//'stripImage',
        'swirlImage',
//'textureImage',
//'thresholdImage',
        'thumbnailImage',
        'tintImage', //what is this
        'transformImage',
//'transparentPaintImage',
        'transposeImage',
        'transverseImage',
        'trimImage',
        'uniqueImageColors',
        'unsharpMaskImage',
//'valid',
        'vignetteImage',
        'waveImage',
//'whiteThresholdImage',
//'writeImage',
//'writeImageFile',
//'writeImages',
//'writeImagesFile',
//}
    );

    function display($example, \Auryn\Provider $provider) {
        $this->currentExample = $example;
        $classname = 'ImagickDemo\Imagick\\' . $example;
        $provider->alias('ImagickDemo\Example', $classname);
        $provider->alias('ImagickDemo\ActiveNav', get_class($this));
        $provider->share($this);
    }

    function displayIndex(\Auryn\Provider $provider) {
        $provider->alias('ImagickDemo\ActiveNav', get_class($this));
        $provider->share($this);
    }


    function renderImage($example, \Auryn\Provider $provider) {
        $classname = '\ImagickDemo\Imagick\\' . $example;

        
        $provider->alias('ImagickDemo\Example', $classname);
        
        
        $provider->execute([\ImagickDemo\ImageExampleCache::class, 'renderImageSafe']);
        
        //$provider->execute([$classname, 'renderImageSafe']);
    }

    function renderPreviousButton() {
        $previous = getPrevious($this->imagickExamples, $this->currentExample);

        if ($previous) {
            return "<a href='/Imagick/$previous'>
            <button type='button' class='btn btn-primary'>
             <span class='glyphicon  glyphicon-arrow-left'></span> $previous
            </button>
            </a>";
        }

        return "";
    }

    function renderNextButton() {
        $next = getNext($this->imagickExamples, $this->currentExample);

        if ($next) {
            echo "<a href='/Imagick/$next'>
            <button type='button' class='btn btn-primary'>
            $next <span class='glyphicon  glyphicon-arrow-right'></span>
            </button>
            </a>";
        }

        
        return "";
    }
    
    function renderTitle() {
        if ($this->currentExample) {
            return $this->currentExample;
        }
        return 'Imagick';
    }

    function renderNav() {
        echo "<ul class='nav nav-sidebar smallPadding'>";

        foreach ($this->imagickExamples as $imagickExample) {
            echo "<li>";
                echo "<a class='smallPadding' href='/Imagick/$imagickExample'>".$imagickExample."</a>";
            echo "</li>";
        }
        
        echo "</ul>";
    }
}

 