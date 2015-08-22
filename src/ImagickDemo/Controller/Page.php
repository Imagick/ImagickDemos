<?php

namespace ImagickDemo\Controller;

use Tier\InjectionParams;

use Tier\JigBridge\TierJig;

class Page
{
    /**
     * @internal param \Auryn\Injector $injector
     * @return TextResponse
     */
    public function renderTitlePage(TierJig $tierJig)
    {
        $injectionParams = InjectionParams::fromParams(['pageTitle' => "Imagick demos"]);
        $injectionParams->alias('ImagickDemo\Navigation\Nav', 'ImagickDemo\Navigation\NullNav');

        return $tierJig->createTemplateTier('title', $injectionParams);
    }

    /**
     * @internal param \Auryn\Injector $injector
     * @internal param $category
     * @internal param $example
     * @return TextResponse
     */
    public function renderExamplePage()
    {
        $injectionParams = InjectionParams::fromParams(['pageTitle' => "Imagick demos"]);
        $injectionParams->alias('ImagickDemo\Navigation\Nav', 'ImagickDemo\Navigation\CategoryNav');

        return createRenderTemplateTier('example', $injectionParams);
    }

    /**
     * @internal param \Auryn\Injector $injector
     * @internal param $category
     * @return TextResponse
     */
    public function renderCategoryIndex()
    {
        $injectionParams = InjectionParams::fromParams(['pageTitle' => "Imagick demos"]);
        $injectionParams->alias('ImagickDemo\Navigation\Nav', 'ImagickDemo\Navigation\CategoryNav');

        return createRenderTemplateTier('categoryIndex', $injectionParams);
    }
}
