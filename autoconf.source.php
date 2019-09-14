<?php


$config = <<< END
<?php

\$options = [
    'opcache.enabled' => ${'opcache.enabled'}, 
    'script.version' => ${'script.version'},
    'script.packing' => ${'script.packing'},
    'caching.setting' => ${'caching.setting'}, 
    'jig.compilecheck' => ${'jig.compilecheck'},
];

END;

return $config;