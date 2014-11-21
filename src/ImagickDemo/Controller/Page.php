<?php


namespace ImagickDemo\Controller;

use Intahwebz\Request;
use ImagickDemo\Response\FileResponse;
use ImagickDemo\Response\RedirectResponse;
use ImagickDemo\Response\TextResponse;

use Jig\JigRender;
use Jig\ViewModel\BasicViewModel;





class Page {

    function generateResponseFromTemplate(\Auryn\Provider $injector, $templateName = 'index') {
        $viewModel = $injector->make(BasicViewModel::class);
        $jigRenderer = $injector->make(JigRender::class);

        $viewModel->setVariable('pageTitle', "Imagick demos");
        $output = $jigRenderer->renderTemplateFile($templateName, $viewModel);

        return new TextResponse($output);
    }


    /**
     * @param \Auryn\Provider $injector
     * @return TextResponse
     */
    function setupRootIndex(\Auryn\Provider $injector) {
        $injector->alias(\ImagickDemo\Example::class, \ImagickDemo\HomePageExample::class);

        return $this->generateResponseFromTemplate($injector, 'title');
    }

    /**
     * @param \Auryn\Provider $injector
     * @param $category
     * @param $example
     * @return TextResponse
     */
    function setupExampleDelegation(\Auryn\Provider $injector, $category, $example) {
        setupExampleInjection($injector, $category, $example);

        return $this->generateResponseFromTemplate($injector);
    }

    /**
     * @param \Auryn\Provider $injector
     * @param $category
     * @return TextResponse
     * @throws \Exception
     */
    function setupCatergoryDelegation(\Auryn\Provider $injector, $category) {
        $validCatergories = [
            'Imagick',
            'ImagickDraw',
            'ImagickPixel',
            'ImagickPixelIterator',
            'Tutorial',
        ];

        if (in_array($category, $validCatergories) == false) {
            throw new \Exception("Category is not valid.");
        }

        $injector->defineParam('imageBaseURL', '/image/'.$category);
        $injector->defineParam('customImageBaseURL', '/customImage/'.$category);
        $injector->defineParam('activeCategory', $category);
        $injector->defineParam('activeExample', null);

        $injector->share(\ImagickDemo\Control::class);
        $injector->alias(\ImagickDemo\Example::class, sprintf('ImagickDemo\%s\IndexExample', $category));
        $injector->alias(\ImagickDemo\Navigation\Nav::class, \ImagickDemo\Navigation\CategoryNav::class);
        $injector->define(\ImagickDemo\Navigation\CategoryNav::class, [
            ':category' => $category,
            ':example' => null
        ]);

        $injector->define(\ImagickDemo\DocHelper::class, [
            ':category' => $category,
            ':example' => null
        ]);

        return $this->generateResponseFromTemplate($injector);
    }



}