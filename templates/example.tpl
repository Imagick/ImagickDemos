
{include file='framework/pageStart'}
{include file='framework/topNavBar'}
{inject name='control' type='ImagickDemo\Control'}
{inject name='example' type='ImagickDemo\Example'}
{inject name='docHelper' type='ImagickDemo\DocHelper'}
{inject name='nav' type='ImagickDemo\Navigation\Nav'}
{inject name='navBar' type='ImagickDemo\NavigationBar'}

{$remaining = 12 - $example->getColumnRightOffset()}

<div class='container'>
    <div class="row hidden-xs hidden-md hidden-lg">
        {block name='title'}
        
        <div class="col-xs-6">
            <h3 class='noMarginTop'>
                {$example->renderTitle() | nofilter}
            </h3>
        </div>
        <div class="col-xs-6 " style='text-align: right'>
            {$nav->renderPreviousLink() | nofilter}
            {$nav->renderNextLink() | nofilter}
        </div>
        {/block}
    </div> 


    <div class="row">
        <div class="col-md-2 visible-md visible-lg navPanel">
            {$nav->renderNav()}
        </div>

        <div class="col-md-10 columnAdjust">
            <div class='row'>
                {block name='mediumTitle'}
                <div class='col-md-12 visible-md visible-lg contentPanel'>
                    <div class="row hidden-sm hidden-xs">
                        <div class="col-sm-6">
                            <h3 class='titleMargin'>
                                {$example->renderTitle() | nofilter}
                            </h3>
                        </div>

                        <div class="col-sm-6" style='text-align: right'>
                            <span class="titleMargin" style="display: block; padding-top: 3px">
                                {$nav->renderPreviousLink() | nofilter}
                                <span style="width: 40px; display: inline-block">&nbsp;</span>
                                {$nav->renderNextLink() | nofilter}
                            </span>
                        </div>
                    </div>

                    {$docDescription = $docHelper->showDescription()}

                    {if ($docDescription)}
                        {$docDescription | nofilter}
                        <br/>
                    {/if}

                    {$description = $example->renderDescription()} 
                    {if ($description)}
                        {$description | nofilter}
                        <br/>
                    {/if}

                </div>
                {/block}
            </div>

            <div class="row">
                <div class="col-md-{$remaining} " style="padding-top: 2px;">
                    {block name='mainContent'}
                    <div class="row">
                        <div class="col-md-7 col-xs-12 contentPanel">
                            {$example->render() | nofilter}
                        </div>
                        <div class="col-sm-5 formHolder">
                            {$control->renderForm() | nofilter}
                        </div>
                    </div>
                    {/block}
                </div>
            </div>
            
            
            {$docHelper->showDescriptionPanel(true) | nofilter} 
            {$example->renderDescriptionPanel(true) | nofilter}
            {$docHelper->showParametersPanel() | nofilter}
            {$docHelper->showExamples() | nofilter}
        </div>

        <div class="row visible-xs visible-sm">
            <div class="col-md-12">
                {$navBar->renderIssueLink() | nofilter}
            </div>
        </div>
    </div>    
</div>

{include file='framework/pageFooter'}

{include file='framework/pageEnd'}