<?php

function mem($msg) {
    printf("MEM: %.2f KiB - %s <br/>\n", memory_get_usage() / 1024, $msg);
}

mem('START');
for ($i = 0; $i < 10000; $i++) {
    $im = new Imagick(realpath('TestImage.jpg'));
    $im->destroy();
    unset($im);
    if (($i % 200) == 0) {
        mem("loop $i ");
    }
    usleep(5);
    flush();
}

sleep(3);

mem('FINISH');
exit(0);

//
//
//$im = new Imagick();
//$im->newImage(100, 100, 'none');
//
//for ($i = 0; $i < 1000; $i++)
//{
//    $color = sprintf('#%06X', mt_rand(0, 0xffffff));
//    // NOTICE: If you remove the comment of below line, will not cause a memory leak
//    //$color = new ImagickPixel($color);
//    $im->borderImage($color, 2, 2);
//    if ($i > 0 && ($i % 100) == 0)
//    {
//        echo "[$i] memory: " . number_format(memory_get_usage()) . "\n";
//    }
//}
//



 