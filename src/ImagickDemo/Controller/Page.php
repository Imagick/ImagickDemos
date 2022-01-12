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
use ImagickDemo\Navigation\Nav;

class Page
{
    public function renderTitlePageMoreSane(
        PageInfo $pageInfo,
        NavigationBar $navBar,
        Example $example,
        CategoryNav $categoryNav
    ) {
        $nav = new NullNav();
        return renderTitlePageSass(
            $pageInfo,
            $example,
            $categoryNav,
            $navBar,
            $nav
        );
    }

    public function renderCategoryIndexMoreSane(
        PageInfo $pageInfo,
        Example $example,
        CategoryNav $catergoryNav,
        NavigationBar $navBar
    ) {
        return renderCategoryIndexPageSass(
            $pageInfo,
            $example,
            $catergoryNav,
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
        return renderPageHtmlSass(
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
