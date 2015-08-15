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
        <a href='http://127.0.0.1:9002'>SupervisorD</a><br/>
        <a href='https://metrics.librato.com/share/dashboards/cuy923ae' target='_blank'>Librato dashboard</a><br/>

        &nbsp;<br/>
    </span>
</div>

<div>
    {* inject name='pages' value='ImagickDemo\RecentPages' *}
    {* $pages->display() *}
</div>