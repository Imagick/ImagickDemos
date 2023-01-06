<?php


namespace ImagickDemo\Control;

use ImagickDemo\Control;
use ImagickDemo\Navigation\CategoryInfo;
use VarMap\VarMap;
use ImagickDemo\ReactParamType;

class ReactControls implements Control
{
    private $imageBaseURL = null;


    private $customImageBaseURL = null;

    private $imageStatusBaseURL = null;

    private /* InputParameterList */ $params;

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

        $exampleToRun = CategoryInfo::getExampleToRun($activeCategory, $activeExample);

        $exampleName = "ImagickDemo\\" . $activeCategory . "\\" . $exampleToRun;
        /** @var ReactParamType $exampleName */
        $paramType = $exampleName::getParamType();

        $hackedVarMap = hackVarMap($varMap);
        $params = $paramType::createFromVarMap($hackedVarMap);

        $this->params = $params;
    }

    public function getInjectionParams()
    {
        if (method_exists($this->params, 'toArray') === true) {
            return $this->params->toArray();
        }

        return $this->params->getAllParams();
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

    public function renderCustomImageURL($extraParams, $originalImageURL = null)
    {
        $url = $this->customImageBaseURL . "?" . http_build_query($extraParams);

        return sprintf("<img src='%s' />", $url);
    }
}