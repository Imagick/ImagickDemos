<?php

namespace ImagickDemo\Control;

use ImagickDemo\Queue\ImagickTaskQueue;
use ImagickDemo\Helper\PageInfo;

class ControlComposite implements \ImagickDemo\Control
{
    private $imageBaseURL;
    private $customImageBaseURL;
    private $imageStatusBaseURL;
    private $taskQueue;

    public function __construct(PageInfo $pageInfo, ImagickTaskQueue $taskQueue)
    {
        $activeCategory = $pageInfo->getCategory();
        $activeExample = $pageInfo->getExample();

        $this->imageBaseURL = getImageURL($activeCategory, $activeExample);
        $this->customImageBaseURL = getCustomImageURL($activeCategory, $activeExample);
        $this->imageStatusBaseURL = getImageStatusURL($activeCategory, $activeExample);
        $this->taskQueue = $taskQueue;
    }
    
    /**
     * @return array
     */
    public function getParams()
    {
        //This should get replaced by the Weaver
        return [];
    }

    public function getInjectionParams()
    {
        //This should get replaced by the Weaver
        return [];
    }

    /**
     * @param array $extraParams
     * @return array
     */
    public function getFullParams(array $extraParams = [])
    {
        $params = $this->getInjectionParams();
        $params += $extraParams;
        return $params;
    }

    /**
     * @return string
     */
    public function renderFormElement()
    {
        //This should get replaced by the Weaver
        return "";
    }

    /**
     * @param null $originalImageURL
     * @return string
     */
    public function renderImageURL($originalImageURL = null)
    {
        return renderImageURL(
            $this->taskQueue->isActive(),
            $this->getURL(),
            $originalImageURL,
            $this->getImageStatusURL()
        );
    }

    /**
     * @param $extraParams
     * @param null $originalImageURL
     * @return string
     */
    public function renderCustomImageURL($extraParams, $originalImageURL = null)
    {
        return renderImageURL(
            $this->taskQueue->isActive(),
            $this->getCustomImageURL($extraParams),
            $originalImageURL,
            $this->getImageStatusURL()
        );
    }


    /**
     * @return string
     */
    public function renderForm()
    {
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
    public function getURL()
    {
        return $this->getURLWithParams($this->imageBaseURL);
    }

    /**
     * @param $baseURL
     * @param array $extraParams
     * @return string
     */
    public function getURLWithParams($baseURL, $extraParams = [])
    {
        $paramString = '';
        $params = $this->getParams();
        $params = array_merge($params, $extraParams);
        $separator = '?';
        foreach ($params as $key => $value) {
            $paramString .= $separator.$key."=".$value;
            $separator = '&';
        }

        return $baseURL.$paramString;
    }

    /**
     * @param array $extraParams
     * @return string
     */
    public function getImageStatusURL($extraParams = [])
    {
        return $this->getURLWithParams($this->imageStatusBaseURL);
    }

    /**
     * @param array $extraParams
     * @return string
     */
    public function getCustomImageURL(array $extraParams = [])
    {
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
