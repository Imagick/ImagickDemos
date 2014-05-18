<?php




 for ($width=400 ; $width < 500 ; $width++) {
     echo "/usr/local/bin/convert -size ".$width."x".$width." gradient: test_grad$width.png\n";   
 }