<?php


namespace ImagickDemo\Control;

use Intahwebz\Request;

class TintControl implements \ImagickDemo\Control {

    private $r = "100";
    private $g = '100';
    private $b = '100';
    private $a = '50';

    private $imageBaseURL;
    
    private $errors = [];

    function __construct(Request $request, $imageBaseURL) {

        $colorTypes = ['r', 'g', 'b'];
        
        foreach ($colorTypes as $colorType) {
            $this->{$colorType} = $request->getVariable($colorType, $this->{$colorType});
            $this->{$colorType} = intval($this->{$colorType});
            if ($this->{$colorType} < 0) {
                $this->{$colorType} = 0;
            }
            if ($this->{$colorType} > 255) {
                $this->{$colorType} = 255;
            }
        }

        $this->a = intval($request->getVariable('a', $this->a));
        
        if ($this->a < 0) {
            $this->a = 0;
        }
        if ($this->a > 100) {
            $this->a = 100;
        }

        $this->imageBaseURL = $imageBaseURL;
    }

    function getURL() {
        return sprintf("<img src='%s?%s' />", $this->imageBaseURL, $this->getParamString() );
    }

    function getParams() {
        return [
            'r' => $this->r,
            'g' => $this->g,
            'b' => $this->b,
            'a' => $this->a,
        ];
    }

    function getParamString() {
        $paramString = '';
        $separator = '';

        foreach ($this->getParams() as $key => $value) {
            $paramString .= $separator.$key.'='.$value;
            $separator = '&';
        }

        return $paramString;
    }
    
    function renderFormElements() {

        $output = '';

        $sR = safeText($this->r);
        $sG = safeText($this->g);
        $sB = safeText($this->b);
        $sA = safeText($this->a);
        //$b = new \ImagickPixel($this->b);
//        $fillString = $fillPixel->getcolor();
//        $fillString = sprintf("rgb(%d, %d, %d)", $fillString['r'], $fillString['g'], $fillString['b']);


        if (count($this->errors)) {
            foreach ($this->errors as $error) {
                $output .= $error."<br/>";
            }
        }


//        <span id='fillColorSelector' style='display: inline-block; border: 1px solid #000; padding: 0px;'>
//                        <span style='background-color: $fillString; margin: 2px; width: 20px; display: inline-block;'>
//                            &nbsp;
//                        </span> 
//                    </span>
//        
        

        $output .= <<< END
        
        <table>
            <tr>
                <td class='standardCell'>
                    Red
                </td>
                <td class='standardCell'>
                    <input type='text' name='r' value='$sR'/>
                </td>
            </tr>
            
            
            <tr>
                <td class='standardCell'>
                    Green
                </td>
                <td class='standardCell'>
                    <input type='text' name='g' value='$sG'/>
                </td>
            </tr>
            
            <tr>
                <td class='standardCell'>
                    Blue
                </td>
                <td class='standardCell'>
                    <input type='text' name='b' value='$sB' />

                </td>
            </tr>
            
             <tr>
                <td class='standardCell'>
                    Opacity
                </td>
                <td class='standardCell'>
                    <input type='text' id='fillColor' name='a' value='$sA' />

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
END;

        return $output;
    }
    
    function render() {
        $output = "";
        $output .= "<form method='GET' accept-charset='utf-8'>";
        $output .= $this->renderFormElements();
        $output .= " </form>";

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

    /**
     * @return string
     */
    public function getA() {
        return $this->a;
    }

    /**
     * @return string
     */
    public function getB() {
        return $this->b;
    }

    /**
     * @return string
     */
    public function getG() {
        return $this->g;
    }

    /**
     * @return string
     */
    public function getR() {
        return $this->r;
    }
    
    
    
}

 