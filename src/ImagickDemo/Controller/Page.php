<?php

namespace ImagickDemo\Controller;

use VarMap\VarMap;

use ImagickDemo\Helper\PageInfo;
use ImagickDemo\Navigation\CategoryNav;
use ImagickDemo\NavigationBar;
use ImagickDemo\Example;
use ImagickDemo\DocHelper;
use ImagickDemo\Control;
use ImagickDemo\Navigation\NullNav;

class Page
{
    public function renderTitlePageMoreSane(
        PageInfo $pageInfo,
        NavigationBar $navBar,
        Example $example
    ) {
        $nav = new NullNav();
        return renderTitlePage(
            $pageInfo,
            $nav,
            $navBar,
            $example
        );
    }

    public function renderCategoryIndexMoreSane(
        PageInfo $pageInfo,
        Example $example,
        CategoryNav $nav,
        NavigationBar $navBar
    ) {
        return renderCategoryIndexPage(
            $pageInfo,
            $example,
            $nav,
            $navBar
        );
    }

    public function renderExamplePageMoreSane(
        VarMap $varMap,
        CategoryNav $categoryNav,
        PageInfo $pageInfo,
        NavigationBar $navigationBar,
        Control $control,
        Example $example,
        DocHelper $docHelper,
        \ImagickDemo\Queue\ImagickTaskQueue $taskQueue,
        \ImagickDemo\ExampleFinder\ExampleFinder $exampleFinder
    ) {
        return renderPageHtml(
            $categoryNav,
            $pageInfo,
            $navigationBar,
            $control,
            $example,
            $docHelper,
            $varMap,
            $taskQueue,
            $exampleFinder
        );
    }
}
