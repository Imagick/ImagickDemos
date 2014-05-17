<?php


namespace ImagickDemo\ControlElement;

use Intahwebz\Request;

/*

$output .= <<< END

        <div style='height=20px'>&nbsp;
        </div>

        Colors can be: 
        <ul>
            <li>RGB number - #ff00ff </li>
            <li>RGBA number - #ff00ff7f</li>
            <li>RGB string - rgb(225, 225, 225) </li>
            <li>RGBA string - 'rgba(90%, 20%, 20%, 0.75)' </li>
            <li>HSL string - hsl(50, 200, 128)</li>
            <li><a href='http://www.imagemagick.org/script/color.php'>Color string</a> - 'pink', 'DodgerBlue1' </li>
        </ul>
END;

*/

class StrokeColor implements ControlElement {

    private $strokeColor = 'rgb(0, 0, 0)';


    const strokeColorName = 'strokeColor';

    function __construct(Request $request) {
        $nextColor = $request->getVariable(self::strokeColorName, $this->strokeColor);
        try {
            new \ImagickPixel($nextColor);
            $this->strokeColor = $nextColor;
        }
        catch (\Exception $e) {
            //$this->errors[] = "Color '$nextColor' for $colorType was not valid.";
            //TODO Add error message
        }
        //zendcode eats braces
    }

    /**
     * @return string
     */
    public function getStrokeColor() {
        return $this->strokeColor;
    }

    /**
     * @return array
     */
    function getParams() {
        return [
            self::strokeColorName => $this->strokeColor,
        ];
    }

    /**
     * @return string
     */
    function renderFormElement() {
        $output = "";

        $sFillColor = safeText($this->strokeColor);
        $fillPixel = new \ImagickPixel($this->strokeColor);
        $fillColor = $fillPixel->getcolor();
        $fillString = sprintf("rgb(%d, %d, %d)", $fillColor['r'], $fillColor['g'], $fillColor['b']); 
        $fillStringHex = sprintf("%02x%02x%02x", $fillColor['r'], $fillColor['g'], $fillColor['b']);

        $output .= "

            <tr>
                <td class='standardCell'>
                    Stroke
                </td>
                <td class='standardCell'>
                    <input type='text' id='strokeColor' name='".self::strokeColorName."' value='$sFillColor'  />
                    
                    <span id='strokeColorSelector' data-color='$fillStringHex' style='display: inline-block; border: 1px solid #000; padding: 0px;'>
                        <span style='background-color: $fillString; margin: 2px; width: 20px; display: inline-block;'>
                            &nbsp;
                        </span>
                    </span>
                </td>
            </tr>
";

        return $output;
    }
}

 