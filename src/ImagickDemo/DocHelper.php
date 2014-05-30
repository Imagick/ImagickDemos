<?php

namespace ImagickDemo;

class DocHelper {

    private $manualEntries = array (
  'imagickpixel' => 
  array (
    'clear' => 
    array (
      'functionName' => 'clear',
      'description' => 'Clears the ImagickPixel object, leaving it in a fresh state. This also
   unsets any color associated with the object.',
      'methodDescription' => 'Clears resources associated with this object',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagickpixel',
      'method' => 'clear.xml',
      'parameters' => 
      array (
      ),
    ),
    'construct' => 
    array (
      'functionName' => '__construct',
      'description' => 'Constructs an ImagickPixel object. If a color is specified, the object is
   constructed and then initialised with that color before being returned.',
      'methodDescription' => 'The ImagickPixel constructor',
      'returnType' => 'Returns an ImagickPixel object on success, throwing ImagickPixelException on
   failure.',
      'classname' => 'imagickpixel',
      'method' => 'construct.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'string',
          'name' => 'color',
          'description' => 'The optional color string to use as the initial value of this object.',
        ),
      ),
    ),
    'destroy' => 
    array (
      'functionName' => 'destroy',
      'description' => 'Deallocates any resources used by the ImagickPixel object, and unsets any
   associated color. The object should not be used after the destroy function
   has been called.',
      'methodDescription' => 'Deallocates resources associated with this object',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagickpixel',
      'method' => 'destroy.xml',
      'parameters' => 
      array (
      ),
    ),
    'getcolor' => 
    array (
      'functionName' => 'getColor',
      'description' => 'Returns the color described by the ImagickPixel object, as an array. If the color has an
   opacity channel set, this is provided as a fourth value in the list.',
      'methodDescription' => 'Returns the color',
      'returnType' => 'An array of channel values, each normalized if True; is given as param. Throws
   ImagickPixelException on error.',
      'classname' => 'imagickpixel',
      'method' => 'getcolor.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'bool',
          'name' => 'normalized',
          'description' => 'Normalize the color values',
        ),
      ),
    ),
    'getcolorasstring' => 
    array (
      'functionName' => NULL,
      'description' => NULL,
      'methodDescription' => NULL,
      'returnType' => NULL,
      'classname' => 'imagickpixel',
      'method' => 'getcolorasstring.xml',
      'parameters' => 
      array (
      ),
    ),
    'getcolorcount' => 
    array (
      'functionName' => 'getColorCount',
      'description' => 'Returns the color count associated with this color.',
      'methodDescription' => 'Returns the color count associated with this color',
      'returnType' => 'Returns the color count as an integer on success, throws
  ImagickPixelException on failure.',
      'classname' => 'imagickpixel',
      'method' => 'getcolorcount.xml',
      'parameters' => 
      array (
      ),
    ),
    'getcolorvalue' => 
    array (
      'functionName' => 'getColorValue',
      'description' => 'Retrieves the value of the color channel specified, as a floating-point
   number between 0 and 1.',
      'methodDescription' => 'Gets the normalized value of the provided color channel',
      'returnType' => 'The value of the channel, as a normalized floating-point number, throwing
   ImagickPixelException on error.',
      'classname' => 'imagickpixel',
      'method' => 'getcolorvalue.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'color',
          'description' => 'The color to get the value of, specified as one of the Imagick color
       constants. This can be one of the RGB colors, CMYK colors, alpha and
       opacity e.g (Imagick::COLOR_BLUE, Imagick::COLOR_MAGENTA).',
        ),
      ),
    ),
    'gethsl' => 
    array (
      'functionName' => 'getHSL',
      'description' => 'Returns the normalized HSL color described by the ImagickPixel object,
   with each of the three values as floating point numbers between 0.0
   and 1.0.',
      'methodDescription' => 'Returns the normalized HSL color of the ImagickPixel object',
      'returnType' => 'Returns the HSL value in an array with the keys "hue",
   "saturation", and "luminosity". Throws ImagickPixelException on failure.',
      'classname' => 'imagickpixel',
      'method' => 'gethsl.xml',
      'parameters' => 
      array (
      ),
    ),
    'ispixelsimilar' => 
    array (
      'functionName' => 'isPixelSimilar',
      'description' => 'Checks the distance between the color described by this ImagickPixel
   object and that of the provided object, by plotting their RGB values
   on the color cube. If the distance between the two points is less than
   the fuzz value given, the colors are similar.
   This method replaces ImagickPixel::isSimilar()
   and correctly normalises the fuzz value to ImageMagick QuantumRange.',
      'methodDescription' => 'Check the distance between this color and another',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagickpixel',
      'method' => 'ispixelsimilar.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'ImagickPixel',
          'name' => 'color',
          'description' => 'The ImagickPixel object to compare this object against.',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'fuzz',
          'description' => 'The maximum distance within which to consider these colors as similar.
       The theoretical maximum for this value is the square root of three
       (1.732).',
        ),
      ),
    ),
    'issimilar' => 
    array (
      'functionName' => 'isSimilar',
      'description' => 'Checks the distance between the color described by this ImagickPixel
   object and that of the provided object, by plotting their RGB values
   on the color cube. If the distance between the two points is less than
   the fuzz value given, the colors are similar.
   Deprecated in favour of ImagickPixel::isPixelSimilar().',
      'methodDescription' => 'Check the distance between this color and another',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagickpixel',
      'method' => 'issimilar.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'ImagickPixel',
          'name' => 'color',
          'description' => 'The ImagickPixel object to compare this object against.',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'fuzz',
          'description' => 'The maximum distance within which to consider these colors as similar.
       The theoretical maximum for this value is the square root of three
       (1.732).',
        ),
      ),
    ),
    'setcolor' => 
    array (
      'functionName' => 'setColor',
      'description' => 'Sets the color described by the ImagickPixel object, with a string
   (e.g. "blue", "#0000ff", "rgb(0,0,255)", "cmyk(100,100,100,10)", etc.).',
      'methodDescription' => 'Sets the color',
      'returnType' => 'Returns True; if the specified color was set, False; otherwise.',
      'classname' => 'imagickpixel',
      'method' => 'setcolor.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'string',
          'name' => 'color',
          'description' => 'The color definition to use in order to initialise the
       ImagickPixel object.',
        ),
      ),
    ),
    'setcolorvalue' => 
    array (
      'functionName' => 'setColorValue',
      'description' => 'Sets the value of the specified channel of this object to the provided
   value, which should be between 0 and 1. This function can be used to
   provide an opacity channel to an ImagickPixel object.',
      'methodDescription' => 'Sets the normalized value of one of the channels',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagickpixel',
      'method' => 'setcolorvalue.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'color',
          'description' => 'One of the Imagick color constants e.g. \\Imagick::COLOR_GREEN or \\Imagick::COLOR_ALPHA.',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'value',
          'description' => 'The value to set this channel to, ranging from 0 to 1.',
        ),
      ),
    ),
    'sethsl' => 
    array (
      'functionName' => 'setHSL',
      'description' => 'Sets the color described by the ImagickPixel object using normalized
   values for hue, saturation and luminosity.',
      'methodDescription' => 'Sets the normalized HSL color',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagickpixel',
      'method' => 'sethsl.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'hue',
          'description' => 'The normalized value for hue, described as a fractional arc
       (between 0 and 1) of the hue circle, where the zero value is
       red.',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'saturation',
          'description' => 'The normalized value for saturation, with 1 as full saturation.',
        ),
        2 => 
        array (
          'type' => 'float',
          'name' => 'luminosity',
          'description' => 'The normalized value for luminosity, on a scale from black at
       0 to white at 1, with the full HS value at 0.5 luminosity.',
        ),
      ),
    ),
  ),
  'imagickpixeliterator' => 
  array (
    'clear' => 
    array (
      'functionName' => 'ImagickPixelIterator::clear',
      'description' => 'Clear resources associated with a PixelIterator.',
      'methodDescription' => 'Clear resources associated with a PixelIterator',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagickpixeliterator',
      'method' => 'clear.xml',
      'parameters' => 
      array (
      ),
    ),
    'construct' => 
    array (
      'functionName' => 'ImagickPixelIterator::__construct',
      'description' => 'The ImagickPixelIterator constructor',
      'methodDescription' => 'The ImagickPixelIterator constructor',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagickpixeliterator',
      'method' => 'construct.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'Imagick',
          'name' => 'wand',
          'description' => NULL,
        ),
      ),
    ),
    'destroy' => 
    array (
      'functionName' => 'ImagickPixelIterator::destroy',
      'description' => 'Deallocates resources associated with a PixelIterator.',
      'methodDescription' => 'Deallocates resources associated with a PixelIterator',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagickpixeliterator',
      'method' => 'destroy.xml',
      'parameters' => 
      array (
      ),
    ),
    'getcurrentiteratorrow' => 
    array (
      'functionName' => 'ImagickPixelIterator::getCurrentIteratorRow',
      'description' => 'Returns the current row as an array of ImagickPixel objects from the pixel iterator.',
      'methodDescription' => 'Returns the current row of ImagickPixel objects',
      'returnType' => 'Returns a row as an array of ImagickPixel objects that can themselves be iterated.',
      'classname' => 'imagickpixeliterator',
      'method' => 'getcurrentiteratorrow.xml',
      'parameters' => 
      array (
      ),
    ),
    'getiteratorrow' => 
    array (
      'functionName' => 'ImagickPixelIterator::getIteratorRow',
      'description' => 'Returns the current pixel iterator row.',
      'methodDescription' => 'Returns the current pixel iterator row',
      'returnType' => 'Returns the integer offset of the row, throwing
   ImagickPixelIteratorException on error.',
      'classname' => 'imagickpixeliterator',
      'method' => 'getiteratorrow.xml',
      'parameters' => 
      array (
      ),
    ),
    'getnextiteratorrow' => 
    array (
      'functionName' => 'ImagickPixelIterator::getNextIteratorRow',
      'description' => 'Returns the next row as an array of pixel wands from the pixel iterator.',
      'methodDescription' => 'Returns the next row of the pixel iterator',
      'returnType' => 'Returns the next row as an array of ImagickPixel objects, throwing
   ImagickPixelIteratorException on error.',
      'classname' => 'imagickpixeliterator',
      'method' => 'getnextiteratorrow.xml',
      'parameters' => 
      array (
      ),
    ),
    'getpreviousiteratorrow' => 
    array (
      'functionName' => 'ImagickPixelIterator::getPreviousIteratorRow',
      'description' => 'Returns the previous row as an array of pixel wands from the pixel iterator.',
      'methodDescription' => 'Returns the previous row',
      'returnType' => 'Returns the previous row as an array of ImagickPixelWand objects from the
   ImagickPixelIterator, throwing ImagickPixelIteratorException on error.',
      'classname' => 'imagickpixeliterator',
      'method' => 'getpreviousiteratorrow.xml',
      'parameters' => 
      array (
      ),
    ),
    'newpixeliterator' => 
    array (
      'functionName' => 'ImagickPixelIterator::newPixelIterator',
      'description' => 'Returns a new pixel iterator.',
      'methodDescription' => 'Returns a new pixel iterator',
      'returnType' => 'true on success, false on error; Throwing ImagickPixelIteratorException.',
      'classname' => 'imagickpixeliterator',
      'method' => 'newpixeliterator.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'Imagick',
          'name' => 'wand',
          'description' => NULL,
        ),
      ),
    ),
    'newpixelregioniterator' => 
    array (
      'functionName' => 'ImagickPixelIterator::newPixelRegionIterator',
      'description' => 'Returns a new pixel iterator.',
      'methodDescription' => 'Returns a new pixel iterator',
      'returnType' => 'Returns a new ImagickPixelIterator on success; on failure, throws
   ImagickPixelIteratorException.',
      'classname' => 'imagickpixeliterator',
      'method' => 'newpixelregioniterator.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'Imagick',
          'name' => 'wand',
          'description' => '',
        ),
        1 => 
        array (
          'type' => 'int',
          'name' => 'x',
          'description' => '',
        ),
        2 => 
        array (
          'type' => 'int',
          'name' => 'y',
          'description' => '',
        ),
        3 => 
        array (
          'type' => 'int',
          'name' => 'columns',
          'description' => '',
        ),
        4 => 
        array (
          'type' => 'int',
          'name' => 'rows',
          'description' => '',
        ),
      ),
    ),
    'resetiterator' => 
    array (
      'functionName' => 'ImagickPixelIterator::resetIterator',
      'description' => 'Resets the pixel iterator.  Use it in conjunction with
   ImagickPixelIterator::getNextIteratorRow() to iterate over all the pixels
   in a pixel container.',
      'methodDescription' => 'Resets the pixel iterator',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagickpixeliterator',
      'method' => 'resetiterator.xml',
      'parameters' => 
      array (
      ),
    ),
    'setiteratorfirstrow' => 
    array (
      'functionName' => 'ImagickPixelIterator::setIteratorFirstRow',
      'description' => 'Sets the pixel iterator to the first pixel row.',
      'methodDescription' => 'Sets the pixel iterator to the first pixel row',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagickpixeliterator',
      'method' => 'setiteratorfirstrow.xml',
      'parameters' => 
      array (
      ),
    ),
    'setiteratorlastrow' => 
    array (
      'functionName' => 'ImagickPixelIterator::setIteratorLastRow',
      'description' => 'Sets the pixel iterator to the last pixel row.',
      'methodDescription' => 'Sets the pixel iterator to the last pixel row',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagickpixeliterator',
      'method' => 'setiteratorlastrow.xml',
      'parameters' => 
      array (
      ),
    ),
    'setiteratorrow' => 
    array (
      'functionName' => 'ImagickPixelIterator::setIteratorRow',
      'description' => 'Set the pixel iterator row.',
      'methodDescription' => 'Set the pixel iterator row',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagickpixeliterator',
      'method' => 'setiteratorrow.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'row',
          'description' => '',
        ),
      ),
    ),
    'synciterator' => 
    array (
      'functionName' => 'ImagickPixelIterator::syncIterator',
      'description' => 'Syncs the pixel iterator.',
      'methodDescription' => 'Syncs the pixel iterator',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagickpixeliterator',
      'method' => 'synciterator.xml',
      'parameters' => 
      array (
      ),
    ),
  ),
  'imagickdraw' => 
  array (
    'affine' => 
    array (
      'functionName' => NULL,
      'description' => NULL,
      'methodDescription' => NULL,
      'returnType' => NULL,
      'classname' => 'imagickdraw',
      'method' => 'affine.xml',
      'parameters' => 
      array (
      ),
    ),
    'annotation' => 
    array (
      'functionName' => NULL,
      'description' => NULL,
      'methodDescription' => NULL,
      'returnType' => NULL,
      'classname' => 'imagickdraw',
      'method' => 'annotation.xml',
      'parameters' => 
      array (
      ),
    ),
    'arc' => 
    array (
      'functionName' => NULL,
      'description' => NULL,
      'methodDescription' => NULL,
      'returnType' => NULL,
      'classname' => 'imagickdraw',
      'method' => 'arc.xml',
      'parameters' => 
      array (
      ),
    ),
    'bezier' => 
    array (
      'functionName' => NULL,
      'description' => NULL,
      'methodDescription' => NULL,
      'returnType' => NULL,
      'classname' => 'imagickdraw',
      'method' => 'bezier.xml',
      'parameters' => 
      array (
      ),
    ),
    'circle' => 
    array (
      'functionName' => NULL,
      'description' => NULL,
      'methodDescription' => NULL,
      'returnType' => NULL,
      'classname' => 'imagickdraw',
      'method' => 'circle.xml',
      'parameters' => 
      array (
      ),
    ),
    'clear' => 
    array (
      'functionName' => NULL,
      'description' => NULL,
      'methodDescription' => NULL,
      'returnType' => NULL,
      'classname' => 'imagickdraw',
      'method' => 'clear.xml',
      'parameters' => 
      array (
      ),
    ),
    'clone' => 
    array (
      'functionName' => NULL,
      'description' => NULL,
      'methodDescription' => NULL,
      'returnType' => NULL,
      'classname' => 'imagickdraw',
      'method' => 'clone.xml',
      'parameters' => 
      array (
      ),
    ),
    'color' => 
    array (
      'functionName' => NULL,
      'description' => NULL,
      'methodDescription' => NULL,
      'returnType' => NULL,
      'classname' => 'imagickdraw',
      'method' => 'color.xml',
      'parameters' => 
      array (
      ),
    ),
    'comment' => 
    array (
      'functionName' => NULL,
      'description' => NULL,
      'methodDescription' => NULL,
      'returnType' => NULL,
      'classname' => 'imagickdraw',
      'method' => 'comment.xml',
      'parameters' => 
      array (
      ),
    ),
    'composite' => 
    array (
      'functionName' => NULL,
      'description' => NULL,
      'methodDescription' => NULL,
      'returnType' => NULL,
      'classname' => 'imagickdraw',
      'method' => 'composite.xml',
      'parameters' => 
      array (
      ),
    ),
    'construct' => 
    array (
      'functionName' => NULL,
      'description' => NULL,
      'methodDescription' => NULL,
      'returnType' => NULL,
      'classname' => 'imagickdraw',
      'method' => 'construct.xml',
      'parameters' => 
      array (
      ),
    ),
    'destroy' => 
    array (
      'functionName' => NULL,
      'description' => NULL,
      'methodDescription' => NULL,
      'returnType' => NULL,
      'classname' => 'imagickdraw',
      'method' => 'destroy.xml',
      'parameters' => 
      array (
      ),
    ),
    'ellipse' => 
    array (
      'functionName' => 'ellipse',
      'description' => 'Draws an ellipse on the image.',
      'methodDescription' => 'Draws an ellipse on the image',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'ellipse.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'ox',
          'description' => '',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'oy',
          'description' => '',
        ),
        2 => 
        array (
          'type' => 'float',
          'name' => 'rx',
          'description' => '',
        ),
        3 => 
        array (
          'type' => 'float',
          'name' => 'ry',
          'description' => '',
        ),
        4 => 
        array (
          'type' => 'float',
          'name' => 'start',
          'description' => '',
        ),
        5 => 
        array (
          'type' => 'float',
          'name' => 'end',
          'description' => '',
        ),
      ),
    ),
    'getclippath' => 
    array (
      'functionName' => 'getClipPath',
      'description' => 'Obtains the current clipping path ID.',
      'methodDescription' => 'Obtains the current clipping path ID',
      'returnType' => 'Returns a string containing the clip path ID or false if no clip path exists.',
      'classname' => 'imagickdraw',
      'method' => 'getclippath.xml',
      'parameters' => 
      array (
      ),
    ),
    'getcliprule' => 
    array (
      'functionName' => 'getClipRule',
      'description' => 'Returns the current polygon fill rule to be used by the clipping path.',
      'methodDescription' => 'Returns the current polygon fill rule',
      'returnType' => 'Returns one of the FILLRULE_ constants.',
      'classname' => 'imagickdraw',
      'method' => 'getcliprule.xml',
      'parameters' => 
      array (
      ),
    ),
    'getclipunits' => 
    array (
      'functionName' => 'getClipUnits',
      'description' => 'Returns the interpretation of clip path units.',
      'methodDescription' => 'Returns the interpretation of clip path units',
      'returnType' => 'Returns an int on success.',
      'classname' => 'imagickdraw',
      'method' => 'getclipunits.xml',
      'parameters' => 
      array (
      ),
    ),
    'getfillcolor' => 
    array (
      'functionName' => 'getFillColor',
      'description' => 'Returns the fill color used for drawing filled objects.',
      'methodDescription' => 'Returns the fill color',
      'returnType' => 'Returns an ImagickPixel object.',
      'classname' => 'imagickdraw',
      'method' => 'getfillcolor.xml',
      'parameters' => 
      array (
      ),
    ),
    'getfillopacity' => 
    array (
      'functionName' => 'getFillOpacity',
      'description' => 'Returns the opacity used when drawing using the fill color or fill
   texture.  Fully opaque is 1.0.',
      'methodDescription' => 'Returns the opacity used when drawing',
      'returnType' => 'The opacity.',
      'classname' => 'imagickdraw',
      'method' => 'getfillopacity.xml',
      'parameters' => 
      array (
      ),
    ),
    'getfillrule' => 
    array (
      'functionName' => 'getFillRule',
      'description' => 'Returns the fill rule used while drawing polygons.',
      'methodDescription' => 'Returns the fill rule',
      'returnType' => 'Returns a FILLRULE_ constant',
      'classname' => 'imagickdraw',
      'method' => 'getfillrule.xml',
      'parameters' => 
      array (
      ),
    ),
    'getfont' => 
    array (
      'functionName' => 'getFont',
      'description' => 'Returns a string specifying the font used when annotating with text.',
      'methodDescription' => 'Returns the font',
      'returnType' => 'Returns a string on success and false if no font is set.',
      'classname' => 'imagickdraw',
      'method' => 'getfont.xml',
      'parameters' => 
      array (
      ),
    ),
    'getfontfamily' => 
    array (
      'functionName' => 'getFontFamily',
      'description' => 'Returns the font family to use when annotating with text.',
      'methodDescription' => 'Returns the font family',
      'returnType' => 'Returns the font family currently selected or false if font family is not set.',
      'classname' => 'imagickdraw',
      'method' => 'getfontfamily.xml',
      'parameters' => 
      array (
      ),
    ),
    'getfontsize' => 
    array (
      'functionName' => 'getFontSize',
      'description' => 'Returns the font pointsize used when annotating with text.',
      'methodDescription' => 'Returns the font pointsize',
      'returnType' => 'Returns the font size associated with the current ImagickDraw object.',
      'classname' => 'imagickdraw',
      'method' => 'getfontsize.xml',
      'parameters' => 
      array (
      ),
    ),
    'getfontstyle' => 
    array (
      'functionName' => 'getFontStyle',
      'description' => 'Returns the font style used when annotating with text.',
      'methodDescription' => 'Returns the font style',
      'returnType' => 'Returns the font style constant (STYLE_) associated with the ImagickDraw object 
   or 0 if no style is set.',
      'classname' => 'imagickdraw',
      'method' => 'getfontstyle.xml',
      'parameters' => 
      array (
      ),
    ),
    'getfontweight' => 
    array (
      'functionName' => 'getFontWeight',
      'description' => 'Returns the font weight used when annotating with text.',
      'methodDescription' => 'Returns the font weight',
      'returnType' => 'Returns an int on success and 0 if no weight is set.',
      'classname' => 'imagickdraw',
      'method' => 'getfontweight.xml',
      'parameters' => 
      array (
      ),
    ),
    'getgravity' => 
    array (
      'functionName' => 'getGravity',
      'description' => 'Returns the text placement gravity used when annotating with text.',
      'methodDescription' => 'Returns the text placement gravity',
      'returnType' => 'Returns a GRAVITY_ constant on success and 0 if no gravity is set.',
      'classname' => 'imagickdraw',
      'method' => 'getgravity.xml',
      'parameters' => 
      array (
      ),
    ),
    'getstrokeantialias' => 
    array (
      'functionName' => 'getStrokeAntialias',
      'description' => 'Returns the current stroke antialias setting. Stroked outlines are
   antialiased by default.  When antialiasing is disabled stroked pixels are
   thresholded to determine if the stroke color or underlying canvas color
   should be used.',
      'methodDescription' => 'Returns the current stroke antialias setting',
      'returnType' => 'Returns True; if antialiasing is on and false if it is off.',
      'classname' => 'imagickdraw',
      'method' => 'getstrokeantialias.xml',
      'parameters' => 
      array (
      ),
    ),
    'getstrokecolor' => 
    array (
      'functionName' => 'getStrokeColor',
      'description' => 'Returns the color used for stroking object outlines.',
      'methodDescription' => 'Returns the color used for stroking object outlines',
      'returnType' => 'Returns an ImagickPixel object which describes the color.',
      'classname' => 'imagickdraw',
      'method' => 'getstrokecolor.xml',
      'parameters' => 
      array (
      ),
    ),
    'getstrokedasharray' => 
    array (
      'functionName' => 'getStrokeDashArray',
      'description' => 'Returns an array representing the pattern of dashes and gaps used to
   stroke paths.',
      'methodDescription' => 'Returns an array representing the pattern of dashes and gaps used to stroke paths',
      'returnType' => 'Returns an array on success and empty array if not set.',
      'classname' => 'imagickdraw',
      'method' => 'getstrokedasharray.xml',
      'parameters' => 
      array (
      ),
    ),
    'getstrokedashoffset' => 
    array (
      'functionName' => 'getStrokeDashOffset',
      'description' => 'Returns the offset into the dash pattern to start the dash.',
      'methodDescription' => 'Returns the offset into the dash pattern to start the dash',
      'returnType' => 'Returns a float representing the offset and 0 if it\'s not set.',
      'classname' => 'imagickdraw',
      'method' => 'getstrokedashoffset.xml',
      'parameters' => 
      array (
      ),
    ),
    'getstrokelinecap' => 
    array (
      'functionName' => 'getStrokeLineCap',
      'description' => 'Returns the shape to be used at the end of open subpaths when they are
   stroked.',
      'methodDescription' => 'Returns the shape to be used at the end of open subpaths when they are stroked',
      'returnType' => 'Returns one of the LINECAP_ constants or 0 if stroke linecap is not set.',
      'classname' => 'imagickdraw',
      'method' => 'getstrokelinecap.xml',
      'parameters' => 
      array (
      ),
    ),
    'getstrokelinejoin' => 
    array (
      'functionName' => 'getStrokeLineJoin',
      'description' => 'Returns the shape to be used at the corners of paths (or other vector
   shapes) when they are stroked.',
      'methodDescription' => 'Returns the shape to be used at the corners of paths when they are stroked',
      'returnType' => 'Returns one of the LINEJOIN_ constants or 0 if stroke line join is not set.',
      'classname' => 'imagickdraw',
      'method' => 'getstrokelinejoin.xml',
      'parameters' => 
      array (
      ),
    ),
    'getstrokemiterlimit' => 
    array (
      'functionName' => 'getStrokeMiterLimit',
      'description' => 'Returns the miter limit. When two line segments meet at a sharp angle and
   miter joins have been specified for \'lineJoin\', it is possible for the
   miter to extend far beyond the thickness of the line stroking the path.
   The \'miterLimit\' imposes a limit on the ratio of the miter length to the
   \'lineWidth\'.',
      'methodDescription' => 'Returns the stroke miter limit',
      'returnType' => 'Returns an int describing the miter limit
   and 0 if no miter limit is set.',
      'classname' => 'imagickdraw',
      'method' => 'getstrokemiterlimit.xml',
      'parameters' => 
      array (
      ),
    ),
    'getstrokeopacity' => 
    array (
      'functionName' => 'getStrokeOpacity',
      'description' => 'Returns the opacity of stroked object outlines.',
      'methodDescription' => 'Returns the opacity of stroked object outlines',
      'returnType' => 'Returns a double describing the opacity.',
      'classname' => 'imagickdraw',
      'method' => 'getstrokeopacity.xml',
      'parameters' => 
      array (
      ),
    ),
    'getstrokewidth' => 
    array (
      'functionName' => 'getStrokeWidth',
      'description' => 'Returns the width of the stroke used to draw object outlines.',
      'methodDescription' => 'Returns the width of the stroke used to draw object outlines',
      'returnType' => 'Returns a double describing the stroke width.',
      'classname' => 'imagickdraw',
      'method' => 'getstrokewidth.xml',
      'parameters' => 
      array (
      ),
    ),
    'gettextalignment' => 
    array (
      'functionName' => 'getTextAlignment',
      'description' => 'Returns the alignment applied when annotating with text.',
      'methodDescription' => 'Returns the text alignment',
      'returnType' => 'Returns one of the ALIGN_ constants and 0 if no align is set.',
      'classname' => 'imagickdraw',
      'method' => 'gettextalignment.xml',
      'parameters' => 
      array (
      ),
    ),
    'gettextantialias' => 
    array (
      'functionName' => 'getTextAntialias',
      'description' => 'Returns the current text antialias setting, which determines whether text
   is antialiased.  Text is antialiased by default.',
      'methodDescription' => 'Returns the current text antialias setting',
      'returnType' => 'Returns True; if text is antialiased and false if not.',
      'classname' => 'imagickdraw',
      'method' => 'gettextantialias.xml',
      'parameters' => 
      array (
      ),
    ),
    'gettextdecoration' => 
    array (
      'functionName' => 'getTextDecoration',
      'description' => 'Returns the decoration applied when annotating with text.',
      'methodDescription' => 'Returns the text decoration',
      'returnType' => 'Returns one of the DECORATION_ constants
   and 0 if no decoration is set.',
      'classname' => 'imagickdraw',
      'method' => 'gettextdecoration.xml',
      'parameters' => 
      array (
      ),
    ),
    'gettextencoding' => 
    array (
      'functionName' => 'getTextEncoding',
      'description' => 'Returns a string which specifies the code set used for text annotations.',
      'methodDescription' => 'Returns the code set used for text annotations',
      'returnType' => 'Returns a string specifying the code set
   or false if text encoding is not set.',
      'classname' => 'imagickdraw',
      'method' => 'gettextencoding.xml',
      'parameters' => 
      array (
      ),
    ),
    'gettextundercolor' => 
    array (
      'functionName' => 'getTextUnderColor',
      'description' => 'Returns the color of a background rectangle to place under text annotations.',
      'methodDescription' => 'Returns the text under color',
      'returnType' => 'Returns an ImagickPixel object describing the color.',
      'classname' => 'imagickdraw',
      'method' => 'gettextundercolor.xml',
      'parameters' => 
      array (
      ),
    ),
    'getvectorgraphics' => 
    array (
      'functionName' => 'getVectorGraphics',
      'description' => 'Returns a string which specifies the vector graphics generated by any
   graphics calls made since the ImagickDraw object was instantiated.',
      'methodDescription' => 'Returns a string containing vector graphics',
      'returnType' => 'Returns a string containing the vector graphics.',
      'classname' => 'imagickdraw',
      'method' => 'getvectorgraphics.xml',
      'parameters' => 
      array (
      ),
    ),
    'line' => 
    array (
      'functionName' => 'line',
      'description' => 'Draws a line on the image using the current stroke color, stroke opacity, and stroke width.',
      'methodDescription' => 'Draws a line',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'line.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'sx',
          'description' => 'starting x coordinate',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'sy',
          'description' => 'starting y coordinate',
        ),
        2 => 
        array (
          'type' => 'float',
          'name' => 'ex',
          'description' => 'ending x coordinate',
        ),
        3 => 
        array (
          'type' => 'float',
          'name' => 'ey',
          'description' => 'ending y coordinate',
        ),
      ),
    ),
    'matte' => 
    array (
      'functionName' => 'matte',
      'description' => 'Paints on the image\'s opacity channel in order to set effected pixels to
   transparent, to influence the opacity of pixels.',
      'methodDescription' => 'Paints on the image\'s opacity channel',
      'returnType' => 'Return success;',
      'classname' => 'imagickdraw',
      'method' => 'matte.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'x',
          'description' => 'x coordinate of the matte',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'y',
          'description' => 'y coordinate of the matte',
        ),
        2 => 
        array (
          'type' => 'int',
          'name' => 'paintMethod',
          'description' => 'PAINT_ constant',
        ),
      ),
    ),
    'pathclose' => 
    array (
      'functionName' => 'pathClose',
      'description' => 'Adds a path element to the current path which closes the current subpath
   by drawing a straight line from the current point to the current subpath\'s
   most recent starting point (usually, the most recent moveto point).',
      'methodDescription' => 'Adds a path element to the current path',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'pathclose.xml',
      'parameters' => 
      array (
      ),
    ),
    'pathcurvetoabsolute' => 
    array (
      'functionName' => 'pathCurveToAbsolute',
      'description' => 'Draws a cubic Bezier curve from the current point to (x,y) using (x1,y1)
   as the control point at the beginning of the curve and (x2,y2) as the
   control point at the end of the curve using absolute coordinates. At the
   end of the command, the new current point becomes the final (x,y)
   coordinate pair used in the polybezier.',
      'methodDescription' => 'Draws a cubic Bezier curve',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'pathcurvetoabsolute.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'x1',
          'description' => 'x coordinate of the first control point',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'y1',
          'description' => 'y coordinate of the first control point',
        ),
        2 => 
        array (
          'type' => 'float',
          'name' => 'x2',
          'description' => 'x coordinate of the second control point',
        ),
        3 => 
        array (
          'type' => 'float',
          'name' => 'y2',
          'description' => 'y coordinate of the first control point',
        ),
        4 => 
        array (
          'type' => 'float',
          'name' => 'x',
          'description' => 'x coordinate of the curve end',
        ),
        5 => 
        array (
          'type' => 'float',
          'name' => 'y',
          'description' => 'y coordinate of the curve end',
        ),
      ),
    ),
    'pathcurvetoquadraticbezierabsolute' => 
    array (
      'functionName' => 'pathCurveToQuadraticBezierAbsolute',
      'description' => 'Draws a quadratic Bezier curve from the current point to (x,y) using
   (x1,y1) as the control point using absolute coordinates. At the end of the
   command, the new current point becomes the final (x,y) coordinate pair
   used in the polybezier.',
      'methodDescription' => 'Draws a quadratic Bezier curve',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'pathcurvetoquadraticbezierabsolute.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'x1',
          'description' => 'x coordinate of the control point',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'y1',
          'description' => 'y coordinate of the  control point',
        ),
        2 => 
        array (
          'type' => 'float',
          'name' => 'x',
          'description' => 'x coordinate of the end point',
        ),
        3 => 
        array (
          'type' => 'float',
          'name' => 'y',
          'description' => 'y coordinate of the end point',
        ),
      ),
    ),
    'pathcurvetoquadraticbezierrelative' => 
    array (
      'functionName' => 'pathCurveToQuadraticBezierRelative',
      'description' => 'Draws a quadratic Bezier curve from the current point to (x,y) using
   (x1,y1) as the control point using relative coordinates. At the end of the
   command, the new current point becomes the final (x,y) coordinate pair
   used in the polybezier.',
      'methodDescription' => 'Draws a quadratic Bezier curve',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'pathcurvetoquadraticbezierrelative.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'x1',
          'description' => 'starting x coordinate',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'y1',
          'description' => 'starting y coordinate',
        ),
        2 => 
        array (
          'type' => 'float',
          'name' => 'x',
          'description' => 'ending x coordinate',
        ),
        3 => 
        array (
          'type' => 'float',
          'name' => 'y',
          'description' => 'ending y coordinate',
        ),
      ),
    ),
    'pathcurvetoquadraticbeziersmoothabsolute' => 
    array (
      'functionName' => 'pathCurveToQuadraticBezierSmoothAbsolute',
      'description' => 'Draws a quadratic Bezier curve (using absolute coordinates) from the
   current point to (x,y). The control point is assumed to be the reflection
   of the control point on the previous command relative to the current point.
   (If there is no previous command or if the previous command was not a
   DrawPathCurveToQuadraticBezierAbsolute,
   DrawPathCurveToQuadraticBezierRelative,
   DrawPathCurveToQuadraticBezierSmoothAbsolut or
   DrawPathCurveToQuadraticBezierSmoothRelative, assume the control point is
   coincident with the current point.). At the end of the command, the new
   current point becomes the final (x,y) coordinate pair used in the polybezier.',
      'methodDescription' => 'Draws a quadratic Bezier curve',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'pathcurvetoquadraticbeziersmoothabsolute.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'x',
          'description' => 'ending x coordinate',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'y',
          'description' => 'ending y coordinate',
        ),
      ),
    ),
    'pathcurvetoquadraticbeziersmoothrelative' => 
    array (
      'functionName' => 'pathCurveToQuadraticBezierSmoothRelative',
      'description' => 'Draws a quadratic Bezier curve (using relative coordinates) from the
   current point to (x, y). The control point is assumed to be the reflection
   of the control point on the previous command relative to the current point.
   (If there is no previous command or if the previous command was not a
   DrawPathCurveToQuadraticBezierAbsolute, 
   DrawPathCurveToQuadraticBezierRelative, 
   DrawPathCurveToQuadraticBezierSmoothAbsolut or 
   DrawPathCurveToQuadraticBezierSmoothRelative, assume the control point is
   coincident with the current point). At the end of the command, the new
   current point becomes the final (x, y) coordinate pair used in the
   polybezier.',
      'methodDescription' => 'Draws a quadratic Bezier curve',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'pathcurvetoquadraticbeziersmoothrelative.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'x',
          'description' => 'ending x coordinate',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'y',
          'description' => 'ending y coordinate',
        ),
      ),
    ),
    'pathcurvetorelative' => 
    array (
      'functionName' => 'pathCurveToRelative',
      'description' => 'Draws a cubic Bezier curve from the current point to (x,y) using (x1,y1)
   as the control point at the beginning of the curve and (x2,y2) as the
   control point at the end of the curve using relative coordinates. At the
   end of the command, the new current point becomes the final (x,y) 
   coordinate pair used in the polybezier.',
      'methodDescription' => 'Draws a cubic Bezier curve',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'pathcurvetorelative.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'x1',
          'description' => 'x coordinate of starting control point',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'y1',
          'description' => 'y coordinate of starting control point',
        ),
        2 => 
        array (
          'type' => 'float',
          'name' => 'x2',
          'description' => 'x coordinate of ending control point',
        ),
        3 => 
        array (
          'type' => 'float',
          'name' => 'y2',
          'description' => 'y coordinate of ending control point',
        ),
        4 => 
        array (
          'type' => 'float',
          'name' => 'x',
          'description' => 'ending x coordinate',
        ),
        5 => 
        array (
          'type' => 'float',
          'name' => 'y',
          'description' => 'ending y coordinate',
        ),
      ),
    ),
    'pathcurvetosmoothabsolute' => 
    array (
      'functionName' => 'pathCurveToSmoothAbsolute',
      'description' => 'Draws a cubic Bezier curve from the current point to (x,y) using absolute
   coordinates. The first control point is assumed to be the reflection of the
   second control point on the previous command relative to the current point.
   (If there is no previous command or if the previous command was not an 
   DrawPathCurveToAbsolute, DrawPathCurveToRelative, 
   DrawPathCurveToSmoothAbsolute or DrawPathCurveToSmoothRelative, assume the
   first control point is coincident with the current point.) (x2,y2) is the
   second control point (i.e., the control point at the end of the curve).
   At the end of the command, the new current point becomes the final (x,y)
   coordinate pair used in the polybezier.',
      'methodDescription' => 'Draws a cubic Bezier curve',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'pathcurvetosmoothabsolute.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'x2',
          'description' => 'x coordinate of the second control point',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'y2',
          'description' => 'y coordinate of the second control point',
        ),
        2 => 
        array (
          'type' => 'float',
          'name' => 'x',
          'description' => 'x coordinate of the ending point',
        ),
        3 => 
        array (
          'type' => 'float',
          'name' => 'y',
          'description' => 'y coordinate of the ending point',
        ),
      ),
    ),
    'pathcurvetosmoothrelative' => 
    array (
      'functionName' => 'pathCurveToSmoothRelative',
      'description' => 'Draws a cubic Bezier curve from the current point to (x,y) using relative
   coordinates. The first control point is assumed to be the reflection of
   the second control point on the previous command relative to the current
   point. (If there is no previous command or if the previous command was not
   an DrawPathCurveToAbsolute, DrawPathCurveToRelative, 
   DrawPathCurveToSmoothAbsolute or DrawPathCurveToSmoothRelative, assume the
   first control point is coincident with the current point.) (x2,y2) is the
   second control point (i.e., the control point at the end of the curve). At
   the end of the command, the new current point becomes the final (x,y)
   coordinate pair used in the polybezier.',
      'methodDescription' => 'Draws a cubic Bezier curve',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'pathcurvetosmoothrelative.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'x2',
          'description' => 'x coordinate of the second control point',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'y2',
          'description' => 'y coordinate of the second control point',
        ),
        2 => 
        array (
          'type' => 'float',
          'name' => 'x',
          'description' => 'x coordinate of the ending point',
        ),
        3 => 
        array (
          'type' => 'float',
          'name' => 'y',
          'description' => 'y coordinate of the ending point',
        ),
      ),
    ),
    'pathellipticarcabsolute' => 
    array (
      'functionName' => 'pathEllipticArcAbsolute',
      'description' => 'Draws an elliptical arc from the current point to (x, y) using absolute
   coordinates. The size and orientation of the ellipse are defined by two
   radii (rx, ry) and an xAxisRotation, which indicates how the ellipse as
   a whole is rotated relative to the current coordinate system. The center
   (cx, cy) of the ellipse is calculated automatically to satisfy the
   constraints imposed by the other parameters. largeArcFlag and sweepFlag
   contribute to the automatic calculations and help determine how the arc
   is drawn. If largeArcFlag is True; then draw the larger of the available
   arcs. If sweepFlag is true, then draw the arc matching a clock-wise
   rotation.',
      'methodDescription' => 'Draws an elliptical arc',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'pathellipticarcabsolute.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'rx',
          'description' => 'x radius',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'ry',
          'description' => 'y radius',
        ),
        2 => 
        array (
          'type' => 'float',
          'name' => 'x_axis_rotation',
          'description' => 'x axis rotation',
        ),
        3 => 
        array (
          'type' => 'bool',
          'name' => 'large_arc_flag',
          'description' => 'large arc flag',
        ),
        4 => 
        array (
          'type' => 'bool',
          'name' => 'sweep_flag',
          'description' => 'sweep flag',
        ),
        5 => 
        array (
          'type' => 'float',
          'name' => 'x',
          'description' => 'x coordinate',
        ),
        6 => 
        array (
          'type' => 'float',
          'name' => 'y',
          'description' => 'y coordinate',
        ),
      ),
    ),
    'pathellipticarcrelative' => 
    array (
      'functionName' => 'pathEllipticArcRelative',
      'description' => 'Draws an elliptical arc from the current point to (x, y) using relative
   coordinates. The size and orientation of the ellipse are defined by two
   radii (rx, ry) and an xAxisRotation, which indicates how the ellipse as
   a whole is rotated relative to the current coordinate system. The center
   (cx, cy) of the ellipse is calculated automatically to satisfy the
   constraints imposed by the other parameters. largeArcFlag and sweepFlag
   contribute to the automatic calculations and help determine how the arc
   is drawn. If largeArcFlag is True; then draw the larger of the available
   arcs. If sweepFlag is true, then draw the arc matching a clock-wise
   rotation.',
      'methodDescription' => 'Draws an elliptical arc',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'pathellipticarcrelative.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'rx',
          'description' => 'x radius',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'ry',
          'description' => 'y radius',
        ),
        2 => 
        array (
          'type' => 'float',
          'name' => 'x_axis_rotation',
          'description' => 'x axis rotation',
        ),
        3 => 
        array (
          'type' => 'bool',
          'name' => 'large_arc_flag',
          'description' => 'large arc flag',
        ),
        4 => 
        array (
          'type' => 'bool',
          'name' => 'sweep_flag',
          'description' => 'sweep flag',
        ),
        5 => 
        array (
          'type' => 'float',
          'name' => 'x',
          'description' => 'x coordinate',
        ),
        6 => 
        array (
          'type' => 'float',
          'name' => 'y',
          'description' => 'y coordinate',
        ),
      ),
    ),
    'pathfinish' => 
    array (
      'functionName' => 'pathFinish',
      'description' => 'Terminates the current path.',
      'methodDescription' => 'Terminates the current path',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'pathfinish.xml',
      'parameters' => 
      array (
      ),
    ),
    'pathlinetoabsolute' => 
    array (
      'functionName' => 'pathLineToAbsolute',
      'description' => 'Draws a line path from the current point to the given coordinate using
   absolute coordinates. The coordinate then becomes the new current point.',
      'methodDescription' => 'Draws a line path',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'pathlinetoabsolute.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'x',
          'description' => 'starting x coordinate',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'y',
          'description' => 'ending x coordinate',
        ),
      ),
    ),
    'pathlinetohorizontalabsolute' => 
    array (
      'functionName' => 'pathLineToHorizontalAbsolute',
      'description' => 'Draws a horizontal line path from the current point to the target point
   using absolute coordinates.  The target point then becomes the new
   current point.',
      'methodDescription' => 'Draws a horizontal line path',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'pathlinetohorizontalabsolute.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'x',
          'description' => 'x coordinate',
        ),
      ),
    ),
    'pathlinetohorizontalrelative' => 
    array (
      'functionName' => 'pathLineToHorizontalRelative',
      'description' => 'Draws a horizontal line path from the current point to the target point
   using relative coordinates.  The target point then becomes the new
   current point.',
      'methodDescription' => 'Draws a horizontal line',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'pathlinetohorizontalrelative.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'x',
          'description' => 'x coordinate',
        ),
      ),
    ),
    'pathlinetorelative' => 
    array (
      'functionName' => 'pathLineToRelative',
      'description' => 'Draws a line path from the current point to the given coordinate using
   relative coordinates. The coordinate then becomes the new current point.',
      'methodDescription' => 'Draws a line path',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'pathlinetorelative.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'x',
          'description' => 'starting x coordinate',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'y',
          'description' => 'starting y coordinate',
        ),
      ),
    ),
    'pathlinetoverticalabsolute' => 
    array (
      'functionName' => 'pathLineToVerticalAbsolute',
      'description' => 'Draws a vertical line path from the current point to the target point using
   absolute coordinates.  The target point then becomes the new current point.',
      'methodDescription' => 'Draws a vertical line',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'pathlinetoverticalabsolute.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'y',
          'description' => 'y coordinate',
        ),
      ),
    ),
    'pathlinetoverticalrelative' => 
    array (
      'functionName' => 'pathLineToVerticalRelative',
      'description' => 'Draws a vertical line path from the current point to the target point using
   relative coordinates.  The target point then becomes the new current point.',
      'methodDescription' => 'Draws a vertical line path',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'pathlinetoverticalrelative.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'y',
          'description' => 'y coordinate',
        ),
      ),
    ),
    'pathmovetoabsolute' => 
    array (
      'functionName' => 'pathMoveToAbsolute',
      'description' => 'Starts a new sub-path at the given coordinate using absolute coordinates.
   The current point then becomes the specified coordinate.',
      'methodDescription' => 'Starts a new sub-path',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'pathmovetoabsolute.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'x',
          'description' => 'x coordinate of the starting point',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'y',
          'description' => 'y coordinate of the starting point',
        ),
      ),
    ),
    'pathmovetorelative' => 
    array (
      'functionName' => 'pathMoveToRelative',
      'description' => 'Starts a new sub-path at the given coordinate using relative coordinates.
   The current point then becomes the specified coordinate.',
      'methodDescription' => 'Starts a new sub-path',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'pathmovetorelative.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'x',
          'description' => 'target x coordinate',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'y',
          'description' => 'target y coordinate',
        ),
      ),
    ),
    'pathstart' => 
    array (
      'functionName' => 'pathStart',
      'description' => 'Declares the start of a path drawing list which is terminated by a matching
   DrawPathFinish() command. All other DrawPath commands must be enclosed
   between a and a DrawPathFinish() command. This is because path drawing
   commands are subordinate commands and they do not function by themselves.',
      'methodDescription' => 'Declares the start of a path drawing list',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'pathstart.xml',
      'parameters' => 
      array (
      ),
    ),
    'point' => 
    array (
      'functionName' => 'point',
      'description' => 'Draws a point using the current stroke color and stroke thickness at the specified coordinates.',
      'methodDescription' => 'Draws a point',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'point.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'x',
          'description' => 'point\'s x coordinate',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'y',
          'description' => 'point\'s y coordinate',
        ),
      ),
    ),
    'polygon' => 
    array (
      'functionName' => 'polygon',
      'description' => 'Draws a polygon using the current stroke, stroke width, and fill color or
   texture, using the specified array of coordinates.',
      'methodDescription' => 'Draws a polygon',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagickdraw',
      'method' => 'polygon.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'array',
          'name' => 'coordinates',
          'description' => 'multidimensional array like array( array( \'x\' => 3, \'y\' => 4 ), array( \'x\' => 2, \'y\' => 6 ) );',
        ),
      ),
    ),
    'polyline' => 
    array (
      'functionName' => 'polyline',
      'description' => 'Draws a polyline using the current stroke, stroke width, and fill color or
   texture, using the specified array of coordinates.',
      'methodDescription' => 'Draws a polyline',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagickdraw',
      'method' => 'polyline.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'array',
          'name' => 'coordinates',
          'description' => 'array of x and y coordinates: array( array( \'x\' => 4, \'y\' => 6 ), array( \'x\' => 8, \'y\' => 10 ) )',
        ),
      ),
    ),
    'pop' => 
    array (
      'functionName' => 'pop',
      'description' => 'Destroys the current ImagickDraw in the stack, and returns to the
   previously pushed ImagickDraw. Multiple ImagickDraws may exist. It is an
   error to attempt to pop more ImagickDraws than have been pushed, and it is
   proper form to pop all ImagickDraws which have been pushed.',
      'methodDescription' => 'Destroys the current ImagickDraw in the stack, and returns to the previously pushed ImagickDraw',
      'returnType' => 'Returns True; on success and false on failure.',
      'classname' => 'imagickdraw',
      'method' => 'pop.xml',
      'parameters' => 
      array (
      ),
    ),
    'popclippath' => 
    array (
      'functionName' => 'popClipPath',
      'description' => 'Terminates a clip path definition.',
      'methodDescription' => 'Terminates a clip path definition',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'popclippath.xml',
      'parameters' => 
      array (
      ),
    ),
    'popdefs' => 
    array (
      'functionName' => 'popDefs',
      'description' => 'Terminates a definition list.',
      'methodDescription' => 'Terminates a definition list',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'popdefs.xml',
      'parameters' => 
      array (
      ),
    ),
    'poppattern' => 
    array (
      'functionName' => 'popPattern',
      'description' => 'Terminates a pattern definition.',
      'methodDescription' => 'Terminates a pattern definition',
      'returnType' => 'Return success;',
      'classname' => 'imagickdraw',
      'method' => 'poppattern.xml',
      'parameters' => 
      array (
      ),
    ),
    'push' => 
    array (
      'functionName' => 'push',
      'description' => 'Clones the current ImagickDraw to create a new ImagickDraw, which is then
   added to the ImagickDraw stack. The original drawing ImagickDraw(s) may be
   returned to by invoking pop(). The ImagickDraws are stored on a
   ImagickDraw stack. For every Pop there must have already been an equivalent
   Push.',
      'methodDescription' => 'Clones the current ImagickDraw and pushes it to the stack',
      'returnType' => 'Return success;',
      'classname' => 'imagickdraw',
      'method' => 'push.xml',
      'parameters' => 
      array (
      ),
    ),
    'pushclippath' => 
    array (
      'functionName' => 'pushClipPath',
      'description' => 'Starts a clip path definition which is comprised of any number of drawing
   commands and terminated by a ImagickDraw::popClipPath() command.',
      'methodDescription' => 'Starts a clip path definition',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'pushclippath.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'string',
          'name' => 'clip_mask_id',
          'description' => 'Clip mask Id',
        ),
      ),
    ),
    'pushdefs' => 
    array (
      'functionName' => 'pushDefs',
      'description' => 'Indicates that commands up to a terminating ImagickDraw::popDefs()
   command create named elements (e.g. clip-paths, textures, etc.) which
   may safely be processed earlier for the sake of efficiency.',
      'methodDescription' => 'Indicates that following commands create named elements for early processing',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'pushdefs.xml',
      'parameters' => 
      array (
      ),
    ),
    'pushpattern' => 
    array (
      'functionName' => 'pushPattern',
      'description' => 'Indicates that subsequent commands up to a DrawPopPattern() command
   comprise the definition of a named pattern. The pattern space is assigned
   top left corner coordinates, a width and height, and becomes its own
   drawing space.  Anything which can be drawn may be used in a pattern
   definition. Named patterns may be used as stroke or brush definitions.',
      'methodDescription' => 'Indicates that subsequent commands up to a ImagickDraw::opPattern() command comprise the definition of a named pattern',
      'returnType' => 'Return success;',
      'classname' => 'imagickdraw',
      'method' => 'pushpattern.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'string',
          'name' => 'pattern_id',
          'description' => 'the pattern Id',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'x',
          'description' => 'x coordinate of the top-left corner',
        ),
        2 => 
        array (
          'type' => 'float',
          'name' => 'y',
          'description' => 'y coordinate of the top-left corner',
        ),
        3 => 
        array (
          'type' => 'float',
          'name' => 'width',
          'description' => 'width of the pattern',
        ),
        4 => 
        array (
          'type' => 'float',
          'name' => 'height',
          'description' => 'height of the pattern',
        ),
      ),
    ),
    'rectangle' => 
    array (
      'functionName' => 'rectangle',
      'description' => 'Draws a rectangle given two coordinates and using the current stroke,
   stroke width, and fill settings.',
      'methodDescription' => 'Draws a rectangle',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'rectangle.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'x1',
          'description' => 'x coordinate of the top left corner',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'y1',
          'description' => 'y coordinate of the top left corner',
        ),
        2 => 
        array (
          'type' => 'float',
          'name' => 'x2',
          'description' => 'x coordinate of the bottom right corner',
        ),
        3 => 
        array (
          'type' => 'float',
          'name' => 'y2',
          'description' => 'y coordinate of the bottom right corner',
        ),
      ),
    ),
    'render' => 
    array (
      'functionName' => 'render',
      'description' => 'Renders all preceding drawing commands onto the image.',
      'methodDescription' => 'Renders all preceding drawing commands onto the image',
      'returnType' => 'Return success;',
      'classname' => 'imagickdraw',
      'method' => 'render.xml',
      'parameters' => 
      array (
      ),
    ),
    'rotate' => 
    array (
      'functionName' => 'rotate',
      'description' => 'Applies the specified rotation to the current coordinate space.',
      'methodDescription' => 'Applies the specified rotation to the current coordinate space',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'rotate.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'degrees',
          'description' => 'degrees to rotate',
        ),
      ),
    ),
    'roundrectangle' => 
    array (
      'functionName' => 'roundRectangle',
      'description' => 'Draws a rounded rectangle given two coordinates, x & y corner radiuses
   and using the current stroke, stroke width, and fill settings.',
      'methodDescription' => 'Draws a rounded rectangle',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'roundrectangle.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'x1',
          'description' => 'x coordinate of the top left corner',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'y1',
          'description' => 'y coordinate of the top left corner',
        ),
        2 => 
        array (
          'type' => 'float',
          'name' => 'x2',
          'description' => 'x coordinate of the bottom right',
        ),
        3 => 
        array (
          'type' => 'float',
          'name' => 'y2',
          'description' => 'y coordinate of the bottom right',
        ),
        4 => 
        array (
          'type' => 'float',
          'name' => 'rx',
          'description' => 'x rounding',
        ),
        5 => 
        array (
          'type' => 'float',
          'name' => 'ry',
          'description' => 'y rounding',
        ),
      ),
    ),
    'scale' => 
    array (
      'functionName' => 'scale',
      'description' => 'Adjusts the scaling factor to apply in the horizontal and vertical
   directions to the current coordinate space.',
      'methodDescription' => 'Adjusts the scaling factor',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'scale.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'x',
          'description' => 'horizontal factor',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'y',
          'description' => 'vertical factor',
        ),
      ),
    ),
    'setclippath' => 
    array (
      'functionName' => 'setClipPath',
      'description' => 'Associates a named clipping path with the image.  Only the areas drawn on
   by the clipping path will be modified as long as it remains in effect.',
      'methodDescription' => 'Associates a named clipping path with the image',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'setclippath.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'string',
          'name' => 'clip_mask',
          'description' => 'the clipping path name',
        ),
      ),
    ),
    'setcliprule' => 
    array (
      'functionName' => 'setClipRule',
      'description' => 'Set the polygon fill rule to be used by the clipping path.',
      'methodDescription' => 'Set the polygon fill rule to be used by the clipping path',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'setcliprule.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'fill_rule',
          'description' => 'FILLRULE_ constant',
        ),
      ),
    ),
    'setclipunits' => 
    array (
      'functionName' => 'setClipUnits',
      'description' => 'Sets the interpretation of clip path units.',
      'methodDescription' => 'Sets the interpretation of clip path units',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'setclipunits.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'clip_units',
          'description' => 'the number of clip units',
        ),
      ),
    ),
    'setfillalpha' => 
    array (
      'functionName' => 'setFillAlpha',
      'description' => 'Sets the opacity to use when drawing using the fill color or fill texture.
   Fully opaque is 1.0.',
      'methodDescription' => 'Sets the opacity to use when drawing using the fill color or fill texture',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'setfillalpha.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'opacity',
          'description' => 'fill alpha',
        ),
      ),
    ),
    'setfillcolor' => 
    array (
      'functionName' => 'setFillColor',
      'description' => 'Sets the fill color to be used for drawing filled objects.',
      'methodDescription' => 'Sets the fill color to be used for drawing filled objects',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'setfillcolor.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'ImagickPixel',
          'name' => 'fill_pixel',
          'description' => 'ImagickPixel to use to set the color',
        ),
      ),
    ),
    'setfillopacity' => 
    array (
      'functionName' => 'setFillOpacity',
      'description' => 'Sets the opacity to use when drawing using the fill color or fill texture.
   Fully opaque is 1.0.',
      'methodDescription' => 'Sets the opacity to use when drawing using the fill color or fill texture',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'setfillopacity.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'fillOpacity',
          'description' => 'the fill opacity',
        ),
      ),
    ),
    'setfillpatternurl' => 
    array (
      'functionName' => 'setFillPatternURL',
      'description' => 'Sets the URL to use as a fill pattern for filling objects. Only local URLs
   ("#identifier") are supported at this time. These local URLs are normally
   created by defining a named fill pattern with DrawPushPattern/DrawPopPattern.',
      'methodDescription' => 'Sets the URL to use as a fill pattern for filling objects',
      'returnType' => 'Return success;',
      'classname' => 'imagickdraw',
      'method' => 'setfillpatternurl.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'string',
          'name' => 'fill_url',
          'description' => 'URL to use to obtain fill pattern.',
        ),
      ),
    ),
    'setfillrule' => 
    array (
      'functionName' => 'setFillRule',
      'description' => 'Sets the fill rule to use while drawing polygons.',
      'methodDescription' => 'Sets the fill rule to use while drawing polygons',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'setfillrule.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'fill_rule',
          'description' => 'FILLRULE_ constant',
        ),
      ),
    ),
    'setfont' => 
    array (
      'functionName' => 'setFont',
      'description' => 'Sets the fully-specified font to use when annotating with text.',
      'methodDescription' => 'Sets the fully-specified font to use when annotating with text',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagickdraw',
      'method' => 'setfont.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'string',
          'name' => 'font_name',
          'description' => '',
        ),
      ),
    ),
    'setfontfamily' => 
    array (
      'functionName' => 'setFontFamily',
      'description' => 'Sets the font family to use when annotating with text.',
      'methodDescription' => 'Sets the font family to use when annotating with text',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagickdraw',
      'method' => 'setfontfamily.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'string',
          'name' => 'font_family',
          'description' => 'the font family',
        ),
      ),
    ),
    'setfontsize' => 
    array (
      'functionName' => 'setFontSize',
      'description' => 'Sets the font pointsize to use when annotating with text.',
      'methodDescription' => 'Sets the font pointsize to use when annotating with text',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'setfontsize.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'pointsize',
          'description' => 'the point size',
        ),
      ),
    ),
    'setfontstretch' => 
    array (
      'functionName' => 'setFontStretch',
      'description' => 'Sets the font stretch to use when annotating with text. The AnyStretch
   enumeration acts as a wild-card "don\'t care" option.',
      'methodDescription' => 'Sets the font stretch to use when annotating with text',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'setfontstretch.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'fontStretch',
          'description' => 'STRETCH_ constant',
        ),
      ),
    ),
    'setfontstyle' => 
    array (
      'functionName' => 'setFontStyle',
      'description' => 'Sets the font style to use when annotating with text. The AnyStyle
   enumeration acts as a wild-card "don\'t care" option.',
      'methodDescription' => 'Sets the font style to use when annotating with text',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'setfontstyle.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'style',
          'description' => 'STYLETYPE_ constant',
        ),
      ),
    ),
    'setfontweight' => 
    array (
      'functionName' => 'setFontWeight',
      'description' => 'Sets the font weight to use when annotating with text.',
      'methodDescription' => 'Sets the font weight',
      'returnType' => '',
      'classname' => 'imagickdraw',
      'method' => 'setfontweight.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'font_weight',
          'description' => '',
        ),
      ),
    ),
    'setgravity' => 
    array (
      'functionName' => 'setGravity',
      'description' => 'Sets the text placement gravity to use when annotating with text.',
      'methodDescription' => 'Sets the text placement gravity',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'setgravity.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'gravity',
          'description' => 'GRAVITY_ constant',
        ),
      ),
    ),
    'setstrokealpha' => 
    array (
      'functionName' => 'setStrokeAlpha',
      'description' => 'Specifies the opacity of stroked object outlines.',
      'methodDescription' => 'Specifies the opacity of stroked object outlines',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'setstrokealpha.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'opacity',
          'description' => 'opacity',
        ),
      ),
    ),
    'setstrokeantialias' => 
    array (
      'functionName' => 'setStrokeAntialias',
      'description' => 'Controls whether stroked outlines are antialiased. Stroked outlines are
   antialiased by default.  When antialiasing is disabled stroked pixels are
   thresholded to determine if the stroke color or underlying canvas color
   should be used.',
      'methodDescription' => 'Controls whether stroked outlines are antialiased',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'setstrokeantialias.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'bool',
          'name' => 'stroke_antialias',
          'description' => 'the antialias setting',
        ),
      ),
    ),
    'setstrokecolor' => 
    array (
      'functionName' => 'setStrokeColor',
      'description' => 'Sets the color used for stroking object outlines.',
      'methodDescription' => 'Sets the color used for stroking object outlines',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'setstrokecolor.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'ImagickPixel',
          'name' => 'stroke_pixel',
          'description' => 'the stroke color',
        ),
      ),
    ),
    'setstrokedasharray' => 
    array (
      'functionName' => 'setStrokeDashArray',
      'description' => 'Specifies the pattern of dashes and gaps used to stroke paths. The
   strokeDashArray represents an array of numbers that specify the lengths of
   alternating dashes and gaps in pixels. If an odd number of values is
   provided, then the list of values is repeated to yield an even number of
   values. To remove an existing dash array, pass a zero number_elements
   argument and null dash_array. A typical strokeDashArray_ array might
   contain the members 5 3 2.',
      'methodDescription' => 'Specifies the pattern of dashes and gaps used to stroke paths',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagickdraw',
      'method' => 'setstrokedasharray.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'array',
          'name' => 'dashArray',
          'description' => 'array of floats',
        ),
      ),
    ),
    'setstrokedashoffset' => 
    array (
      'functionName' => 'setStrokeDashOffset',
      'description' => 'Specifies the offset into the dash pattern to start the dash.',
      'methodDescription' => 'Specifies the offset into the dash pattern to start the dash',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'setstrokedashoffset.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'dash_offset',
          'description' => 'dash offset',
        ),
      ),
    ),
    'setstrokelinecap' => 
    array (
      'functionName' => 'setStrokeLineCap',
      'description' => 'Specifies the shape to be used at the end of open subpaths when they
   are stroked.',
      'methodDescription' => 'Specifies the shape to be used at the end of open subpaths when they are stroked',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'setstrokelinecap.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'linecap',
          'description' => 'LINECAP_ constant',
        ),
      ),
    ),
    'setstrokelinejoin' => 
    array (
      'functionName' => 'setStrokeLineJoin',
      'description' => 'Specifies the shape to be used at the corners of paths (or other vector 
   shapes) when they are stroked.',
      'methodDescription' => 'Specifies the shape to be used at the corners of paths when they are stroked',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'setstrokelinejoin.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'linejoin',
          'description' => 'LINEJOIN_ constant',
        ),
      ),
    ),
    'setstrokemiterlimit' => 
    array (
      'functionName' => 'setStrokeMiterLimit',
      'description' => 'Specifies the miter limit. When two line segments meet at a sharp angle
   and miter joins have been specified for \'lineJoin\', it is possible for
   the miter to extend far beyond the thickness of the line stroking the 
   path. The miterLimit\' imposes a limit on the ratio of the miter length to
   the \'lineWidth\'.',
      'methodDescription' => 'Specifies the miter limit',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'setstrokemiterlimit.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'miterlimit',
          'description' => 'the miter limit',
        ),
      ),
    ),
    'setstrokeopacity' => 
    array (
      'functionName' => 'setStrokeOpacity',
      'description' => 'Specifies the opacity of stroked object outlines.',
      'methodDescription' => 'Specifies the opacity of stroked object outlines',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'setstrokeopacity.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'stroke_opacity',
          'description' => 'stroke opacity. 1.0 is fully opaque',
        ),
      ),
    ),
    'setstrokepatternurl' => 
    array (
      'functionName' => 'setStrokePatternURL',
      'description' => 'Sets the pattern used for stroking object outlines.',
      'methodDescription' => 'Sets the pattern used for stroking object outlines',
      'returnType' => 'imagick.imagickdraw.return.success;',
      'classname' => 'imagickdraw',
      'method' => 'setstrokepatternurl.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'string',
          'name' => 'stroke_url',
          'description' => 'stroke URL',
        ),
      ),
    ),
    'setstrokewidth' => 
    array (
      'functionName' => 'setStrokeWidth',
      'description' => 'Sets the width of the stroke used to draw object outlines.',
      'methodDescription' => 'Sets the width of the stroke used to draw object outlines',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'setstrokewidth.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'stroke_width',
          'description' => 'stroke width',
        ),
      ),
    ),
    'settextalignment' => 
    array (
      'functionName' => 'setTextAlignment',
      'description' => 'Specifies a text alignment to be applied when annotating with text.',
      'methodDescription' => 'Specifies a text alignment',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'settextalignment.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'alignment',
          'description' => 'ALIGN_ constant',
        ),
      ),
    ),
    'settextantialias' => 
    array (
      'functionName' => 'setTextAntialias',
      'description' => 'Controls whether text is antialiased. Text is antialiased by default.',
      'methodDescription' => 'Controls whether text is antialiased',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'settextantialias.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'bool',
          'name' => 'antiAlias',
          'description' => '',
        ),
      ),
    ),
    'settextdecoration' => 
    array (
      'functionName' => 'setTextDecoration',
      'description' => 'Specifies a decoration to be applied when annotating with text.',
      'methodDescription' => 'Specifies a decoration',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'settextdecoration.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'decoration',
          'description' => 'DECORATION_ constant',
        ),
      ),
    ),
    'settextencoding' => 
    array (
      'functionName' => 'setTextEncoding',
      'description' => 'Specifies the code set to use for text annotations. The only
   character encoding which may be specified at this time is "UTF-8" for
   representing Unicode as a sequence of bytes. Specify an empty string to
   set text encoding to the system\'s default. Successful text annotation
   using Unicode may require fonts designed to support Unicode.',
      'methodDescription' => 'Specifies the text code set',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'settextencoding.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'string',
          'name' => 'encoding',
          'description' => 'the encoding name',
        ),
      ),
    ),
    'settextundercolor' => 
    array (
      'functionName' => 'setTextUnderColor',
      'description' => 'Specifies the color of a background rectangle to place under text annotations.',
      'methodDescription' => 'Specifies the color of a background rectangle',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'settextundercolor.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'ImagickPixel',
          'name' => 'under_color',
          'description' => 'the under color',
        ),
      ),
    ),
    'setvectorgraphics' => 
    array (
      'functionName' => 'setVectorGraphics',
      'description' => 'Sets the vector graphics associated with the specified ImagickDraw
   object. Use this method with ImagickDraw::getVectorGraphics() as a method
   to persist the vector graphics state.',
      'methodDescription' => 'Sets the vector graphics',
      'returnType' => 'Return success;',
      'classname' => 'imagickdraw',
      'method' => 'setvectorgraphics.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'string',
          'name' => 'xml',
          'description' => 'xml containing the vector graphics',
        ),
      ),
    ),
    'setviewbox' => 
    array (
      'functionName' => 'setViewbox',
      'description' => 'Sets the overall canvas size to be recorded with the drawing vector data.
   Usually this will be specified using the same size as the canvas image.
   When the vector data is saved to SVG or MVG formats, the viewbox is use to
   specify the size of the canvas image that a viewer will render the vector
   data on.',
      'methodDescription' => 'Sets the overall canvas size',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'setviewbox.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'x1',
          'description' => 'left x coordinate',
        ),
        1 => 
        array (
          'type' => 'int',
          'name' => 'y1',
          'description' => 'left y coordinate',
        ),
        2 => 
        array (
          'type' => 'int',
          'name' => 'x2',
          'description' => 'right x coordinate',
        ),
        3 => 
        array (
          'type' => 'int',
          'name' => 'y2',
          'description' => 'right y coordinate',
        ),
      ),
    ),
    'skewx' => 
    array (
      'functionName' => 'skewX',
      'description' => 'Skews the current coordinate system in the horizontal direction.',
      'methodDescription' => 'Skews the current coordinate system in the horizontal direction',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'skewx.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'degrees',
          'description' => 'degrees to skew',
        ),
      ),
    ),
    'skewy' => 
    array (
      'functionName' => 'skewY',
      'description' => 'Skews the current coordinate system in the vertical direction.',
      'methodDescription' => 'Skews the current coordinate system in the vertical direction',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'skewy.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'degrees',
          'description' => 'degrees to skew',
        ),
      ),
    ),
    'translate' => 
    array (
      'functionName' => 'translate',
      'description' => 'Applies a translation to the current coordinate system which moves the
   coordinate system origin to the specified coordinate.',
      'methodDescription' => 'Applies a translation to the current coordinate system',
      'returnType' => 'return void;',
      'classname' => 'imagickdraw',
      'method' => 'translate.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'x',
          'description' => 'horizontal translation',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'y',
          'description' => 'vertical translation',
        ),
      ),
    ),
  ),
  'imagick' => 
  array (
    'adaptiveblurimage' => 
    array (
      'functionName' => 'adaptiveBlurImage',
      'description' => 'Adds an adaptive blur filter to image. The intensity of an adaptive blur
   depends is dramatically decreased at edge of the image, whereas a standard
   blur is uniform across the image. This method is available if Imagick has been compiled against ImageMagick version 6.2.9 or newer.',
      'methodDescription' => 'Adds adaptive blur filter to image',
      'returnType' => 'Returns True; on success.',
      'classname' => 'imagick',
      'method' => 'adaptiveblurimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'radius',
          'description' => 'The radius of the Gaussian, in pixels, not counting the center pixel.
       Provide a value of 0 and the radius will be chosen automagically.',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'sigma',
          'description' => 'The standard deviation of the Gaussian, in pixels.',
        ),
        2 => 
        array (
          'type' => 'int',
          'name' => 'channel',
          'description' => 'Provide any channel constant that is valid for your channel mode. To apply to more than one channel, combine channel constants using bitwise operators. Defaults to Imagick::CHANNEL_DEFAULT. Refer to this list of channel constants',
        ),
      ),
    ),
    'adaptiveresizeimage' => 
    array (
      'functionName' => 'adaptiveResizeImage',
      'description' => 'Adaptively resize image with data-dependent triangulation. Avoids
   blurring across sharp color changes. Most useful when used to shrink
   images slightly to a slightly smaller "web size"; may not look good
   when a full-sized image is adaptively resized to a thumbnail.
   available.0x629;',
      'methodDescription' => 'Adaptively resize image with data dependent triangulation',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'adaptiveresizeimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'columns',
          'description' => 'The number of columns in the scaled image.',
        ),
        1 => 
        array (
          'type' => 'int',
          'name' => 'rows',
          'description' => 'The number of rows in the scaled image.',
        ),
        2 => 
        array (
          'type' => 'bool',
          'name' => 'bestfit',
          'description' => 'Whether to fit the image inside a bounding box.',
        ),
      ),
    ),
    'adaptivesharpenimage' => 
    array (
      'functionName' => 'adaptiveSharpenImage',
      'description' => 'Adaptively sharpen the image by sharpening more intensely
   near image edges and less intensely far from edges. available.0x629;',
      'methodDescription' => 'Adaptively sharpen the image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'adaptivesharpenimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'radius',
          'description' => 'The radius of the Gaussian, in pixels, not counting the center pixel. Use 0 for auto-select.',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'sigma',
          'description' => 'The standard deviation of the Gaussian, in pixels.',
        ),
        2 => 
        array (
          'type' => 'int',
          'name' => 'channel',
          'description' => 'Imagick channel constant;',
        ),
      ),
    ),
    'adaptivethresholdimage' => 
    array (
      'functionName' => 'adaptiveThresholdImage',
      'description' => 'Selects an individual threshold for each pixel based on the
   range of intensity values in its local neighborhood.  This
   allows for thresholding of an image whose global intensity
   histogram doesn\'t contain distinctive peaks.',
      'methodDescription' => 'Selects a threshold for each pixel based on a range of intensity',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'adaptivethresholdimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'width',
          'description' => 'Width of the local neighborhood.',
        ),
        1 => 
        array (
          'type' => 'int',
          'name' => 'height',
          'description' => 'Height of the local neighborhood.',
        ),
        2 => 
        array (
          'type' => 'int',
          'name' => 'offset',
          'description' => 'The mean offset',
        ),
      ),
    ),
    'addimage' => 
    array (
      'functionName' => 'addImage',
      'description' => 'Adds new image to Imagick object from the current position of the source object.
   After the operation iterator position is moved at the end of the list.',
      'methodDescription' => 'Adds new image to Imagick object image list',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'addimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'Imagick',
          'name' => 'source',
          'description' => 'The source Imagick object',
        ),
      ),
    ),
    'addnoiseimage' => 
    array (
      'functionName' => 'addNoiseImage',
      'description' => 'Adds random noise to the image.',
      'methodDescription' => 'Adds random noise to the image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'addnoiseimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'noise_type',
          'description' => 'The type of the noise. Refer to this list of
       noise constants.',
        ),
        1 => 
        array (
          'type' => 'int',
          'name' => 'channel',
          'description' => 'Imagick channel constant;',
        ),
      ),
    ),
    'affinetransformimage' => 
    array (
      'functionName' => 'affineTransformImage',
      'description' => 'Transforms an image as dictated by the affine matrix.',
      'methodDescription' => 'Transforms an image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'affinetransformimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'ImagickDraw',
          'name' => 'matrix',
          'description' => 'The affine matrix',
        ),
      ),
    ),
    'animateimages' => 
    array (
      'functionName' => 'animateImages',
      'description' => 'This method animates the image onto a local or remote X server. This method
   is not available on Windows.
   available.0x636;',
      'methodDescription' => 'Animates an image or images',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'animateimages.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'string',
          'name' => 'x_server',
          'description' => 'X server address',
        ),
      ),
    ),
    'annotateimage' => 
    array (
      'functionName' => 'annotateImage',
      'description' => 'Annotates an image with text.',
      'methodDescription' => 'Annotates an image with text',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'annotateimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'ImagickDraw',
          'name' => 'draw_settings',
          'description' => 'The ImagickDraw object that contains settings for drawing the text',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'x',
          'description' => 'Horizontal offset in pixels to the left of text',
        ),
        2 => 
        array (
          'type' => 'float',
          'name' => 'y',
          'description' => 'Vertical offset in pixels to the baseline of text',
        ),
        3 => 
        array (
          'type' => 'float',
          'name' => 'angle',
          'description' => 'The angle at which to write the text',
        ),
        4 => 
        array (
          'type' => 'string',
          'name' => 'text',
          'description' => 'The string to draw',
        ),
      ),
    ),
    'appendimages' => 
    array (
      'functionName' => 'appendImages',
      'description' => 'Append a set of images into one larger image.',
      'methodDescription' => 'Append a set of images',
      'returnType' => 'Returns Imagick instance on success.',
      'classname' => 'imagick',
      'method' => 'appendimages.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'bool',
          'name' => 'stack',
          'description' => 'Whether to stack the images vertically.
       By default (or if False; is specified) images are stacked left-to-right.
       If stack is True;, images are stacked top-to-bottom.',
        ),
      ),
    ),
    'averageimages' => 
    array (
      'functionName' => 'averageImages',
      'description' => 'Average a set of images.',
      'methodDescription' => 'Average a set of images',
      'returnType' => 'Returns a new Imagick object on success.',
      'classname' => 'imagick',
      'method' => 'averageimages.xml',
      'parameters' => 
      array (
      ),
    ),
    'blackthresholdimage' => 
    array (
      'functionName' => 'blackThresholdImage',
      'description' => 'Is like Imagick::thresholdImage() but forces all pixels below the threshold
   into black while leaving all pixels above the threshold unchanged.',
      'methodDescription' => 'Forces all pixels below the threshold into black',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'blackthresholdimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'mixed',
          'name' => 'threshold',
          'description' => 'The threshold below which everything turns black',
        ),
      ),
    ),
    'blurimage' => 
    array (
      'functionName' => 'blurImage',
      'description' => 'Adds blur filter to image. Optional third parameter to blur a specific
   channel.',
      'methodDescription' => 'Adds blur filter to image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'blurimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'radius',
          'description' => 'Blur radius',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'sigma',
          'description' => 'Standard deviation',
        ),
        2 => 
        array (
          'type' => 'int',
          'name' => 'channel',
          'description' => 'The Channeltype
       constant. When not supplied, all channels are blurred.',
        ),
      ),
    ),
    'borderimage' => 
    array (
      'functionName' => 'borderImage',
      'description' => 'Surrounds the image with a border of the color defined by the bordercolor ImagickPixel object.',
      'methodDescription' => 'Surrounds the image with a border',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'borderimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'mixed',
          'name' => 'bordercolor',
          'description' => 'ImagickPixel object or a string containing the border color',
        ),
        1 => 
        array (
          'type' => 'int',
          'name' => 'width',
          'description' => 'Border width',
        ),
        2 => 
        array (
          'type' => 'int',
          'name' => 'height',
          'description' => 'Border height',
        ),
      ),
    ),
    'charcoalimage' => 
    array (
      'functionName' => 'charcoalImage',
      'description' => 'Simulates a charcoal drawing.',
      'methodDescription' => 'Simulates a charcoal drawing',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'charcoalimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'radius',
          'description' => 'The radius of the Gaussian, in pixels, not counting the center pixel',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'sigma',
          'description' => 'The standard deviation of the Gaussian, in pixels',
        ),
      ),
    ),
    'chopimage' => 
    array (
      'functionName' => 'chopImage',
      'description' => 'Removes a region of an image and collapses the image to occupy the removed portion.',
      'methodDescription' => 'Removes a region of an image and trims',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'chopimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'width',
          'description' => 'Width of the chopped area',
        ),
        1 => 
        array (
          'type' => 'int',
          'name' => 'height',
          'description' => 'Height of the chopped area',
        ),
        2 => 
        array (
          'type' => 'int',
          'name' => 'x',
          'description' => 'X origo of the chopped area',
        ),
        3 => 
        array (
          'type' => 'int',
          'name' => 'y',
          'description' => 'Y origo of the chopped area',
        ),
      ),
    ),
    'clear' => 
    array (
      'functionName' => 'clear',
      'description' => 'Clears all resources associated to Imagick object',
      'methodDescription' => 'Clears all resources associated to Imagick object',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'clear.xml',
      'parameters' => 
      array (
      ),
    ),
    'clipimage' => 
    array (
      'functionName' => 'clipImage',
      'description' => 'Clips along the first path from the 8BIM profile, if present.',
      'methodDescription' => 'Clips along the first path from the 8BIM profile',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'clipimage.xml',
      'parameters' => 
      array (
      ),
    ),
    'clippathimage' => 
    array (
      'functionName' => 'clipPathImage',
      'description' => 'Clips along the named paths from the 8BIM profile, if
   present. Later operations take effect inside the path.
   It may be a number if preceded with #, to work on a
   numbered path, e.g., "#1" to use the first path.',
      'methodDescription' => 'Clips along the named paths from the 8BIM profile',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'clippathimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'string',
          'name' => 'pathname',
          'description' => 'The name of the path',
        ),
        1 => 
        array (
          'type' => 'bool',
          'name' => 'inside',
          'description' => 'If True; later operations take effect inside clipping path.
       Otherwise later operations take effect outside clipping path.',
        ),
      ),
    ),
    'clone' => 
    array (
      'functionName' => 'clone',
      'description' => 'Makes an exact copy of the Imagick object.',
      'methodDescription' => 'Makes an exact copy of the Imagick object',
      'returnType' => 'A copy of the Imagick object is returned.',
      'classname' => 'imagick',
      'method' => 'clone.xml',
      'parameters' => 
      array (
      ),
    ),
    'clutimage' => 
    array (
      'functionName' => 'clutImage',
      'description' => 'Replaces colors in the image from a color lookup table. Optional second
   parameter to replace colors in a specific channel. available.0x636;',
      'methodDescription' => 'Replaces colors in the image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'clutimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'Imagick',
          'name' => 'lookup_table',
          'description' => 'Imagick object containing the color lookup table',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'channel',
          'description' => 'The Channeltype
       constant. When not supplied, default channels are replaced.',
        ),
      ),
    ),
    'coalesceimages' => 
    array (
      'functionName' => 'coalesceImages',
      'description' => 'Composites a set of images while respecting any page offsets
   and disposal methods.  GIF, MIFF, and MNG animation sequences
   typically start with an image background and each subsequent
   image varies in size and offset.  Returns a new Imagick object
   where each image in the sequence is the same size as the first
   and composited with the next image in the sequence.',
      'methodDescription' => 'Composites a set of images',
      'returnType' => 'Returns a new Imagick object on success.',
      'classname' => 'imagick',
      'method' => 'coalesceimages.xml',
      'parameters' => 
      array (
      ),
    ),
    'colorfloodfillimage' => 
    array (
      'functionName' => 'colorFloodfillImage',
      'description' => 'Changes the color value of any pixel that matches target and is an
   immediate neighbor.',
      'methodDescription' => 'Changes the color value of any pixel that matches target',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'colorfloodfillimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'mixed',
          'name' => 'fill',
          'description' => 'ImagickPixel object containing the fill color',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'fuzz',
          'description' => 'The amount of fuzz. For example, set fuzz to 10 and the color red at
       intensities of 100 and 102 respectively are now interpreted as the
       same color for the purposes of the floodfill.',
        ),
        2 => 
        array (
          'type' => 'mixed',
          'name' => 'bordercolor',
          'description' => 'ImagickPixel object containing the border color',
        ),
        3 => 
        array (
          'type' => 'int',
          'name' => 'x',
          'description' => 'X start position of the floodfill',
        ),
        4 => 
        array (
          'type' => 'int',
          'name' => 'y',
          'description' => 'Y start position of the floodfill',
        ),
      ),
    ),
    'colorizeimage' => 
    array (
      'functionName' => 'colorizeImage',
      'description' => 'Blends the fill color with each pixel in the image.',
      'methodDescription' => 'Blends the fill color with the image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'colorizeimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'mixed',
          'name' => 'colorize',
          'description' => 'ImagickPixel object or a string containing the colorize color',
        ),
        1 => 
        array (
          'type' => 'mixed',
          'name' => 'opacity',
          'description' => 'ImagickPixel object or an float containing the opacity value. 
       1.0 is fully opaque and 0.0 is fully transparent.',
        ),
      ),
    ),
    'combineimages' => 
    array (
      'functionName' => 'combineImages',
      'description' => 'Combines one or more images into a single image. The grayscale
   value of the pixels of each image in the sequence is assigned
   in order to the specified channels of the combined image. The
   typical ordering would be image 1 => Red, 2 => Green,
   3 => Blue, etc.',
      'methodDescription' => 'Combines one or more images into a single image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'combineimages.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'channelType',
          'description' => 'Provide any channel constant that is valid for your channel mode. To
       apply to more than one channel, combine channeltype constants using
       bitwise operators. Refer to this
       list of  channel constants.',
        ),
      ),
    ),
    'commentimage' => 
    array (
      'functionName' => 'commentImage',
      'description' => 'Adds a comment to your image.',
      'methodDescription' => 'Adds a comment to your image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'commentimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'string',
          'name' => 'comment',
          'description' => 'The comment to add',
        ),
      ),
    ),
    'compareimagechannels' => 
    array (
      'functionName' => 'compareImageChannels',
      'description' => 'Compares one or more images and returns the difference image.',
      'methodDescription' => 'Returns the difference in one or more images',
      'returnType' => 'Array consisting of new_wand and
   distortion.',
      'classname' => 'imagick',
      'method' => 'compareimagechannels.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'Imagick',
          'name' => 'image',
          'description' => 'Imagick object containing the image to compare.',
        ),
        1 => 
        array (
          'type' => 'int',
          'name' => 'channelType',
          'description' => 'Provide any channel constant that is valid for your channel mode. To
       apply to more than one channel, combine channeltype constants using
       bitwise operators. Refer to this
       list of channel constants.',
        ),
        2 => 
        array (
          'type' => 'int',
          'name' => 'metricType',
          'description' => 'One of the metric type constants.',
        ),
      ),
    ),
    'compareimagelayers' => 
    array (
      'functionName' => 'compareImageLayers',
      'description' => 'Compares each image with the next in a sequence and returns the
   maximum bounding region of any pixel differences it discovers.
   available.0x629;',
      'methodDescription' => 'Returns the maximum bounding region between images',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'compareimagelayers.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'method',
          'description' => 'One of the layer method constants.',
        ),
      ),
    ),
    'compareimages' => 
    array (
      'functionName' => 'compareImages',
      'description' => 'Returns an array containing a reconstructed image and the difference between images.',
      'methodDescription' => 'Compares an image to a reconstructed image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'compareimages.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'Imagick',
          'name' => 'compare',
          'description' => 'An image to compare to.',
        ),
        1 => 
        array (
          'type' => 'int',
          'name' => 'metric',
          'description' => 'Provide a valid metric type constant. Refer to this
       list of  metric constants.',
        ),
      ),
    ),
    'compositeimage' => 
    array (
      'functionName' => 'compositeImage',
      'description' => 'Composite one image onto another at the specified offset.',
      'methodDescription' => 'Composite one image onto another',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'compositeimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'Imagick',
          'name' => 'composite_object',
          'description' => 'Imagick object which holds the composite image',
        ),
        1 => 
        array (
          'type' => 'int',
          'name' => 'composite',
          'description' => NULL,
        ),
        2 => 
        array (
          'type' => 'int',
          'name' => 'x',
          'description' => 'The column offset of the composited image',
        ),
        3 => 
        array (
          'type' => 'int',
          'name' => 'y',
          'description' => 'The row offset of the composited image',
        ),
        4 => 
        array (
          'type' => 'int',
          'name' => 'channel',
          'description' => 'Provide any channel constant that is valid for your channel mode. To
       apply to more than one channel, combine channeltype constants using
       bitwise operators. Refer to this list of channel constants.',
        ),
      ),
    ),
    'construct' => 
    array (
      'functionName' => '__construct',
      'description' => 'Creates an Imagick instance for a specified image or set of images.',
      'methodDescription' => 'The Imagick constructor',
      'returnType' => 'Returns a new Imagick object on success.',
      'classname' => 'imagick',
      'method' => 'construct.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'mixed',
          'name' => 'files',
          'description' => NULL,
        ),
      ),
    ),
    'contrastimage' => 
    array (
      'functionName' => 'contrastImage',
      'description' => 'Enhances the intensity differences between the lighter and
   darker elements of the image.  Set sharpen to a value other
   than 0 to increase the image contrast otherwise the contrast
   is reduced.',
      'methodDescription' => 'Change the contrast of the image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'contrastimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'bool',
          'name' => 'sharpen',
          'description' => 'The sharpen value',
        ),
      ),
    ),
    'contraststretchimage' => 
    array (
      'functionName' => 'contrastStretchImage',
      'description' => 'Enhances the contrast of a color image by adjusting the pixels
   color to span the entire range of colors available. available.0x629;',
      'methodDescription' => 'Enhances the contrast of a color image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'contraststretchimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'black_point',
          'description' => 'The black point.',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'white_point',
          'description' => 'The white point.',
        ),
        2 => 
        array (
          'type' => 'int',
          'name' => 'channel',
          'description' => 'Provide any channel constant that is valid for your channel mode. To
       apply to more than one channel, combine channeltype constants using
       bitwise operators. Imagick::CHANNEL_ALL. Refer to this
       list of  channel constants.',
        ),
      ),
    ),
    'convolveimage' => 
    array (
      'functionName' => 'convolveImage',
      'description' => 'Applies a custom convolution kernel to the image.',
      'methodDescription' => 'Applies a custom convolution kernel to the image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'convolveimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'array',
          'name' => 'kernel',
          'description' => 'The convolution kernel',
        ),
        1 => 
        array (
          'type' => 'int',
          'name' => 'channel',
          'description' => 'Provide any channel constant that is valid for your channel mode. To
       apply to more than one channel, combine channeltype constants using
       bitwise operators. Refer to this
       list of  channel constants.',
        ),
      ),
    ),
    'cropimage' => 
    array (
      'functionName' => 'cropImage',
      'description' => 'Extracts a region of the image.',
      'methodDescription' => 'Extracts a region of the image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'cropimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'width',
          'description' => 'The width of the crop',
        ),
        1 => 
        array (
          'type' => 'int',
          'name' => 'height',
          'description' => 'The height of the crop',
        ),
        2 => 
        array (
          'type' => 'int',
          'name' => 'x',
          'description' => 'The X coordinate of the cropped region\'s top left corner',
        ),
        3 => 
        array (
          'type' => 'int',
          'name' => 'y',
          'description' => 'The Y coordinate of the cropped region\'s top left corner',
        ),
      ),
    ),
    'cropthumbnailimage' => 
    array (
      'functionName' => 'cropThumbnailImage',
      'description' => 'Creates a fixed size thumbnail by first scaling the image up or down and cropping a specified
  area from the center.',
      'methodDescription' => 'Creates a crop thumbnail',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'cropthumbnailimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'width',
          'description' => 'The width of the thumbnail',
        ),
        1 => 
        array (
          'type' => 'int',
          'name' => 'height',
          'description' => 'The Height of the thumbnail',
        ),
      ),
    ),
    'current' => 
    array (
      'functionName' => 'current',
      'description' => 'Returns reference to the current imagick object with image pointer at the correct sequence.',
      'methodDescription' => 'Returns a reference to the current Imagick object',
      'returnType' => 'Returns self on success.',
      'classname' => 'imagick',
      'method' => 'current.xml',
      'parameters' => 
      array (
      ),
    ),
    'cyclecolormapimage' => 
    array (
      'functionName' => 'cycleColormapImage',
      'description' => 'Displaces an image\'s colormap by a given number of positions.  If you
   cycle the colormap a number of times you can produce a psychedelic
   effect.',
      'methodDescription' => 'Displaces an image\'s colormap',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'cyclecolormapimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'displace',
          'description' => 'The amount to displace the colormap.',
        ),
      ),
    ),
    'decipherimage' => 
    array (
      'functionName' => 'decipherImage',
      'description' => 'Deciphers image that has been enciphered before. The image must be enciphered
   using Imagick::encipherImage.
   available.0x639;',
      'methodDescription' => 'Deciphers an image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'decipherimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'string',
          'name' => 'passphrase',
          'description' => 'The passphrase',
        ),
      ),
    ),
    'deconstructimages' => 
    array (
      'functionName' => 'deconstructImages',
      'description' => 'Compares each image with the next in a sequence and returns the maximum
   bounding region of any pixel differences it discovers.',
      'methodDescription' => 'Returns certain pixel differences between images',
      'returnType' => 'Returns a new Imagick object on success.',
      'classname' => 'imagick',
      'method' => 'deconstructimages.xml',
      'parameters' => 
      array (
      ),
    ),
    'deleteimageartifact' => 
    array (
      'functionName' => 'deleteImageArtifact',
      'description' => 'Deletes an artifact associated with the image.  The difference between image properties and 
   image artifacts is that properties are public and artifacts are private.
   available.0x657;',
      'methodDescription' => 'Delete image artifact',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'deleteimageartifact.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'string',
          'name' => 'artifact',
          'description' => 'The name of the artifact to delete',
        ),
      ),
    ),
    'deskewimage' => 
    array (
      'functionName' => 'deskewImage',
      'description' => 'This method can be used to remove skew from for example scanned images where the paper
   was not properly placed on the scanning surface. available.0x645;',
      'methodDescription' => 'Removes skew from the image',
      'returnType' => '',
      'classname' => 'imagick',
      'method' => 'deskewimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'threshold',
          'description' => 'Deskew threshold',
        ),
      ),
    ),
    'despeckleimage' => 
    array (
      'functionName' => 'despeckleImage',
      'description' => 'Reduces the speckle noise in an image while preserving the edges of the original image.',
      'methodDescription' => 'Reduces the speckle noise in an image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'despeckleimage.xml',
      'parameters' => 
      array (
      ),
    ),
    'destroy' => 
    array (
      'functionName' => 'destroy',
      'description' => 'Destroys the Imagick object and frees all resources associated with it. 
   This method is deprecated in favour of Imagick::clear.',
      'methodDescription' => 'Destroys the Imagick object',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'destroy.xml',
      'parameters' => 
      array (
      ),
    ),
    'displayimage' => 
    array (
      'functionName' => 'displayImage',
      'description' => 'This method displays an image on a X server.',
      'methodDescription' => 'Displays an image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'displayimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'string',
          'name' => 'servername',
          'description' => 'The X server name',
        ),
      ),
    ),
    'displayimages' => 
    array (
      'functionName' => 'displayImages',
      'description' => 'Displays an image or image sequence on a X server.',
      'methodDescription' => 'Displays an image or image sequence',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'displayimages.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'string',
          'name' => 'servername',
          'description' => 'The X server name',
        ),
      ),
    ),
    'distortimage' => 
    array (
      'functionName' => 'distortImage',
      'description' => 'available.0x636;',
      'methodDescription' => 'Distorts an image using various distortion methods',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'distortimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'method',
          'description' => 'The method of image distortion. See distortion constants',
        ),
        1 => 
        array (
          'type' => 'array',
          'name' => 'arguments',
          'description' => 'The arguments for this distortion method',
        ),
        2 => 
        array (
          'type' => 'bool',
          'name' => 'bestfit',
          'description' => 'Attempt to resize destination to fit distorted source',
        ),
      ),
    ),
    'drawimage' => 
    array (
      'functionName' => 'drawImage',
      'description' => 'Renders the ImagickDraw object on the current image.',
      'methodDescription' => 'Renders the ImagickDraw object on the current image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'drawimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'ImagickDraw',
          'name' => 'draw',
          'description' => 'The drawing operations to render on the image.',
        ),
      ),
    ),
    'edgeimage' => 
    array (
      'functionName' => 'edgeImage',
      'description' => 'Enhance edges within the image with a convolution filter of the given
   radius. Use radius 0 and it will be auto-selected.',
      'methodDescription' => 'Enhance edges within the image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'edgeimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'radius',
          'description' => 'The radius of the operation.',
        ),
      ),
    ),
    'embossimage' => 
    array (
      'functionName' => 'embossImage',
      'description' => 'Returns a grayscale image with a three-dimensional effect.  We convolve
   the image with a Gaussian operator of the given radius and standard 
   deviation (sigma).  For reasonable results, radius should be larger than 
   sigma.  Use a radius of 0 and it will choose a suitable radius for you.',
      'methodDescription' => 'Returns a grayscale image with a three-dimensional effect',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'embossimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'radius',
          'description' => 'The radius of the effect',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'sigma',
          'description' => 'The sigma of the effect',
        ),
      ),
    ),
    'encipherimage' => 
    array (
      'functionName' => 'encipherImage',
      'description' => 'Converts plain pixels to enciphered pixels. The image is not readable
   until it has been deciphered using Imagick::decipherImage
   available.0x639;',
      'methodDescription' => 'Enciphers an image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'encipherimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'string',
          'name' => 'passphrase',
          'description' => 'The passphrase',
        ),
      ),
    ),
    'enhanceimage' => 
    array (
      'functionName' => 'enhanceImage',
      'description' => 'Applies a digital filter that improves the quality of a noisy image.',
      'methodDescription' => 'Improves the quality of a noisy image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'enhanceimage.xml',
      'parameters' => 
      array (
      ),
    ),
    'equalizeimage' => 
    array (
      'functionName' => 'equalizeImage',
      'description' => 'Equalizes the image histogram.',
      'methodDescription' => 'Equalizes the image histogram',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'equalizeimage.xml',
      'parameters' => 
      array (
      ),
    ),
    'evaluateimage' => 
    array (
      'functionName' => 'evaluateImage',
      'description' => 'Applys an arithmetic, relational, or logical expression to an image.  Use
   these operators to lighten or darken an image, to increase or decrease
   contrast in an image, or to produce the "negative" of an image.',
      'methodDescription' => 'Applies an expression to an image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'evaluateimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'op',
          'description' => 'The evaluation operator',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'constant',
          'description' => 'The value of the operator',
        ),
        2 => 
        array (
          'type' => 'int',
          'name' => 'channel',
          'description' => 'Provide any channel constant that is valid for your channel mode. To
       apply to more than one channel, combine channeltype constants using
       bitwise operators. Refer to this
       list of  channel constants.',
        ),
      ),
    ),
    'exportimagepixels' => 
    array (
      'functionName' => NULL,
      'description' => NULL,
      'methodDescription' => NULL,
      'returnType' => NULL,
      'classname' => 'imagick',
      'method' => 'exportimagepixels.xml',
      'parameters' => 
      array (
      ),
    ),
    'extentimage' => 
    array (
      'functionName' => 'extentImage',
      'description' => 'Comfortability method for setting image size. The method sets the image size and allows
   setting x,y coordinates where the new area begins.
   available.0x631;',
      'methodDescription' => 'Set image size',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'extentimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'width',
          'description' => 'The new width',
        ),
        1 => 
        array (
          'type' => 'int',
          'name' => 'height',
          'description' => 'The new height',
        ),
        2 => 
        array (
          'type' => 'int',
          'name' => 'x',
          'description' => 'X position for the new size',
        ),
        3 => 
        array (
          'type' => 'int',
          'name' => 'y',
          'description' => 'Y position for the new size',
        ),
      ),
    ),
    'flattenimages' => 
    array (
      'functionName' => 'flattenImages',
      'description' => 'Merges a sequence of images.  This is useful for combining Photoshop layers into a single image.',
      'methodDescription' => 'Merges a sequence of images',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'flattenimages.xml',
      'parameters' => 
      array (
      ),
    ),
    'flipimage' => 
    array (
      'functionName' => 'flipImage',
      'description' => 'Creates a vertical mirror image by reflecting the pixels around the central x-axis.',
      'methodDescription' => 'Creates a vertical mirror image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'flipimage.xml',
      'parameters' => 
      array (
      ),
    ),
    'floodfillpaintimage' => 
    array (
      'functionName' => NULL,
      'description' => NULL,
      'methodDescription' => NULL,
      'returnType' => NULL,
      'classname' => 'imagick',
      'method' => 'floodfillpaintimage.xml',
      'parameters' => 
      array (
      ),
    ),
    'flopimage' => 
    array (
      'functionName' => 'flopImage',
      'description' => 'Creates a horizontal mirror image by reflecting the pixels around the central y-axis.',
      'methodDescription' => 'Creates a horizontal mirror image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'flopimage.xml',
      'parameters' => 
      array (
      ),
    ),
    'frameimage' => 
    array (
      'functionName' => 'frameImage',
      'description' => 'Adds a simulated three-dimensional border around the image.
   The width and height specify the border width of the vertical
   and horizontal sides of the frame.  The inner and outer
   bevels indicate the width of the inner and outer shadows of
   the frame.',
      'methodDescription' => 'Adds a simulated three-dimensional border',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'frameimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'mixed',
          'name' => 'matte_color',
          'description' => 'ImagickPixel object or a string representing the matte color',
        ),
        1 => 
        array (
          'type' => 'int',
          'name' => 'width',
          'description' => 'The width of the border',
        ),
        2 => 
        array (
          'type' => 'int',
          'name' => 'height',
          'description' => 'The height of the border',
        ),
        3 => 
        array (
          'type' => 'int',
          'name' => 'inner_bevel',
          'description' => 'The inner bevel width',
        ),
        4 => 
        array (
          'type' => 'int',
          'name' => 'outer_bevel',
          'description' => 'The outer bevel width',
        ),
      ),
    ),
    'functionimage' => 
    array (
      'functionName' => NULL,
      'description' => NULL,
      'methodDescription' => NULL,
      'returnType' => NULL,
      'classname' => 'imagick',
      'method' => 'functionimage.xml',
      'parameters' => 
      array (
      ),
    ),
    'fximage' => 
    array (
      'functionName' => NULL,
      'description' => NULL,
      'methodDescription' => NULL,
      'returnType' => NULL,
      'classname' => 'imagick',
      'method' => 'fximage.xml',
      'parameters' => 
      array (
      ),
    ),
    'gammaimage' => 
    array (
      'functionName' => 'gammaImage',
      'description' => 'Gamma-corrects an image.  The same image viewed on different devices will
   have perceptual differences in the way the image\'s intensities are
   represented on the screen.  Specify individual gamma levels for the red,
   green, and blue channels, or adjust all three with the gamma parameter.
   Values typically range from 0.8 to 2.3.',
      'methodDescription' => 'Gamma-corrects an image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'gammaimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'gamma',
          'description' => 'The amount of gamma-correction.',
        ),
        1 => 
        array (
          'type' => 'int',
          'name' => 'channel',
          'description' => 'Provide any channel constant that is valid for your channel mode. To
       apply to more than one channel, combine channeltype constants using
       bitwise operators. Refer to this
       list of  channel constants.',
        ),
      ),
    ),
    'gaussianblurimage' => 
    array (
      'functionName' => 'gaussianBlurImage',
      'description' => 'Blurs an image.  We convolve the image with a Gaussian operator of the
   given radius and standard deviation (sigma). For reasonable results, the
   radius should be larger than sigma.  Use a radius of 0 and selects a
   suitable radius for you.',
      'methodDescription' => 'Blurs an image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'gaussianblurimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'radius',
          'description' => 'The radius of the Gaussian, in pixels, not counting the center pixel.',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'sigma',
          'description' => 'The standard deviation of the Gaussian, in pixels.',
        ),
        2 => 
        array (
          'type' => 'int',
          'name' => 'channel',
          'description' => 'Provide any channel constant that is valid for your channel mode. To
       apply to more than one channel, combine channeltype constants using
       bitwise operators. Refer to this
       list of  channel constants.',
        ),
      ),
    ),
    'getcolorspace' => 
    array (
      'functionName' => 'getColorspace',
      'description' => 'Gets the global colorspace value.
   available.0x657;',
      'methodDescription' => 'Gets the colorspace',
      'returnType' => 'Returns an integer which can be compared against COLORSPACE constants.',
      'classname' => 'imagick',
      'method' => 'getcolorspace.xml',
      'parameters' => 
      array (
      ),
    ),
    'getcompression' => 
    array (
      'functionName' => 'getCompression',
      'description' => 'Gets the object compression type.',
      'methodDescription' => 'Gets the object compression type',
      'returnType' => 'Returns the compression constant',
      'classname' => 'imagick',
      'method' => 'getcompression.xml',
      'parameters' => 
      array (
      ),
    ),
    'getcompressionquality' => 
    array (
      'functionName' => 'getCompressionQuality',
      'description' => 'Gets the object compression quality.',
      'methodDescription' => 'Gets the object compression quality',
      'returnType' => 'Returns integer describing the compression quality',
      'classname' => 'imagick',
      'method' => 'getcompressionquality.xml',
      'parameters' => 
      array (
      ),
    ),
    'getcopyright' => 
    array (
      'functionName' => 'getCopyright',
      'description' => 'Returns the ImageMagick API copyright as a string.',
      'methodDescription' => 'Returns the ImageMagick API copyright as a string',
      'returnType' => 'Returns a string containing the copyright notice of Imagemagick and
   Magickwand C API.',
      'classname' => 'imagick',
      'method' => 'getcopyright.xml',
      'parameters' => 
      array (
      ),
    ),
    'getfilename' => 
    array (
      'functionName' => 'getFilename',
      'description' => 'Returns the filename associated with an image sequence.',
      'methodDescription' => 'The filename associated with an image sequence',
      'returnType' => 'Returns a string on success.',
      'classname' => 'imagick',
      'method' => 'getfilename.xml',
      'parameters' => 
      array (
      ),
    ),
    'getfont' => 
    array (
      'functionName' => 'getFont',
      'description' => 'Returns the objects font property.
   available.0x637;',
      'methodDescription' => 'Gets font',
      'returnType' => 'Returns the string containing the font name or False; if not font is set.',
      'classname' => 'imagick',
      'method' => 'getfont.xml',
      'parameters' => 
      array (
      ),
    ),
    'getformat' => 
    array (
      'functionName' => 'getFormat',
      'description' => 'Returns the format of the Imagick object.',
      'methodDescription' => 'Returns the format of the Imagick object',
      'returnType' => 'Returns the format of the image.',
      'classname' => 'imagick',
      'method' => 'getformat.xml',
      'parameters' => 
      array (
      ),
    ),
    'getgravity' => 
    array (
      'functionName' => 'getGravity',
      'description' => 'Gets the global gravity property for the Imagick object.
   available.0x640;',
      'methodDescription' => 'Gets the gravity',
      'returnType' => 'Returns the gravity property. Refer to the list of 
   gravity constants.',
      'classname' => 'imagick',
      'method' => 'getgravity.xml',
      'parameters' => 
      array (
      ),
    ),
    'gethomeurl' => 
    array (
      'functionName' => 'getHomeURL',
      'description' => 'Returns the ImageMagick home URL.',
      'methodDescription' => 'Returns the ImageMagick home URL',
      'returnType' => 'Returns a link to the imagemagick homepage.',
      'classname' => 'imagick',
      'method' => 'gethomeurl.xml',
      'parameters' => 
      array (
      ),
    ),
    'getimage' => 
    array (
      'functionName' => 'getImage',
      'description' => 'Returns a new Imagick object with the current image sequence.',
      'methodDescription' => 'Returns a new Imagick object',
      'returnType' => 'Returns a new Imagick object with the current image sequence.',
      'classname' => 'imagick',
      'method' => 'getimage.xml',
      'parameters' => 
      array (
      ),
    ),
    'getimagealphachannel' => 
    array (
      'functionName' => 'getImageAlphaChannel',
      'description' => 'Gets the image alpha channel value. The returned value is one of the 
   alpha channel constants.
   available.0x640;',
      'methodDescription' => 'Gets the image alpha channel',
      'returnType' => 'Returns a constant defining the current alpha channel value. Refer to this
   list of alpha channel constants.',
      'classname' => 'imagick',
      'method' => 'getimagealphachannel.xml',
      'parameters' => 
      array (
      ),
    ),
    'getimageartifact' => 
    array (
      'functionName' => 'getImageArtifact',
      'description' => 'Gets an artifact associated with the image.  The difference between image properties and 
   image artifacts is that properties are public and artifacts are private.
   available.0x657;',
      'methodDescription' => 'Get image artifact',
      'returnType' => 'Returns the artifact value on success.',
      'classname' => 'imagick',
      'method' => 'getimageartifact.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'string',
          'name' => 'artifact',
          'description' => 'The name of the artifact',
        ),
      ),
    ),
    'getimagebackgroundcolor' => 
    array (
      'functionName' => 'getImageBackgroundColor',
      'description' => 'Returns the image background color.',
      'methodDescription' => 'Returns the image background color',
      'returnType' => 'Returns an ImagickPixel set to the background color of the image.',
      'classname' => 'imagick',
      'method' => 'getimagebackgroundcolor.xml',
      'parameters' => 
      array (
      ),
    ),
    'getimageblob' => 
    array (
      'functionName' => 'getImageBlob',
      'description' => 'Implements direct to memory image formats.  It returns the image
   sequence as a string.  The format of the image determines the
   format of the returned blob (GIF, JPEG, PNG, etc.). To return a
   different image format, use Imagick::setImageFormat().',
      'methodDescription' => 'Returns the image sequence as a blob',
      'returnType' => 'Returns a string containing the image.',
      'classname' => 'imagick',
      'method' => 'getimageblob.xml',
      'parameters' => 
      array (
      ),
    ),
    'getimageblueprimary' => 
    array (
      'functionName' => 'getImageBluePrimary',
      'description' => 'Returns the chromaticity blue primary point for the image.',
      'methodDescription' => 'Returns the chromaticy blue primary point',
      'returnType' => 'Array consisting of "x" and "y" coordinates of point.',
      'classname' => 'imagick',
      'method' => 'getimageblueprimary.xml',
      'parameters' => 
      array (
      ),
    ),
    'getimagebordercolor' => 
    array (
      'functionName' => 'getImageBorderColor',
      'description' => 'Returns the image border color.',
      'methodDescription' => 'Returns the image border color',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'getimagebordercolor.xml',
      'parameters' => 
      array (
      ),
    ),
    'getimagechanneldepth' => 
    array (
      'functionName' => 'getImageChannelDepth',
      'description' => 'Gets the depth for a particular image channel.',
      'methodDescription' => 'Gets the depth for a particular image channel',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'getimagechanneldepth.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'channel',
          'description' => 'Imagick channel constant;',
        ),
      ),
    ),
    'getimagechanneldistortion' => 
    array (
      'functionName' => 'getImageChannelDistortion',
      'description' => 'Compares one or more image channels of an image to a reconstructed image
   and returns the specified distortion metric.',
      'methodDescription' => 'Compares image channels of an image to a reconstructed image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'getimagechanneldistortion.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'Imagick',
          'name' => 'reference',
          'description' => 'Imagick object to compare to.',
        ),
        1 => 
        array (
          'type' => 'int',
          'name' => 'channel',
          'description' => 'Provide any channel constant that is valid for your channel mode. To
       apply to more than one channel, combine channeltype constants using
       bitwise operators. Refer to this
       list of  channel constants.',
        ),
        2 => 
        array (
          'type' => 'int',
          'name' => 'metric',
          'description' => 'One of the metric type constants.',
        ),
      ),
    ),
    'getimagechanneldistortions' => 
    array (
      'functionName' => 'getImageChannelDistortions',
      'description' => 'Compares one or more image channels of an image to a reconstructed image and returns the specified distortion metrics
   available.0x644;',
      'methodDescription' => 'Gets channel distortions',
      'returnType' => 'Returns a double describing the channel distortion.',
      'classname' => 'imagick',
      'method' => 'getimagechanneldistortions.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'Imagick',
          'name' => 'reference',
          'description' => 'Imagick object containing the reference image',
        ),
        1 => 
        array (
          'type' => 'int',
          'name' => 'metric',
          'description' => 'Refer to this list of metric type constants.',
        ),
        2 => 
        array (
          'type' => 'int',
          'name' => 'channel',
          'description' => 'Imagick channel constant;',
        ),
      ),
    ),
    'getimagechannelextrema' => 
    array (
      'functionName' => 'getImageChannelExtrema',
      'description' => 'Gets the extrema for one or more image channels.  Return value is an
   associative array with the keys "minima" and "maxima".',
      'methodDescription' => 'Gets the extrema for one or more image channels',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'getimagechannelextrema.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'channel',
          'description' => 'Provide any channel constant that is valid for your channel mode. To
       apply to more than one channel, combine channeltype constants using
       bitwise operators. Refer to this
       list of  channel constants.',
        ),
      ),
    ),
    'getimagechannelkurtosis' => 
    array (
      'functionName' => 'getImageChannelKurtosis',
      'description' => 'Get the kurtosis and skewness of a specific channel. available.0x649;',
      'methodDescription' => 'The getImageChannelKurtosis purpose',
      'returnType' => 'Returns an array with kurtosis and skewness
   members.',
      'classname' => 'imagick',
      'method' => 'getimagechannelkurtosis.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'channel',
          'description' => 'Imagick channel constant;',
        ),
      ),
    ),
    'getimagechannelmean' => 
    array (
      'functionName' => 'getImageChannelMean',
      'description' => 'Gets the mean and standard deviation of one or more image channels.
   Return value is an associative array with the keys "mean" and
   "standardDeviation".',
      'methodDescription' => 'Gets the mean and standard deviation',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'getimagechannelmean.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'channel',
          'description' => 'Provide any channel constant that is valid for your channel mode. To
       apply to more than one channel, combine channeltype constants using
       bitwise operators. Refer to this
       list of  channel constants.',
        ),
      ),
    ),
    'getimagechannelrange' => 
    array (
      'functionName' => 'getImageChannelRange',
      'description' => 'Gets the range for one or more image channels.
   available.0x640;',
      'methodDescription' => 'Gets channel range',
      'returnType' => 'Returns an array containing minima and maxima values of the channel(s).',
      'classname' => 'imagick',
      'method' => 'getimagechannelrange.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'channel',
          'description' => 'Imagick channel constant;',
        ),
      ),
    ),
    'getimagechannelstatistics' => 
    array (
      'functionName' => 'getImageChannelStatistics',
      'description' => 'Returns statistics for each channel in the image.  The statistics include
   the channel depth, its minima and maxima, the mean, and the standard
   deviation.  You can access the red channel mean, for example, like this:',
      'methodDescription' => 'Returns statistics for each channel in the image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'getimagechannelstatistics.xml',
      'parameters' => 
      array (
      ),
    ),
    'getimageclipmask' => 
    array (
      'functionName' => 'getImageClipMask',
      'description' => 'Returns the image clip mask. The clip mask is an Imagick object containing the clip mask.
   available.0x636;',
      'methodDescription' => 'Gets image clip mask',
      'returnType' => 'Returns an Imagick object containing the clip mask.',
      'classname' => 'imagick',
      'method' => 'getimageclipmask.xml',
      'parameters' => 
      array (
      ),
    ),
    'getimagecolormapcolor' => 
    array (
      'functionName' => 'getImageColormapColor',
      'description' => 'Returns the color of the specified colormap index.',
      'methodDescription' => 'Returns the color of the specified colormap index',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'getimagecolormapcolor.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'index',
          'description' => 'The offset into the image colormap.',
        ),
      ),
    ),
    'getimagecolors' => 
    array (
      'functionName' => 'getImageColors',
      'description' => 'Gets the number of unique colors in the image.',
      'methodDescription' => 'Gets the number of unique colors in the image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'getimagecolors.xml',
      'parameters' => 
      array (
      ),
    ),
    'getimagecolorspace' => 
    array (
      'functionName' => 'getImageColorspace',
      'description' => 'Gets the image colorspace.',
      'methodDescription' => 'Gets the image colorspace',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'getimagecolorspace.xml',
      'parameters' => 
      array (
      ),
    ),
    'getimagecompose' => 
    array (
      'functionName' => 'getImageCompose',
      'description' => 'Returns the composite operator associated with the image.',
      'methodDescription' => 'Returns the composite operator associated with the image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'getimagecompose.xml',
      'parameters' => 
      array (
      ),
    ),
    'getimagecompression' => 
    array (
      'functionName' => 'getImageCompression',
      'description' => 'Gets the current image\'s compression type.',
      'methodDescription' => 'Gets the current image\'s compression type',
      'returnType' => 'Returns the compression constant',
      'classname' => 'imagick',
      'method' => 'getimagecompression.xml',
      'parameters' => 
      array (
      ),
    ),
    'getimagecompressionquality' => 
    array (
      'functionName' => 'getImageCompressionQuality',
      'description' => 'Gets the current image\'s compression quality',
      'methodDescription' => 'Gets the current image\'s compression quality',
      'returnType' => 'Returns integer describing the images compression quality',
      'classname' => 'imagick',
      'method' => 'getimagecompressionquality.xml',
      'parameters' => 
      array (
      ),
    ),
    'getimagedelay' => 
    array (
      'functionName' => 'getImageDelay',
      'description' => 'Gets the image delay.',
      'methodDescription' => 'Gets the image delay',
      'returnType' => 'Returns the image delay.',
      'classname' => 'imagick',
      'method' => 'getimagedelay.xml',
      'parameters' => 
      array (
      ),
    ),
    'getimagedepth' => 
    array (
      'functionName' => 'getImageDepth',
      'description' => 'Gets the image depth.',
      'methodDescription' => 'Gets the image depth',
      'returnType' => 'The image depth.',
      'classname' => 'imagick',
      'method' => 'getimagedepth.xml',
      'parameters' => 
      array (
      ),
    ),
    'getimagedispose' => 
    array (
      'functionName' => 'getImageDispose',
      'description' => 'Gets the image disposal method.',
      'methodDescription' => 'Gets the image disposal method',
      'returnType' => 'Returns the dispose method on success.',
      'classname' => 'imagick',
      'method' => 'getimagedispose.xml',
      'parameters' => 
      array (
      ),
    ),
    'getimagedistortion' => 
    array (
      'functionName' => 'getImageDistortion',
      'description' => 'Compares an image to a reconstructed image and returns the specified distortion
   metric.',
      'methodDescription' => 'Compares an image to a reconstructed image',
      'returnType' => 'Returns the distortion metric used on the image (or the best guess
   thereof).',
      'classname' => 'imagick',
      'method' => 'getimagedistortion.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'MagickWand',
          'name' => 'reference',
          'description' => 'Imagick object to compare to.',
        ),
        1 => 
        array (
          'type' => 'int',
          'name' => 'metric',
          'description' => 'One of the metric type constants.',
        ),
      ),
    ),
    'getimageextrema' => 
    array (
      'functionName' => 'getImageExtrema',
      'description' => 'Gets the extrema for the image.  Returns an associative array with the keys "min" and "max".',
      'methodDescription' => 'Gets the extrema for the image',
      'returnType' => 'Returns an associative array with the keys "min" and "max".',
      'classname' => 'imagick',
      'method' => 'getimageextrema.xml',
      'parameters' => 
      array (
      ),
    ),
    'getimagefilename' => 
    array (
      'functionName' => 'getImageFilename',
      'description' => 'Returns the filename of a particular image in a sequence.',
      'methodDescription' => 'Returns the filename of a particular image in a sequence',
      'returnType' => 'Returns a string with the filename of the image.',
      'classname' => 'imagick',
      'method' => 'getimagefilename.xml',
      'parameters' => 
      array (
      ),
    ),
    'getimageformat' => 
    array (
      'functionName' => 'getImageFormat',
      'description' => 'Returns the format of a particular image in a sequence.',
      'methodDescription' => 'Returns the format of a particular image in a sequence',
      'returnType' => 'Returns a string containing the image format on success.',
      'classname' => 'imagick',
      'method' => 'getimageformat.xml',
      'parameters' => 
      array (
      ),
    ),
    'getimagegamma' => 
    array (
      'functionName' => 'getImageGamma',
      'description' => 'Gets the image gamma.',
      'methodDescription' => 'Gets the image gamma',
      'returnType' => 'Returns the image gamma on success.',
      'classname' => 'imagick',
      'method' => 'getimagegamma.xml',
      'parameters' => 
      array (
      ),
    ),
    'getimagegeometry' => 
    array (
      'functionName' => 'getImageGeometry',
      'description' => 'Returns the width and height as an associative array.',
      'methodDescription' => 'Gets the width and height as an associative array',
      'returnType' => 'Returns an array with the width/height of the image.',
      'classname' => 'imagick',
      'method' => 'getimagegeometry.xml',
      'parameters' => 
      array (
      ),
    ),
    'getimagegravity' => 
    array (
      'functionName' => 'getImageGravity',
      'description' => 'Gets the current gravity value of the
   image. Unlike Imagick::getGravity, this method
   returns the gravity defined for the current image sequence.
   available.0x644;',
      'methodDescription' => 'Gets the image gravity',
      'returnType' => 'Returns the images gravity property. Refer to the list of 
   gravity constants.',
      'classname' => 'imagick',
      'method' => 'getimagegravity.xml',
      'parameters' => 
      array (
      ),
    ),
    'getimagegreenprimary' => 
    array (
      'functionName' => 'getImageGreenPrimary',
      'description' => 'Returns the chromaticity green primary point. Returns an array with the keys "x" and "y".',
      'methodDescription' => 'Returns the chromaticy green primary point',
      'returnType' => 'Returns an array with the keys "x" and "y" on success, throws an
   ImagickException on failure.',
      'classname' => 'imagick',
      'method' => 'getimagegreenprimary.xml',
      'parameters' => 
      array (
      ),
    ),
    'getimageheight' => 
    array (
      'functionName' => 'getImageHeight',
      'description' => 'Returns the image height.',
      'methodDescription' => 'Returns the image height',
      'returnType' => 'Returns the image height in pixels.',
      'classname' => 'imagick',
      'method' => 'getimageheight.xml',
      'parameters' => 
      array (
      ),
    ),
    'getimagehistogram' => 
    array (
      'functionName' => 'getImageHistogram',
      'description' => 'Returns the image histogram as an array of ImagickPixel objects.',
      'methodDescription' => 'Gets the image histogram',
      'returnType' => 'Returns the image histogram as an array of ImagickPixel objects.',
      'classname' => 'imagick',
      'method' => 'getimagehistogram.xml',
      'parameters' => 
      array (
      ),
    ),
    'getimageindex' => 
    array (
      'functionName' => 'getImageIndex',
      'description' => 'Returns the index of the current active image within the Imagick object.
   This method has been deprecated. See
   Imagick::getIteratorIndex.',
      'methodDescription' => 'Gets the index of the current active image',
      'returnType' => 'Returns an integer containing the index of the image in the stack.',
      'classname' => 'imagick',
      'method' => 'getimageindex.xml',
      'parameters' => 
      array (
      ),
    ),
    'getimageinterlacescheme' => 
    array (
      'functionName' => NULL,
      'description' => NULL,
      'methodDescription' => NULL,
      'returnType' => NULL,
      'classname' => 'imagick',
      'method' => 'getimageinterlacescheme.xml',
      'parameters' => 
      array (
      ),
    ),
    'getimageinterpolatemethod' => 
    array (
      'functionName' => 'getImageInterpolateMethod',
      'description' => 'Returns the interpolation method for the specified image. The method is one of 
   the Imagick::INTERPOLATE_* constants.',
      'methodDescription' => 'Returns the interpolation method',
      'returnType' => 'Returns the interpolate method on success.',
      'classname' => 'imagick',
      'method' => 'getimageinterpolatemethod.xml',
      'parameters' => 
      array (
      ),
    ),
    'getimageiterations' => 
    array (
      'functionName' => 'getImageIterations',
      'description' => 'Gets the image iterations.',
      'methodDescription' => 'Gets the image iterations',
      'returnType' => 'Returns the image iterations as an integer.',
      'classname' => 'imagick',
      'method' => 'getimageiterations.xml',
      'parameters' => 
      array (
      ),
    ),
    'getimagelength' => 
    array (
      'functionName' => 'getImageLength',
      'description' => 'Returns the image length in bytes',
      'methodDescription' => 'Returns the image length in bytes',
      'returnType' => 'Returns an int containing the current image size.',
      'classname' => 'imagick',
      'method' => 'getimagelength.xml',
      'parameters' => 
      array (
      ),
    ),
    'getimagemagicklicense' => 
    array (
      'functionName' => 'getImageMagickLicense',
      'description' => 'Returns a string containing the ImageMagick license',
      'methodDescription' => 'Returns a string containing the ImageMagick license',
      'returnType' => 'Returns a string containing the ImageMagick license.',
      'classname' => 'imagick',
      'method' => 'getimagemagicklicense.xml',
      'parameters' => 
      array (
      ),
    ),
    'getimagematte' => 
    array (
      'functionName' => NULL,
      'description' => NULL,
      'methodDescription' => NULL,
      'returnType' => NULL,
      'classname' => 'imagick',
      'method' => 'getimagematte.xml',
      'parameters' => 
      array (
      ),
    ),
    'getimagemattecolor' => 
    array (
      'functionName' => 'getImageMatteColor',
      'description' => 'Returns the image matte color.',
      'methodDescription' => 'Returns the image matte color',
      'returnType' => 'Returns ImagickPixel object on success.',
      'classname' => 'imagick',
      'method' => 'getimagemattecolor.xml',
      'parameters' => 
      array (
      ),
    ),
    'getimageorientation' => 
    array (
      'functionName' => 'getImageOrientation',
      'description' => 'Gets the image orientation. The return value is one of the orientation constants.',
      'methodDescription' => 'Gets the image orientation',
      'returnType' => 'Returns an int on success.',
      'classname' => 'imagick',
      'method' => 'getimageorientation.xml',
      'parameters' => 
      array (
      ),
    ),
    'getimagepage' => 
    array (
      'functionName' => 'getImagePage',
      'description' => 'Returns the page geometry associated with the image in an array with the
   keys "width", "height", "x", and "y".',
      'methodDescription' => 'Returns the page geometry',
      'returnType' => 'Returns the page geometry associated with the image in an array with the
   keys "width", "height", "x", and "y".',
      'classname' => 'imagick',
      'method' => 'getimagepage.xml',
      'parameters' => 
      array (
      ),
    ),
    'getimagepixelcolor' => 
    array (
      'functionName' => 'getImagePixelColor',
      'description' => 'Returns the color of the specified pixel.',
      'methodDescription' => 'Returns the color of the specified pixel',
      'returnType' => 'Returns an ImagickPixel instance for the color at the coordinates given.',
      'classname' => 'imagick',
      'method' => 'getimagepixelcolor.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'x',
          'description' => 'The x-coordinate of the pixel',
        ),
        1 => 
        array (
          'type' => 'int',
          'name' => 'y',
          'description' => 'The y-coordinate of the pixel',
        ),
      ),
    ),
    'getimageprofile' => 
    array (
      'functionName' => 'getImageProfile',
      'description' => 'Returns the named image profile.',
      'methodDescription' => 'Returns the named image profile',
      'returnType' => 'Returns a string containing the image profile.',
      'classname' => 'imagick',
      'method' => 'getimageprofile.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'string',
          'name' => 'name',
          'description' => 'The name of the profile to return.',
        ),
      ),
    ),
    'getimageprofiles' => 
    array (
      'functionName' => 'getImageProfiles',
      'description' => 'Returns all associated profiles that match the pattern. If True; is passed as second parameter
   only the profile names are returned. available.0x636;',
      'methodDescription' => 'Returns the image profiles',
      'returnType' => 'Returns an array containing the image profiles or profile names.',
      'classname' => 'imagick',
      'method' => 'getimageprofiles.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'string',
          'name' => 'pattern',
          'description' => 'The pattern for profile names.',
        ),
        1 => 
        array (
          'type' => 'bool',
          'name' => 'only_names',
          'description' => 'Whether to return only profile names. If False; then values are returned as well',
        ),
      ),
    ),
    'getimageproperties' => 
    array (
      'functionName' => 'getImageProperties',
      'description' => 'Returns all associated properties that match the pattern. If True; is passed as second parameter
   only the property names are returned. available.0x636;',
      'methodDescription' => 'Returns the image properties',
      'returnType' => 'Returns an array containing the image properties or property names.',
      'classname' => 'imagick',
      'method' => 'getimageproperties.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'string',
          'name' => 'pattern',
          'description' => 'The pattern for property names.',
        ),
        1 => 
        array (
          'type' => 'bool',
          'name' => 'only_names',
          'description' => 'Whether to return only property names. If False; then also the values are returned',
        ),
      ),
    ),
    'getimageproperty' => 
    array (
      'functionName' => 'getImageProperty',
      'description' => 'Returns the named image property. available.0x632;',
      'methodDescription' => 'Returns the named image property',
      'returnType' => 'Returns a string containing the image property, false if a 
   property with the given name does not exist.',
      'classname' => 'imagick',
      'method' => 'getimageproperty.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'string',
          'name' => 'name',
          'description' => 'name of the property (for example Exif:DateTime)',
        ),
      ),
    ),
    'getimageredprimary' => 
    array (
      'functionName' => NULL,
      'description' => NULL,
      'methodDescription' => NULL,
      'returnType' => NULL,
      'classname' => 'imagick',
      'method' => 'getimageredprimary.xml',
      'parameters' => 
      array (
      ),
    ),
    'getimageregion' => 
    array (
      'functionName' => 'getImageRegion',
      'description' => 'Extracts a region of the image and returns it as a new Imagick object.',
      'methodDescription' => 'Extracts a region of the image',
      'returnType' => 'Extracts a region of the image and returns it as a new wand.',
      'classname' => 'imagick',
      'method' => 'getimageregion.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'width',
          'description' => 'The width of the extracted region.',
        ),
        1 => 
        array (
          'type' => 'int',
          'name' => 'height',
          'description' => 'The height of the extracted region.',
        ),
        2 => 
        array (
          'type' => 'int',
          'name' => 'x',
          'description' => 'X-coordinate of the top-left corner of the extracted region.',
        ),
        3 => 
        array (
          'type' => 'int',
          'name' => 'y',
          'description' => 'Y-coordinate of the top-left corner of the extracted region.',
        ),
      ),
    ),
    'getimagerenderingintent' => 
    array (
      'functionName' => 'getImageRenderingIntent',
      'description' => 'Gets the image rendering intent.',
      'methodDescription' => 'Gets the image rendering intent',
      'returnType' => 'Returns the image rendering intent.',
      'classname' => 'imagick',
      'method' => 'getimagerenderingintent.xml',
      'parameters' => 
      array (
      ),
    ),
    'getimageresolution' => 
    array (
      'functionName' => 'getImageResolution',
      'description' => 'Gets the image X and Y resolution.',
      'methodDescription' => 'Gets the image X and Y resolution',
      'returnType' => 'Returns the resolution as an array.',
      'classname' => 'imagick',
      'method' => 'getimageresolution.xml',
      'parameters' => 
      array (
      ),
    ),
    'getimagesblob' => 
    array (
      'functionName' => 'getImagesBlob',
      'description' => 'Implements direct to memory image formats.  It returns all image
   sequences as a string.  The format of the image determines the
   format of the returned blob (GIF, JPEG, PNG, etc.). To return a
   different image format, use Imagick::setImageFormat().',
      'methodDescription' => 'Returns all image sequences as a blob',
      'returnType' => 'Returns a string containing the images. On failure, throws
   ImagickException.',
      'classname' => 'imagick',
      'method' => 'getimagesblob.xml',
      'parameters' => 
      array (
      ),
    ),
    'getimagescene' => 
    array (
      'functionName' => 'getImageScene',
      'description' => 'Gets the image scene.',
      'methodDescription' => 'Gets the image scene',
      'returnType' => 'Returns the image scene.',
      'classname' => 'imagick',
      'method' => 'getimagescene.xml',
      'parameters' => 
      array (
      ),
    ),
    'getimagesignature' => 
    array (
      'functionName' => 'getImageSignature',
      'description' => 'Generates an SHA-256 message digest for the image pixel stream.',
      'methodDescription' => 'Generates an SHA-256 message digest',
      'returnType' => 'Returns a string containing the SHA-256 hash of the file.',
      'classname' => 'imagick',
      'method' => 'getimagesignature.xml',
      'parameters' => 
      array (
      ),
    ),
    'getimagesize' => 
    array (
      'functionName' => 'getImageSize',
      'description' => 'Returns the image length in bytes.
   Deprecated in favour of Imagick::getImageLength()',
      'methodDescription' => 'Returns the image length in bytes',
      'returnType' => 'Returns an int containing the current image size.',
      'classname' => 'imagick',
      'method' => 'getimagesize.xml',
      'parameters' => 
      array (
      ),
    ),
    'getimagetickspersecond' => 
    array (
      'functionName' => 'getImageTicksPerSecond',
      'description' => 'Gets the image ticks-per-second.',
      'methodDescription' => 'Gets the image ticks-per-second',
      'returnType' => 'Returns the image ticks-per-second.',
      'classname' => 'imagick',
      'method' => 'getimagetickspersecond.xml',
      'parameters' => 
      array (
      ),
    ),
    'getimagetotalinkdensity' => 
    array (
      'functionName' => NULL,
      'description' => NULL,
      'methodDescription' => NULL,
      'returnType' => NULL,
      'classname' => 'imagick',
      'method' => 'getimagetotalinkdensity.xml',
      'parameters' => 
      array (
      ),
    ),
    'getimagetype' => 
    array (
      'functionName' => 'getImageType',
      'description' => 'Gets the potential image type.',
      'methodDescription' => 'Gets the potential image type',
      'returnType' => 'Returns the potential image type.
   
    
     
      imagick::IMGTYPE_UNDEFINED
     
    
    
     
      imagick::IMGTYPE_BILEVEL
     
    
    
     
      imagick::IMGTYPE_GRAYSCALE
     
    
    
     
      imagick::IMGTYPE_GRAYSCALEMATTE
     
    
    
     
      imagick::IMGTYPE_PALETTE
     
    
    
     
      imagick::IMGTYPE_PALETTEMATTE
     
    
    
     
      imagick::IMGTYPE_TRUECOLOR
     
    
    
     
      imagick::IMGTYPE_TRUECOLORMATTE
     
    
    
     
      imagick::IMGTYPE_COLORSEPARATION
     
    
    
     
      imagick::IMGTYPE_COLORSEPARATIONMATTE
     
    
    
     
      imagick::IMGTYPE_OPTIMIZE',
      'classname' => 'imagick',
      'method' => 'getimagetype.xml',
      'parameters' => 
      array (
      ),
    ),
    'getimageunits' => 
    array (
      'functionName' => 'getImageUnits',
      'description' => 'Gets the image units of resolution.',
      'methodDescription' => 'Gets the image units of resolution',
      'returnType' => 'Returns the image units of resolution.',
      'classname' => 'imagick',
      'method' => 'getimageunits.xml',
      'parameters' => 
      array (
      ),
    ),
    'getimagevirtualpixelmethod' => 
    array (
      'functionName' => 'getImageVirtualPixelMethod',
      'description' => 'Returns the virtual pixel method for the specified image.',
      'methodDescription' => 'Returns the virtual pixel method',
      'returnType' => 'Returns the virtual pixel method on success.',
      'classname' => 'imagick',
      'method' => 'getimagevirtualpixelmethod.xml',
      'parameters' => 
      array (
      ),
    ),
    'getimagewhitepoint' => 
    array (
      'functionName' => 'getImageWhitePoint',
      'description' => 'Returns the chromaticity white point as an associative array with the keys "x" and "y".',
      'methodDescription' => 'Returns the chromaticity white point',
      'returnType' => 'Returns the chromaticity white point as an associative array with the keys
   "x" and "y".',
      'classname' => 'imagick',
      'method' => 'getimagewhitepoint.xml',
      'parameters' => 
      array (
      ),
    ),
    'getimagewidth' => 
    array (
      'functionName' => 'getImageWidth',
      'description' => 'Returns the image width.',
      'methodDescription' => 'Returns the image width',
      'returnType' => 'Returns the image width.',
      'classname' => 'imagick',
      'method' => 'getimagewidth.xml',
      'parameters' => 
      array (
      ),
    ),
    'getinterlacescheme' => 
    array (
      'functionName' => 'getInterlaceScheme',
      'description' => 'Gets the object interlace scheme.',
      'methodDescription' => 'Gets the object interlace scheme',
      'returnType' => 'Gets the wand interlace
   scheme.',
      'classname' => 'imagick',
      'method' => 'getinterlacescheme.xml',
      'parameters' => 
      array (
      ),
    ),
    'getiteratorindex' => 
    array (
      'functionName' => 'getIteratorIndex',
      'description' => 'Returns the index of the current active image within the Imagick object.
   available.0x629;',
      'methodDescription' => 'Gets the index of the current active image',
      'returnType' => 'Returns an integer containing the index of the image in the stack.',
      'classname' => 'imagick',
      'method' => 'getiteratorindex.xml',
      'parameters' => 
      array (
      ),
    ),
    'getnumberimages' => 
    array (
      'functionName' => 'getNumberImages',
      'description' => 'Returns the number of images associated with Imagick object.',
      'methodDescription' => 'Returns the number of images in the object',
      'returnType' => 'Returns the number of images associated with Imagick object.',
      'classname' => 'imagick',
      'method' => 'getnumberimages.xml',
      'parameters' => 
      array (
      ),
    ),
    'getoption' => 
    array (
      'functionName' => 'getOption',
      'description' => 'Returns a value associated within the object for the specified key.',
      'methodDescription' => 'Returns a value associated with the specified key',
      'returnType' => 'Returns a value associated with a wand and the specified key.',
      'classname' => 'imagick',
      'method' => 'getoption.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'string',
          'name' => 'key',
          'description' => 'The name of the option',
        ),
      ),
    ),
    'getpackagename' => 
    array (
      'functionName' => 'getPackageName',
      'description' => 'Returns the ImageMagick package name.',
      'methodDescription' => 'Returns the ImageMagick package name',
      'returnType' => 'Returns the ImageMagick package name as a string.',
      'classname' => 'imagick',
      'method' => 'getpackagename.xml',
      'parameters' => 
      array (
      ),
    ),
    'getpage' => 
    array (
      'functionName' => 'getPage',
      'description' => 'Returns the page geometry associated with the Imagick object in
   an associative array with the keys "width", "height", "x", and "y".',
      'methodDescription' => 'Returns the page geometry',
      'returnType' => 'Returns the page geometry associated with the Imagick object in
   an associative array with the keys "width", "height", "x", and "y",
   throwing ImagickException on error.',
      'classname' => 'imagick',
      'method' => 'getpage.xml',
      'parameters' => 
      array (
      ),
    ),
    'getpixeliterator' => 
    array (
      'functionName' => 'getPixelIterator',
      'description' => 'Returns a MagickPixelIterator.',
      'methodDescription' => 'Returns a MagickPixelIterator',
      'returnType' => 'Returns an ImagickPixelIterator on success.',
      'classname' => 'imagick',
      'method' => 'getpixeliterator.xml',
      'parameters' => 
      array (
      ),
    ),
    'getpixelregioniterator' => 
    array (
      'functionName' => 'getPixelRegionIterator',
      'description' => 'Get an ImagickPixelIterator for an image section.',
      'methodDescription' => 'Get an ImagickPixelIterator for an image section',
      'returnType' => 'Returns an ImagickPixelIterator for an image section.',
      'classname' => 'imagick',
      'method' => 'getpixelregioniterator.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'x',
          'description' => 'The x-coordinate of the region.',
        ),
        1 => 
        array (
          'type' => 'int',
          'name' => 'y',
          'description' => 'The y-coordinate of the region.',
        ),
        2 => 
        array (
          'type' => 'int',
          'name' => 'columns',
          'description' => 'The width of the region.',
        ),
        3 => 
        array (
          'type' => 'int',
          'name' => 'rows',
          'description' => 'The height of the region.',
        ),
      ),
    ),
    'getpointsize' => 
    array (
      'functionName' => NULL,
      'description' => NULL,
      'methodDescription' => NULL,
      'returnType' => NULL,
      'classname' => 'imagick',
      'method' => 'getpointsize.xml',
      'parameters' => 
      array (
      ),
    ),
    'getquantumdepth' => 
    array (
      'functionName' => 'getQuantumDepth',
      'description' => 'Returns the Imagick quantum depth as a string.',
      'methodDescription' => 'Gets the quantum depth',
      'returnType' => 'Returns the Imagick quantum depth as a string.',
      'classname' => 'imagick',
      'method' => 'getquantumdepth.xml',
      'parameters' => 
      array (
      ),
    ),
    'getquantumrange' => 
    array (
      'functionName' => 'getQuantumRange',
      'description' => 'Returns the quantum range for the Imagick instance.',
      'methodDescription' => 'Returns the Imagick quantum range',
      'returnType' => 'Returns an associative array containing the quantum range as an
   integer ("quantumRangeLong") and as a 
   string ("quantumRangeString").',
      'classname' => 'imagick',
      'method' => 'getquantumrange.xml',
      'parameters' => 
      array (
      ),
    ),
    'getreleasedate' => 
    array (
      'functionName' => 'getReleaseDate',
      'description' => 'Returns the ImageMagick release date as a string.',
      'methodDescription' => 'Returns the ImageMagick release date',
      'returnType' => 'Returns the ImageMagick release date as a string.',
      'classname' => 'imagick',
      'method' => 'getreleasedate.xml',
      'parameters' => 
      array (
      ),
    ),
    'getresource' => 
    array (
      'functionName' => 'getResource',
      'description' => 'Returns the specified resource\'s memory usage in megabytes.',
      'methodDescription' => 'Returns the specified resource\'s memory usage',
      'returnType' => 'Returns the specified resource\'s memory usage in megabytes.',
      'classname' => 'imagick',
      'method' => 'getresource.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'type',
          'description' => 'Refer to the list of resourcetype constants.',
        ),
      ),
    ),
    'getresourcelimit' => 
    array (
      'functionName' => 'getResourceLimit',
      'description' => 'Returns the specified resource limit.',
      'methodDescription' => 'Returns the specified resource limit',
      'returnType' => 'Returns the specified resource limit in megabytes.',
      'classname' => 'imagick',
      'method' => 'getresourcelimit.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'type',
          'description' => 'Refer to the list of resourcetype constants.',
        ),
      ),
    ),
    'getsamplingfactors' => 
    array (
      'functionName' => 'getSamplingFactors',
      'description' => 'Gets the horizontal and vertical sampling factor.',
      'methodDescription' => 'Gets the horizontal and vertical sampling factor',
      'returnType' => 'Returns an associative array with the horizontal and vertical sampling
   factors of the image.',
      'classname' => 'imagick',
      'method' => 'getsamplingfactors.xml',
      'parameters' => 
      array (
      ),
    ),
    'getsize' => 
    array (
      'functionName' => 'getSize',
      'description' => 'Returns the size associated with the Imagick object as an array with the
   keys "columns" and "rows".',
      'methodDescription' => 'Returns the size associated with the Imagick object',
      'returnType' => 'Returns the size associated with the Imagick object as an array with the
   keys "columns" and "rows".',
      'classname' => 'imagick',
      'method' => 'getsize.xml',
      'parameters' => 
      array (
      ),
    ),
    'getsizeoffset' => 
    array (
      'functionName' => 'getSizeOffset',
      'description' => 'Returns the size offset associated with the Imagick object.
   available.0x629;',
      'methodDescription' => 'Returns the size offset',
      'returnType' => 'Returns the size offset associated with the Imagick object.',
      'classname' => 'imagick',
      'method' => 'getsizeoffset.xml',
      'parameters' => 
      array (
      ),
    ),
    'getversion' => 
    array (
      'functionName' => 'getVersion',
      'description' => 'Returns the ImageMagick API version as a string and as a number.',
      'methodDescription' => 'Returns the ImageMagick API version',
      'returnType' => 'Returns the ImageMagick API version as a string and as a number.',
      'classname' => 'imagick',
      'method' => 'getversion.xml',
      'parameters' => 
      array (
      ),
    ),
    'haldclutimage' => 
    array (
      'functionName' => 'haldClutImage',
      'description' => 'Replaces colors in the image using a Hald lookup table. Hald images can be created using 
   HALD color coder.',
      'methodDescription' => 'Replaces colors in the image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'haldclutimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'Imagick',
          'name' => 'clut',
          'description' => 'Imagick object containing the Hald lookup image.',
        ),
        1 => 
        array (
          'type' => 'int',
          'name' => 'channel',
          'description' => 'Imagick channel constant;',
        ),
      ),
    ),
    'hasnextimage' => 
    array (
      'functionName' => 'hasNextImage',
      'description' => 'Returns True; if the object has more images when traversing the list in the forward direction.',
      'methodDescription' => 'Checks if the object has more images',
      'returnType' => 'Returns True; if the object has more images when traversing the list in the
   forward direction, returns False; if there are none.',
      'classname' => 'imagick',
      'method' => 'hasnextimage.xml',
      'parameters' => 
      array (
      ),
    ),
    'haspreviousimage' => 
    array (
      'functionName' => 'hasPreviousImage',
      'description' => 'Returns True; if the object has more images when traversing the list in the reverse direction',
      'methodDescription' => 'Checks if the object has a previous image',
      'returnType' => 'Returns True; if the object has more images when traversing the list in the
   reverse direction, returns False; if there are none.',
      'classname' => 'imagick',
      'method' => 'haspreviousimage.xml',
      'parameters' => 
      array (
      ),
    ),
    'identifyimage' => 
    array (
      'functionName' => 'identifyImage',
      'description' => 'Identifies an image and returns the attributes.  Attributes include
   the image width, height, size, and others.',
      'methodDescription' => 'Identifies an image and fetches attributes',
      'returnType' => 'Identifies an image and returns the attributes.  Attributes include
   the image width, height, size, and others.',
      'classname' => 'imagick',
      'method' => 'identifyimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'bool',
          'name' => 'appendRawOutput',
          'description' => '',
        ),
      ),
    ),
    'implodeimage' => 
    array (
      'functionName' => 'implodeImage',
      'description' => 'Creates a new image that is a copy of an existing one with the image pixels
   "imploded" by the specified percentage.',
      'methodDescription' => 'Creates a new image as a copy',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'implodeimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'radius',
          'description' => 'The radius of the implode',
        ),
      ),
    ),
    'importimagepixels' => 
    array (
      'functionName' => 'importImagePixels',
      'description' => 'Imports pixels from an array into an image. The map is usually
   \'RGB\'. This method imposes the following constraints for the parameters: amount of pixels
   in the array must match width x height x length of the map.
   available.0x645;',
      'methodDescription' => 'Imports image pixels',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'importimagepixels.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'x',
          'description' => 'The image x position',
        ),
        1 => 
        array (
          'type' => 'int',
          'name' => 'y',
          'description' => 'The image y position',
        ),
        2 => 
        array (
          'type' => 'int',
          'name' => 'width',
          'description' => 'The image width',
        ),
        3 => 
        array (
          'type' => 'int',
          'name' => 'height',
          'description' => 'The image height',
        ),
        4 => 
        array (
          'type' => 'string',
          'name' => 'map',
          'description' => 'Map of pixel ordering as a string. This can be for example RGB.
       The value can be any combination or order of R = red, G = green, B = blue, A = alpha (0 is transparent), 
       O = opacity (0 is opaque), C = cyan, Y = yellow, M = magenta, K = black, I = intensity (for grayscale), P = pad.',
        ),
        5 => 
        array (
          'type' => 'int',
          'name' => 'storage',
          'description' => 'The pixel storage method. 
       Refer to this list of pixel constants.',
        ),
        6 => 
        array (
          'type' => 'array',
          'name' => 'pixels',
          'description' => 'The array of pixels',
        ),
      ),
    ),
    'labelimage' => 
    array (
      'functionName' => 'labelImage',
      'description' => 'Adds a label to an image.',
      'methodDescription' => 'Adds a label to an image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'labelimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'string',
          'name' => 'label',
          'description' => 'The label to add',
        ),
      ),
    ),
    'levelimage' => 
    array (
      'functionName' => 'levelImage',
      'description' => 'Adjusts the levels of an image by scaling the colors falling
   between specified white and black points to the full
   available quantum range. The parameters provided represent
   the black, mid, and white points. The black point specifies
   the darkest color in the image. Colors darker than the black
   point are set to zero. Mid point specifies a gamma
   correction to apply to the image.  White point specifies the
   lightest color in the image. Colors brighter than the white
   point are set to the maximum quantum value.',
      'methodDescription' => 'Adjusts the levels of an image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'levelimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'blackPoint',
          'description' => 'The image black point',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'gamma',
          'description' => 'The gamma value',
        ),
        2 => 
        array (
          'type' => 'float',
          'name' => 'whitePoint',
          'description' => 'The image white point',
        ),
        3 => 
        array (
          'type' => 'int',
          'name' => 'channel',
          'description' => 'Provide any channel constant that is valid for your channel mode. To
       apply to more than one channel, combine channeltype constants using
       bitwise operators. Refer to this
       list of  channel constants.',
        ),
      ),
    ),
    'linearstretchimage' => 
    array (
      'functionName' => 'linearStretchImage',
      'description' => 'Stretches with saturation the image intensity.',
      'methodDescription' => 'Stretches with saturation the image intensity',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'linearstretchimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'blackPoint',
          'description' => 'The image black point',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'whitePoint',
          'description' => 'The image white point',
        ),
      ),
    ),
    'liquidrescaleimage' => 
    array (
      'functionName' => 'liquidRescaleImage',
      'description' => 'This method scales the images using liquid rescaling method. This method
   is an implementation of a technique called seam carving. In order for this
   method to work as expected ImageMagick must be compiled with liblqr support.
   available.0x639;',
      'methodDescription' => 'Animates an image or images',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'liquidrescaleimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'width',
          'description' => 'The width of the target size',
        ),
        1 => 
        array (
          'type' => 'int',
          'name' => 'height',
          'description' => 'The height of the target size',
        ),
        2 => 
        array (
          'type' => 'float',
          'name' => 'delta_x',
          'description' => 'How much the seam can traverse on x-axis. 
       Passing 0 causes the seams to be straight.',
        ),
        3 => 
        array (
          'type' => 'float',
          'name' => 'rigidity',
          'description' => 'Introduces a bias for non-straight seams. This parameter is 
       typically 0.',
        ),
      ),
    ),
    'magnifyimage' => 
    array (
      'functionName' => 'magnifyImage',
      'description' => 'Is a convenience method that scales an image proportionally to twice its original size.',
      'methodDescription' => 'Scales an image proportionally 2x',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'magnifyimage.xml',
      'parameters' => 
      array (
      ),
    ),
    'mapimage' => 
    array (
      'functionName' => 'mapImage',
      'description' => NULL,
      'methodDescription' => 'Replaces the colors of an image with the closest color from a reference image.',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'mapimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'Imagick',
          'name' => 'map',
          'description' => '',
        ),
        1 => 
        array (
          'type' => 'bool',
          'name' => 'dither',
          'description' => '',
        ),
      ),
    ),
    'mattefloodfillimage' => 
    array (
      'functionName' => 'matteFloodfillImage',
      'description' => 'Changes the transparency value of any pixel that matches
   target and is an immediate neighbor.  If the method
   FillToBorderMethod is specified, the transparency value
   is changed for any neighbor pixel that does not match
   the bordercolor member of image.',
      'methodDescription' => 'Changes the transparency value of a color',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'mattefloodfillimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'alpha',
          'description' => 'The level of transparency: 1.0 is fully opaque and 0.0 is fully
       transparent.',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'fuzz',
          'description' => 'The fuzz member of image defines how much tolerance is acceptable to
       consider two colors as the same.',
        ),
        2 => 
        array (
          'type' => 'mixed',
          'name' => 'bordercolor',
          'description' => 'An ImagickPixel object or string representing the border color.',
        ),
        3 => 
        array (
          'type' => 'int',
          'name' => 'x',
          'description' => 'The starting x coordinate of the operation.',
        ),
        4 => 
        array (
          'type' => 'int',
          'name' => 'y',
          'description' => 'The starting y coordinate of the operation.',
        ),
      ),
    ),
    'medianfilterimage' => 
    array (
      'functionName' => 'medianFilterImage',
      'description' => 'Applies a digital filter that improves the quality of a
   noisy image.  Each pixel is replaced by the median in a
   set of neighboring pixels as defined by radius.',
      'methodDescription' => 'Applies a digital filter',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'medianfilterimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'radius',
          'description' => 'The radius of the pixel neighborhood.',
        ),
      ),
    ),
    'mergeimagelayers' => 
    array (
      'functionName' => 'mergeImageLayers',
      'description' => 'Merges image layers into one. This method is useful when working with image
   formats that use multiple layers such as PSD. The merging is controlled using
   the layer_method which defines how the layers are merged.
   available.0x637;',
      'methodDescription' => 'Merges image layers',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'mergeimagelayers.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'layer_method',
          'description' => 'One of the Imagick::LAYERMETHOD_* constants',
        ),
      ),
    ),
    'minifyimage' => 
    array (
      'functionName' => 'minifyImage',
      'description' => 'Is a convenience method that scales an image proportionally to one-half its original size',
      'methodDescription' => 'Scales an image proportionally to half its size',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'minifyimage.xml',
      'parameters' => 
      array (
      ),
    ),
    'modulateimage' => 
    array (
      'functionName' => 'modulateImage',
      'description' => 'Lets you control the brightness, saturation, and hue of an image.  Hue
   is the percentage of absolute rotation from the current position.  For
   example 50 results in a counter-clockwise rotation of 90 degrees, 150
   results in a clockwise rotation of 90 degrees, with 0 and 200 both
   resulting in a rotation of 180 degrees.',
      'methodDescription' => 'Control the brightness, saturation, and hue',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'modulateimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'brightness',
          'description' => '',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'saturation',
          'description' => '',
        ),
        2 => 
        array (
          'type' => 'float',
          'name' => 'hue',
          'description' => '',
        ),
      ),
    ),
    'montageimage' => 
    array (
      'functionName' => 'montageImage',
      'description' => 'Creates a composite image by combining several separate images.
   The images are tiled on the composite image with the name of the
   image optionally appearing just below the individual tile.',
      'methodDescription' => 'Creates a composite image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'montageimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'ImagickDraw',
          'name' => 'draw',
          'description' => 'The font name, size, and color are obtained from this object.',
        ),
        1 => 
        array (
          'type' => 'string',
          'name' => 'tile_geometry',
          'description' => 'The number of tiles per row and page (e.g. 6x4+0+0).',
        ),
        2 => 
        array (
          'type' => 'string',
          'name' => 'thumbnail_geometry',
          'description' => 'Preferred image size and border size of each thumbnail
       (e.g. 120x120+4+3>).',
        ),
        3 => 
        array (
          'type' => 'int',
          'name' => 'mode',
          'description' => 'Thumbnail framing mode, see Montage Mode constants.',
        ),
        4 => 
        array (
          'type' => 'string',
          'name' => 'frame',
          'description' => 'Surround the image with an ornamental border (e.g. 15x15+3+3). The
       frame color is that of the thumbnail\'s matte color.',
        ),
      ),
    ),
    'morphimages' => 
    array (
      'functionName' => 'morphImages',
      'description' => 'Method morphs a set of images.  Both the image pixels and size
   are linearly interpolated to give the appearance of a
   meta-morphosis from one image to the next.',
      'methodDescription' => 'Method morphs a set of images',
      'returnType' => 'This method returns a new Imagick object on success.
  Throws ImagickException;',
      'classname' => 'imagick',
      'method' => 'morphimages.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'number_frames',
          'description' => 'The number of in-between images to generate.',
        ),
      ),
    ),
    'mosaicimages' => 
    array (
      'functionName' => 'mosaicImages',
      'description' => 'Inlays an image sequence to form a single coherent picture. It
   returns a wand with each image in the sequence composited at
   the location defined by the page offset of the image.',
      'methodDescription' => 'Forms a mosaic from images',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'mosaicimages.xml',
      'parameters' => 
      array (
      ),
    ),
    'motionblurimage' => 
    array (
      'functionName' => 'motionBlurImage',
      'description' => 'Simulates motion blur.  We convolve the image with a Gaussian
   operator of the given radius and standard deviation (sigma).
   For reasonable results, radius should be larger than sigma.
   Use a radius of 0 and MotionBlurImage() selects a suitable
   radius for you. Angle gives the angle of the blurring motion.',
      'methodDescription' => 'Simulates motion blur',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'motionblurimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'radius',
          'description' => 'The radius of the Gaussian, in pixels, not counting the center pixel.',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'sigma',
          'description' => 'The standard deviation of the Gaussian, in pixels.',
        ),
        2 => 
        array (
          'type' => 'float',
          'name' => 'angle',
          'description' => 'Apply the effect along this angle.',
        ),
        3 => 
        array (
          'type' => 'int',
          'name' => 'channel',
          'description' => 'Provide any channel constant that is valid for your channel mode. To
       apply to more than one channel, combine channeltype constants using
       bitwise operators. Refer to this
       list of channel constants.
       The channel argument affects only if Imagick is compiled against ImageMagick version
       6.4.4 or greater.',
        ),
      ),
    ),
    'negateimage' => 
    array (
      'functionName' => 'negateImage',
      'description' => 'Negates the colors in the reference image. The Grayscale
   option means that only grayscale values within the image
   are negated.',
      'methodDescription' => 'Negates the colors in the reference image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'negateimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'bool',
          'name' => 'gray',
          'description' => 'Whether to only negate grayscale pixels within the image.',
        ),
        1 => 
        array (
          'type' => 'int',
          'name' => 'channel',
          'description' => 'Provide any channel constant that is valid for your channel mode. To
       apply to more than one channel, combine channeltype constants using
       bitwise operators. Refer to this
       list of channel constants.',
        ),
      ),
    ),
    'newimage' => 
    array (
      'functionName' => 'newImage',
      'description' => 'Creates a new image and associates ImagickPixel value as background color',
      'methodDescription' => 'Creates a new image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'newimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'cols',
          'description' => 'Columns in the new image',
        ),
        1 => 
        array (
          'type' => 'int',
          'name' => 'rows',
          'description' => 'Rows in the new image',
        ),
        2 => 
        array (
          'type' => 'mixed',
          'name' => 'background',
          'description' => 'The background color used for this image',
        ),
        3 => 
        array (
          'type' => 'string',
          'name' => 'format',
          'description' => 'Image format. This parameter was added in Imagick version 2.0.1.',
        ),
      ),
    ),
    'newpseudoimage' => 
    array (
      'functionName' => 'newPseudoImage',
      'description' => 'Creates a new image using ImageMagick pseudo-formats.',
      'methodDescription' => 'Creates a new image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'newpseudoimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'columns',
          'description' => 'columns in the new image',
        ),
        1 => 
        array (
          'type' => 'int',
          'name' => 'rows',
          'description' => 'rows in the new image',
        ),
        2 => 
        array (
          'type' => 'string',
          'name' => 'pseudoString',
          'description' => 'string containing pseudo image definition.',
        ),
      ),
    ),
    'nextimage' => 
    array (
      'functionName' => 'nextImage',
      'description' => 'Associates the next image in the image list with an Imagick object.',
      'methodDescription' => 'Moves to the next image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'nextimage.xml',
      'parameters' => 
      array (
      ),
    ),
    'normalizeimage' => 
    array (
      'functionName' => 'normalizeImage',
      'description' => 'Enhances the contrast of a color image by adjusting the pixels
   color to span the entire range of colors available.',
      'methodDescription' => 'Enhances the contrast of a color image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'normalizeimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'channel',
          'description' => 'Provide any channel constant that is valid for your channel mode. To
       apply to more than one channel, combine channeltype constants using
       bitwise operators. Refer to this
       list of channel constants.',
        ),
      ),
    ),
    'oilpaintimage' => 
    array (
      'functionName' => 'oilPaintImage',
      'description' => 'Applies a special effect filter that simulates an oil painting.
   Each pixel is replaced by the most frequent color occurring in
   a circular region defined by radius.',
      'methodDescription' => 'Simulates an oil painting',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'oilpaintimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'radius',
          'description' => 'The radius of the circular neighborhood.',
        ),
      ),
    ),
    'opaquepaintimage' => 
    array (
      'functionName' => 'opaquePaintImage',
      'description' => 'Changes any pixel that matches color with the color defined by fill.
   available.0x638;',
      'methodDescription' => 'Changes the color value of any pixel that matches target',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'opaquepaintimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'mixed',
          'name' => 'target',
          'description' => 'ImagickPixel object or a string containing the color to change',
        ),
        1 => 
        array (
          'type' => 'mixed',
          'name' => 'fill',
          'description' => 'The replacement color',
        ),
        2 => 
        array (
          'type' => 'float',
          'name' => 'fuzz',
          'description' => ';',
        ),
        3 => 
        array (
          'type' => 'bool',
          'name' => 'invert',
          'description' => 'If True; paints any pixel that does not match the target color.',
        ),
        4 => 
        array (
          'type' => 'int',
          'name' => 'channel',
          'description' => 'Imagick channel constant;',
        ),
      ),
    ),
    'optimizeimagelayers' => 
    array (
      'functionName' => 'optimizeImageLayers',
      'description' => 'Compares each image the GIF disposed forms of the previous image
   in the sequence.  From this it attempts to select the smallest
   cropped image to replace each frame, while preserving the results
   of the animation. 
   available.0x629;',
      'methodDescription' => 'Removes repeated portions of images to optimize',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'optimizeimagelayers.xml',
      'parameters' => 
      array (
      ),
    ),
    'orderedposterizeimage' => 
    array (
      'functionName' => 'orderedPosterizeImage',
      'description' => 'Performs an ordered dither based on a number of pre-defined dithering threshold maps, 
    but over multiple intensity levels, which can be different for different channels, 
    according to the input arguments. available.0x631;',
      'methodDescription' => 'Performs an ordered dither',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'orderedposterizeimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'string',
          'name' => 'threshold_map',
          'description' => 'A string containing the name of the threshold dither map to use',
        ),
        1 => 
        array (
          'type' => 'int',
          'name' => 'channel',
          'description' => 'Provide any channel constant that is valid for your channel mode. To
       apply to more than one channel, combine channeltype constants using
       bitwise operators. Refer to this
       list of channel constants.',
        ),
      ),
    ),
    'paintfloodfillimage' => 
    array (
      'functionName' => 'paintFloodfillImage',
      'description' => 'Changes the color value of any pixel that matches target and is an
   immediate neighbor. As of ImageMagick 6.3.8 this method has been deprecated
   and Imagick::floodfillPaintImage should be used instead.',
      'methodDescription' => 'Changes the color value of any pixel that matches target',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'paintfloodfillimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'mixed',
          'name' => 'fill',
          'description' => 'ImagickPixel object or a string containing the fill color',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'fuzz',
          'description' => 'The amount of fuzz. For example, set fuzz to 10 and the color red at
       intensities of 100 and 102 respectively are now interpreted as the
       same color for the purposes of the floodfill.',
        ),
        2 => 
        array (
          'type' => 'mixed',
          'name' => 'bordercolor',
          'description' => 'ImagickPixel object or a string containing the border color',
        ),
        3 => 
        array (
          'type' => 'int',
          'name' => 'x',
          'description' => 'X start position of the floodfill',
        ),
        4 => 
        array (
          'type' => 'int',
          'name' => 'y',
          'description' => 'Y start position of the floodfill',
        ),
        5 => 
        array (
          'type' => 'int',
          'name' => 'channel',
          'description' => 'Imagick channel constant;',
        ),
      ),
    ),
    'paintopaqueimage' => 
    array (
      'functionName' => 'paintOpaqueImage',
      'description' => 'Changes any pixel that matches color with the color defined by fill.',
      'methodDescription' => 'Change any pixel that matches color',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'paintopaqueimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'mixed',
          'name' => 'target',
          'description' => 'Change this target color to the fill color within the image. An
       ImagickPixel object or a string representing the target color.',
        ),
        1 => 
        array (
          'type' => 'mixed',
          'name' => 'fill',
          'description' => 'An ImagickPixel object or a string representing the fill color.',
        ),
        2 => 
        array (
          'type' => 'float',
          'name' => 'fuzz',
          'description' => 'The fuzz member of image defines how much tolerance is acceptable to
       consider two colors as the same.',
        ),
        3 => 
        array (
          'type' => 'int',
          'name' => 'channel',
          'description' => 'Provide any channel constant that is valid for your channel mode. To
       apply to more than one channel, combine channeltype constants using
       bitwise operators. Refer to this
       list of channel constants.',
        ),
      ),
    ),
    'painttransparentimage' => 
    array (
      'functionName' => 'paintTransparentImage',
      'description' => 'Changes any pixel that matches color with the color defined by fill.',
      'methodDescription' => 'Changes any pixel that matches color with the color defined by fill',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'painttransparentimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'mixed',
          'name' => 'target',
          'description' => 'Change this target color to specified opacity value within the image.',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'alpha',
          'description' => 'The level of transparency: 1.0 is fully opaque and 0.0 is fully 
       transparent.',
        ),
        2 => 
        array (
          'type' => 'float',
          'name' => 'fuzz',
          'description' => 'The fuzz member of image defines how much tolerance is acceptable to
       consider two colors as the same.',
        ),
      ),
    ),
    'pingimage' => 
    array (
      'functionName' => 'pingImage',
      'description' => 'This method can be used to query image width, height, size, and
   format without reading the whole image in to memory.',
      'methodDescription' => 'Fetch basic attributes about the image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'pingimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'string',
          'name' => 'filename',
          'description' => 'The filename to read the information from.',
        ),
      ),
    ),
    'pingimageblob' => 
    array (
      'functionName' => 'pingImageBlob',
      'description' => 'This method can be used to query image width, height, size, and
   format without reading the whole image to memory. 
   available.0x629;',
      'methodDescription' => 'Quickly fetch attributes',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'pingimageblob.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'string',
          'name' => 'image',
          'description' => 'A string containing the image.',
        ),
      ),
    ),
    'pingimagefile' => 
    array (
      'functionName' => 'pingImageFile',
      'description' => 'This method can be used to query image width, height, size, and
   format without reading the whole image to memory. 
   available.0x629;',
      'methodDescription' => 'Get basic image attributes in a lightweight manner',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'pingimagefile.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'resource',
          'name' => 'filehandle',
          'description' => 'An open filehandle to the image.',
        ),
        1 => 
        array (
          'type' => 'string',
          'name' => 'fileName',
          'description' => 'Optional filename for this image.',
        ),
      ),
    ),
    'polaroidimage' => 
    array (
      'functionName' => 'polaroidImage',
      'description' => 'Simulates a Polaroid picture. available.0x632;',
      'methodDescription' => 'Simulates a Polaroid picture',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'polaroidimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'ImagickDraw',
          'name' => 'properties',
          'description' => 'The polaroid properties',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'angle',
          'description' => 'The polaroid angle',
        ),
      ),
    ),
    'posterizeimage' => 
    array (
      'functionName' => 'posterizeImage',
      'description' => 'Reduces the image to a limited number of color level.',
      'methodDescription' => 'Reduces the image to a limited number of color level',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'posterizeimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'levels',
          'description' => '',
        ),
        1 => 
        array (
          'type' => 'bool',
          'name' => 'dither',
          'description' => '',
        ),
      ),
    ),
    'previewimages' => 
    array (
      'functionName' => 'previewImages',
      'description' => 'Tiles 9 thumbnails of the specified image with an image processing
   operation applied at varying strengths.  This is helpful to quickly
   pin-point an appropriate parameter for an image processing operation.',
      'methodDescription' => 'Quickly pin-point appropriate parameters for image processing',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'previewimages.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'preview',
          'description' => 'Preview type. See Preview type constants',
        ),
      ),
    ),
    'previousimage' => 
    array (
      'functionName' => 'previousImage',
      'description' => 'Assocates the previous image in an image list with the Imagick object.',
      'methodDescription' => 'Move to the previous image in the object',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'previousimage.xml',
      'parameters' => 
      array (
      ),
    ),
    'profileimage' => 
    array (
      'functionName' => 'profileImage',
      'description' => 'Adds or removes a ICC, IPTC, or generic profile from an image.
   If the profile is NULL, it is removed from the image otherwise
   added.  Use a name of \'*\' and a profile of NULL to remove all
   profiles from the image.',
      'methodDescription' => 'Adds or removes a profile from an image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'profileimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'string',
          'name' => 'name',
          'description' => '',
        ),
        1 => 
        array (
          'type' => 'string',
          'name' => 'profile',
          'description' => '',
        ),
      ),
    ),
    'quantizeimage' => 
    array (
      'functionName' => 'quantizeImage',
      'description' => NULL,
      'methodDescription' => 'Analyzes the colors within a reference image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'quantizeimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'numberColors',
          'description' => '',
        ),
        1 => 
        array (
          'type' => 'int',
          'name' => 'colorspace',
          'description' => '',
        ),
        2 => 
        array (
          'type' => 'int',
          'name' => 'treedepth',
          'description' => '',
        ),
        3 => 
        array (
          'type' => 'bool',
          'name' => 'dither',
          'description' => '',
        ),
        4 => 
        array (
          'type' => 'bool',
          'name' => 'measureError',
          'description' => '',
        ),
      ),
    ),
    'quantizeimages' => 
    array (
      'functionName' => 'quantizeImages',
      'description' => NULL,
      'methodDescription' => 'Analyzes the colors within a sequence of images',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'quantizeimages.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'numberColors',
          'description' => '',
        ),
        1 => 
        array (
          'type' => 'int',
          'name' => 'colorspace',
          'description' => '',
        ),
        2 => 
        array (
          'type' => 'int',
          'name' => 'treedepth',
          'description' => '',
        ),
        3 => 
        array (
          'type' => 'bool',
          'name' => 'dither',
          'description' => '',
        ),
        4 => 
        array (
          'type' => 'bool',
          'name' => 'measureError',
          'description' => '',
        ),
      ),
    ),
    'queryfontmetrics' => 
    array (
      'functionName' => 'queryFontMetrics',
      'description' => 'Returns a multi-dimensional array representing the font metrics.',
      'methodDescription' => 'Returns an array representing the font metrics',
      'returnType' => 'Returns a multi-dimensional array representing the font metrics.',
      'classname' => 'imagick',
      'method' => 'queryfontmetrics.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'ImagickDraw',
          'name' => 'properties',
          'description' => 'ImagickDraw object containing font properties',
        ),
        1 => 
        array (
          'type' => 'string',
          'name' => 'text',
          'description' => 'The text',
        ),
        2 => 
        array (
          'type' => 'bool',
          'name' => 'multiline',
          'description' => 'Multiline parameter. If left empty it is autodetected',
        ),
      ),
    ),
    'queryfonts' => 
    array (
      'functionName' => 'queryFonts',
      'description' => 'Returns the configured fonts.',
      'methodDescription' => 'Returns the configured fonts',
      'returnType' => 'Returns an array containing the configured fonts.',
      'classname' => 'imagick',
      'method' => 'queryfonts.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'string',
          'name' => 'pattern',
          'description' => 'The query pattern',
        ),
      ),
    ),
    'queryformats' => 
    array (
      'functionName' => 'queryFormats',
      'description' => 'Returns formats supported by Imagick.',
      'methodDescription' => 'Returns formats supported by Imagick',
      'returnType' => 'Returns an array containing the formats supported by Imagick.',
      'classname' => 'imagick',
      'method' => 'queryformats.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'string',
          'name' => 'pattern',
          'description' => '',
        ),
      ),
    ),
    'radialblurimage' => 
    array (
      'functionName' => 'radialBlurImage',
      'description' => 'Radial blurs an image.',
      'methodDescription' => 'Radial blurs an image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'radialblurimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'angle',
          'description' => '',
        ),
        1 => 
        array (
          'type' => 'int',
          'name' => 'channel',
          'description' => '',
        ),
      ),
    ),
    'raiseimage' => 
    array (
      'functionName' => 'raiseImage',
      'description' => 'Creates a simulated three-dimensional button-like effect
   by lightening and darkening the edges of the image.
   Members width and height of raise_info define the width
   of the vertical and horizontal edge of the effect.',
      'methodDescription' => 'Creates a simulated 3d button-like effect',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'raiseimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'width',
          'description' => '',
        ),
        1 => 
        array (
          'type' => 'int',
          'name' => 'height',
          'description' => '',
        ),
        2 => 
        array (
          'type' => 'int',
          'name' => 'x',
          'description' => '',
        ),
        3 => 
        array (
          'type' => 'int',
          'name' => 'y',
          'description' => '',
        ),
        4 => 
        array (
          'type' => 'bool',
          'name' => 'raise',
          'description' => '',
        ),
      ),
    ),
    'randomthresholdimage' => 
    array (
      'functionName' => 'randomThresholdImage',
      'description' => 'Changes the value of individual pixels based on the
   intensity of each pixel compared to threshold. The
   result is a high-contrast, two color image. available.0x629;',
      'methodDescription' => 'Creates a high-contrast, two-color image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'randomthresholdimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'low',
          'description' => 'The low point',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'high',
          'description' => 'The high point',
        ),
        2 => 
        array (
          'type' => 'int',
          'name' => 'channel',
          'description' => 'Provide any channel constant that is valid for your channel mode. To
       apply to more than one channel, combine channeltype constants using
       bitwise operators. Refer to this
       list of  channel constants.',
        ),
      ),
    ),
    'readimage' => 
    array (
      'functionName' => 'readImage',
      'description' => 'Reads image from filename',
      'methodDescription' => 'Reads image from filename',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'readimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'string',
          'name' => 'filename',
          'description' => '',
        ),
      ),
    ),
    'readimageblob' => 
    array (
      'functionName' => 'readImageBlob',
      'description' => 'Reads image from a binary string',
      'methodDescription' => 'Reads image from a binary string',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'readimageblob.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'string',
          'name' => 'image',
          'description' => '',
        ),
        1 => 
        array (
          'type' => 'string',
          'name' => 'filename',
          'description' => NULL,
        ),
      ),
    ),
    'readimagefile' => 
    array (
      'functionName' => 'readImageFile',
      'description' => 'Reads image from open filehandle',
      'methodDescription' => 'Reads image from open filehandle',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'readimagefile.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'resource',
          'name' => 'filehandle',
          'description' => '',
        ),
        1 => 
        array (
          'type' => 'string',
          'name' => 'fileName',
          'description' => '',
        ),
      ),
    ),
    'recolorimage' => 
    array (
      'functionName' => 'recolorImage',
      'description' => 'Translate, scale, shear, or rotate image colors. This method supports variable sized matrices but normally
   5x5 matrix is used for RGBA and 6x6 is used for CMYK. The last row should contain the normalized values.
   available.0x636;',
      'methodDescription' => 'Recolors image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'recolorimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'array',
          'name' => 'matrix',
          'description' => 'The matrix containing the color values',
        ),
      ),
    ),
    'reducenoiseimage' => 
    array (
      'functionName' => 'reduceNoiseImage',
      'description' => 'Smooths the contours of an image while still preserving edge
   information. The algorithm works by replacing each pixel with
   its neighbor closest in value. A neighbor is defined by radius.
   Use a radius of 0 and Imagick::reduceNoiseImage() selects a
   suitable radius for you.',
      'methodDescription' => 'Smooths the contours of an image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'reducenoiseimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'radius',
          'description' => '',
        ),
      ),
    ),
    'remapimage' => 
    array (
      'functionName' => 'remapImage',
      'description' => 'Replaces colors an image with those defined by replacement. The colors
   are replaced with the closest possible color. available.0x645;',
      'methodDescription' => 'Remaps image colors',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'remapimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'Imagick',
          'name' => 'replacement',
          'description' => 'An Imagick object containing the replacement colors',
        ),
        1 => 
        array (
          'type' => 'int',
          'name' => 'DITHER',
          'description' => 'Refer to this list of dither method constants',
        ),
      ),
    ),
    'removeimage' => 
    array (
      'functionName' => 'removeImage',
      'description' => 'Removes an image from the image list.',
      'methodDescription' => 'Removes an image from the image list',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'removeimage.xml',
      'parameters' => 
      array (
      ),
    ),
    'removeimageprofile' => 
    array (
      'functionName' => 'removeImageProfile',
      'description' => 'Removes the named image profile and returns it.',
      'methodDescription' => 'Removes the named image profile and returns it',
      'returnType' => 'Returns a string containing the profile of the image.',
      'classname' => 'imagick',
      'method' => 'removeimageprofile.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'string',
          'name' => 'name',
          'description' => '',
        ),
      ),
    ),
    'render' => 
    array (
      'functionName' => 'render',
      'description' => 'Renders all preceding drawing commands.',
      'methodDescription' => 'Renders all preceding drawing commands',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'render.xml',
      'parameters' => 
      array (
      ),
    ),
    'resampleimage' => 
    array (
      'functionName' => 'resampleImage',
      'description' => 'Resample image to desired resolution.',
      'methodDescription' => 'Resample image to desired resolution',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'resampleimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'x_resolution',
          'description' => '',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'y_resolution',
          'description' => '',
        ),
        2 => 
        array (
          'type' => 'int',
          'name' => 'filter',
          'description' => '',
        ),
        3 => 
        array (
          'type' => 'float',
          'name' => 'blur',
          'description' => '',
        ),
      ),
    ),
    'resetimagepage' => 
    array (
      'functionName' => 'resetImagePage',
      'description' => 'The page definition as a string. The string is in format WxH+x+y.
   available.0x636;',
      'methodDescription' => 'Reset image page',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'resetimagepage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'string',
          'name' => 'page',
          'description' => 'The page definition. For example 7168x5147+0+0',
        ),
      ),
    ),
    'resizeimage' => 
    array (
      'functionName' => 'resizeImage',
      'description' => 'Scales an image to the desired dimensions with a
   filter.',
      'methodDescription' => 'Scales an image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'resizeimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'columns',
          'description' => 'Width of the image',
        ),
        1 => 
        array (
          'type' => 'int',
          'name' => 'rows',
          'description' => 'Height of the image',
        ),
        2 => 
        array (
          'type' => 'int',
          'name' => 'filter',
          'description' => 'Refer to the list of filter constants.',
        ),
        3 => 
        array (
          'type' => 'float',
          'name' => 'blur',
          'description' => 'The blur factor where > 1 is blurry, < 1 is sharp.',
        ),
        4 => 
        array (
          'type' => 'bool',
          'name' => 'bestfit',
          'description' => 'Optional fit parameter.',
        ),
      ),
    ),
    'rollimage' => 
    array (
      'functionName' => 'rollImage',
      'description' => 'Offsets an image as defined by x and y.',
      'methodDescription' => 'Offsets an image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'rollimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'x',
          'description' => 'The X offset.',
        ),
        1 => 
        array (
          'type' => 'int',
          'name' => 'y',
          'description' => 'The Y offset.',
        ),
      ),
    ),
    'rotateimage' => 
    array (
      'functionName' => 'rotateImage',
      'description' => 'Rotates an image the specified number of degrees. Empty
   triangles left over from rotating the image are filled
   with the background color.',
      'methodDescription' => 'Rotates an image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'rotateimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'mixed',
          'name' => 'background',
          'description' => 'The background color',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'degrees',
          'description' => 'Rotation angle, in degrees. The rotation angle is interpreted as the
       number of degrees to rotate the image clockwise.',
        ),
      ),
    ),
    'roundcorners' => 
    array (
      'functionName' => 'roundCorners',
      'description' => 'Rounds image corners. The first two parameters control the amount 
   of rounding and the three last parameters can be used to fine-tune 
   the rounding process. available.0x629;',
      'methodDescription' => 'Rounds image corners',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'roundcorners.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'x_rounding',
          'description' => 'x rounding',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'y_rounding',
          'description' => 'y rounding',
        ),
        2 => 
        array (
          'type' => 'float',
          'name' => 'stroke_width',
          'description' => 'stroke width',
        ),
        3 => 
        array (
          'type' => 'float',
          'name' => 'displace',
          'description' => 'image displace',
        ),
        4 => 
        array (
          'type' => 'float',
          'name' => 'size_correction',
          'description' => 'size correction',
        ),
      ),
    ),
    'sampleimage' => 
    array (
      'functionName' => 'sampleImage',
      'description' => 'Scales an image to the desired dimensions with pixel sampling.
   Unlike other scaling methods, this method does not introduce
   any additional color into the scaled image.',
      'methodDescription' => 'Scales an image with pixel sampling',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'sampleimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'columns',
          'description' => '',
        ),
        1 => 
        array (
          'type' => 'int',
          'name' => 'rows',
          'description' => '',
        ),
      ),
    ),
    'scaleimage' => 
    array (
      'functionName' => 'scaleImage',
      'description' => 'Scales the size of an image to the given dimensions. The other parameter
   will be calculated if 0 is passed as either param.',
      'methodDescription' => 'Scales the size of an image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'scaleimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'cols',
          'description' => '',
        ),
        1 => 
        array (
          'type' => 'int',
          'name' => 'rows',
          'description' => '',
        ),
        2 => 
        array (
          'type' => 'bool',
          'name' => 'bestfit',
          'description' => '',
        ),
      ),
    ),
    'segmentimage' => 
    array (
      'functionName' => 'segmentImage',
      'description' => 'Analyses the image and identifies units that are similar. available.0x645;',
      'methodDescription' => 'Segments an image',
      'returnType' => '',
      'classname' => 'imagick',
      'method' => 'segmentimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'COLORSPACE',
          'description' => 'One of the COLORSPACE constants.',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'cluster_threshold',
          'description' => 'A percentage describing minimum number of pixels 
       contained in hexedra before it is considered valid.',
        ),
        2 => 
        array (
          'type' => 'float',
          'name' => 'smooth_threshold',
          'description' => 'Eliminates noise from the histogram.',
        ),
        3 => 
        array (
          'type' => 'bool',
          'name' => 'verbose',
          'description' => 'Whether to output detailed information about recognised classes.',
        ),
      ),
    ),
    'separateimagechannel' => 
    array (
      'functionName' => 'separateImageChannel',
      'description' => 'Separates a channel from the image and returns a grayscale image. A channel
   is a particular color component of each pixel in the image.',
      'methodDescription' => 'Separates a channel from the image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'separateimagechannel.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'channel',
          'description' => '',
        ),
      ),
    ),
    'sepiatoneimage' => 
    array (
      'functionName' => 'sepiaToneImage',
      'description' => 'Applies a special effect to the image, similar to the effect achieved
   in a photo darkroom by sepia toning.  Threshold ranges from 0 to
   QuantumRange and is a measure of the extent of the sepia toning. A
   threshold of 80 is a good starting point for a reasonable tone.',
      'methodDescription' => 'Sepia tones an image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'sepiatoneimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'threshold',
          'description' => '',
        ),
      ),
    ),
    'setbackgroundcolor' => 
    array (
      'functionName' => 'setBackgroundColor',
      'description' => 'Sets the object\'s default background color.',
      'methodDescription' => 'Sets the object\'s default background color',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setbackgroundcolor.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'mixed',
          'name' => 'background',
          'description' => '',
        ),
      ),
    ),
    'setcolorspace' => 
    array (
      'functionName' => 'setColorspace',
      'description' => 'Sets the global colorspace value for the object.
   available.0x657;',
      'methodDescription' => 'Set colorspace',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setcolorspace.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'COLORSPACE',
          'description' => 'One of the COLORSPACE constants',
        ),
      ),
    ),
    'setcompression' => 
    array (
      'functionName' => 'setCompression',
      'description' => 'Sets the object\'s default compression type',
      'methodDescription' => 'Sets the object\'s default compression type',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setcompression.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'compression',
          'description' => '',
        ),
      ),
    ),
    'setcompressionquality' => 
    array (
      'functionName' => 'setCompressionQuality',
      'description' => 'Sets the object\'s default compression quality.',
      'methodDescription' => 'Sets the object\'s default compression quality',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setcompressionquality.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'quality',
          'description' => '',
        ),
      ),
    ),
    'setfilename' => 
    array (
      'functionName' => 'setFilename',
      'description' => 'Sets the filename before you read or write an image file.',
      'methodDescription' => 'Sets the filename before you read or write the image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setfilename.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'string',
          'name' => 'filename',
          'description' => '',
        ),
      ),
    ),
    'setfirstiterator' => 
    array (
      'functionName' => 'setFirstIterator',
      'description' => 'Sets the Imagick iterator to the first image.',
      'methodDescription' => 'Sets the Imagick iterator to the first image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setfirstiterator.xml',
      'parameters' => 
      array (
      ),
    ),
    'setfont' => 
    array (
      'functionName' => 'setFont',
      'description' => 'Sets object\'s font property. This method can be used for example to set font for 
   caption: pseudo-format. The font needs to be configured in ImageMagick configuration
   or a file by the name of font must exist. This method should
   not be confused with ImagickDraw::setFont which sets the font
   for a specific ImagickDraw object.
   available.0x637;',
      'methodDescription' => 'Sets font',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setfont.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'string',
          'name' => 'font',
          'description' => 'Font name or a filename',
        ),
      ),
    ),
    'setformat' => 
    array (
      'functionName' => 'setFormat',
      'description' => 'Sets the format of the Imagick object.',
      'methodDescription' => 'Sets the format of the Imagick object',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setformat.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'string',
          'name' => 'format',
          'description' => '',
        ),
      ),
    ),
    'setgravity' => 
    array (
      'functionName' => NULL,
      'description' => NULL,
      'methodDescription' => NULL,
      'returnType' => NULL,
      'classname' => 'imagick',
      'method' => 'setgravity.xml',
      'parameters' => 
      array (
      ),
    ),
    'setimage' => 
    array (
      'functionName' => 'setImage',
      'description' => 'Replaces the current image sequence with the image from replace object.',
      'methodDescription' => 'Replaces image in the object',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'Imagick',
          'name' => 'replace',
          'description' => 'The replace Imagick object',
        ),
      ),
    ),
    'setimagealphachannel' => 
    array (
      'functionName' => 'setImageAlphaChannel',
      'description' => 'Activate or deactivate image alpha channel. The mode 
   is one of the Imagick::ALPHACHANNEL_* constants.
   available.0x638;',
      'methodDescription' => 'Sets image alpha channel',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setimagealphachannel.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'mode',
          'description' => 'One of the Imagick::ALPHACHANNEL_* constants',
        ),
      ),
    ),
    'setimageartifact' => 
    array (
      'functionName' => 'setImageArtifact',
      'description' => 'Associates an artifact with the image. The difference between image properties and 
   image artifacts is that properties are public and artifacts are private.
   available.0x657;',
      'methodDescription' => 'Set image artifact',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setimageartifact.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'string',
          'name' => 'artifact',
          'description' => 'The name of the artifact',
        ),
        1 => 
        array (
          'type' => 'string',
          'name' => 'value',
          'description' => 'The value of the artifact',
        ),
      ),
    ),
    'setimagebackgroundcolor' => 
    array (
      'functionName' => 'setImageBackgroundColor',
      'description' => 'Sets the image background color.',
      'methodDescription' => 'Sets the image background color',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setimagebackgroundcolor.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'mixed',
          'name' => 'background',
          'description' => '',
        ),
      ),
    ),
    'setimagebias' => 
    array (
      'functionName' => 'setImageBias',
      'description' => 'Sets the image bias for any method that convolves an image (e.g. Imagick::ConvolveImage()).',
      'methodDescription' => 'Sets the image bias for any method that convolves an image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setimagebias.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'bias',
          'description' => '',
        ),
      ),
    ),
    'setimageblueprimary' => 
    array (
      'functionName' => 'setImageBluePrimary',
      'description' => 'Sets the image chromaticity blue primary point.',
      'methodDescription' => 'Sets the image chromaticity blue primary point',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setimageblueprimary.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'x',
          'description' => '',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'y',
          'description' => '',
        ),
      ),
    ),
    'setimagebordercolor' => 
    array (
      'functionName' => 'setImageBorderColor',
      'description' => 'Sets the image border color.',
      'methodDescription' => 'Sets the image border color',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setimagebordercolor.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'mixed',
          'name' => 'border',
          'description' => 'The border color',
        ),
      ),
    ),
    'setimagechanneldepth' => 
    array (
      'functionName' => 'setImageChannelDepth',
      'description' => 'Sets the depth of a particular image channel.',
      'methodDescription' => 'Sets the depth of a particular image channel',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setimagechanneldepth.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'channel',
          'description' => '',
        ),
        1 => 
        array (
          'type' => 'int',
          'name' => 'depth',
          'description' => '',
        ),
      ),
    ),
    'setimageclipmask' => 
    array (
      'functionName' => 'setImageClipMask',
      'description' => 'Sets image clip mask from another Imagick object.
   available.0x636;',
      'methodDescription' => 'Sets image clip mask',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setimageclipmask.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'Imagick',
          'name' => 'clip_mask',
          'description' => 'The Imagick object containing the clip mask',
        ),
      ),
    ),
    'setimagecolormapcolor' => 
    array (
      'functionName' => 'setImageColormapColor',
      'description' => 'Sets the color of the specified colormap index.',
      'methodDescription' => 'Sets the color of the specified colormap index',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setimagecolormapcolor.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'index',
          'description' => '',
        ),
        1 => 
        array (
          'type' => 'ImagickPixel',
          'name' => 'color',
          'description' => '',
        ),
      ),
    ),
    'setimagecolorspace' => 
    array (
      'functionName' => 'setImageColorspace',
      'description' => 'Sets the image colorspace.',
      'methodDescription' => 'Sets the image colorspace',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setimagecolorspace.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'colorspace',
          'description' => 'One of the COLORSPACE constants',
        ),
      ),
    ),
    'setimagecompose' => 
    array (
      'functionName' => 'setImageCompose',
      'description' => 'Sets the image composite operator, useful for specifying how
   to composite the image thumbnail when using the
   Imagick::montageImage() method.',
      'methodDescription' => 'Sets the image composite operator',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setimagecompose.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'compose',
          'description' => '',
        ),
      ),
    ),
    'setimagecompression' => 
    array (
      'functionName' => 'setImageCompression',
      'description' => '',
      'methodDescription' => 'Sets the image compression',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setimagecompression.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'compression',
          'description' => 'One of the COMPRESSION constants',
        ),
      ),
    ),
    'setimagecompressionquality' => 
    array (
      'functionName' => 'setImageCompressionQuality',
      'description' => 'Sets the image compression quality.',
      'methodDescription' => 'Sets the image compression quality',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setimagecompressionquality.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'quality',
          'description' => 'The image compression quality as an integer',
        ),
      ),
    ),
    'setimagedelay' => 
    array (
      'functionName' => 'setImageDelay',
      'description' => 'The delay can be set individually for each frame in an image.',
      'methodDescription' => 'Sets the image delay',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setimagedelay.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'delay',
          'description' => 'The amount of time expressed in \'ticks\' that the image should be
       displayed for. For animated GIFs there are 100 ticks per second, so a
       value of 20 would be 20/100 of a second aka 1/5th of a second.',
        ),
      ),
    ),
    'setimagedepth' => 
    array (
      'functionName' => 'setImageDepth',
      'description' => 'Sets the image depth.',
      'methodDescription' => 'Sets the image depth',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setimagedepth.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'depth',
          'description' => '',
        ),
      ),
    ),
    'setimagedispose' => 
    array (
      'functionName' => 'setImageDispose',
      'description' => 'Sets the image disposal method.',
      'methodDescription' => 'Sets the image disposal method',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setimagedispose.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'dispose',
          'description' => '',
        ),
      ),
    ),
    'setimageextent' => 
    array (
      'functionName' => 'setImageExtent',
      'description' => 'Sets the image size (i.e. columns & rows).',
      'methodDescription' => 'Sets the image size',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setimageextent.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'columns',
          'description' => '',
        ),
        1 => 
        array (
          'type' => 'int',
          'name' => 'rows',
          'description' => '',
        ),
      ),
    ),
    'setimagefilename' => 
    array (
      'functionName' => 'setImageFilename',
      'description' => 'Sets the filename of a particular image in a sequence.',
      'methodDescription' => 'Sets the filename of a particular image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setimagefilename.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'string',
          'name' => 'filename',
          'description' => '',
        ),
      ),
    ),
    'setimageformat' => 
    array (
      'functionName' => 'setImageFormat',
      'description' => 'Sets the format of a particular image in a sequence.',
      'methodDescription' => 'Sets the format of a particular image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setimageformat.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'string',
          'name' => 'format',
          'description' => 'String presentation of the image format. Format support
       depends on the ImageMagick installation.',
        ),
      ),
    ),
    'setimagegamma' => 
    array (
      'functionName' => 'setImageGamma',
      'description' => 'Sets the image gamma.',
      'methodDescription' => 'Sets the image gamma',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setimagegamma.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'gamma',
          'description' => '',
        ),
      ),
    ),
    'setimagegravity' => 
    array (
      'functionName' => NULL,
      'description' => NULL,
      'methodDescription' => NULL,
      'returnType' => NULL,
      'classname' => 'imagick',
      'method' => 'setimagegravity.xml',
      'parameters' => 
      array (
      ),
    ),
    'setimagegreenprimary' => 
    array (
      'functionName' => 'setImageGreenPrimary',
      'description' => 'Sets the image chromaticity green primary point.',
      'methodDescription' => 'Sets the image chromaticity green primary point',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setimagegreenprimary.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'x',
          'description' => '',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'y',
          'description' => '',
        ),
      ),
    ),
    'setimageindex' => 
    array (
      'functionName' => 'setImageIndex',
      'description' => 'This method has been deprecated. See
   Imagick::setIteratorIndex.',
      'methodDescription' => 'Set the iterator position',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setimageindex.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'index',
          'description' => 'The position to set the iterator to',
        ),
      ),
    ),
    'setimageinterlacescheme' => 
    array (
      'functionName' => 'setImageInterlaceScheme',
      'description' => 'Sets the image compression.',
      'methodDescription' => 'Sets the image compression',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setimageinterlacescheme.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'interlace_scheme',
          'description' => '',
        ),
      ),
    ),
    'setimageinterpolatemethod' => 
    array (
      'functionName' => 'setImageInterpolateMethod',
      'description' => 'Sets the image interpolate pixel method.',
      'methodDescription' => 'Sets the image interpolate pixel method',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setimageinterpolatemethod.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'method',
          'description' => 'The method is one of the Imagick::INTERPOLATE_* constants',
        ),
      ),
    ),
    'setimageiterations' => 
    array (
      'functionName' => 'setImageIterations',
      'description' => 'Sets the number of iterations an animated image is repeated.',
      'methodDescription' => 'Sets the image iterations',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setimageiterations.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'iterations',
          'description' => 'The number of iterations the image should loop over. Set to \'0\' to loop
       continuously.',
        ),
      ),
    ),
    'setimagematte' => 
    array (
      'functionName' => 'setImageMatte',
      'description' => 'Sets the image matte channel. 
   available.0x629;',
      'methodDescription' => 'Sets the image matte channel',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setimagematte.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'bool',
          'name' => 'matte',
          'description' => 'True activates the matte channel and false disables it.',
        ),
      ),
    ),
    'setimagemattecolor' => 
    array (
      'functionName' => 'setImageMatteColor',
      'description' => 'Sets the image matte color.',
      'methodDescription' => 'Sets the image matte color',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setimagemattecolor.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'mixed',
          'name' => 'matte',
          'description' => '',
        ),
      ),
    ),
    'setimageopacity' => 
    array (
      'functionName' => 'setImageOpacity',
      'description' => 'Sets the image to the specified opacity level. available.0x631;
   This method operates on all channels, which means that for example opacity value
   of 0.5 will set all transparent areas to partially opaque. To add transparency to
   areas that are not already transparent use Imagick::evaluateImage()',
      'methodDescription' => 'Sets the image opacity level',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setimageopacity.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'opacity',
          'description' => 'The level of transparency: 1.0 is fully opaque and 0.0 is fully
       transparent.',
        ),
      ),
    ),
    'setimageorientation' => 
    array (
      'functionName' => 'setImageOrientation',
      'description' => 'Sets the image orientation.',
      'methodDescription' => 'Sets the image orientation',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setimageorientation.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'orientation',
          'description' => 'One of the orientation constants',
        ),
      ),
    ),
    'setimagepage' => 
    array (
      'functionName' => 'setImagePage',
      'description' => 'Sets the page geometry of the image.',
      'methodDescription' => 'Sets the page geometry of the image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setimagepage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'width',
          'description' => '',
        ),
        1 => 
        array (
          'type' => 'int',
          'name' => 'height',
          'description' => '',
        ),
        2 => 
        array (
          'type' => 'int',
          'name' => 'x',
          'description' => '',
        ),
        3 => 
        array (
          'type' => 'int',
          'name' => 'y',
          'description' => '',
        ),
      ),
    ),
    'setimageprofile' => 
    array (
      'functionName' => 'setImageProfile',
      'description' => 'Adds a named profile to the Imagick object.  If a profile
   with the same name already exists, it is replaced. This
   method differs from the Imagick::ProfileImage() method in
   that it does not apply any CMS color profiles.',
      'methodDescription' => 'Adds a named profile to the Imagick object',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setimageprofile.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'string',
          'name' => 'name',
          'description' => '',
        ),
        1 => 
        array (
          'type' => 'string',
          'name' => 'profile',
          'description' => '',
        ),
      ),
    ),
    'setimageproperty' => 
    array (
      'functionName' => 'setImageProperty',
      'description' => 'Sets a named property to the image. available.0x632;',
      'methodDescription' => 'Sets an image property',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setimageproperty.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'string',
          'name' => 'name',
          'description' => '',
        ),
        1 => 
        array (
          'type' => 'string',
          'name' => 'value',
          'description' => '',
        ),
      ),
    ),
    'setimageredprimary' => 
    array (
      'functionName' => 'setImageRedPrimary',
      'description' => 'Sets the image chromaticity red primary point.',
      'methodDescription' => 'Sets the image chromaticity red primary point',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setimageredprimary.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'x',
          'description' => '',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'y',
          'description' => '',
        ),
      ),
    ),
    'setimagerenderingintent' => 
    array (
      'functionName' => 'setImageRenderingIntent',
      'description' => 'Sets the image rendering intent.',
      'methodDescription' => 'Sets the image rendering intent',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setimagerenderingintent.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'rendering_intent',
          'description' => '',
        ),
      ),
    ),
    'setimageresolution' => 
    array (
      'functionName' => 'setImageResolution',
      'description' => 'Sets the image resolution.',
      'methodDescription' => 'Sets the image resolution',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setimageresolution.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'x_resolution',
          'description' => '',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'y_resolution',
          'description' => '',
        ),
      ),
    ),
    'setimagescene' => 
    array (
      'functionName' => 'setImageScene',
      'description' => 'Sets the image scene.',
      'methodDescription' => 'Sets the image scene',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setimagescene.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'scene',
          'description' => '',
        ),
      ),
    ),
    'setimagetickspersecond' => 
    array (
      'functionName' => 'setImageTicksPerSecond',
      'description' => 'Adjust the amount of time that a frame of an animated image is displayed for.',
      'methodDescription' => 'Sets the image ticks-per-second',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setimagetickspersecond.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'ticks_per_second',
          'description' => 'The duration for which an image should be displayed expressed in ticks
       per second.',
        ),
      ),
    ),
    'setimagetype' => 
    array (
      'functionName' => 'setImageType',
      'description' => 'Sets the image type.',
      'methodDescription' => 'Sets the image type',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setimagetype.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'image_type',
          'description' => '',
        ),
      ),
    ),
    'setimageunits' => 
    array (
      'functionName' => 'setImageUnits',
      'description' => 'Sets the image units of resolution.',
      'methodDescription' => 'Sets the image units of resolution',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setimageunits.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'units',
          'description' => '',
        ),
      ),
    ),
    'setimagevirtualpixelmethod' => 
    array (
      'functionName' => 'setImageVirtualPixelMethod',
      'description' => 'Sets the image virtual pixel method.',
      'methodDescription' => 'Sets the image virtual pixel method',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setimagevirtualpixelmethod.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'method',
          'description' => '',
        ),
      ),
    ),
    'setimagewhitepoint' => 
    array (
      'functionName' => 'setImageWhitePoint',
      'description' => 'Sets the image chromaticity white point.',
      'methodDescription' => 'Sets the image chromaticity white point',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setimagewhitepoint.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'x',
          'description' => '',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'y',
          'description' => '',
        ),
      ),
    ),
    'setinterlacescheme' => 
    array (
      'functionName' => 'setInterlaceScheme',
      'description' => 'Sets the image compression.',
      'methodDescription' => 'Sets the image compression',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setinterlacescheme.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'interlace_scheme',
          'description' => '',
        ),
      ),
    ),
    'setiteratorindex' => 
    array (
      'functionName' => 'setIteratorIndex',
      'description' => 'Set the iterator to the position in the image list specified with the index parameter.
  available.0x629;',
      'methodDescription' => 'Set the iterator position',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setiteratorindex.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'index',
          'description' => 'The position to set the iterator to',
        ),
      ),
    ),
    'setlastiterator' => 
    array (
      'functionName' => 'setLastIterator',
      'description' => 'Sets the Imagick iterator to the last image.',
      'methodDescription' => 'Sets the Imagick iterator to the last image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setlastiterator.xml',
      'parameters' => 
      array (
      ),
    ),
    'setoption' => 
    array (
      'functionName' => 'setOption',
      'description' => 'Associates one or more options with the wand.',
      'methodDescription' => 'Set an option',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setoption.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'string',
          'name' => 'key',
          'description' => '',
        ),
        1 => 
        array (
          'type' => 'string',
          'name' => 'value',
          'description' => '',
        ),
      ),
    ),
    'setpage' => 
    array (
      'functionName' => 'setPage',
      'description' => 'Sets the page geometry of the Imagick object.',
      'methodDescription' => 'Sets the page geometry of the Imagick object',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setpage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'width',
          'description' => '',
        ),
        1 => 
        array (
          'type' => 'int',
          'name' => 'height',
          'description' => '',
        ),
        2 => 
        array (
          'type' => 'int',
          'name' => 'x',
          'description' => '',
        ),
        3 => 
        array (
          'type' => 'int',
          'name' => 'y',
          'description' => '',
        ),
      ),
    ),
    'setpointsize' => 
    array (
      'functionName' => 'setPointSize',
      'description' => 'Sets object\'s point size property. This method can be used for example to set font size for 
   caption: pseudo-format.
   available.0x637;',
      'methodDescription' => 'Sets point size',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setpointsize.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'point_size',
          'description' => 'Point size',
        ),
      ),
    ),
    'setresolution' => 
    array (
      'functionName' => NULL,
      'description' => NULL,
      'methodDescription' => NULL,
      'returnType' => NULL,
      'classname' => 'imagick',
      'method' => 'setresolution.xml',
      'parameters' => 
      array (
      ),
    ),
    'setresourcelimit' => 
    array (
      'functionName' => 'setResourceLimit',
      'description' => 'This method is used to modify the resource limits of the underlying ImageMagick
   library.',
      'methodDescription' => 'Sets the limit for a particular resource in megabytes',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setresourcelimit.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'type',
          'description' => 'Refer to the list of resourcetype constants.',
        ),
        1 => 
        array (
          'type' => 'int',
          'name' => 'limit',
          'description' => 'The resource limit. The unit depends on the type of the resource being limited.',
        ),
      ),
    ),
    'setsamplingfactors' => 
    array (
      'functionName' => 'setSamplingFactors',
      'description' => 'Sets the image sampling factors.',
      'methodDescription' => 'Sets the image sampling factors',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setsamplingfactors.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'array',
          'name' => 'factors',
          'description' => '',
        ),
      ),
    ),
    'setsize' => 
    array (
      'functionName' => 'setSize',
      'description' => 'Sets the size of the Imagick object. Set it before you read a raw image
   format such as RGB, GRAY, or CMYK.',
      'methodDescription' => 'Sets the size of the Imagick object',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setsize.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'columns',
          'description' => '',
        ),
        1 => 
        array (
          'type' => 'int',
          'name' => 'rows',
          'description' => '',
        ),
      ),
    ),
    'setsizeoffset' => 
    array (
      'functionName' => 'setSizeOffset',
      'description' => 'Sets the size and offset of the Imagick object. Set it before you read a
   raw image format such as RGB, GRAY, or CMYK.
   available.0x629;',
      'methodDescription' => 'Sets the size and offset of the Imagick object',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'setsizeoffset.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'columns',
          'description' => 'The width in pixels.',
        ),
        1 => 
        array (
          'type' => 'int',
          'name' => 'rows',
          'description' => 'The height in pixels.',
        ),
        2 => 
        array (
          'type' => 'int',
          'name' => 'offset',
          'description' => 'The image offset.',
        ),
      ),
    ),
    'settype' => 
    array (
      'functionName' => 'setType',
      'description' => 'Sets the image type attribute.',
      'methodDescription' => 'Sets the image type attribute',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'settype.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'image_type',
          'description' => '',
        ),
      ),
    ),
    'shadeimage' => 
    array (
      'functionName' => 'shadeImage',
      'description' => 'Shines a distant light on an image to create a three-dimensional effect.
   You control the positioning of the light with azimuth and elevation;
   azimuth is measured in degrees off the x axis and elevation is measured
   in pixels above the Z axis.
   available.0x629;',
      'methodDescription' => 'Creates a 3D effect',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'shadeimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'bool',
          'name' => 'gray',
          'description' => 'A value other than zero shades the intensity of each pixel.',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'azimuth',
          'description' => 'Defines the light source direction.',
        ),
        2 => 
        array (
          'type' => 'float',
          'name' => 'elevation',
          'description' => 'Defines the light source direction.',
        ),
      ),
    ),
    'shadowimage' => 
    array (
      'functionName' => 'shadowImage',
      'description' => 'Simulates an image shadow.',
      'methodDescription' => 'Simulates an image shadow',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'shadowimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'opacity',
          'description' => '',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'sigma',
          'description' => '',
        ),
        2 => 
        array (
          'type' => 'int',
          'name' => 'x',
          'description' => '',
        ),
        3 => 
        array (
          'type' => 'int',
          'name' => 'y',
          'description' => '',
        ),
      ),
    ),
    'sharpenimage' => 
    array (
      'functionName' => 'sharpenImage',
      'description' => 'Sharpens an image. We convolve the image with a Gaussian operator
   of the given radius and standard deviation (sigma). For reasonable
   results, the radius should be larger than sigma. Use a radius of
   0 and Imagick::sharpenImage selects a suitable radius
   for you.',
      'methodDescription' => 'Sharpens an image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'sharpenimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'radius',
          'description' => '',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'sigma',
          'description' => '',
        ),
        2 => 
        array (
          'type' => 'int',
          'name' => 'channel',
          'description' => '',
        ),
      ),
    ),
    'shaveimage' => 
    array (
      'functionName' => 'shaveImage',
      'description' => 'Shaves pixels from the image edges. It allocates the memory necessary for
   the new Image structure and returns a pointer to the new image.',
      'methodDescription' => 'Shaves pixels from the image edges',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'shaveimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'columns',
          'description' => '',
        ),
        1 => 
        array (
          'type' => 'int',
          'name' => 'rows',
          'description' => '',
        ),
      ),
    ),
    'shearimage' => 
    array (
      'functionName' => 'shearImage',
      'description' => 'Slides one edge of an image along the X or Y axis, creating a parallelogram.
   An X direction shear slides an edge along the X axis, while a Y direction
   shear slides an edge along the Y axis.  The amount of the shear is controlled
   by a shear angle.  For X direction shears, x_shear is measured relative to
   the Y axis, and similarly, for Y direction shears y_shear is measured
   relative to the X axis.  Empty triangles left over from shearing the image
   are filled with the background color.',
      'methodDescription' => 'Creating a parallelogram',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'shearimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'mixed',
          'name' => 'background',
          'description' => 'The background color',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'x_shear',
          'description' => 'The number of degrees to shear on the x axis',
        ),
        2 => 
        array (
          'type' => 'float',
          'name' => 'y_shear',
          'description' => 'The number of degrees to shear on the y axis',
        ),
      ),
    ),
    'sigmoidalcontrastimage' => 
    array (
      'functionName' => 'sigmoidalContrastImage',
      'description' => 'See also ImageMagick
   v6 Examples - Image Transformations — Sigmoidal Non-linearity Contrast',
      'methodDescription' => 'Adjusts the contrast of an image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'sigmoidalcontrastimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'bool',
          'name' => 'sharpen',
          'description' => 'If true increase the contrast, if false decrease the contrast.',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'alpha',
          'description' => 'The amount of contrast to apply. 1 is very little, 5 is a significant amount, 20 is extreme.',
        ),
        2 => 
        array (
          'type' => 'float',
          'name' => 'beta',
          'description' => 'Where the midpoint of the gradient will be. This value should be in the range 0 to 1 - mutliplied by the quantum value for ImageMagick.',
        ),
        3 => 
        array (
          'type' => 'int',
          'name' => 'channel',
          'description' => 'Which color channels the contrast will be applied to.',
        ),
      ),
    ),
    'sketchimage' => 
    array (
      'functionName' => 'sketchImage',
      'description' => 'Simulates a pencil sketch. We convolve the image with a Gaussian operator
   of the given radius and standard deviation (sigma). For reasonable
   results, radius should be larger than sigma.  Use a radius of 0 and
   Imagick::sketchImage() selects a suitable radius for you. Angle gives the
   angle of the blurring motion. 
   available.0x629;',
      'methodDescription' => 'Simulates a pencil sketch',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'sketchimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'radius',
          'description' => 'The radius of the Gaussian, in pixels, not counting the center pixel',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'sigma',
          'description' => 'The standard deviation of the Gaussian, in pixels.',
        ),
        2 => 
        array (
          'type' => 'float',
          'name' => 'angle',
          'description' => 'Apply the effect along this angle.',
        ),
      ),
    ),
    'solarizeimage' => 
    array (
      'functionName' => 'solarizeImage',
      'description' => 'Applies a special effect to the image, similar to the effect achieved in
   a photo darkroom by selectively exposing areas of photo sensitive paper
   to light. Threshold ranges from 0 to QuantumRange and is a measure of the
   extent of the solarization.',
      'methodDescription' => 'Applies a solarizing effect to the image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'solarizeimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'threshold',
          'description' => '',
        ),
      ),
    ),
    'sparsecolorimage' => 
    array (
      'functionName' => 'sparseColorImage',
      'description' => 'Given the arguments array containing numeric values this method interpolates
   the colors found at those coordinates across the whole image using sparse_method.
   available.0x645;',
      'methodDescription' => 'Interpolates colors',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'sparsecolorimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'SPARSE_METHOD',
          'description' => 'Refer to this list of sparse method constants',
        ),
        1 => 
        array (
          'type' => 'array',
          'name' => 'arguments',
          'description' => 'An array containing the coordinates. 
       The array is in format array(1,1, 2,45)',
        ),
        2 => 
        array (
          'type' => 'int',
          'name' => 'channel',
          'description' => NULL,
        ),
      ),
    ),
    'spliceimage' => 
    array (
      'functionName' => 'spliceImage',
      'description' => 'Splices a solid color into the image.',
      'methodDescription' => 'Splices a solid color into the image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'spliceimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'width',
          'description' => '',
        ),
        1 => 
        array (
          'type' => 'int',
          'name' => 'height',
          'description' => '',
        ),
        2 => 
        array (
          'type' => 'int',
          'name' => 'x',
          'description' => '',
        ),
        3 => 
        array (
          'type' => 'int',
          'name' => 'y',
          'description' => '',
        ),
      ),
    ),
    'spreadimage' => 
    array (
      'functionName' => 'spreadImage',
      'description' => 'Special effects method that randomly displaces each pixel in a block
   defined by the radius parameter.',
      'methodDescription' => 'Randomly displaces each pixel in a block',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'spreadimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'radius',
          'description' => '',
        ),
      ),
    ),
    'steganoimage' => 
    array (
      'functionName' => 'steganoImage',
      'description' => 'Hides a digital watermark within the image. Recover the hidden watermark
   later to prove that the authenticity of an image. Offset defines the start
   position within the image to hide the watermark.',
      'methodDescription' => 'Hides a digital watermark within the image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'steganoimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'Imagick',
          'name' => 'watermark_wand',
          'description' => '',
        ),
        1 => 
        array (
          'type' => 'int',
          'name' => 'offset',
          'description' => '',
        ),
      ),
    ),
    'stereoimage' => 
    array (
      'functionName' => 'stereoImage',
      'description' => 'Composites two images and produces a single image that is the composite
   of a left and right image of a stereo pair.',
      'methodDescription' => 'Composites two images',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'stereoimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'Imagick',
          'name' => 'offset_wand',
          'description' => '',
        ),
      ),
    ),
    'stripimage' => 
    array (
      'functionName' => 'stripImage',
      'description' => 'Strips an image of all profiles and comments.',
      'methodDescription' => 'Strips an image of all profiles and comments',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'stripimage.xml',
      'parameters' => 
      array (
      ),
    ),
    'swirlimage' => 
    array (
      'functionName' => 'swirlImage',
      'description' => 'Swirls the pixels about the center of the image, where degrees indicates
   the sweep of the arc through which each pixel is moved. You get a more
   dramatic effect as the degrees move from 1 to 360.',
      'methodDescription' => 'Swirls the pixels about the center of the image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'swirlimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'degrees',
          'description' => '',
        ),
      ),
    ),
    'textureimage' => 
    array (
      'functionName' => 'textureImage',
      'description' => 'Repeatedly tiles the texture image across and down the image canvas.',
      'methodDescription' => 'Repeatedly tiles the texture image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'textureimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'Imagick',
          'name' => 'texture_wand',
          'description' => '',
        ),
      ),
    ),
    'thresholdimage' => 
    array (
      'functionName' => 'thresholdImage',
      'description' => 'Changes the value of individual pixels based on the intensity of each pixel
   compared to threshold.  The result is a high-contrast, two color image.',
      'methodDescription' => 'Changes the value of individual pixels based on a threshold',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'thresholdimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'threshold',
          'description' => '',
        ),
        1 => 
        array (
          'type' => 'int',
          'name' => 'channel',
          'description' => '',
        ),
      ),
    ),
    'thumbnailimage' => 
    array (
      'functionName' => 'thumbnailImage',
      'description' => 'Changes the size of an image to the given dimensions and removes any
   associated profiles. The goal is to produce small, low cost thumbnail
   images suited for display on the Web. 

   If True; is given as a third parameter then columns and rows parameters
   are used as maximums for each side. Both sides will be scaled down until
   they match or are smaller than the parameter given for the side.',
      'methodDescription' => 'Changes the size of an image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'thumbnailimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'int',
          'name' => 'columns',
          'description' => 'Image width',
        ),
        1 => 
        array (
          'type' => 'int',
          'name' => 'rows',
          'description' => 'Image height',
        ),
        2 => 
        array (
          'type' => 'bool',
          'name' => 'bestfit',
          'description' => 'Whether to force maximum values',
        ),
        3 => 
        array (
          'type' => 'bool',
          'name' => 'fill',
          'description' => NULL,
        ),
      ),
    ),
    'tintimage' => 
    array (
      'functionName' => 'tintImage',
      'description' => 'Applies a color vector to each pixel in the image. The length of the vector
   is 0 for black and white and at its maximum for the midtones. The vector
   weighing function is f(x)=(1-(4.0*((x-0.5)*(x-0.5)))).',
      'methodDescription' => 'Applies a color vector to each pixel in the image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'tintimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'mixed',
          'name' => 'tint',
          'description' => '',
        ),
        1 => 
        array (
          'type' => 'mixed',
          'name' => 'opacity',
          'description' => '',
        ),
      ),
    ),
    'transformimage' => 
    array (
      'functionName' => 'transformImage',
      'description' => 'A convenience method for setting crop size and the image geometry from strings.
   available.0x629;',
      'methodDescription' => 'Convenience method for setting crop size and the image geometry',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'transformimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'string',
          'name' => 'crop',
          'description' => 'A crop geometry string. This geometry defines a subregion of the image to crop.',
        ),
        1 => 
        array (
          'type' => 'string',
          'name' => 'geometry',
          'description' => 'An image geometry string. This geometry defines the final size of the image.',
        ),
      ),
    ),
    'transparentpaintimage' => 
    array (
      'functionName' => NULL,
      'description' => NULL,
      'methodDescription' => NULL,
      'returnType' => NULL,
      'classname' => 'imagick',
      'method' => 'transparentpaintimage.xml',
      'parameters' => 
      array (
      ),
    ),
    'transposeimage' => 
    array (
      'functionName' => 'transposeImage',
      'description' => 'Creates a vertical mirror image by reflecting the pixels 
   around the central x-axis while rotating them 90-degrees.
   available.0x629;',
      'methodDescription' => 'Creates a vertical mirror image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'transposeimage.xml',
      'parameters' => 
      array (
      ),
    ),
    'transverseimage' => 
    array (
      'functionName' => 'transverseImage',
      'description' => 'Creates a horizontal mirror image by reflecting the pixels around the
   central y-axis while rotating them 270-degrees.
   available.0x629;',
      'methodDescription' => 'Creates a horizontal mirror image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'transverseimage.xml',
      'parameters' => 
      array (
      ),
    ),
    'trimimage' => 
    array (
      'functionName' => 'trimImage',
      'description' => 'Remove edges that are the background color from the image. 
   available.0x629;',
      'methodDescription' => 'Remove edges from the image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'trimimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'fuzz',
          'description' => 'By default target must match a particular pixel color exactly.
       However, in many cases two colors may differ by a small amount.
       The fuzz member of image defines how much tolerance is acceptable
       to consider two colors as the same. This parameter represents the variation
       on the quantum range.',
        ),
      ),
    ),
    'uniqueimagecolors' => 
    array (
      'functionName' => 'uniqueImageColors',
      'description' => 'Discards all but one of any pixel color. 
   available.0x629;',
      'methodDescription' => 'Discards all but one of any pixel color',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'uniqueimagecolors.xml',
      'parameters' => 
      array (
      ),
    ),
    'unsharpmaskimage' => 
    array (
      'functionName' => 'unsharpMaskImage',
      'description' => 'Sharpens an image. We convolve the image with a Gaussian operator of the given
   radius and standard deviation (sigma). For reasonable results, radius should be
   larger than sigma.  Use a radius of 0 and Imagick::UnsharpMaskImage() selects a
   suitable radius for you.',
      'methodDescription' => 'Sharpens an image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'unsharpmaskimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'radius',
          'description' => '',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'sigma',
          'description' => '',
        ),
        2 => 
        array (
          'type' => 'float',
          'name' => 'amount',
          'description' => '',
        ),
        3 => 
        array (
          'type' => 'float',
          'name' => 'threshold',
          'description' => '',
        ),
        4 => 
        array (
          'type' => 'int',
          'name' => 'channel',
          'description' => '',
        ),
      ),
    ),
    'valid' => 
    array (
      'functionName' => 'valid',
      'description' => 'Checks if the current item is valid.',
      'methodDescription' => 'Checks if the current item is valid',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'valid.xml',
      'parameters' => 
      array (
      ),
    ),
    'vignetteimage' => 
    array (
      'functionName' => 'vignetteImage',
      'description' => 'Softens the edges of the image in vignette style. 
   available.0x629;',
      'methodDescription' => 'Adds vignette filter to the image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'vignetteimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'blackPoint',
          'description' => 'The black point.',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'whitePoint',
          'description' => 'The white point',
        ),
        2 => 
        array (
          'type' => 'int',
          'name' => 'x',
          'description' => 'X offset of the ellipse',
        ),
        3 => 
        array (
          'type' => 'int',
          'name' => 'y',
          'description' => 'Y offset of the ellipse',
        ),
      ),
    ),
    'waveimage' => 
    array (
      'functionName' => 'waveImage',
      'description' => 'Applies a wave filter to the image. 
   available.0x629;',
      'methodDescription' => 'Applies wave filter to the image',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'waveimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'float',
          'name' => 'amplitude',
          'description' => 'The amplitude of the wave.',
        ),
        1 => 
        array (
          'type' => 'float',
          'name' => 'length',
          'description' => 'The length of the wave.',
        ),
      ),
    ),
    'whitethresholdimage' => 
    array (
      'functionName' => 'whiteThresholdImage',
      'description' => 'Is like Imagick::ThresholdImage() but force all pixels above the threshold
   into white while leaving all pixels below the threshold unchanged.',
      'methodDescription' => 'Force all pixels above the threshold into white',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'whitethresholdimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'mixed',
          'name' => 'threshold',
          'description' => '',
        ),
      ),
    ),
    'writeimage' => 
    array (
      'functionName' => 'writeImage',
      'description' => 'Writes an image to the specified filename. If the filename parameter is NULL,
   the image is written to the filename set by Imagick::readImage() or
   Imagick::setImageFilename().',
      'methodDescription' => 'Writes an image to the specified filename',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'writeimage.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'string',
          'name' => 'filename',
          'description' => 'Filename where to write the image. The extension of the filename
       defines the type of the file. 
       Format can be forced regardless of file extension using format: prefix,
       for example "jpg:test.png".',
        ),
      ),
    ),
    'writeimagefile' => 
    array (
      'functionName' => 'writeImageFile',
      'description' => 'Writes the image sequence to an open filehandle. The handle must be opened with
   for example fopen. available.0x636;',
      'methodDescription' => 'Writes an image to a filehandle',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'writeimagefile.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'resource',
          'name' => 'filehandle',
          'description' => 'Filehandle where to write the image',
        ),
      ),
    ),
    'writeimages' => 
    array (
      'functionName' => 'writeImages',
      'description' => 'Writes an image or image sequence.',
      'methodDescription' => 'Writes an image or image sequence',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'writeimages.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'string',
          'name' => 'filename',
          'description' => '',
        ),
        1 => 
        array (
          'type' => 'bool',
          'name' => 'adjoin',
          'description' => '',
        ),
      ),
    ),
    'writeimagesfile' => 
    array (
      'functionName' => 'writeImagesFile',
      'description' => 'Writes all image frames into an open filehandle. This method can be used to write
   animated gifs or other multiframe images into open filehandle.
   available.0x636;',
      'methodDescription' => 'Writes frames to a filehandle',
      'returnType' => 'true on success, false on error;',
      'classname' => 'imagick',
      'method' => 'writeimagesfile.xml',
      'parameters' => 
      array (
        0 => 
        array (
          'type' => 'resource',
          'name' => 'filehandle',
          'description' => 'Filehandle where to write the images',
        ),
      ),
    ),
  ),
);

    private $category;
    private $example;

    function __construct($category, $example) {
        $this->category = strtolower($category);
        $this->example = strtolower($example);
    }

    function showDoc() {
        if (isset($this->manualEntries[$this->category][$this->example]) == false) {
            return "";
        }

        $manualEntry = $this->manualEntries[$this->category][$this->example];
        
        $output = '';
        //$output = '<table>';
        //$output .= "<tr><td colspan='3'>".$manualEntry['functionName']."</td></tr>";
        //$output .= "<tr><td colspan='3'>".$manualEntry['description']."</td></tr>";

        $output .= $manualEntry['description'];
        
      
    
        if (count($manualEntry['parameters'])) {
            $output .= "<h5>Parameters</h5>";

            $output .= "<table class='smallPadding'><tbody>";

            foreach ($manualEntry['parameters'] as $parameter) {
                $output .= "<tr>";
                    $output .= "<td class='smallPadding' valign='top'>".$parameter['name']."</td>";
                    $output .= "<td class='smallPadding' valign='top'>".$parameter['type']."</td>";
                    $output .= "<td class='smallPadding' valign='top'>".$parameter['description']."</td>";
                $output .= "</tr>";
            }

            $output .= "</tbody></table>";
        }


        return $output; 
    }

}