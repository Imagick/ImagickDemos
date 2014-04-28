<?php

$ffmpeg = './ffmpeg-git-20140419-64bit-static/ffmpeg -loglevel panic';

$convertExe = '/usr/local/bin/convert';

$sourceVideo = 'spider.mp4';

//hh:mm:ss.ms

//$frameSkip = 1;
$startFrame = 5;
$endFrame = 25;

$startTime = '00:00:33.00';
$endTime = '00:00:37.00';
$resize = '-s 480x270';



//-ordered-dither o8x8(,n)
//-ordered-dither "o8x8,r,g,b"
//specifying numbers for r, g, and b should give you a better handle over the filesize


//$listOfFrames = "`seq -f ./anim/%04g.png $startFrame $frameSkip $endFrame`";



$frameRate = 25;




//$convertExe -fuzz 1% -delay 1x10 `seq -f ./anim/%03g.png 1 1 31` \
//-ordered-dither o2x2,6 \
//-coalesce -layers OptimizeTransparency \
//-map animation_cmap.gif \
//animation_fuzz_2x2.gif



$output = '';




$date = date("Y_m_d_H_i_s");
$animDir = 'anim'.$date;
$outputDir = 'output'.$date;

$format = "-f image2 ./$animDir/%04d.png";

$extractCommand = "$ffmpeg -ss $startTime -i $sourceVideo -t $endTime $resize $format";


$output .= "mkdir $animDir\n";
$output .= "mkdir $outputDir\n";

$output .= "\n";


$output .= $extractCommand."\n";

$output .= <<< END

numfiles=(./$animDir/*)
numfiles=\${#numfiles[@]}


END;

$frameSkipOptions = [
    '1' => 1,
    //'2' => 2,
    //'3' => 3,
    //'4' => 4,
    
];

$colorMapOptions = [
    //'cmap' => '+map',
    'nocmap' => ''
];

$fuzzOptions = [
    'f1' => '-fuzz 1%',
    'f2' => '-fuzz 2%',
    'f4' => '-fuzz 4%',
    'f8' => '-fuzz 8%',
];

$ditherOptions = [
    'none'            => ' ',

    //'dither256' => "+dither  -colors 256",
    
    'o2x2_6'          => '-ordered-dither o2x2,6',
    //'o2x2_7'          => '-ordered-dither o2x2,7',
//    'o2x2_8'          => '-ordered-dither o2x2,8',
//    'o2x2_9'          => '-ordered-dither o2x2,9',
    //'o4x4_6'          => '-ordered-dither o4x4,6',
    //'o4x4_8'          => '-ordered-dither o4x4,8',
    //'o8x8_8'            => '-ordered-dither o8x8,8',
//    'o8x8_8_8_4'        => '-ordered-dither o8x8,8,8,4',
//    'o8x8_10'           => '-ordered-dither o8x8,10',
    'FloydSteinberg'    => '-dither FloydSteinberg',
//    'Riemersma'         => '-dither Riemersma',

];

$optimiseOptions = [
    'optimFrame' => '-layers OptimizeFrame',
    'optimTrans' => '-layers OptimizeTransparency',
    'optimPlus' => '-layers OptimizePlus',
    'composite' => '-layers Composite'
    ///
];

foreach ($fuzzOptions as $fuzzOptionName => $fuzzOption) {
    foreach ($frameSkipOptions as $frameSkipName => $frameSkipOption) {
        foreach ($colorMapOptions as $colorMapName => $colorMapOption) {
            foreach ($optimiseOptions as $optimiseOptionName => $optimiseOption) {
                foreach ($ditherOptions as $ditherOptionName => $ditherOption) {
        
                    $listOfFrames = "`seq -f ./$animDir/%04g.png $startFrame $frameSkipOption \${numfiles}`";
                    $frameDelay = $frameSkipOption * 100 / ($frameRate);
        
        //            echo "dither $ditherOption cmap '$colorMapName' frameSkip $frameSkipOption";
    
                    //echo "frameDelay $frameDelay";
                
                    $output .= <<< END
                    
                    echo "dither $ditherOptionName cmap '$colorMapName' frameSkip $frameSkipOption optim $optimiseOptionName fuzz $fuzzOption";

                    $convertExe $fuzzOption \
                    -delay ${frameDelay}x100 $listOfFrames \
                    $ditherOption \
                    -coalesce \
                    $optimiseOption \
                    ./$outputDir/animation_${ditherOptionName}_${colorMapName}_${frameSkipOption}_${optimiseOptionName}_f${fuzzOptionName}.gif
END;
            
                }
            }
        }
    }
}


file_put_contents('runme.sh', $output);


//$convertExe -fuzz 1% -delay 1x10 $listOfFrames \
//-ordered-dither o2x2,6 \
//-coalesce -layers OptimizeTransparency \
//-map animation_cmap.gif \
//animation_fuzz_2x2.gif









//
//mkdir anim && cd anim
//
//
//ffmpeg -ss 0:00:14 -i video1.avi -t 0:00:02 -s 480x270 -f image2 ./anim/%03d.png
//
//
//seq -f %03g.png 10 3 72
//
//
//convert -delay 1x10 `seq -f %03g.png 10 3 72` \
//-coalesce -layers OptimizeTransparency animation.gif
//
///usr/local/bin/convert -delay 1x10 `seq -f ./anim/%03g.png 1 1 31` \
//-coalesce -layers OptimizeTransparency animation.gif
//          
//          
//          
//          
//          
//          
//convert -fuzz 1% -delay 1x10 `seq -f %03g.png 10 3 72` \
//-coalesce -layers OptimizeTransparency animation.gif
//
///usr/local/bin/convert +dither -delay 1x10 `seq -f ./anim/%03g.png 1 1 31` \
//-coalesce -layers OptimizeTransparency animation_simple.gif
//          
//          
//convert -delay 1x10 `seq -f %03g.png 10 3 72` \
//-ordered-dither o8x8,8 \
//-coalesce -layers OptimizeTransparency \
//-append -format %k info:
//          
//
//          OptimizePlus
//
//
//          /usr/local/bin/convert -delay 1x10 `seq -f ./anim/%03g.png 1 1 31` \
//-ordered-dither o8x8,8 \
//-coalesce -layers OptimizePlus \
//+map animation_plus.gif
//
//
//
///usr/local/bin/convert `seq -f ./anim/%03g.png 1 1 31` \
//\( -clone 0--1 -background none +append \
//-quantize transparent  -colors 255  -unique-colors \
//-write mpr:cmap    +delete \) \
//-map mpr:cmap      animation_cmap.gif
//





//
///usr/local/bin/convert -delay 1x10 `seq -f ./anim/%03g.png 1 1 31` \
//-ordered-dither o8x8,8 \
//-coalesce -layers OptimizeTransparency \
//-map animation_cmap.gif \
//+map animation_transparency.gif
//
//
//
///usr/local/bin/convert -fuzz 1% -delay 1x10 `seq -f ./anim/%03g.png 1 1 31` \
//-ordered-dither o8x8,8,8,4 \
//-coalesce -layers OptimizeTransparency \
//-map animation_cmap.gif \
//animation_fuzz_order.gif
//
//
//
///usr/local/bin/convert -fuzz 1% -delay 1x10 `seq -f ./anim/%03g.png 1 1 31` \
//-ordered-dither o2x2,6 \
//-coalesce -layers OptimizeTransparency \
//-map animation_cmap.gif \
//animation_fuzz_2x2.gif
//
//
//
///usr/local/bin/convert -fuzz 1% -delay 1x10 `seq -f ./anim/%03g.png 1 1 31` \
//-coalesce -layers OptimizeTransparency \
//-map animation_cmap.gif \
//animation_fuzz.gif
//
///usr/local/bin/convert -quiet -delay 1 plane.avi \
//-ordered-dither o8x8,8,8,4 +map plane_od.gif
//



//
//
//-dither FloydSteinberg
//
///usr/local/bin/convert -delay 1x10 `seq -f ./anim/%03g.png 1 2 31` \
//-dither FloydSteinberg \
//-coalesce -layers OptimizeTransparency +map animation_floyd.gif
//
//
//
//
//
///usr/local/bin/convert -delay 1x10 `seq -f ./anim/%03g.png 1 1 31` \
//-dither FloydSteinberg \
//-map animation_cmap.gif \
//-coalesce -layers OptimizeTransparency animation_floyd_cmap.gif
//
//
///usr/local/bin/convert -delay 1x10 `seq -f ./anim/%03g.png 1 2 31` \
//-dither FloydSteinberg \
//-map animation_cmap.gif \
//-coalesce -layers OptimizeTransparency +map animation_floyd_cmap_and_map.gif
//          
//          
//          
//Riemersma
//
///usr/local/bin/convert -delay 1x10 `seq -f ./anim/%03g.png 1 2 31` \
//-dither Riemersma \
//-coalesce -layers OptimizeTransparency +map animation_Riemersma.gif
//


//-format %k info:
//          
//          
///usr/local/bin/convert -delay 1x10 `seq -f ./anim/%03g.png 1 2 31` \
//-dither Riemersma \
//-coalesce -layers OptimizeTransparency  -format "%k " info:
//          
//          
//          
//          
///usr/local/bin/convert -delay 1x10 `seq -f ./anim/%03g.png 1 2 31` \
//-ordered-dither o8x8,10 \
//-coalesce -layers OptimizeTransparency \
//-append -format %k info:
//          
//          
///usr/local/bin/convert -delay 1x10 `seq -f ./anim/%03g.png 1 2 31` \
//-ordered-dither o8x8,10 \
//-coalesce -layers OptimizeTransparency \
//+map animation_10level.gif 
//
