<?php


namespace ImagickDemo\Control;



class ControlComposite implements \ImagickDemo\Control {
    
    private $imageBaseURL;
    
    function __construct($imageBaseURL) {
        $this->imageBaseURL = $imageBaseURL;
    }

    /**
     * @return array
     */
    function getParams() {
        //This should get replaced by the Weaver
        return [];
    }
    
    function renderFormElement() {
        //This should get replaced by the Weaver
        return "";
    }
    
    function renderForm() {

        $output = 

        "<form method='GET' accept-charset='utf-8'>
                    <table>";

        $output .= $this->renderFormElement();

        $output .= "
            <tr>
                <td class='standardCell'>
                </td>
                <td class='standardCell'>
                    <button type='submit' class='btn btn-default'>Update</button>
                </td>
            </tr>
            
        </table>
        </form>
";
        return $output;
    }

    function getURL() {
        $paramString = '';
        $params = $this->getParams();
        $separator = '?';
        foreach ($params as $key => $value) {
            $paramString .= $separator.$key."=".$value;
            $separator = '&';
        }

        return sprintf("<img src='%s%s' />", $this->imageBaseURL, $paramString);
    }
}