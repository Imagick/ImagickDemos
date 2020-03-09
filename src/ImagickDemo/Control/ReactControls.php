<?php


namespace ImagickDemo\Control;

use ImagickDemo\Control;
use ImagickDemo\Tutorial\Params\EyeColourResolutionParams;
use VarMap\VarMap;


class ReactControls implements Control
{
    private $imageBaseURL = null;

    private $orignalImageBaseURL = null;

    private $customImageBaseURL = null;

    private $imageStatusBaseURL = null;

    private $taskQueue = null;

    private $eyeColourResolutionParams;

    public function __construct(
        \ImagickDemo\Helper\PageInfo $pageInfo,
        \ImagickDemo\Queue\ImagickTaskQueue $taskQueue,
        VarMap $varMap
    ) {
        $activeCategory = $pageInfo->getCategory();
        $activeExample = $pageInfo->getExample();

        $this->imageBaseURL = \ImagickDemo\Route::getImageURL($activeCategory, $activeExample);
        $this->orignalImageBaseURL = \ImagickDemo\Route::getOriginalImageURL($activeCategory, $activeExample);
        $this->customImageBaseURL = \ImagickDemo\Route::getCustomImageURL($activeCategory, $activeExample);
        $this->imageStatusBaseURL = \ImagickDemo\Route::getImageStatusURL($activeCategory, $activeExample);
        $this->taskQueue = $taskQueue;

        $this->eyeColourResolutionParams = EyeColourResolutionParams::createFromVarMap($varMap);
    }



    public function renderForm()
    {
        [$error, $value] = convertToValue($this->eyeColourResolutionParams);

        if ($error !== null) {
            // what to do here
            return "oh dear, the form failed to render correctly: " . $error;
        }

        $output = sprintf(
            "<div id='controlPanel' data-params_json='%s'></div>",
            json_encode_safe($value)
        );

        return $output;
    }

    public function getParams()
    {
        return $this->eyeColourResolutionParams->getAllParams();
    }

    public function getInjectionParams()
    {
        return $this->eyeColourResolutionParams->getAllParams();
    }

    public function getFullParams(array $extraParams = [])
    {
        $params = $this->getInjectionParams();
        $params += $extraParams;
        return $params;
    }

    public function getURL()
    {
        return $this->imageBaseURL;
    }

    public function getCustomImageURL(array $extraParams = [])
    {
        return $this->customImageBaseURL;
    }

    public function getImageStatusURL($extraParams = [])
    {
        return $this->imageStatusBaseURL;
    }

    public function renderImageURL($originalImageURL = null)
    {
        return \ImagickDemo\Route::renderImageURL(
            false, //$this->taskQueue->isActive(),
            $this->getURL(),
            $originalImageURL,
            $this->getImageStatusURL()
        );
    }

    public function renderCustomImageURL($extraParams, $originalImageURL = null)
    {
        return \ImagickDemo\Route::renderImageURL(
            false, //$this->taskQueue->isActive(),
            $this->getCustomImageURL($extraParams),
            $originalImageURL,
            $this->getImageStatusURL()
        );
    }
}