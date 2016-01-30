<?php

namespace ImagickDemo\Controller;

use Tier\InjectionParams;

use Tier\Tier;
use Tier\JigBridge\TierJig;

class Page
{
    /**
     * @internal param \Auryn\Injector $injector
     * @return TextResponse
     */
    public function renderTitlePage(TierJig $tierJig)
    {
        $injectionParams = new InjectionParams();
        //$injectionParams->defineParam('pageTitle', "Imagick demos");
        $injectionParams->alias('ImagickDemo\Navigation\Nav', 'ImagickDemo\Navigation\NullNav');

        return $tierJig->createJigExecutable('title', $injectionParams);
    }

    /**
     * @internal param \Auryn\Injector $injector
     * @internal param $category
     * @internal param $example
     * @return TextResponse
     */
    public function renderExamplePage()
    {
        $injectionParams = new InjectionParams();
        $injectionParams->defineParam('pageTitle', "Imagick demos");
        $injectionParams->alias('ImagickDemo\Navigation\Nav', 'ImagickDemo\Navigation\CategoryNav');

        return Tier::renderTemplateExecutable('example', $injectionParams);
    }

    /**
     * @internal param \Auryn\Injector $injector
     * @internal param $category
     * @return TextResponse
     */
    public function renderCategoryIndex()
    {
        $injectionParams = new InjectionParams();
        $injectionParams->defineParam('pageTitle', "Imagick demos");
        $injectionParams->alias('ImagickDemo\Navigation\Nav', 'ImagickDemo\Navigation\CategoryNav');

        return Tier::renderTemplateExecutable('categoryIndex', $injectionParams);
    }
}
