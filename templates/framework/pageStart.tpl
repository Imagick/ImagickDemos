<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!--
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <script>
      (adsbygoogle = window.adsbygoogle || []).push({
        google_ad_client: "ca-pub-2560334673780653",
        enable_page_level_ads: true
      });
    </script>
    -->

    {inject name='pageTitleObj' type='ImagickDemo\Helper\PageInfo'}
    {inject name='scriptInclude' type='ScriptHelper\ScriptInclude'}
    
    <title>
        {$pageTitleObj->getTitle() | nofilter}
    </title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    {* $scriptInclude->addCSSFile("bootstrap") *}
    {* $scriptInclude->addCSSFile("imagick") *}
    {* $scriptInclude->addCSSFile("colpick") *}
    {* $scriptInclude->addCSSFile("jquery/jQuery.tablesorter") *}
    {* $scriptInclude->addCSSFile("syntaxhighlighter/shCoreDefault") *}
    {* $scriptInclude->addCSSFile("syntaxhighlighter/shThemePHPStormLight") *}

    <link rel='stylesheet' type='text/css' media='screen' href='/css/bootstrap.css' />
    <link rel='stylesheet' type='text/css' media='screen' href='/css/imagick.css' />
    <link rel='stylesheet' type='text/css' media='screen' href='/css/colpick.css' />
    <link rel='stylesheet' type='text/css' media='screen' href='/css/jquery/jQuery.tablesorter.css' />
    <link rel='stylesheet' type='text/css' media='screen' href='/css/syntaxhighlighter/shCoreDefault.css' />
    <link rel='stylesheet' type='text/css' media='screen' href='/css/syntaxhighlighter/shThemePHPStormLight.css' />


    {* $scriptInclude->renderCSSLinks() | nofilter *}

    <style>
        .filter-table .quick { margin-left: 0.5em; font-size: 40px; text-decoration: none; }
        .fitler-table .quick:hover { text-decoration: underline; }
        td.alt { background-color: #ffc; background-color: rgba(255, 255, 0, 0.2); }
    </style>
    {* tagManagerInHead() | nofilter *}
</head>

<body>


{* tagManagerInBodyStart() | nofilter *}
{* analytics() | nofilter *}
