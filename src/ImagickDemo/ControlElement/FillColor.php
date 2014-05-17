<?php


namespace ImagickDemo\ControlElement;

use Intahwebz\Request;


class FillColor implements ControlElement {

    private $fillColor = 'DodgerBlue2';


    const fillColorName = 'fillColor';

    function __construct(Request $request) {
        $nextColor = $request->getVariable(self::fillColorName, $this->fillColor);
        try {
            new \ImagickPixel($nextColor);
            $this->fillColor = $nextColor;
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
    public function getFillColor() {
        return $this->fillColor;
    }

    /**
     * @return array
     */
    function getParams() {
        return [
            self::fillColorName => $this->fillColor,
        ];
    }

    /**
     * @return string
     */
    function renderFormElement() {
        $output = "";

        $sFillColor = safeText($this->fillColor);
        $fillPixel = new \ImagickPixel($this->fillColor);
        $fillColor = $fillPixel->getcolor();
        $fillString = sprintf("rgb(%d, %d, %d)", $fillColor['r'], $fillColor['g'], $fillColor['b']); 
        $fillStringHex = sprintf("%02x%02x%02x", $fillColor['r'], $fillColor['g'], $fillColor['b']);

        $output .= "

            <tr>
                <td class='standardCell'>
                    Fill
                </td>
                <td class='standardCell'>
                    <input type='text' id='fillColor' name='".self::fillColorName."' value='$sFillColor'  />
                    
                    <span id='fillColorSelector' data-color='$fillStringHex' style='display: inline-block; border: 1px solid #000; padding: 0px;'>
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

 