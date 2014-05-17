<?php


namespace ImagickDemo\ControlElement;

use Intahwebz\Request;

class DistortionExample implements ControlElement {

    private $distortionType = \Imagick::DISTORTION_AFFINE;
    
    const distortionName = 'distortion';
    
    private $defaultString = 'Affine';

    //TODO Figure out how to support distortion 

    private $colorSpaceTypes = [
        \Imagick::DISTORTION_AFFINE => 'Affine',
        \Imagick::DISTORTION_AFFINEPROJECTION => 'Affine projection',
        \Imagick::DISTORTION_ARC => 'Arc',
        \Imagick::DISTORTION_BILINEAR => 'Bilinear',
        \Imagick::DISTORTION_PERSPECTIVE => 'Perspective',
        \Imagick::DISTORTION_PERSPECTIVEPROJECTION => 'Perspective Projection',
        \Imagick::DISTORTION_SCALEROTATETRANSLATE => 'Scale rotate translate',
        \Imagick::DISTORTION_POLYNOMIAL => 'Polynomial',
        \Imagick::DISTORTION_POLAR => 'Polar',
        \Imagick::DISTORTION_DEPOLAR => 'Depolar',
        \Imagick::DISTORTION_BARREL => 'Barrel',
        \Imagick::DISTORTION_BARRELINVERSE => 'Barrel inverse',
        \Imagick::DISTORTION_SHEPARDS => 'Shepards',
        \Imagick::DISTORTION_SENTINEL => 'Sentinel',
    ];
    
    function __construct(Request $request) {
        $this->defaultString = $request->getVariable(self::distortionName, $this->defaultString);
        
        foreach ($this->colorSpaceTypes as $noiseType => $value) {
            if (strcmp($this->defaultString, $value) === 0 || $this->defaultString == null) {
                $this->distortionType = $noiseType;
            }
        }
        //blah 
    }

    /**
     * @return array
     */
    function getParams() {
        return [self::distortionName => $this->defaultString];
    }

    /**
     * @return string
     */
    function renderFormElement() {
        $output = "<tr>
                <td class='standardCell'>Distortion type
                </td>
                <td class='standardCell'> ";

        $output .= "<select name='".self::distortionName."'>";

        foreach ($this->colorSpaceTypes as $noiseType => $noiseName) {
            $selected = '';
            if (strcmp($noiseName, $this->defaultString) === 0) {
                $selected = "selected='selected'";
            }
            $output .= "<option value='".$noiseName."' $selected>$noiseName</option>";
        }

        $output .= "</select>
                    </td>
            </tr>";

        return $output;
    }

    function getDistortionType() {
        return $this->distortionType;
    }
}

 