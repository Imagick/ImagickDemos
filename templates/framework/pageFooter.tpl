<div>
    <br/>

    <span style='font-size: 8px; display: block;' id="secretButton">
        <span onclick='$("#secrets").css("display", "block"); $("#secretButton").css("display", "none");'>?</span>
    </span>
    
    <span style='display: none;' id="secrets">
        Peak memory {peakMemory()} <br/> 
        <a href='/info'>FPM status</a><br/>
        <a href='/settingsCheck'>Settings check</a><br/>
        <a href='/queueinfo'>QueueInfo</a><br/>
        <a href='/opinfo'>OPMem Usage</a><br/>
        &nbsp;<br/>
    </span>
</div>

<div>
    {* inject name='pages' value='ImagickDemo\RecentPages' *}
    {* $pages->display() *}
</div>