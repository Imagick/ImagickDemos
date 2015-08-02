<?php

namespace ImagickDemo\Controller;

use Tier\InjectionParams;

class Page
{
    /**
     * @param string $templateName
     * @return TextResponse
     * @throws \Jig\JigException
     */
    public function generateResponseFromTemplate($templateName)
    {
        return getRenderTemplateTier($templateName, [], ['pageTitle' => "Imagick demos"]);
    }

    /**
     * @internal param \Auryn\Injector $injector
     * @return TextResponse
     */
    public function renderTitlePage()
    {
        $injectionParams = InjectionParams::fromParams(['pageTitle' => "Imagick demos"]);
        $injectionParams->alias('ImagickDemo\Navigation\Nav', 'ImagickDemo\Navigation\NullNav');

        return getRenderTemplateTier($injectionParams, 'title');
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

        return getRenderTemplateTier($injectionParams, 'example');
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

        return getRenderTemplateTier($injectionParams, 'categoryIndex');
    }
}
