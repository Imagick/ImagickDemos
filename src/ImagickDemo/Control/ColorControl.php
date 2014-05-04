<?php


namespace ImagickDemo\Control;

use Intahwebz\Request;

class ColorControl implements \ImagickDemo\Control {

    private $backgroundColor = "SteelBlue2";
    private $strokeColor = 'DarkSlateGrey';
    private $fillColor = 'LightCoral';
    
    private $imageBaseURL;

    function __construct(Request $request, $imageBaseURL) {
        $this->backgroundColor= $request->getVariable('backgroundColor', $this->backgroundColor);
        $this->strokeColor = $request->getVariable('strokeColor', $this->strokeColor);
        $this->fillColor = $request->getVariable('fillColor', $this->fillColor);
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
        $output .= "backgroundColor = ".$this->backgroundColor."<br/>";
        $output .= "strokeColor = ".$this->strokeColor."<br/>";
        $output .= "fillColor = ".$this->fillColor."<br/>";
        $output .= "<button type='submit' class='btn btn-default'>Update</button>";
        $output .= "</form>";

        return $output;
    }
}

 