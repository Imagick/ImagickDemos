{include file='framework/pageStart'}
{include file='framework/topNavBar'}

<div class='container'>
    <div class="row">
        <div class="col-md-12">
            {inject name='fpmStatus' type='ImagickDemo\Model\FPMStatus'}
            {$fpmStatus->render() | nofilter}
        </div>
    </div>

    {include file='framework/pageFooter'}
</div>

{include file='framework/pageEnd'}