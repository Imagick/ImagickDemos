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
</head>

<body>
