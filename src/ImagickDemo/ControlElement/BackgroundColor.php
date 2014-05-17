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

class BackgroundColor implements ControlElement {

    private $backgroundColor = "rgb(225, 225, 225)";

    const backgroundName = 'background';

    function __construct(Request $request) {
        $nextColor = $request->getVariable(self::backgroundName, $this->backgroundColor);
        try {
            new \ImagickPixel($nextColor);
            $this->backgroundColor = $nextColor;
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
    public function getBackgroundColor() {
        return $this->backgroundColor;
    }

    /**
     * @return array
     */
    function getParams() {
        return [
            self::backgroundName => $this->backgroundColor,
        ];
    }

    /**
     * @return string
     */
    function renderFormElement() {
        $output = "";

        $sFillColor = safeText($this->backgroundColor);
        $fillPixel = new \ImagickPixel($this->backgroundColor);
        $fillColor = $fillPixel->getcolor();
        $fillString = sprintf("rgb(%d, %d, %d)", $fillColor['r'], $fillColor['g'], $fillColor['b']); 
        $fillStringHex = sprintf("%02x%02x%02x", $fillColor['r'], $fillColor['g'], $fillColor['b']);

        $output .= "

            <tr>
                <td class='standardCell'>
                    Background
                </td>
                <td class='standardCell'>
                    <input type='text' id='backgroundColor' name='".self::backgroundName."' value='$sFillColor'  />
                    
                    <span id='backgroundColorSelector' data-color='$fillStringHex' style='display: inline-block; border: 1px solid #000; padding: 0px;'>
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

 