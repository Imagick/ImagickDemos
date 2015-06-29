<?php


namespace ImagickDemo\Controller;

use ImagickDemo\Response\TextResponse;
use ImagickDemo\Tier;
use ImagickDemo\InjectionParams;
use ImagickDemo\Navigation\CategoryNav;


class Page {

    /**
     * @param string $templateName
     * @return TextResponse
     * @throws \Jig\JigException
     */
    function generateResponseFromTemplate($templateName)
    {
        $injectionParams = InjectionParams::fromParams(['pageTitle' => "Imagick demos"]);        
        $callable = getTemplateSetupCallable($templateName);
        return new Tier($callable, $injectionParams);
    }

    /**
     * @internal param \Auryn\Injector $injector
     * @return TextResponse
     */
    function renderTitlePage()
    {
        $injectionParams = InjectionParams::fromParams(['pageTitle' => "Imagick demos"]);
//        $injectionParams->alias('ImagickDemo\Example', 'ImagickDemo\HomePageExample');
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
    function renderExamplePage(CategoryNav $categoryNav)
    {
        $injectionParams = InjectionParams::fromParams(['pageTitle' => "Imagick demos"]);        
        $callable = getTemplateSetupCallable('index');
//        $exampleName = $categoryNav->getExampleName();        
//        $injectionParams->alias('ImagickDemo\Example', $exampleName);
        $injectionParams->alias('ImagickDemo\Navigation\Nav', 'ImagickDemo\Navigation\CategoryNav');

        return new Tier($callable, $injectionParams);
    }

    /**
     * @internal param \Auryn\Injector $injector
     * @internal param $category
     * @return TextResponse
     */
    function renderCategoryIndex(CategoryNav $categoryNav)
    {
        $injectionParams = InjectionParams::fromParams(['pageTitle' => "Imagick demos"]);        
        $callable = getTemplateSetupCallable('title');
//        $exampleName = $categoryNav->getExampleName();        
//        $injectionParams->alias('ImagickDemo\Example', $exampleName);
        $injectionParams->alias('ImagickDemo\Navigation\Nav', 'ImagickDemo\Navigation\CategoryNav');

        return new Tier($callable, $injectionParams);
    }
}