{include file='framework/pageStart'}
{include file='framework/topNavBar'}


{inject name='pageTitleObj' type='ImagickDemo\Helper\PageInfo'}
{inject name='control' type='ImagickDemo\Control'}
{inject name='example' type='ImagickDemo\Example'}
{inject name='docHelper' type='ImagickDemo\DocHelper'}
{inject name='nav' type='ImagickDemo\Navigation\Nav'}
{inject name='navBar' type='ImagickDemo\NavigationBar'}

<div class='container'>
    <div class="row hidden-md hidden-lg">
        <div class="col-xs-8">
            <h3 class='noMarginTop'>
                {$pageTitleObj->getTitle() | nofilter}
            </h3>
            <div class="row">
                <div class="col-md-12 " style="padding-top: 2px;">
                    <div class="row">
                        <div class="col-sm-12">
                            {inject name='example' type='ImagickDemo\Example'}
                            {$example->render() | nofilter}
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
                                {$pageTitleObj->getTitle() | nofilter}
                            </h1>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 " style="padding-top: 2px;">
                    <div class="row">
                        <div class="col-sm-12 contentPanel">
                            {inject name='example' type='ImagickDemo\Example'}
                            {$example->render() | nofilter}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {include file='framework/pageFooter'}
</div>

{include file='framework/pageEnd'}