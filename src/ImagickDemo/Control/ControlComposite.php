<?php


namespace ImagickDemo\Control;

use Intahwebz\Request;

class ControlComposite implements \ImagickDemo\Control {
    
    private $imageBaseURL;
    private $customImageBaseURL;
    private $imageStatusBaseURL;

    /**
     * @var Request
     */
    private $request;

    function __construct($activeCategory, $activeExample /*, Request $request*/) {
        $this->imageBaseURL = getImageURL($activeCategory, $activeExample);
        $this->customImageBaseURL = getCustomImageURL($activeCategory, $activeExample);
        $this->imageStatusBaseURL = getImageStatusURL($activeCategory, $activeExample);

        //$this->request = $request;
    }

    /**
     * @return array
     */
    function getParams() {
        //This should get replaced by the Weaver
        return [];
    }

    function getInjectionParams() {
        //This should get replaced by the Weaver
        return [];
    }
    
    
    /**
     * @return array
     */
    function getFullParams(array $extraParams = []) {
        $params = $this->getInjectionParams();
        $params += $extraParams;
        return $params;
    }

    /**
     * @return string
     */
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
        return $this->getBlahURL($this->imageBaseURL);
    }

    /**
     * @param $baseURL
     * @return string
     */
    function getBlahURL($baseURL) {
        $paramString = '';
        $params = $this->getParams();
        $separator = '?';
        foreach ($params as $key => $value) {
            $paramString .= $separator.$key."=".$value;
            $separator = '&';
        }
        
        return $baseURL.$paramString;
    }

    /**
     * @return string
     */
    function getImageStatusURL() {
        return $this->getBlahURL($this->imageStatusBaseURL);
    }

    /**
     * @param array $extraParams
     * @return string
     */
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