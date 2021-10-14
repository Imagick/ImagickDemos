<?php

declare(strict_types=1);

use ImagickDemo\Control\ReactControls;
use ImagickDemo\Helper\PageInfo;
use ImagickDemo\Navigation\CategoryNav;
use ImagickDemo\Navigation\Nav;
use ImagickDemo\NavigationBar;
use ImagickDemo\Control;
use ImagickDemo\Example;
use ImagickDemo\DocHelper;
use Params\OpenApi\OpenApiV300ParamDescription;
use VarMap\VarMap;
use Params\InputParameterList;
use Params\Create\CreateFromVarMap;
use ImagickDemo\ExampleSourceFinder;
use ImagickDemo\CodeExample;

function renderTopNavBarForCategory(
    Nav $nav,
    NavigationBar $navBar
): string {

$html = <<< HTML
    <header class="navbar navbar-static-top bs-docs-nav" id="top" role="banner">
    <div class="container visible-lg">
        <nav class="navbar-default " role="navigation">
            <ul class="nav navbar-nav menuBackground">
                {$navBar->render()}
            </ul>
        </nav>

        <nav class="navbar-default pull-right" role="navigation">
            <ul class="nav navbar-nav menuBackground">
                 {$navBar->renderRight()}
            </ul>
        </nav>   
    </div>
    
    
    <div class="container visible-md" >
        <nav class="navbar-default " role="navigation">
            <ul class="nav navbar-nav menuBackground">
                {$navBar->render()}
                {$navBar->renderRight()}
            </ul>
        </nav>   
    </div>

    <div class="container visible-xs visible-sm">
        <ul class="nav navbar-nav menuBackground">
        {$navBar->renderSelect()}
        {$nav->renderSelect()}
        </ul>
    </div>
</header>

HTML;

    return $html;
}




function renderReactControls(VarMap $varMap, string $param_type)
{
    $hackedVarMap = hackVarMap($varMap);

    /** @var  InputParameterList&CreateFromVarMap $param_type */
    $params = $param_type::createFromVarMap($hackedVarMap);

    $paramDescription = OpenApiV300ParamDescription::createFromRules(
        $param_type::getInputParameterList()
    );

    if (method_exists($params, 'getValuesForForm') === true) {
        $value = $params->getValuesForForm();
    }
    else {
        [$error, $value] = convertToValue($params);
        if ($error !== null) {
            // what to do here
            return "oh dear, the form failed to render correctly: " . $error;
        }
    }

    if (count($value) === 0) {
        return "<!-- Controls are empty, no need to show them. -->";
    }


    $output = sprintf(
        "<div id='controlPanel' data-params_json='%s' data-controls_json='%s'></div>",
        json_encode_safe($value),
        json_encode($paramDescription)
    );

    return $output;
}

function renderReactExampleImagePanel(
    $imageBaseUrl,
    $activeCategory,
    $activeExample,
    Example $example
) {
    $pageBaseUrl = \ImagickDemo\Route::getPageURL($activeCategory, $activeExample);

    return createReactImagePanel(
        $imageBaseUrl,
        $pageBaseUrl,
        false,
        $example
    );
}


/**
 * @param CodeExample[] $examples
 */
function renderExamples(array $examples)
{
    if (count($examples) === 0) {
        return "";
    }

    $output = '<div class="row"><div class="col-md-12 contentPanel">';

    $count = 0;

    foreach ($examples as $example) {

        $count += 1;
        $header = '';

        if (count($examples) > 1) {
            $description = trim($example->description);
            if (strlen($description) > 0) {
                $header = "// Example $count - " . $description;
            }
            else {
                $header = "// Example $count";
            }
        }

        $output .= "<pre>";
        $output .= $header . "\n";
        foreach ($example->lines as $line) {
            $output .= $line;
        }
        $output .= "</pre>";
    }

    $output .= "</div></div>";

    return $output;
}


function renderExampleBodyHtml(
    ImagickDemo\Control $control,
    ImagickDemo\Example $example,
    DocHelper $docHelper,
    CategoryNav $nav,
    NavigationBar $navBar,
    VarMap $varMap,
    PageInfo $pageInfo,
    \ImagickDemo\Queue\ImagickTaskQueue $taskQueue
) {

    $remaining = 12 - $example->getColumnRightOffset();

    $doc_description = $docHelper->showDescription($pageInfo);

    $example_description = $example->renderDescription();
    if ($example_description === null) {
        $example_description = "";
    }
    else {
        $example_description .= "<br/>";
    }

    $activeCategory = $pageInfo->getCategory();
    $activeExample = $pageInfo->getExample();

    $form = renderReactControls($varMap, $example->getParamType());

    if (method_exists($example, 'hasBespokeRender') &&
        $example->hasBespokeRender() ) {

        $reactControls = new ReactControls(
            $pageInfo,
            $taskQueue,
            $varMap
        );

        $exampleHtml = $example->bespokeRender($reactControls);
    }
    else {
        // What about custom images?
        $imageBaseUrl = \ImagickDemo\Route::getImageURL($activeCategory, $activeExample);

        if ($example->hasCustomImage() === true) {
            $imageBaseUrl = \ImagickDemo\Route::getCustomImageURL($activeCategory, $activeExample);
        }

        $exampleHtml = renderReactExampleImagePanel(
            $imageBaseUrl,
            $activeCategory,
            $activeExample,
            $example
        );
    }

    $exampleFinder = new ExampleSourceFinder();
    $code_examples = $exampleFinder->findExamples($activeCategory, $activeExample);
    $examples_html = renderExamples($code_examples);

    $html = <<< HTML
<div class='container'>
    <div class="row hidden-xs hidden-md hidden-lg">
        <div class="col-xs-6">
            <h3 class='noMarginTop'>
                {$example->renderTitle()}
            </h3>
        </div>
        <div class="col-xs-6 " style='text-align: right'>
            {$nav->renderPreviousLink()}
            {$nav->renderNextLink()}
        </div>
    </div>

    <div class="row">
        <div class="col-md-2 visible-md visible-lg navPanel">
            {$nav->renderNav()}
        </div>

        <div class="col-md-10 columnAdjust">
            <div class='row'>

                <div class='col-md-12 visible-md visible-lg contentPanel'>
                    <div class="row hidden-sm hidden-xs">
                        <div class="col-sm-6">
                            <h3 class='titleMargin'>
                                {$example->renderTitle()}
                            </h3>
                        </div>

                        <div class="col-sm-6" style='text-align: right'>
                            <span class="titleMargin" style="display: block; padding-top: 3px">
                                {$nav->renderPreviousLink()}
                                <span style="width: 40px; display: inline-block">&nbsp;</span>
                                {$nav->renderNextLink()}
                            </span>
                        </div>
                    </div>
                    {$doc_description}
                    {$example_description}
                </div>
            </div>

            <div class="row">
                <div class="col-md-{$remaining} " style="padding-top: 2px;">

                    <div class="row">
                        <div class="col-md-7 col-xs-12 contentPanel">
                            {$exampleHtml}
                        </div>
                        <div class="col-sm-5 formHolder">
                            {$form}
                        </div>
                    </div>
                </div>
            </div>
            {$example->renderDescriptionPanel(true)}            
            {$examples_html}
            
        </div>

        <div class="row visible-xs visible-sm">
            <div class="col-md-12">
                {$navBar->renderIssueLink()}
            </div>
        </div>
    </div>
</div>

HTML;

    return $html;
}

function renderPageFooter()
{

$html = <<< HTML

<footer class="footer hidden-xs hidden-sm">
  <div class="clearfix"></div>
  <div class="row-fluid">
    <div class="col-sm-offset-5 col-md-6">
      <span style='font-size: 8px; text-align: right; float: right;' id="secretButton">
        <span onclick='$("#secrets").css("display", "block"); $("#secretButton").css("display", "none");'>?</span>
      </span>

      <span id="secrets" style="display: none; text-align: right; float: right; margin-bottom: 20px">
    Peak memory {peakMemory()} <br/>
        <a href='/info'>FPM status</a><br/>
        <a href='/settingsCheck'>Settings check</a><br/>
        <!-- <a href='/queueinfo'>QueueInfo</a><br/> -->
        <a href='/opinfo'>OPMem Usage</a><br/>
      </span>
    </div>
  </div>
</footer>

HTML;

    return $html;
}

function renderPageHtml(
    CategoryNav $categoryNav,
    PageInfo $pageInfo,
    NavigationBar $navigationBar,
    Control $control,
    Example $example,
    DocHelper $docHelper,
    VarMap $varMap,
    \ImagickDemo\Queue\ImagickTaskQueue $taskQueue
): string  {

    $html = renderPageStartHtml($pageInfo);

    $html .= renderTopNavBarForCategory(
        $categoryNav,
        $navigationBar
    );

    $html .= renderExampleBodyHtml(
        $control,
        $example,
        $docHelper,
        $categoryNav,
        $navigationBar,
        $varMap,
        $pageInfo,
        $taskQueue
    );

    $html .= renderPageFooter();
    $html .= renderPageEndHtml();

    return $html;
}

function renderPageStartHtml(PageInfo $pageInfo)
{

$html = <<< HTML
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>
        {$pageInfo->getTitle()}
    </title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel='stylesheet' type='text/css' media='screen' href='/css/bootstrap.css' />
    <link rel='stylesheet' type='text/css' media='screen' href='/css/imagick.css' />

    <style>
        .filter-table .quick { margin-left: 0.5em; font-size: 40px; text-decoration: none; }
        .fitler-table .quick:hover { text-decoration: underline; }
        td.alt { background-color: #ffc; background-color: rgba(255, 255, 0, 0.2); }
    </style>
</head>

<body>

HTML;

return $html;

}

function renderPageEndHtml()
{
$html = <<< HTML
    </body>

<script src="/js/app.bundle.js"></script>

</html>

HTML;

return $html;

}

function renderCategoryIndexPage(
    PageInfo $pageInfo,
    Example $example,
    CategoryNav $nav,
    NavigationBar $navBar
) {
    $html = renderPageStartHtml($pageInfo);
    $html .= renderTopNavBarForCategory(
        $nav,
        $navBar
    );

    $html .= renderCategoryIndexHtml(
        $pageInfo,
        $example,
        $nav
    );
    $html .= renderPageFooter();
    $html .= renderPageEndHtml();

    return $html;
}

function renderCategoryIndexHtml(
    PageInfo $pageTitleObj,
    Example $example,
    CategoryNav $nav
): string {

$html = <<< HTML
    <div class='container'>
    <div class="row hidden-md hidden-lg">
        <div class="col-xs-8">
            <h3 class='noMarginTop'>
                {$pageTitleObj->getTitle()}
            </h3>
            <div class="row">
                <div class="col-md-12 " style="padding-top: 2px;">
                    <div class="row">
                        <div class="col-sm-12">
                            {$example->render()}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row visible-md visible-lg">
        <div class="col-md-2 navPanel">
            {$nav->renderNav()}
        </div>
        <div class="col-md-10 columnAdjust">
            <div class='row'>
                 <div class='col-md-12 visible-md visible-lg contentPanel'>
                    <div class="row hidden-sm hidden-xs">
                        <div class="col-sm-8">
                            <h1 class='titleMargin'>
                                {$pageTitleObj->getTitle()}
                            </h1>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 " style="padding-top: 2px;">
                    <div class="row">
                        <div class="col-sm-12 contentPanel">
                            {$example->render()}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
HTML;

return $html;

}


function renderTitlePage(
    PageInfo $pageInfo,
    Nav $nav,
    NavigationBar $navBar,
    Example $example
) {
    $html = renderPageStartHtml($pageInfo);
    $html .= renderTopNavBarForCategory(
        $nav,
        $navBar
    );

    $html .= renderTitlePageInternal(
        $pageInfo,
        $example
    );

    $html .= renderPageFooter();
    $html .= renderPageEndHtml();

    return $html;
}

function renderTitlePageInternal(
    PageInfo $pageTitleObj,
    Example $example
) {
    $remaining = 12 - $example->getColumnRightOffset();

    $html = <<< HTML
<div class='container'>
    <div class="row hidden-md hidden-lg">
        <div class="col-xs-8">
            <h3 class='noMarginTop'>
                {$pageTitleObj->getTitle()}
            </h3>
            <div class="row">
                <div class="col-md-12 " style="padding-top: 2px;">
                    <div class="row">
                        <div class="col-sm-12">
                            {$example->render()}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 

    <div class="row visible-md">
        <div class="col-md-12 ">
            <div class='row'>
                 <div class='col-md-12 contentPanel'>
                    <div class="row hidden-sm hidden-xs">
                        <div class="col-sm-8">
                            <h1 class='titleMargin'>
                                {$pageTitleObj->getTitle()}
                            </h1>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 " style="padding-top: 2px;">
                    <div class="row">
                        <div class="col-sm-12 contentPanel">
                            {$example->render()}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <div class="row  visible-lg">
        <div class="col-md-2 navPanel" >
        </div>
        <div class="col-md-10 columnAdjust">
            <div class='row'>
                 <div class='col-md-10 visible-md visible-lg contentPanel'>
                    <div class="row hidden-sm hidden-xs">
                        <div class="col-sm-8">
                            <h1 class='titleMargin'>
                                {$pageTitleObj->getTitle()}
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row  visible-lg">
        <div class="col-md-2 navPanel" >
        </div>
        <div class="col-md-10 columnAdjust" id="afterTitle">
        </div>
    </div>

    <div class="row  visible-lg">
        <div class="col-md-2 navPanel" >
        </div>
        <div class="col-md-10 columnAdjust">
            <div class="row">
                <div class="col-md-{$remaining} " style="padding-top: 2px;">
                    <div class="row">
                        <div class="col-sm-12 contentPanel">
                            {$example->render()}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

HTML;

    return $html;
}


function createReactImagePanel(
    string $imageBaseUrl,
    string $pageBaseUrl,
    bool $full_page_refresh,
    Example $example
): string {
    $refreshString = 'false';
    if ($full_page_refresh) {
        $refreshString = 'true';
    }

    if ($example->isRemovedInIM7() === true) {
        return $example->renderIM7Migration();
    }

    $output = '<div id="imagePanel"';
    $output .= sprintf(' data-imageBaseUrl="%s"', $imageBaseUrl);
    $output .= sprintf(' data-pagebaseurl="%s"', $pageBaseUrl,);
    $output .= sprintf(' data-full_page_refresh="%s"', $refreshString);


    $original_image = $example->hasOriginalImage();
    if ($original_image === true) {
        $output .= ' data-has_original_image="true"';
    }
    else {
        $output .= ' data-has_original_image="false"';
    }

    $output .= "></div>";

    return $output;
}

