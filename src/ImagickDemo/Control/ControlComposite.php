<?php


namespace ImagickDemo\Control;

use Intahwebz\Request;

class ControlComposite implements \ImagickDemo\Control {
    
    private $imageBaseURL;
    private $customImageBaseURL;

    /**
     * @var Request
     */
    private $request;
    
    function __construct($imageBaseURL, $customImageBaseURL, Request $request) {
        $this->imageBaseURL = $imageBaseURL;
        $this->customImageBaseURL = $customImageBaseURL;
        $this->request = $request;
    }

    /**
     * @return array
     */
    function getParams() {
        //This should get replaced by the Weaver
        return [];
    }

    /**
     * @return array
     */
    function getFullParams(array $extraParams = []) {
        $params = $this->getParams();
        $params += $extraParams;
        $params += ['original' => $this->request->getVariable('original', false)];

        return $params;
    }
    
    function renderFormElement() {
        //This should get replaced by the Weaver
        return "";
    }


    /**
     * @return string
     */
    function renderForm() {

        $output = 

        "<form method='GET' accept-charset='utf-8'>
             <div class='col-xs-12 contentPanel controlForm'>";

        $output .= $this->renderFormElement();

        $output .= "
            <div class='row inputSubmitRow'>
                <div class='col-sm-5 col-sm-offset-7'>
                    <button type='submit' class='btn btn-default'>Update</button>
                </div>
            </div>
        </div>
        </form>";

        return $output;
    }

    /**
     * @return string
     */
    function getURL() {
        $paramString = '';
        $params = $this->getParams();
        $separator = '?';
        foreach ($params as $key => $value) {
            $paramString .= $separator.$key."=".$value;
            $separator = '&';
        }
        
        return $this->imageBaseURL.$paramString;
    }


    function getCustomImageURL(array $extraParams = []) {
        $paramString = '';
        $params = $this->getParams();
        $separator = '?';
        foreach ($params as $key => $value) {
            $paramString .= $separator.$key."=".$value;
            $separator = '&';
        }

        foreach ($extraParams as $key => $value) {
            $paramString .= $separator.$key."=".$value;
            $separator = '&';
        }

        return $this->customImageBaseURL.$paramString;
    }
    
}