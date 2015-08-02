<div>
    <br/>
    <span style='font-size: 8px; display: block;'>
        Peak memory 
        <?php
        echo  number_format(memory_get_peak_usage());
        ?>
        <br/>

        <a href='/info'>FPM status</a><br/>
        <a href='/queueinfo'>QueueInfo</a><br/>
        <a href='/opinfo'>OPMem Usage</a><br/>

        &nbsp;<br/>
    </span>
</div>

<div>
    {* inject name='pages' value='ImagickDemo\RecentPages' *}
    {* $pages->display() *}
</div>