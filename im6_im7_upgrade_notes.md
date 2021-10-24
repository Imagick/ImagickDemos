
https://imagemagick.org/script/porting.php

## Dramatically un-deprecated

Imagick::setImageIndex - MagickSetIteratorIndex
Imagick::getImageIndex - getIteratorIndex

## Functions removed:

ImagickDraw::matte

Imagick::averageImages     - EvaluateImages(wand->images,MeanEvaluateOperator,
Imagick::colorFloodfillImage
Imagick::filter            - Imagick:: - some sort of convolve?
Imagick::flattenImages     -   return(MergeImageLayers(image,FlattenLayer,exception));
Imagick::getImageAttribute - probably getImageProperty - http://www.imagemagick.org/discourse-server/viewtopic.php?f=6&t=8196
Imagick::getImageChannelExtrema - uses MagickGetImageRange internally
Imagick::getImageClipMask   - todo research clip change.
Imagick::getImageExtrema - uses MagickGetImageRange internally

Imagick::getImageMatte
Imagick::getImageMatteColor
Imagick::getImageSize -  bs "Imagick", "getImageSize", "Imagick", "getImageLength"
Imagick::mapImage           - Imagick::remapImage(Imagick $replacement, int $DITHER): bool maybe....
Imagick::matteFloodfillImage
Imagick::medianFilterImage      - StatisticImage(image,MedianStatistic,(size_t) radius,(size_t) radius,exception);
Imagick::mosaicImages           - return(MergeImageLayers(image,MosaicLayer,exception));
Imagick::orderedPosterizeImage
Imagick::paintFloodfillImage
Imagick::paintOpaqueImage       - MagickOpaquePaintImageChannel (opaque + paint swapped...)
Imagick::paintTransparentImage  - TransparentPaintImage(image,target,opacity,MagickFalse)
Imagick::recolorImage
Imagick::radialBlurImage        - Imagick::rotationBlurImage
Imagick::reduceNoiseImage       - StatisticImage(image,NonpeakStatistic,(size_t) radius,(size_t) radius,exception);
Imagick::roundCornersImage - fuck my users.
Imagick::setImageAttribute - MagickSetImageProperty http://www.imagemagick.org/discourse-server/viewtopic.php?f=6&t=8196
Imagick::setImageBias - bias is gone
Imagick::setImageBiasQuantum - bias is gone
Imagick::setImageClipMask - todo research clip change.

Imagick::setImageMatteColor
Imagick::setImageOpacity
Imagick::transformImage - Use the Imagick::cropImage and Imagick::resize functions instead.


public Imagick::flattenImages(): Imagick $im->mergeImageLayers(Imagick::LAYERMETHOD_FLATTEN);

IM7 - SetIteratorIndex GetIteratorIndex

The FilterImage() method has been removed. Use ConvolveImage() instead.

/image/Tutorial/backgroundMasking?time=1634067980581 : bad content type

orderedPosterizeImage

RecolorImage is gone - use 'Color matrix image' instead ?
setImageBias no longer exists.
