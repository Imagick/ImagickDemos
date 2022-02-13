<?php

declare(strict_types=1);

use ImagickDemo\Control\ReactControls;
use ImagickDemo\Helper\PageInfo;
use ImagickDemo\Navigation\CategoryNav;
use ImagickDemo\Navigation\Nav;
use ImagickDemo\Navigation\NullNav;
use ImagickDemo\NavigationBar;
use ImagickDemo\Control;
use ImagickDemo\Example;
use ImagickDemo\DocHelper;
use Params\OpenApi\OpenApiV300ParamDescription;
use VarMap\VarMap;
use Params\InputParameterList;
use Params\Create\CreateFromVarMap;
use ImagickDemo\ExampleFinder\ExampleSourceFinder;
use ImagickDemo\CodeExample;

function renderTopNavBarForCategory(
    Nav $nav,
    NavigationBar $navBar
): string {

$html = <<< HTML
<div class="phpimagick_header_internal">
  <span class="normal_header">
    <span class="internal_headers">
      {$navBar->renderInternalLinks()}
    </span>
    <span class="external_headers">
      {$navBar->renderExternalLinks()}
    </span>
  </span>
  <span class="mobile_header contentPanel">
    {$nav->renderSelectDropdowns()}
  </span>   
</div>

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

//function renderReactExampleImagePanel(
//    $imageBaseUrl,
//    $activeCategory,
//    $activeExample,
//    Example $example
//) {
//    $pageBaseUrl = \ImagickDemo\Route::getPageURL($activeCategory, $activeExample);
//
//    return createReactImagePanel(
//        $imageBaseUrl,
//        $pageBaseUrl,
//        $example
//    );
//}

/**
 * @param CodeExample[] $examples
 */
function renderExamples(array $examples)
{
    if (count($examples) === 0) {
        return "";
    }

    $output = '<div class="example">';
    $count = 0;

    foreach ($examples as $example) {
        $output .= "<div class='contentPanel'>";
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
        $output .= "</div>\n";
    }

    $output .= "</div>";

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
    \ImagickDemo\Queue\ImagickTaskQueue $taskQueue,
    \ImagickDemo\ExampleFinder\ExampleFinder $exampleFinder
) {
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
        $exampleHtml = $example->render(
            $activeCategory,
            $activeExample
        );
    }


    $code_examples = $exampleFinder->findExamples($activeCategory, $activeExample);
    $examples_html = renderExamples($code_examples);

    $html = <<< HTML
<div class='example_content'>
  <div class="contentPanel">
    <h3 class='noMarginTop titleTop'>
      {$example->renderTitle()}
    </h3>
    
     <span class="prev_next_links">
        {$nav->renderPreviousLink()}
        <span style="width: 40px; display: inline-block">&nbsp;</span>
        {$nav->renderNextLink()}
    </span>
    <br/>

    {$doc_description}
    {$example_description}
  </div>
  
  <span class="example_and_controls">
  
  <div class="contentPanel inlineBlock">
        {$exampleHtml}
  </div>
  
  <div class="formHolder inlineBlock">
    {$form}
  </div>
  </span>

  {$examples_html} 

</div>

HTML;

    return $html;
}

function renderPageFooter()
{

$html = <<< HTML

<footer class="phpimagick_footer">
  <span style='font-size: 8px; text-align: right; float: right;' id="secretButton">
    <span onclick='document.getElementById("secrets").style.display = "block"; 
    document.getElementById("secretButton").style.display = "none";'>?</span>
  </span>

  <span id="secrets" style="display: none; text-align: right; float: right; margin-bottom: 20px">
   <a href='/todo'>TODO list</a><br/>
    <a href='/info'>FPM status</a><br/>
    <a href='/settingsCheck'>Settings check</a><br/>
    <!-- <a href='/queueinfo'>QueueInfo</a><br/> -->
    <a href='/opinfo'>OPMem Usage</a><br/>
  </span>
</footer>

HTML;

    return $html;
}

//function renderPageHtml(
//    CategoryNav $categoryNav,
//    PageInfo $pageInfo,
//    NavigationBar $navigationBar,
//    Control $control,
//    Example $example,
//    DocHelper $docHelper,
//    VarMap $varMap,
//    \ImagickDemo\Queue\ImagickTaskQueue $taskQueue,
//    \ImagickDemo\ExampleFinder\ExampleFinder $exampleFinder
//): string  {
//
//    $html = renderPageStartHtml($pageInfo);
//
//    $html .= renderTopNavBarForCategory(
//        $categoryNav,
//        $navigationBar
//    );
//
//    $html .= renderExampleBodyHtml(
//        $control,
//        $example,
//        $docHelper,
//        $categoryNav,
//        $navigationBar,
//        $varMap,
//        $pageInfo,
//        $taskQueue,
//        $exampleFinder
//    );
//
//    $html .= renderPageFooter();
//    $html .= renderPageEndHtml();
//
//    return $html;
//}
//



//function renderPageStartHtml(PageInfo $pageInfo)
//{
//
//$html = <<< HTML
//<!DOCTYPE html>
//<html lang="en">
//<head>
//    <meta charset="utf-8">
//    <meta http-equiv="X-UA-Compatible" content="IE=edge">
//
//    <title>
//        {$pageInfo->getTitle()}
//    </title>
//
//    <meta name="viewport" content="width=device-width, initial-scale=1">
//
//    <link rel='stylesheet' type='text/css' media='screen' href='/css/bootstrap.css' />
//    <link rel='stylesheet' type='text/css' media='screen' href='/css/imagick.css' />
//
//    <style>
//        .filter-table .quick { margin-left: 0.5em; font-size: 40px; text-decoration: none; }
//        .fitler-table .quick:hover { text-decoration: underline; }
//        td.alt { background-color: #ffc; background-color: rgba(255, 255, 0, 0.2); }
//    </style>
//</head>
//
//<body>
//
//HTML;
//
//return $html;
//
//}

//function renderPageEndHtml()
//{
//$html = <<< HTML
//    </body>
//
//<script src="/js/app.bundle.js"></script>
//
//</html>
//
//HTML;
//
//return $html;
//
//}


function renderCategoryIndexHtml(
    PageInfo $pageTitleObj,
    Example $example,
    CategoryNav $nav
): string {

$html = <<< HTML
<div class='contentPanel'>
  <h3 class='noMarginTop'>
    {$pageTitleObj->getTitle()}
  </h3>

  <div class="">
      {$example->render(
          $pageTitleObj->getCategory(),
          $pageTitleObj->getExample())
      }
  </div>
HTML;

return $html;

}

function renderTextPageSass(
    PageInfo $pageInfo,
    CategoryNav $categoryNav,
    NavigationBar $navigationBar,
    string $page_html
) {

    $assetSuffix = "";
    $page_content = $page_html;

    $params = [
        ':raw_site_css_link' => '/css/site.css' . $assetSuffix,
//        ':raw_site_js_link' => '/js/app.bundle.js' . $assetSuffix,
        ':html_page_title' => $pageInfo->getTitle(),
        ':raw_top_header' => renderTopNavBarForCategory($categoryNav, $navigationBar),
        ':raw_content' => $page_content,
        ':raw_footer' => renderPageFooter(),
        ':raw_nav_content' => ''//$categoryNav->renderNav(),
    ];

    return esprintf(
        getPageLayoutHtml('phpimagick_title_wrapper'),
        $params
    );
}


function renderTitlePageInternal(
    PageInfo $pageTitleObj,
    Example $example
) {

    $html = <<< HTML
<div class="contentPanel titlePanel">
  <h3 class='noMarginTop'>
    {$pageTitleObj->getTitle()}
  </h3>
  
  <div class="row">
    <div class="col-sm-12">
      {$example->render(null, null)}
    </div>
  </div>
</div>
HTML;

    return $html;
}


/**
 * @param string|null $imageBaseUrl If imageBaseUrl is null, no image will be displayed by the react panel
 * @param string $pageBaseUrl
 * @param Example $example
 * @return string
 */
function createReactImagePanel(
    ?string $imageBaseUrl,
    string $pageBaseUrl,
    Example $example
): string {
    $refreshString = 'false';
    if ($example->needsFullPageRefresh() === true) {
        $refreshString = 'true';
    }

    if ($example->isRemovedInIM7() === true) {
        return $example->renderIM7Migration();
    }

    $output = '<div id="imagePanel"';
    if ($imageBaseUrl !== null) {
        $output .= sprintf(' data-imageBaseUrl="%s"', $imageBaseUrl);
    }
    $output .= sprintf(' data-pagebaseurl="%s"', $pageBaseUrl,);
    $output .= sprintf(' data-full_page_refresh="%s"', $refreshString);


    $original_image = $example->useImageControlAsOriginalImage();
    if ($original_image === true) {
        $output .= ' data-use_image_control_as_original_image="true"';
    }
    else {
        $output .= ' data-use_image_control_as_original_image="false"';
    }

    if (($originalFilename = $example->getOriginalFilename()) !== null) {
        $output .= " data-original_image_url='$originalFilename'";
    }

    $output .= "></div>";

    return $output;
}

function getPageLayoutHtml($wrapper_name): string
{
    return <<< HTML
<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>:html_page_title</title>
  <link rel="stylesheet" href=":raw_site_css_link">
</head>

<body>
  <div class="$wrapper_name">
    <div class="phpimagick_header">:raw_top_header</div>
    <div class="phpimagick_navigation">
      :raw_nav_content
    </div>
    <div class="phpimagick_content">
      :raw_content
    </div>
    <div class="phpimagick_footer">:raw_footer</div>
  </div>
</body>

<!--<script src=':raw_site_js_link'></script>-->
<script src="/js/app.bundle.js"></script>
</html>
HTML;
}


function renderCategoryIndexPageSass(
    PageInfo $pageInfo,
    Example $example,
    CategoryNav $categoryNav,
    NavigationBar $navigationBar
): string {

    $page_content = renderCategoryIndexHtml(
        $pageInfo,
        $example,
        $categoryNav
    );

    $assetSuffix = "";

    $params = [
        ':raw_site_css_link' => '/css/site.css' . $assetSuffix,
//        ':raw_site_js_link' => '/js/app.bundle.js' . $assetSuffix,
        ':html_page_title' => $pageInfo->getTitle(),
        ':raw_top_header' => renderTopNavBarForCategory($categoryNav, $navigationBar),
        ':raw_content' => $page_content,
        ':raw_footer' => renderPageFooter(),
        ':raw_nav_content' => $categoryNav->renderNav(),
    ];

    return esprintf(
        getPageLayoutHtml('phpimagick_wrapper'),
        $params
    );
}


function renderPageHtmlSass(
    CategoryNav $categoryNav,
    PageInfo $pageInfo,
    NavigationBar $navigationBar,
    Control $control,
    Example $example,
    DocHelper $docHelper,
    VarMap $varMap,
    \ImagickDemo\Queue\ImagickTaskQueue $taskQueue,
    \ImagickDemo\ExampleFinder\ExampleFinder $exampleFinder
): string  {


    $page_content = renderExampleBodyHtml(
        $control,
        $example,
        $docHelper,
        $categoryNav,
        $navigationBar,
        $varMap,
        $pageInfo,
        $taskQueue,
        $exampleFinder
    );

    $assetSuffix = "";

    $params = [
        ':raw_site_css_link' => '/css/site.css' . $assetSuffix,
//        ':raw_site_js_link' => '/js/app.bundle.js' . $assetSuffix,
        ':html_page_title' => $pageInfo->getTitle(),
        ':raw_top_header' => renderTopNavBarForCategory($categoryNav, $navigationBar),
        ':raw_content' => $page_content,
        ':raw_footer' => renderPageFooter(),
        ':raw_nav_content' => $categoryNav->renderNav(),
    ];

    return esprintf(
        getPageLayoutHtml('phpimagick_wrapper'),
        $params
    );
}

function renderTitlePageSass(
    PageInfo $pageInfo,
    Example $example,
    CategoryNav $categoryNav,
    NavigationBar $navigationBar,
    Nav $nav
): string {

    $assetSuffix = "";
    $page_content = renderTitlePageInternal(
        $pageInfo,
        $example
    );

    $params = [
        ':raw_site_css_link' => '/css/site.css' . $assetSuffix,
//        ':raw_site_js_link' => '/js/app.bundle.js' . $assetSuffix,
        ':html_page_title' => $pageInfo->getTitle(),
        ':raw_top_header' => renderTopNavBarForCategory($categoryNav, $navigationBar),
        ':raw_content' => $page_content,
        ':raw_footer' => renderPageFooter(),
        ':raw_nav_content' => $nav->renderNav(),
    ];

    return esprintf(
        getPageLayoutHtml('phpimagick_title_wrapper'),
        $params
    );
}