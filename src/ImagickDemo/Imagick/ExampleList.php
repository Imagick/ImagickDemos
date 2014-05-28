<?php


namespace ImagickDemo\Imagick;

use ImagickDemo\Navigation\NavOption;





class ExampleList implements \ImagickDemo\ExampleList {

    /**
     * @return NavOption[]
     */
    function getExamples() {

        $imagickExamples = [

            new NavOption('adaptiveBlurImage'),
            new NavOption('adaptiveResizeImage'),
            new NavOption('adaptiveSharpenImage'),
            new NavOption('adaptiveThresholdImage'),
            //'addImage',
            new NavOption('addNoiseImage'),
            new NavOption('affineTransformImage'), //Doesn't work?
            //'animateImages',
            new NavOption('annotateImage'),
            //'appendImages',
            new NavOption('autoLevelImage'),
            //new NavOption('averageImages',  true),
            new NavOption('blackThresholdImage'),
            new NavOption('blueShiftImage'),
            new NavOption('blurImage'),
            new NavOption('borderImage'),
            new NavOption('brightnessContrastImage'),
            new NavOption('charcoalImage'),
            new NavOption('chopImage'),
            //'clear',
            //new NavOption('clipImage', true),
            //'clipPathImage',
            new NavOption('clutImage'),
            //'coalesceImages',
            //deprecated - new NavOption('colorFloodfillImage', true),
            //ColorDecisionListImage
            new NavOption('colorizeImage'),
            new NavOption('colorMatrixImage'),
            //'combineImages',
            //'commentImage',
            //'compareImageChannels',
            //'compareImageLayers',
//'compareImages',
            new NavOption('compositeImage'),
            // CompositeLayers
            //__construct',
            new NavOption('contrastImage'),
            //'contrastStretchImage',
            new NavOption('convolveImage'),
            new NavOption('cropImage'),
            //'cropThumbnailImage',
            //'current',
            //'cycleColormapImage',
            // ConstituteImage
            // DestroyImage
            //'decipherImage',
            //'deconstructImages',
            //'deleteImageArtifact',
            new NavOption('deskewImage'),
            new NavOption('despeckleImage'),
            //'destroy',
            //'displayImage',
            //'displayImages',
            new NavOption('distortImage'),
            //'drawImage',
            //'edgeImage',
            //'embossImage',
            //'encipherImage',

            new NavOption('enhanceImage'),
            new NavOption('equalizeImage'),
            new NavOption('evaluateImage'),
//'',
            //'exportImagePixels',
//'extentImage',
            //FilterImage - this appears to be a duplicate function
            //FrameImage
            //'flattenImages',
            new NavOption('flipImage'),
            new NavOption('floodFillPaintImage'),
            new NavOption('flopImage'),
            new NavOption('forwardFourierTransformImage'),
            new NavOption('frameImage'),
            new NavOption('functionImage'),
            new NavOption('fxImage'),
            new NavOption('gammaImage'),
            new NavOption('gaussianBlurImage'),
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
            new NavOption('getImageChannelStatistics'),
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
            new NavOption('getImageHistogram'),
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
            new NavOption('getPixelIterator'),
            new NavOption('getPixelRegionIterator'),
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

            new NavOption('haldClutImage'),
            //'hasNextImage',
            //'hasPreviousImage',
            new NavOption('identifyImage'),
            new NavOption('inverseFourierTransformImage', 'forwardFourierTransformImage'),
            //'implodeImage',
            //'importImagePixels',
            //'labelImage',
            //'levelImage',
            //'linearStretchImage',
            //'liquidRescaleImage',
            new NavOption('magnifyImage'),
            //'mapImage',
            //'matteFloodfillImage',
            new NavOption('medianFilterImage'),

            //'mergeImageLayers',
            //'minifyImage',
            new NavOption('modulateImage'),
            //'montageImage',
            //'morphImages',
            // MorphologyImage
            new NavOption('mosaicImage'),
            new NavOption('motionBlurImage'),
            new NavOption('negateImage'),
            //'newImage',
            new NavOption('newPseudoImage'),
            //'nextImage',
            new NavOption('normalizeImage'),
            new NavOption('oilPaintImage'),
            //'opaquePaintImage',
            new NavOption('optimizeImageLayers'),
            // OptimizeImageTransparency
            //'orderedPosterizeImage',
            //'paintOpaqueImage',
            //'paintTransparentImage',

            new NavOption('pingImage'),
            new NavOption('Quantum', false),
            //'pingImageBlob',
            //'pingImageFile',
            //'polaroidImage',
            //'posterizeImage',
            //'previewImages',
            //'previousImage',
            //'profileImage',
            new NavOption('quantizeImage'),
            //'quantizeImages',
            //'queryFontMetrics',
            //'queryFonts',
            //'queryFormats',
            new NavOption('radialBlurImage'),
            new NavOption('raiseImage'),
            new NavOption('randomThresholdImage'),
            //'readImage',
            //'readImageBlob',
            //'readImageFile',
            new NavOption('recolorImage'),
            new NavOption('reduceNoiseImage'),
//new NavOption('remapImage', true),
            //'removeImage',
            //'removeImageProfile',
            //'render',
            new NavOption('resampleImage'),
            //'resetImagePage',
            //'resizeImage',
            new NavOption('rollImage'),
            new NavOption('rotateImage'),
            new NavOption('rotationalBlurImage'),
            new NavOption('roundCorners'),
            //'sampleImage',
            new NavOption('scaleImage'),
            new NavOption('screenEmbed'),
            new NavOption('segmentImage'),
            new NavOption('selectiveBlurImage'),
            new NavOption('separateImageChannel'),
            new NavOption('sepiaToneImage'),
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
            new NavOption('setImageArtifact'),
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
            new NavOption('setImageDelay'),
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
            new NavOption('setImageTicksPerSecond'),
            //'setImageType',
            //'setImageUnits',
            //'setImageVirtualPixelMethod',
            //'setImageWhitePoint',
            //'setInterlaceScheme',
            //'setIteratorIndex',
            //'setLastIterator',
            new NavOption('setOption'),
            new NavOption('setProgressMonitor'),
            //'setPage',
            //'setPointSize',
            //'setResolution',
            //'setResourceLimit',
            //'setSamplingFactors',
            //'setSize',
            //'setSizeOffset',
            //'setType',
            new NavOption('shadeImage'),
            new NavOption('shadowImage'),
            new NavOption('sharpenImage'),
            new NavOption('shaveImage'),
            new NavOption('shearImage'),
            new NavOption('sigmoidalContrastImage'),
            
            
//new NavOption('similarityImage', true),

            new NavOption('sketchImage'),
            new NavOption('sketchImage'),
            new NavOption('smushImages'),
            new NavOption('solarizeImage'),
            new NavOption('sparseColorImage'),
            new NavOption('spliceImage'),
            new NavOption('spreadImage'),
            new NavOption('statisticImage'),
            new NavOption('subImageMatch'),
            new NavOption('swirlImage'),
            new NavOption('textureImage'),
            new NavOption('thresholdImage'),
            new NavOption('thumbnailImage'),
            new NavOption('tintImage'),//what is this
            new NavOption('transformImage'),
            new NavOption('transparentPaintImage'),
            new NavOption('transposeImage'),
            new NavOption('transformImageColorspace'),
            new NavOption('transverseImage'),
            new NavOption('trimImage'),
            new NavOption('uniqueImageColors'),
            new NavOption('unsharpMaskImage'),
            new NavOption('vignetteImage'),
            new NavOption('waveImage'),
            new NavOption('whiteThresholdImage'),
        ];

        //Things not sure whether to demo
        //'steganoImage',
        //'stereoImage',
        //deprecated - paintfloodfillimage
        //'stripImage',
        //'valid',
        //'writeImage',
        //'writeImageFile',
        //'writeImages',
        //'writeImagesFile',

        return $imagickExamples;
    }
}


/*

Image examples that still need to be checked for being available
and working.

GetImage
GetImageAlphaChannel
GetImageClipMask
GetImageBackgroundColor
GetImageBlob
GetImageBlob
GetImageBluePrimary
GetImageBorderColor
GetImageChannelDepth
GetImageChannelDistortion
GetImageChannelDistortions
GetImageChannelFeatures
GetImageChannelKurtosis
GetImageChannelMean
GetImageChannelRange
GetImageColormapColor
GetImageColors
GetImageColorspace
GetImageCompose
GetImageCompression
GetImageCompressionQuality
GetImageDelay
GetImageDepth
GetImageDistortion
GetImageDispose
GetImageEndian
GetImageFilename
GetImageFormat
GetImageFuzz
GetImageGamma
GetImageGravity
GetImageGreenPrimary
GetImageHeight
GetImageInterlaceScheme
GetImageInterpolateMethod
GetImageIterations
GetImageLength
GetImageMatteColor
GetImageOrientation
GetImagePage
GetImagePixelColor
GetImageRedPrimary
GetImageRegion
GetImageRenderingIntent
GetImageResolution
GetImageScene
GetImageSignature
GetImageTicksPerSecond
GetImageType
GetImageUnits
GetImageVirtualPixelMethod
GetImageWhitePoint
GetImageWidth
GetNumberImages
GetImageTotalInkDensity


SetImage
SetImageAlphaChannel
SetImageBackgroundColor
SetImageBias
SetImageBluePrimary
SetImageBorderColor
SetImageChannelDepth
SetImageClipMask
SetImageColor
SetImageColormapColor
SetImageColorspace
SetImageCompose
SetImageCompression
SetImageCompressionQuality
SetImageDepth
SetImageDispose
SetImageEndian
SetImageExtent
SetImageFilename
SetImageFormat
SetImageFuzz
SetImageGamma
SetImageGravity
SetImageGreenPrimary
SetImageInterlaceScheme
SetImageInterpolateMethod
SetImageIterations
SetImageMatte
SetImageMatteColor
SetImageOpacity
SetImageOrientation
SetImagePage
SetImageProgressMonitor
SetImageRedPrimary
SetImageRenderingIntent
SetImageResolution
SetImageScene
SetImageType
SetImageUnits
SetImageVirtualPixelMethod
SetImageWhitePoint


*/






/*

function checkOutstanding() {
    $imagickExamples = getImagickExamples();
    require_once "test.php";

    foreach ($magickFunctions as $magickFunction) {
        $functionName = $magickFunction;
        if (strpos($functionName, "Magick") === 0) {
            $functionName = substr($functionName, strlen("Magick"));
        }

        $present = false;

        foreach ($imagickExamples as $example) {
            if (strcasecmp($example->getName(), $functionName) === 0) {
                $present = true;
            }
        }

        if ($present == false) {
            echo $functionName;
            echo "<br/>";
        }
    }

    exit(0);
}

*/