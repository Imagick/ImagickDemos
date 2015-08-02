<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    {inject name='pageTitleObj' type='ImagickDemo\Helper\PageInfo'}

    <title>
        {$pageTitleObj->getTitle() | nofilter}
    </title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="/css/bootstrap.css" rel="stylesheet">
    <link href="/css/imagick.css" rel="stylesheet">
    <link href="/css/colpick.css" rel="stylesheet">

    <link type="text/css" rel="stylesheet" href="/css/jquery/jQuery.tablesorter.css">
    <link type="text/css" rel="stylesheet" href="/css/syntaxhighlighter/shCoreDefault.css">
    <link type="text/css" rel="stylesheet" href="/css/syntaxhighlighter/shThemePHPStormLight.css">
</head>


<body>
