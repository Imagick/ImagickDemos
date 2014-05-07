<?php


namespace ImagickDemo\Control;

use Intahwebz\Request;

class ColorControl implements \ImagickDemo\Control {

    private $backgroundColor = "rgb(225, 225, 225)";
    private $strokeColor = 'rgb(0, 0, 0)';
    private $fillColor = 'DodgerBlue2';

    private $imageBaseURL;

    function __construct(Request $request, $imageBaseURL) {
        $this->backgroundColor = $request->getVariable('backgroundColor', $this->backgroundColor);
        $this->strokeColor = $request->getVariable('strokeColor', $this->strokeColor);
        $this->fillColor = $request->getVariable('fillColor', $this->fillColor);
        
        try {
            $this->backgroundColor = $request->getVariable('backgroundColor', $this->backgroundColor);
            new \ImagickPixel($this->backgroundColor);
            
            $this->strokeColor = $request->getVariable('strokeColor', $this->strokeColor);
            new \ImagickPixel($this->strokeColor);
            
            $this->fillColor = $request->getVariable('fillColor', $this->fillColor);
            new \ImagickPixel($this->fillColor);
        }
        catch (\Exception $e) {
            //TODO - error message about colors not being valid
            
        }

        $this->imageBaseURL = $imageBaseURL;
    }

    function getURL() {
        return sprintf("<img src='%s?%s' />", $this->imageBaseURL, $this->getParamString() );
    }
    
    /**
     * @return string
     */
    public function getBackgroundColor() {
        return $this->backgroundColor;
    }

    /**
     * @return string
     */
    public function getFillColor() {
        return $this->fillColor;
    }

    /**
     * @return string
     */
    public function getStrokeColor() {
        return $this->strokeColor;
    }
    
    function getParams() {
        return [
            'backgroundColor' => $this->backgroundColor,
            'strokeColor' => $this->strokeColor,
            'fillColor' => $this->fillColor
        ];
    }

    function getParamString() {
        return 'backgroundColor='.$this->backgroundColor.
            '&strokeColor='.$this->strokeColor.
            '&fillColor='.$this->fillColor;
    }
    
    function render() {
        $output = "";
        $output .= "<form method='GET' accept-charset='utf-8'>";
        $output .= "backgroundColor = <input type='text' name='backgroundColor' value='".safeText($this->backgroundColor)."'/><br/>";
        $output .= "strokeColor = <input type='text' name='strokeColor' value='".safeText($this->strokeColor)."'/> <br/>";
        $output .= "fillColor = <input type='text' name='fillColor' value='".safeText($this->fillColor)."' /><br/>";
        
        
        $output .= "<button type='submit' class='btn btn-default'>Update</button>";
        $output .= "</form>";

        return $output;
    }
}

 