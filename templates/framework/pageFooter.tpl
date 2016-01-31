<footer class="footer hidden-xs hidden-sm">
  <div class="clearfix"></div>
  <div class="row-fluid">
    <div class="col-sm-offset-5 col-md-6">
      <span style='font-size: 8px; text-align: right; float: right;' id="secretButton">
        <span onclick='$("#secrets").css("display", "block"); $("#secretButton").css("display", "none");'>?</span>
      </span>

      <span id="secrets" style="display: none; text-align: right; float: right; margin-bottom: 20px">
        Peak memory {peakMemory()} <br/> 
        <a href='/info'>FPM status</a><br/>
        <a href='/settingsCheck'>Settings check</a><br/>
        <a href='/queueinfo'>QueueInfo</a><br/>
        <a href='/opinfo'>OPMem Usage</a><br/>
        <a href='http://127.0.0.1:9002'>SupervisorD</a><br/>
        <a href='https://metrics.librato.com/share/dashboards/cuy923ae' target='_blank'>Librato dashboard
      </span>
    </div>
  </div>
</footer>