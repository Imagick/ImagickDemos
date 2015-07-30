<?php


namespace ImagickDemo\Controller;

use ImagickDemo\Response\TextResponse;
use ImagickDemo\Tier;
use ImagickDemo\InjectionParams;
use ImagickDemo\Navigation\CategoryNav;

class Page
{
    /**
     * @param string $templateName
     * @return TextResponse
     * @throws \Jig\JigException
     */
    public function generateResponseFromTemplate($templateName)
    {
        $injectionParams = InjectionParams::fromParams(['pageTitle' => "Imagick demos"]);
        $callable = getTemplateSetupCallable($templateName);
        return new Tier($callable, $injectionParams);
    }

    /**
     * @internal param \Auryn\Injector $injector
     * @return TextResponse
     */
    public function renderTitlePage()
    {
        $injectionParams = InjectionParams::fromParams(['pageTitle' => "Imagick demos"]);
        $injectionParams->alias('ImagickDemo\Navigation\Nav', 'ImagickDemo\Navigation\NullNav');
        $callable = getTemplateSetupCallable('title');

        return new Tier($callable, $injectionParams);
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
        $callable = getTemplateSetupCallable('index');
        $injectionParams->alias('ImagickDemo\Navigation\Nav', 'ImagickDemo\Navigation\CategoryNav');

        return new Tier($callable, $injectionParams);
    }

    /**
     * @internal param \Auryn\Injector $injector
     * @internal param $category
     * @return TextResponse
     */
    public function renderCategoryIndex()
    {
        $injectionParams = InjectionParams::fromParams(['pageTitle' => "Imagick demos"]);
        $callable = getTemplateSetupCallable('title');
        $injectionParams->alias('ImagickDemo\Navigation\Nav', 'ImagickDemo\Navigation\CategoryNav');

        return new Tier($callable, $injectionParams);
    }
}
