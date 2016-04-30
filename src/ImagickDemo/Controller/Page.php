<?php

namespace ImagickDemo\Controller;

use Tier\InjectionParams;

use Tier\Bridge\TierJig;
use Tier\Bridge\JigExecutable;


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

        return JigExecutable::create('example', $injectionParams);
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

        return JigExecutable::create('categoryIndex', $injectionParams);
    }
}
