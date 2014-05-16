<?php


namespace ImagickDemo\ControlElement;

use Intahwebz\Request;

class ColorSpace implements ControlElement {

    private $colorSpaceType = \Imagick::COLORSPACE_RGB;
    
    const colorSpaceVar = 'colorSpace';
    
    private $colorSpaceName = 'Edge';

    This is not useful - all of the things below require radically different 
    variables
    
    private $colorSpaceTypes = [

        \Imagick::DISTORTION_AFFINE => '',
        \Imagick::DISTORTION_AFFINEPROJECTION => '',
        \Imagick::DISTORTION_ARC => '',
        \Imagick::DISTORTION_BILINEAR => '',
        \Imagick::DISTORTION_PERSPECTIVE => '',
        \Imagick::DISTORTION_PERSPECTIVEPROJECTION => '',
        \Imagick::DISTORTION_SCALEROTATETRANSLATE => '',
        \Imagick::DISTORTION_POLYNOMIAL => '',
        \Imagick::DISTORTION_POLAR => '',
        \Imagick::DISTORTION_DEPOLAR => '',
        \Imagick::DISTORTION_BARREL => '',
        \Imagick::DISTORTION_BARRELINVERSE => '',
        \Imagick::DISTORTION_SHEPARDS => '',
        \Imagick::DISTORTION_SENTINEL => '',
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

 