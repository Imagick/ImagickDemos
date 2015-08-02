{inject name='nav' type='ImagickDemo\Navigation\Nav'}
{inject name='navBar' type='ImagickDemo\NavigationBar'}

<header class="navbar navbar-static-top bs-docs-nav" id="top" role="banner">
    <div class="container visible-lg">
        <nav class="navbar-default " role="navigation">
            <ul class="nav navbar-nav menuBackground">
                {$navBar->render() | nofilter}
            </ul>
        </nav>

        <nav class="navbar-default pull-right" role="navigation">
            <ul class="nav navbar-nav menuBackground">
                 {$navBar->renderRight() | nofilter}
            </ul>
        </nav>   
    </div>
    
    
    <div class="container visible-md" >
        <nav class="navbar-default " role="navigation">
            <ul class="nav navbar-nav menuBackground">
                {$navBar->render() | nofilter}
                {$navBar->renderRight() | nofilter}
            </ul>
        </nav>   
    </div>
    
    

    <div class="container visible-xs visible-sm">
        <ul class="nav navbar-nav menuBackground">
        {$navBar->renderSelect() | nofilter}
        {$nav->renderSelect() | nofilter}
        </ul>
    </div>
</header>