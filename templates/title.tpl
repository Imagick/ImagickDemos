{extends file='index'}


{block name='title'}
    <div class="col-xs-12">
        <h3 class='noMarginTop'>
            {$example->renderTitle() | nofilter}
        </h3>
    </div>
{/block}


{block name='mediumTitle'}
    <div class="row hidden-sm hidden-xs">
        <div class="col-sm-12">
            <h1 class='titleMargin'>
                {$example->renderTitle() | nofilter}
            </h1>
        </div>
    </div>
{/block}

