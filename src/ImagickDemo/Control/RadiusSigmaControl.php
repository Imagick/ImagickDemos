<?php


namespace ImagickDemo\Control;

use Intahwebz\Request;

class RadiusSigmaControl implements \ImagickDemo\Control {

    private $radius = 5;
    private $sigma = 1;

    private $imageBaseURL;

    private $images = [
        "../images/Skyline_400.jpg" => 'Skyline',
        "../images/Biter_500.jpg" => 'Lorikeet',
    ];

    private $errors = [];

    function __construct(Request $request, $imageBaseURL, \ImagickDemo\Control\ImageControl $imageControl) {

        $this->imageControl = $imageControl;

       
        foreach ($images as $key => $value) {
            if (strcmp($this->option, $value) === 0 || $this->image == null) {
                $this->image = $key;
            }
        }
        
        $this->radius = floatval($request->getVariable('radius', $this->radius));
        
        if ($this->radius < 0) {
            $this->radius = 0;
        }
        if ($this->radius > 10) {
            $this->radius = 10;
        }

        $this->sigma = floatval($request->getVariable('sigma', $this->sigma));

        if ($this->sigma < 0) {
            $this->sigma = 0;
        }
        if ($this->sigma > 100) {
            $this->sigma = 100;
        }
        

        $this->imageBaseURL = $imageBaseURL;
    }

    function getURL() {
        return sprintf("<img src='%s?%s' />", $this->imageBaseURL, $this->getParamString() );
    }

    function getParams() {
        return [
            'radius' => $this->radius,
            'sigma' => $this->sigma,
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

        $sRadius = safeText($this->radius);
        $sSigma = safeText($this->sigma);

        if (count($this->errors)) {
            foreach ($this->errors as $error) {
                $output .= $error."<br/>";
            }
        }

        $output .= <<< END
        
        <table>
            <tr>
                <td class='standardCell'>
                    Radius
                </td>
                <td class='standardCell'>
                    <input type='text' name='r' value='$sRadius'/>
                </td>
            </tr>

            <tr>
                <td class='standardCell'>
                    Sigma
                </td>
                <td class='standardCell'>
                    <input type='text' name='g' value='$sSigma'/>
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

        return $output;
    }

    /**
     * @return string
     */
    public function getRadius() {
        return $this->radius;
    }

    /**
     * @return string
     */
    public function getSigma() {
        return $this->sigma;
    }
}

 