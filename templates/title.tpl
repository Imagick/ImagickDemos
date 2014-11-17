{extends file='index'}


{block name='title'}
    <div class="col-xs-8">
        <h3 class='noMarginTop'>
            {$example->renderTitle() | nofilter}
        </h3>
    </div>
{/block}


{block name='mediumTitle'}
    <div class='col-md-10 visible-md visible-lg contentPanel'>
        <div class="row hidden-sm hidden-xs">
            <div class="col-sm-8">
                <h1 class='titleMargin'>
                    {$example->renderTitle() | nofilter}
                </h1>
            </div>
        </div>
    </div>
{/block}

