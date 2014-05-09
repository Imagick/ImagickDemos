<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>{$pageTitle}</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="/css/bootstrap.css" rel="stylesheet">
    <link href="/css/imagick.css" rel="stylesheet">
    <link href="/css/colpick.css" rel="stylesheet">
    <!-- IE8 shims deleted - use a decent browser -->
</head>

<body>

<header class="navbar navbar-static-top bs-docs-nav" id="top" role="banner">
    <div class="container">
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

{inject name='nav' value='ImagickDemo\Navigation\ActiveNav'}

<div class='container'>

    <div class="row">
        <div class="col-md-2"></div>
        <!-- <div class="col-md-1"></div> -->
        <div class="col-md-10">
            <h2 class='noMarginTop'>{$nav->renderTitle() | nofilter}</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-md-2">
            {$nav->renderNav()}
        </div>

        <div class="col-md-10">
            <div class="row">
                <div class="col-md-8">
                    {inject name='example' value='ImagickDemo\Example'}
                    {inject name='control' value='ImagickDemo\Control'}
                    {$example->renderImageURL() | nofilter}
                    <br/>
                    {$example->renderDescription() | nofilter}
                </div>
                <div class="col-md-4">
                    {$example->getControl()->render() | nofilter}
                </div>
            </div>
    
            <div class="row">
                <div class="col-md-3">
                    {$nav->renderPreviousButton() | nofilter}
                </div>
        
                <div class="col-md-6">
                </div>
        
                <div class="col-md-3" style='text-align: right'>
                    {$nav->renderNextButton() | nofilter}
                </div>

            </div>
        </div>

    </div>
    <div>
        <?php
        echo "<br/><br/><br/><span style='font-size: 8px; display: block;'>Peak memory ". number_format(memory_get_peak_usage())."</span>";
        ?>
        
        
    </div>
</div>  


<script src="/js/jquery-1.11.0.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/colpick.js"></script>


<script type="text/javascript">
    
    //http://colpick.com/plugin - I love you color picker
    
    function addColorSelector(selector, targetElement) {
        $(selector).colpick({
            colorScheme:'dark',
            layout:'rgbhex',
            color:'ff8800',
            submit: false,
            onChange:function(hsb, hex, rgb, el) {
                $(el).children().css('background-color', '#' + hex);
                $(targetElement).val("rgb("+ rgb.r + ", " + rgb.g + ", " + rgb.b + ")")
            },
        });
    }

    addColorSelector("#fillColorSelector", "#fillColor");
    
</script>



</body>
</html>
