<?php


namespace ImagickDemo\ControlElement;

use Intahwebz\Request;

class VirtualPixel implements ControlElement {

    private $virtualPixelType = \Imagick::VIRTUALPIXELMETHOD_EDGE;
    
    const virtualPixelVar = 'virtualPixel';
    
    private $virtualPixelName = 'Edge';

    private $virtualPixelTypes = [
        \Imagick::VIRTUALPIXELMETHOD_BACKGROUND => 'Background color',
        \Imagick::VIRTUALPIXELMETHOD_CONSTANT => 'Constant',
        \Imagick::VIRTUALPIXELMETHOD_EDGE  => 'Edge',
        \Imagick::VIRTUALPIXELMETHOD_MIRROR  => 'Mirror',
        \Imagick::VIRTUALPIXELMETHOD_TILE  => 'Tile',
        \Imagick::VIRTUALPIXELMETHOD_TRANSPARENT  => 'Transparent',
        \Imagick::VIRTUALPIXELMETHOD_MASK  => 'Mask',
        \Imagick::VIRTUALPIXELMETHOD_BLACK  => 'Black',
        \Imagick::VIRTUALPIXELMETHOD_GRAY  => 'Gray',
        \Imagick::VIRTUALPIXELMETHOD_WHITE  => 'White',
        \Imagick::VIRTUALPIXELMETHOD_HORIZONTALTILE  => 'Horizontal tile',
        \Imagick::VIRTUALPIXELMETHOD_VERTICALTILE  => 'Vertical tile',
    ];
    
    function __construct(Request $request) {
        $this->virtualPixelName = $request->getVariable(self::virtualPixelVar, $this->virtualPixelName);
        
        foreach ($this->virtualPixelTypes as $noiseType => $value) {
            if (strcmp($this->virtualPixelName, $value) === 0 || $this->virtualPixelName == null) {
                $this->virtualPixelType = $noiseType;
            }
        }
        //Zendcode eats braces
    }

    /**
     * @return array
     */
    function getParams() {
        return [self::virtualPixelVar => $this->virtualPixelName];
    }

    /**
     * @return string
     */
    function renderFormElement() {
        $output = "<tr>
                <td class='standardCell'>Virtual pixel type
                </td>
                <td class='standardCell valueCell'> ";

        $output .= "<select name='".self::virtualPixelVar."'>";

        foreach ($this->virtualPixelTypes as $noiseType => $noiseName) {
            $selected = '';
            if (strcmp($noiseName, $this->virtualPixelName) === 0) {
                $selected = "selected='selected'";
            }
            $output .= "<option value='".$noiseName."' $selected>$noiseName</option>";
        }

        $output .= "</select>
                    </td>
                <td class='standardCell'>
                </td>
            </tr>";

        return $output;
    }

    function getVirtualPixelType() {
        return $this->virtualPixelType;
    }
}

 