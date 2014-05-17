<?php


namespace ImagickDemo\Imagick;

use ImagickDemo\Navigation\NavOption;

class ExampleList implements \ImagickDemo\ExampleList {

    /**
     * @return NavOption[]
     */
    function getExamples() {

        $imagickExamples = [

            new NavOption('adaptiveBlurImage', true),
            new NavOption('adaptiveResizeImage', true),
            new NavOption('adaptiveSharpenImage', true),
            new NavOption('adaptiveThresholdImage',  true),
            //'addImage',
            new NavOption('addNoiseImage',  true),
            new NavOption('affineTransformImage',  true), //Doesn't work?
            //'animateImages',
            new NavOption('annotateImage',  true),
            //'appendImages',
            new NavOption('autoLevelImage',  true),
            //new NavOption('averageImages',  true),
            new NavOption('blackThresholdImage',  true),
            new NavOption('blueShiftImage',  true),
            new NavOption('blurImage',  true),
            new NavOption('borderImage', true),
            new NavOption('brightnessContrastImage', true),
            new NavOption('charcoalImage', true),
            new NavOption('chopImage', true),
            //'clear',
            //new NavOption('clipImage', true),
            //'clipPathImage',
            new NavOption('clutImage', true),
            //'coalesceImages',
            //deprecated - new NavOption('colorFloodfillImage', true),
            //ColorDecisionListImage
            new NavOption('colorizeImage', true),
            new NavOption('colorMatrixImage', true),
            //'combineImages',
            //'commentImage',
            //'compareImageChannels',
            //'compareImageLayers',
//'compareImages',
            new NavOption('compositeImage', true),
            // CompositeLayers
            //__construct',
            new NavOption('contrastImage', true),
            //'contrastStretchImage',
            new NavOption('convolveImage', true),
            new NavOption('cropImage', true),
            //'cropThumbnailImage',
            //'current',
            //'cycleColormapImage',
            // ConstituteImage
            // DestroyImage
            //'decipherImage',
            //'deconstructImages',
            //'deleteImageArtifact',
            new NavOption('deskewImage', true),
            new NavOption('despeckleImage', true),
            //'destroy',
            //'displayImage',
            //'displayImages',
            new NavOption('distortImage', true),
            //'drawImage',
            //'edgeImage',
            //'embossImage',
            //'encipherImage',

            new NavOption('enhanceImage', true),
            new NavOption('equalizeImage', true),
//'evaluateImage',
            //'exportImagePixels',
//'extentImage',
            //FilterImage - this appears to be a duplicate function
            //FrameImage
            //'flattenImages',
            new NavOption('flipImage', true),
            new NavOption('floodFillPaintImage', true),
            new NavOption('flopImage', true),
            new NavOption('forwardFourierTransformImage', false),
            new NavOption('frameImage', true),
            new NavOption('functionImage', true),
            new NavOption('fxImage', true),
            new NavOption('gammaImage', true),
            new NavOption('gaussianBlurImage', true),
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
            new NavOption('getImageChannelStatistics', true),
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
            new NavOption('getImageHistogram', false),
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
            new NavOption('getPixelIterator', true),
            new NavOption('getPixelRegionIterator', true),
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
            new NavOption('identifyImage', false),
            new NavOption('inverseFourierTransformImage', false, 'forwardFourierTransformImage'),
            //'implodeImage',
            //'importImagePixels',
            //'labelImage',
            //'levelImage',
            //'linearStretchImage',
            //'liquidRescaleImage',
            new NavOption('magnifyImage', true),
            //'mapImage',
            //'matteFloodfillImage',
            //'medianFilterImage',
            //'mergeImageLayers',
            //'minifyImage',
            new NavOption('modulateImage', true),
            //'montageImage',
            //'morphImages',
            // MorphologyImage
            new NavOption('mosaicImage', true),
            new NavOption('motionBlurImage', true),
            new NavOption('negateImage', true),
            //'newImage',
            new NavOption('newPseudoImage', true),
            //'nextImage',
            new NavOption('normalizeImage', true),
            new NavOption('oilPaintImage', true),
            //'opaquePaintImage',
            //'optimizeImageLayers',
            // OptimizeImageTransparency
            //'orderedPosterizeImage',
            //'paintOpaqueImage',
            //'paintTransparentImage',

            new NavOption('pingImage', false),
            new NavOption('Quantum', null, false),
            //'pingImageBlob',
            //'pingImageFile',
            //'polaroidImage',
            //'posterizeImage',
            //'previewImages',
            //'previousImage',
            //'profileImage',
            new NavOption('quantizeImage', true),
            //'quantizeImages',
            //'queryFontMetrics',
            //'queryFonts',
            //'queryFormats',
            new NavOption('radialBlurImage', true),
            new NavOption('raiseImage', true),
            new NavOption('randomThresholdImage', true),
            //'readImage',
            //'readImageBlob',
            //'readImageFile',
            new NavOption('recolorImage', true),
            new NavOption('reduceNoiseImage', true),
//new NavOption('remapImage', true),
            //'removeImage',
            //'removeImageProfile',
            //'render',
            new NavOption('resampleImage', true),
            //'resetImagePage',
            //'resizeImage',
            new NavOption('rollImage', true),
            new NavOption('rotateImage', true),
            new NavOption('rotationalBlurImage', true),
            new NavOption('roundCorners', true),
            //'sampleImage',
            new NavOption('scaleImage', true),
            new NavOption('screenEmbed', true),
            new NavOption('segmentImage', true),
            new NavOption('selectiveBlurImage', true),
            new NavOption('separateImageChannel', true),
            new NavOption('sepiaToneImage', true),
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
            new NavOption('setImageArtifact', true),
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
            new NavOption('setImageDelay', true),
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
            new NavOption('setImageTicksPerSecond', true),
            //'setImageType',
            //'setImageUnits',
            //'setImageVirtualPixelMethod',
            //'setImageWhitePoint',
            //'setInterlaceScheme',
            //'setIteratorIndex',
            //'setLastIterator',
            new NavOption('setOption', true),
            new NavOption('setProgressMonitor', true),
            //'setPage',
            //'setPointSize',
            //'setResolution',
            //'setResourceLimit',
            //'setSamplingFactors',
            //'setSize',
            //'setSizeOffset',
            //'setType',
            new NavOption('shadeImage', true),
            new NavOption('shadowImage', true),
            new NavOption('sharpenImage', true),
            new NavOption('shaveImage', true),
            new NavOption('shearImage', true),
            new NavOption('sigmoidalContrastImage', true),
//new NavOption('similarityImage', true),

            new NavOption('sketchImage', true),
            new NavOption('sketchImage', true),
            new NavOption('smushImages', true),
            new NavOption('solarizeImage', true),
            new NavOption('sparseColorImage', true),
            new NavOption('spliceImage', true),
            new NavOption('spreadImage', true),
            new NavOption('statisticImage', true),
            new NavOption('swirlImage', true),
            new NavOption('textureImage',  true),
            new NavOption('thresholdImage',  true),
            new NavOption('thumbnailImage', true),
            new NavOption('tintImage',  true),//what is this
            new NavOption('transformImage', true),
            new NavOption('transparentPaintImage', true),
            new NavOption('transposeImage', true),
            new NavOption('transformImageColorspace', true),
            new NavOption('transverseImage', true),
            new NavOption('trimImage', true),
            new NavOption('uniqueImageColors', true),
            new NavOption('unsharpMaskImage', true),
            new NavOption('vignetteImage', true),
            new NavOption('waveImage', true),
            new NavOption('whiteThresholdImage', true),
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