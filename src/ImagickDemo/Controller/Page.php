<?php

namespace ImagickDemo\Controller;

use SlimAuryn\Response\TwigResponse;
use VarMap\VarMap;

class Page
{
    public function renderTitlePage()
    {
        return new TwigResponse('title.html');
    }

    public function renderExamplePage(VarMap $varMap)
    {
        $template = 'example.html';

        if ($varMap->has('page') === true) {
            if ($varMap->get('page') === 'iframe') {
                $template = 'example_bare.html';
            }
        }

        return new TwigResponse($template, ['pageTitle' => "Imagick demos"]);
    }

    public function renderCategoryIndex()
    {
        return new TwigResponse('categoryIndex.html', ['pageTitle' => "Imagick demos"]);
    }
}
