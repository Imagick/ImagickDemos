<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <title>Bootstrap 101 Template</title> -->

    <!-- Bootstrap -->
    <link href="/css/bootstrap.css" rel="stylesheet">
    <link href="/css/imagick.css" rel="stylesheet">
    

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <!-- <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script> -->
    <![endif]-->
</head>
<body>



<header class="navbar navbar-static-top bs-docs-nav" id="top" role="banner">
    <div class="container">
        <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
            <ul class="nav navbar-nav">
                <li>
                    <a href="/">Home</a>
                </li>
                <li>
                    <a href="/Imagick">Imagick</a>
                </li>
                <li class="active">
                    <a href="/ImagickDraw">ImagickDraw</a>
                </li>
                <li>
                    <a href="/ImagickPixel">ImagickPixel</a>
                </li>
                <li>
                    <a href="/ImagickPixelIterator">Imagick Pixel Interator</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="http://expo.getbootstrap.com" >Expo</a></li>
                <li><a href="http://blog.getbootstrap.com" >Blog</a></li>
            </ul>
        </nav>
    </div>
</header>


<!-- <div class='container'>

    <div class="col-md-12">
        <h2>{*$activeNav->renderTitle() | nofilter*}</h2>
    </div> -->

    <!-- <div class="col-md-3">
        {*$activeNav->renderPreviousButton() | nofilter*}
    </div>
    
    <div class="col-md-3">
        {*$activeNav->renderNextButton() | nofilter*}
    </div> -->
        
<!-- </div> -->

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
    
            {* inject name='imagickNav' value='ImagickDemo\ImagickNav' *}
            {* inject name='imagickDrawNav' value='ImagickDemo\ImagickDrawNav' *}
            {* inject name='imagickPixelNav' value='ImagickDemo\ImagickPixelNav' *}
            {* inject name='imagickPixelIteratorNav' value='ImagickDemo\ImagickPixelIteratorNav' *}
    
            {inject name='activeNav' value='ImagickDemo\ActiveNav'}
    
            {$activeNav->renderNav()}
            {* $imagickDrawNav->renderNav() *}
            {* $imagickPixelNav->renderNav() *}
            {* $imagickPixelIteratorNav->renderNav() *}
            
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

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="/js/jquery-1.11.0.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/js/bootstrap.min.js"></script>
</body>
</html>
