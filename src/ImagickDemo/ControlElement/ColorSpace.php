<?php


namespace ImagickDemo\ControlElement;

use Intahwebz\Request;

class ColorSpace implements ControlElement {

    private $colorSpaceType = \Imagick::COLORSPACE_RGB;
    
    const colorSpaceVar = 'colorSpace';
    
    private $colorSpaceName = 'Edge';

    private $colorSpaceTypes = [
        \Imagick::COLORSPACE_RGB => 'RGB',
        \Imagick::COLORSPACE_GRAY => 'Gray',
        \Imagick::COLORSPACE_TRANSPARENT => 'Transparent',
        \Imagick::COLORSPACE_OHTA  => 'OHTA',
        \Imagick::COLORSPACE_LAB  => 'LAB',
        \Imagick::COLORSPACE_XYZ => 'XYZ',
        \Imagick::COLORSPACE_YCBCR => 'YCBCR',
        \Imagick::COLORSPACE_YCC => 'YCC',
        \Imagick::COLORSPACE_YIQ => 'YIC',
        \Imagick::COLORSPACE_YPBPR => 'YPBPR',
        \Imagick::COLORSPACE_YUV => 'YUV',
        \Imagick::COLORSPACE_CMYK => 'CMYK',
        \Imagick::COLORSPACE_SRGB  => 'SRGB',
        \Imagick::COLORSPACE_HSB => 'HSB',
        \Imagick::COLORSPACE_HSL => 'HSL',
        \Imagick::COLORSPACE_HWB  => 'HWB',
        \Imagick::COLORSPACE_REC601LUMA  => 'REC601LUMA',
        \Imagick::COLORSPACE_REC709LUMA => 'REC709LUMA',
        \Imagick::COLORSPACE_LOG => 'LOG',
        \Imagick::COLORSPACE_CMY => 'CMY',
    ];
    
    function __construct(Request $request) {
        $this->colorSpaceName = $request->getVariable(self::colorSpaceVar, $this->colorSpaceName);
        
        foreach ($this->colorSpaceTypes as $noiseType => $value) {
            if (strcmp($this->colorSpaceName, $value) === 0 || $this->colorSpaceName == null) {
                $this->colorSpaceType = $noiseType;
            }
        }
        //blah 
    }

    /**
     * @return array
     */
    function getParams() {
        return [self::colorSpaceVar => $this->colorSpaceName];
    }

    /**
     * @return string
     */
    function renderFormElement() {
        $output = "<tr>
                <td class='standardCell'>Colorspace
                </td>
                <td class='standardCell'> ";

        $output .= "<select name='".self::colorSpaceVar."'>";

        foreach ($this->colorSpaceTypes as $noiseType => $noiseName) {
            $selected = '';
            if (strcmp($noiseName, $this->colorSpaceName) === 0) {
                $selected = "selected='selected'";
            }
            $output .= "<option value='".$noiseName."' $selected>$noiseName</option>";
        }

        $output .= "</select>
                    </td>
            </tr>";

        return $output;
    }

    function getColorSpaceType() {
        return $this->colorSpaceType;
    }
}

 