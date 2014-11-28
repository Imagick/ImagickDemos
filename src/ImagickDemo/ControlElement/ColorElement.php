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


        $sValue = safeText($this->value);
        $fillPixel = new \ImagickPixel($this->value);
        $fillColor = $fillPixel->getcolor();
        $fillString = sprintf("rgb(%d, %d, %d)", $fillColor['r'], $fillColor['g'], $fillColor['b']);
        $fillStringHex = sprintf("%02x%02x%02x", $fillColor['r'], $fillColor['g'], $fillColor['b']);

        $input = "<input type='text' class='inputValue' id='".$this->getVariableName()."' name='".$this->getVariableName()."' value='$sValue'  />";

        $color = "<span id='".$this->getVariableName()."Selector' data-color='0x$fillStringHex' style='display: inline-block; border: 1px solid #000; padding: 0px;'>
                        <span style='background-color: $fillString; margin: 2px; width: 20px; display: inline-block;'>
                            &nbsp;
                        </span>
                    </span>";


        $text = "<div class='row'>
    <div class='col-sm-".self::FIRST_ELEMENT_SIZE." ".self::FIRST_ELEMENT_CLASS."'>
        %s
    </div>
    <div class='col-sm-2'>
        %s
    </div>
    <div class='col-sm-".self::MIDDLE_ELEMENT_SIZE." ".self::MIDDLE_ELEMENT_CLASS."'>
            %s
    </div>
    
</div>";

        return sprintf(
            $text,
            $this->getDisplayName(),
            $color,
            $input
        );
    }
    
}



 