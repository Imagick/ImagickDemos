<?php


namespace ImagickDemo\Controller;

use ImagickDemo\Response\TextResponse;
use Jig\JigRender;
use Jig\ViewModel\BasicViewModel;
use ImagickDemo\Helper\PageInfo;



class Page {

    /**
     * @var BasicViewModel
     */
    private $viewModel;

    /**
     * @var JigRender
     */
    private $jigRender;

    /**
     * @var PageInfo
     */
    private $pageInfo;
    
    /**
     * @param BasicViewModel $basicViewModel
     * @param JigRender $jigRender
     */
    function __construct(BasicViewModel $basicViewModel, JigRender $jigRender, PageInfo $pageInfo) {
        $this->viewModel = $basicViewModel;
        $this->jigRender = $jigRender;
        $this->pageInfo = $pageInfo;

        //$this->pageInfo->setTitle("asd PHP Imagick");
    }

    /**
     * @param string $templateName
     * @return TextResponse
     * @throws \Jig\JigException
     */
    function generateResponseFromTemplate($templateName) {
        $this->viewModel->setVariable('pageTitle', "Imagick demos");
        $output = $this->jigRender->renderTemplateFile($templateName, $this->viewModel);

        return new TextResponse($output);
    }


    /**
     * @internal param \Auryn\Injector $injector
     * @return TextResponse
     */
    function renderTitlePage() {
        return $this->generateResponseFromTemplate('title');
    }

    /**
     * @internal param \Auryn\Injector $injector
     * @internal param $category
     * @internal param $example
     * @return TextResponse
     */
    function renderExamplePage() {
        return $this->generateResponseFromTemplate('index');
    }

    /**
     * @internal param \Auryn\Injector $injector
     * @internal param $category
     * @return TextResponse
     */
    function renderCategoryIndex() {
        return $this->generateResponseFromTemplate('title');
    }
}