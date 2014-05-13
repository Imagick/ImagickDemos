<?php


namespace ImagickDemo\Control;

use Intahwebz\Request;

class ColorControl implements \ImagickDemo\Control {

    private $backgroundColor = "rgb(225, 225, 225)";
    private $strokeColor = 'rgb(0, 0, 0)';
    private $fillColor = 'DodgerBlue2';

    private $imageBaseURL;
    
    private $errors = [];

    function __construct(Request $request, $imageBaseURL) {

        $colorTypes = ['backgroundColor', 'strokeColor', 'fillColor'];
        
        foreach ($colorTypes as $colorType) {
            $nextColor = $request->getVariable($colorType, $this->{$colorType});
            try {
                new \ImagickPixel($nextColor);
                $this->{$colorType} = $nextColor;
            }
            catch (\Exception $e) {
                $this->errors[] = "Color '$nextColor' for $colorType was not valid.";
            }
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
    
    function renderForm() {
        $output = "";
        $output .= "<form method='GET' accept-charset='utf-8'>";


        $sStrokeColor = safeText($this->strokeColor);
        $sFillColor = safeText($this->fillColor);

        $fillPixel = new \ImagickPixel($this->fillColor);
        $fillString = $fillPixel->getcolor();
        $fillString = sprintf("rgb(%d, %d, %d)", $fillString['r'], $fillString['g'], $fillString['b']); 
         
        
        $sBackgroundColor = safeText($this->backgroundColor);
        
        
        if (count($this->errors)) {
            foreach ($this->errors as $error) {
                $output .= $error."<br/>";
            }
        }

        $output .= <<< END
        
        <table>
            <tr>
                <td class='standardCell'>
                    Background
                </td>
                <td class='standardCell'>
                    <input type='text' name='backgroundColor' value='$sBackgroundColor'/>
                </td>
            </tr>
            
            
            <tr>
                <td class='standardCell'>
                    Stroke
                </td>
                <td class='standardCell'>
                    <input type='text' name='strokeColor' value='$sStrokeColor'/>
                </td>
            </tr>
            
            <tr>
                <td class='standardCell'>
                    Fill
                </td>
                <td class='standardCell'>
                    <input type='text' id='fillColor' name='fillColor' value='$sFillColor' />
                    
                    <span id='fillColorSelector' style='display: inline-block; border: 1px solid #000; padding: 0px;'>
                        <span style='background-color: $fillString; margin: 2px; width: 20px; display: inline-block;'>
                            &nbsp;
                        </span>
                    </span>
                </td>
            </tr>
            
            <tr>
                <td class='standardCell'>
                </td>
                <td class='standardCell'>
                    <button type='submit' class='btn btn-default'>Update</button>
                </td>
            </tr>

        </table>
        </form>

END;
        
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

        
        
        return $output;
    }
}

 