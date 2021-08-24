<?php


namespace ImagickDemo\Control;

use ImagickDemo\Control;
use ImagickDemo\Navigation\CategoryInfo;
use ImagickDemo\Tutorial\Controls\EyeColourResolutionParams;
use Params\InputParameterList;
use VarMap\ArrayVarMap;
use VarMap\VarMap;
use ImagickDemo\ReactParamType;


class ReactControls implements Control
{
    private $imageBaseURL = null;

    private $orignalImageBaseURL = null;

    private $customImageBaseURL = null;

    private $imageStatusBaseURL = null;

    private $taskQueue = null;

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

        $exampleDef = CategoryInfo::getExampleDefinition($activeCategory, $activeExample);

        $exampleName = "ImagickDemo\\" . $activeCategory . "\\" . $exampleDef[0];
        /** @var ReactParamType $exampleName */
        $paramType = $exampleName::getParamType();

        $hackedVarMap = hackVarMap($varMap);
        $params = $paramType::createFromVarMap($hackedVarMap);

        $this->params = $params;
    }

    public function renderForm()
    {
        [$error, $value] = convertToValue($this->params);

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
        if (method_exists($this->params, 'toArray') === true) {
            return $this->params->toArray();
        }

        return $this->params->getAllParams();
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