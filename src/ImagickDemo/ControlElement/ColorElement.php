<?php


namespace ImagickDemo\ControlElement;

use Intahwebz\Request;

abstract class ColorElement implements ControlElement {

    abstract protected function getDefault();
    abstract protected function getVariableName();
    abstract protected function getDisplayName();

    private $value;

    function __construct(Request $request) {
        
        $value = $this->getDefault();
        $nextColor = $request->getVariable($this->getVariableName(), $value);
        
        try {
            new \ImagickPixel($nextColor);
            //This code is only reached if ImagePixel parses the color
            //and thinks it is valid
            $value = $nextColor;
        }
        catch (\Exception $e) {
            //$this->errors[] = "Color '$nextColor' for $colorType was not valid.";
            //TODO Add error message
        }

        $this->value = $value;
        //zendcode eats braces
    }

    protected function getValue() {
        return $this->value;
    }
    
    function getParams() {
        return [
            $this->getVariableName() => $this->value,
        ];
    }

    function renderFormElement() {
        $output = "";

        //171829
        // data-color='17182b'

        $sValue = safeText($this->value);
        $fillPixel = new \ImagickPixel($this->value);
        $fillColor = $fillPixel->getcolor();
        $fillString = sprintf("rgb(%d, %d, %d)", $fillColor['r'], $fillColor['g'], $fillColor['b']);
        $fillStringHex = sprintf("%02x%02x%02x", $fillColor['r'], $fillColor['g'], $fillColor['b']);

        $output .= "

            <tr>
                <td class='standardCell'>
                    ".$this->getDisplayName()."
                </td>
                <td class='standardCell'>
                    <input type='text' id='".$this->getVariableName()."' name='".$this->getVariableName()."' value='$sValue'  />
                </td>
                <td class='standardCell'>
                    <span id='".$this->getVariableName()."Selector' data-color='0x$fillStringHex' style='display: inline-block; border: 1px solid #000; padding: 0px;'>
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



 