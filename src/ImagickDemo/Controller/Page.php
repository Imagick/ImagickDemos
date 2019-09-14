<?php

namespace ImagickDemo\Controller;

use SlimAuryn\Response\TwigResponse;

class Page
{

    public function renderTitlePage()
    {
//        $injectionParams = new InjectionParams();
//        //$injectionParams->defineParam('pageTitle', "Imagick demos");
//        $injectionParams->alias('ImagickDemo\Navigation\Nav', 'ImagickDemo\Navigation\NullNav');
//
//        return $tierJig->createJigExecutable('title', $injectionParams);


        return new TwigResponse('title.html');

    }

    public function renderExamplePage()
    {
//        $injectionParams = new InjectionParams();
//        $injectionParams->defineParam('pageTitle', "Imagick demos");
//        $injectionParams->alias('ImagickDemo\Navigation\Nav', 'ImagickDemo\Navigation\CategoryNav');
//
//        return JigExecutable::create('example', $injectionParams);

        return new TwigResponse('example.html', ['pageTitle' => "Imagick demos"]);
    }


    public function renderCategoryIndex()
    {
//        $injectionParams = new InjectionParams();
//        $injectionParams->defineParam('pageTitle', "Imagick demos");
//        $injectionParams->alias('ImagickDemo\Navigation\Nav', 'ImagickDemo\Navigation\CategoryNav');

        return new TwigResponse('categoryIndex.html', ['pageTitle' => "Imagick demos"]);

    }
}
