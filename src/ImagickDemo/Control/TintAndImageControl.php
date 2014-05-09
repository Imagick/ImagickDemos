<?php


namespace ImagickDemo\Control;


class TintAndImageControl implements \ImagickDemo\Control {

    /**
     * @var TintControl
     */
    private $tintControl;

    /**
     * @var ImageControl
     */
    private $imageControl;

    private $imageBaseURL;
    

    function __construct(
        \ImagickDemo\Control\ImageControl $imageControl, 
        TintControl $tintControl,
        $imageBaseURL
    ) {
        $this->tintControl = $tintControl;
        $this->imageControl = $imageControl;
        $this->imageBaseURL = $imageBaseURL;
    }

    /**
     * @return TintControl
     */
    function getTintControl() {
        //This is not solid
        return $this->tintControl;
    }

    function getImagePath() {
        return $this->imageControl->getImagePath();
    }
    
    /**
     * @return array
     */
    function render() {
        $output = '';
        $output .= "<form method='GET' accept-charset='utf-8'>";
        $output .= $this->tintControl->renderFormElements();
        $output .= $this->imageControl->renderFormElements();
        $output .= " </form>";

        return $output;
    }

    /**
     * @return array
     */
    function getParams() {
        $params = [];
        $params = array_merge($params, $this->tintControl->getParams());
        $params = array_merge($params, $this->imageControl->getParams());
        return $params;
    }

    /**
     * @return string
     */
    function getParamString() {
        $paramString = '';
        $separator = '';
        
        foreach ($this->getParams() as $key => $value) {
            $paramString .= $separator.$key.'='.$value;
            $separator = '&';
        }
   
        return $paramString;
    }

    function getURL() {
        return sprintf("<img src='%s?%s' />", $this->imageBaseURL, $this->getParamString() );
    }


}

 