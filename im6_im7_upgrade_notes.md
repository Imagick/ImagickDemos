
https://imagemagick.org/script/porting.php


## Functions removed:

ImagickDraw::matte


Imagick::colorFloodfillImage -
Imagick::filter              - The FilterImage() method has been removed. Use ConvolveImage() instead.

Imagick::getImageAttribute - probably getImageProperty - http://www.imagemagick.org/discourse-server/viewtopic.php?f=6&t=8196
Imagick::getImageChannelExtrema - uses MagickGetImageRange internally
Imagick::getImageClipMask       - todo research clip change.
Imagick::getImageExtrema        - uses MagickGetImageRange internally
Imagick::getImageMatte          -
Imagick::getImageMatteColor     -
Imagick::mapImage               - Imagick::remapImage(Imagick $replacement, int $DITHER): bool maybe....
Imagick::matteFloodfillImage
Imagick::medianFilterImage      - StatisticImage(image,MedianStatistic,(size_t) radius,(size_t) radius,exception);
Imagick::mosaicImages           - return(MergeImageLayers(image,MosaicLayer,exception));
Imagick::orderedPosterizeImage  - Renamed OrderedPosterizeImage to OrderedDitherImage
Imagick::paintFloodfillImage
Imagick::paintOpaqueImage       - MagickOpaquePaintImageChannel (opaque + paint swapped...)
Imagick::paintTransparentImage  - TransparentPaintImage(image,target,opacity,MagickFalse)
Imagick::recolorImage           - Imagick::colorMatrixImage
Imagick::radialBlurImage        - Imagick::rotationBlurImage
Imagick::reduceNoiseImage       - StatisticImage(image,NonpeakStatistic,(size_t) radius,(size_t) radius,exception);
Imagick::setImageAttribute - MagickSetImageProperty http://www.imagemagick.org/discourse-server/viewtopic.php?f=6&t=8196
Imagick::setImageBias - bias is gone
Imagick::setImageBiasQuantum - bias is gone
Imagick::setImageClipMask - the way masks work has been refactor. Use Imagick::setImageMask instead.
Imagick::setImageMatteColor
Imagick::setImageOpacity
Imagick::transformImage - Use the Imagick::cropImage and Imagick::resize functions instead.


## Functions shimmed

- Imagick::flattenImages - MagickFlattenImages was removed, so internally this now calls MagickMergeImageLayers(intern->magick_wand, FlattenLayer);
- Imagick::getImageIndex and Imagick::setImageIndex are undeprecated and work on ImageMagick 7. They call MagickGetIteratorIndex and MagickSetIteratorIndex internally.
- Imagick::getImageSize is undeprecated and works on ImageMagick 7. It calls MagickGetImageLength internally.
- Imagick::roundCornersImage - it's back.
- Imagick::averageImages - MagickAverageImages was removed, so internally this now calls     - EvaluateImages(wand->images,MeanEvaluateOperator);


## Constants removed

COLOR_OPACITY
COMPOSITE_ADD
COMPOSITE_MINUS
IMGTYPE_GRAYSCALEMATTE
IMGTYPE_TRUECOLORMATTE
IMGTYPE_COLORSEPARATIONMATTE
IMGTYPE_PALETTEBILEVELMATTE
GRAVITY_STATIC
CHANNEL_MATTE
METRIC_UNDEFINED
PIXEL_INTEGER
PIXELSTORAGE_INTEGER
COLORSPACE_LAB
COLORSPACE_REC601LUMA
COLORSPACE_REC709LUMA
VIRTUALPIXELMETHOD_CONSTANT
INTERPOLATE_BICUBIC
INTERPOLATE_FILTER
INTERPOLATE_NEARESTNEIGHBOR
ALPHACHANNEL_FLATTEN
