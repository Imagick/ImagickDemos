<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>{$pageTitle}</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="/css/bootstrap.css" rel="stylesheet">
    <link href="/css/imagick.css" rel="stylesheet">

    <!-- IE8 shims deleted - use a decent browser -->
</head>

<body>

<header class="navbar navbar-static-top bs-docs-nav" id="top" role="banner">
    <div class="container">
        <!-- <nav class="collapse navbar-collapse navbar-default bs-navbar-collapse" role="navigation"> -->
        <nav class="navbar-default" role="navigation">
            <ul class="nav navbar-nav">
                {inject name='navBar' value='ImagickDemo\NavigationBar'}
                {$navBar->render() | nofilter}
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="http://basereality.com">Danack homepage</a></li>
                <li><a href="https://github.com/Danack/Imagick-demos">Source code</a></li>
            </ul>
        </nav>
    </div>
</header>

<div class='container'>

    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-1"></div>
        <div class="col-md-8">
            <h2 class='noMarginTop'>{$activeNav->renderTitle() | nofilter}</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-md-2">
            {inject name='activeNav' value='ImagickDemo\Navigation\ActiveNav'}
            {$activeNav->renderNav()}            
        </div>
    
        <div class="col-md-1">
        </div>
    
        <div class="col-md-8">
            
            <div class="row">
                <div class="col-md-10">
                    {inject name='example' value='ImagickDemo\Example'}
                    {$example->renderImageURL() | nofilter}
                    {$example->renderDescription() | nofilter}
                </div>
                <div class="col-md-2">
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    {inject name='control' value='ImagickDemo\Control'}
                    {$control->render() | nofilter}
                </div>

            </div>
            
    
            <div class="row">
                <div class="col-md-3">
                    {$activeNav->renderPreviousButton() | nofilter}
                </div>
        
                <div class="col-md-4">
                </div>
        
                <div class="col-md-3" style='text-align: right'>
                    {$activeNav->renderNextButton() | nofilter}
                </div>
                <div class="col-md-2">
                </div>
            </div>
        </div>

    </div>
</div>  


<script src="/js/jquery-1.11.0.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
</body>
</html>
