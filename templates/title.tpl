{extends file='index'}

{inject name='pageTitleObj' value='ImagickDemo\Helper\PageInfo'}

{block name='title'}
    <div class="col-xs-8">
        <h3 class='noMarginTop'>
            {$pageTitleObj->getTitle() | nofilter}
        </h3>
    </div>
{/block}


{block name='mediumTitle'}
    <div class='col-md-10 visible-md visible-lg contentPanel'>
        <div class="row hidden-sm hidden-xs">
            <div class="col-sm-8">
                <h1 class='titleMargin'>
                    {$pageTitleObj->getTitle() | nofilter}
                </h1>
            </div>
        </div>
    </div>
{/block}


{block name='mainContent'}
    <div class="row">
        <div class="col-sm-12 contentPanel">
            {inject name='example' value='ImagickDemo\Example'}
            {$example->render() | nofilter}
        </div>
    </div>
{/block}