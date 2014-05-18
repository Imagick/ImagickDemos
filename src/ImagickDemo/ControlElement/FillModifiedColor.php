<?php


namespace ImagickDemo\ControlElement;

use Intahwebz\Request;


class FillModifiedColor implements ControlElement {

    private $fillModifiedColor = 'LightCoral';

    const fillModifiedColorName = 'fillModifiedColor';

    function __construct(Request $request) {
        $nextColor = $request->getVariable(self::fillModifiedColorName, $this->fillModifiedColor);
        try {
            new \ImagickPixel($nextColor);
            $this->fillModifiedColor = $nextColor;
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
    public function getFillModifiedColor() {
        return $this->fillModifiedColor;
    }

    /**
     * @return array
     */
    function getParams() {
        return [
            self::fillModifiedColorName => $this->fillModifiedColor,
        ];
    }

    /**
     * @return string
     */
    function renderFormElement() {
        $output = "";

        $sFillColor = safeText($this->fillModifiedColor);
        $fillPixel = new \ImagickPixel($this->fillModifiedColor);
        $fillColor = $fillPixel->getcolor();
        $fillString = sprintf("rgb(%d, %d, %d)", $fillColor['r'], $fillColor['g'], $fillColor['b']); 
        $fillStringHex = sprintf("%02x%02x%02x", $fillColor['r'], $fillColor['g'], $fillColor['b']);

        $output .= "

            <tr>
                <td class='standardCell'>
                    Fill modified
                </td>
                <td class='standardCell'>
                    <input type='text' id='fillModifiedColor' name='".self::fillModifiedColorName."' value='$sFillColor'  />
                    
                    <span id='fillModifiedColorSelector' data-color='$fillStringHex' style='display: inline-block; border: 1px solid #000; padding: 0px;'>
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

 