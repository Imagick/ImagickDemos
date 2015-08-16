<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    {inject name='pageTitleObj' type='ImagickDemo\Helper\PageInfo'}
    {inject name='scriptInclude' type='ScriptServer\Service\ScriptInclude'}
    
    <title>
        {$pageTitleObj->getTitle() | nofilter}
    </title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    {$scriptInclude->addCSS("bootstrap")}
    {$scriptInclude->addCSS("imagick")}
    {$scriptInclude->addCSS("colpick")}
    {$scriptInclude->addCSS("jquery/jQuery.tablesorter")}
    {$scriptInclude->addCSS("syntaxhighlighter/shCoreDefault")}
    {$scriptInclude->addCSS("syntaxhighlighter/shThemePHPStormLight")}

    {$scriptInclude->linkCSS() | nofilter}
    
    
    <style>
        .filter-table .quick { margin-left: 0.5em; font-size: 40px; text-decoration: none; }
        .fitler-table .quick:hover { text-decoration: underline; }
        td.alt { background-color: #ffc; background-color: rgba(255, 255, 0, 0.2); }
    </style>
    
</head>

<body>
