<?php


namespace ImagickDemo\Controller;

//use ImagickDemo\Response\TextResponse;
use Tier\Tier;
use Tier\InjectionParams;
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
        //$injectionParams = InjectionParams::fromParams(['pageTitle' => "Imagick demos"]);
        return getRenderTemplateTier($templateName, [], ['pageTitle' => "Imagick demos"]);
        //return new Tier($callable, $injectionParams);
    }

    /**
     * @internal param \Auryn\Injector $injector
     * @return TextResponse
     */
    public function renderTitlePage()
    {
        $injectionParams = InjectionParams::fromParams(['pageTitle' => "Imagick demos"]);
        $injectionParams->alias('ImagickDemo\Navigation\Nav', 'ImagickDemo\Navigation\NullNav');
        //$callable = getTemplateSetupCallable('title');
        return getRenderTemplateTier($injectionParams, 'title');

        //return new Tier($callable, $injectionParams);
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

        return getRenderTemplateTier($injectionParams, 'index');
        
        //return new Tier($callable, $injectionParams);
    }

    /**
     * @internal param \Auryn\Injector $injector
     * @internal param $category
     * @return TextResponse
     */
    public function renderCategoryIndex()
    {
        $injectionParams = InjectionParams::fromParams(['pageTitle' => "Imagick demos"]);
        //$callable = getTemplateSetupCallable('title');
        $injectionParams->alias('ImagickDemo\Navigation\Nav', 'ImagickDemo\Navigation\CategoryNav');

        return getRenderTemplateTier($injectionParams, 'title');
        //return new Tier($callable, $injectionParams);
    }
}
