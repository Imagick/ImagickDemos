<?php

namespace ImagickDemo\Banners;

class PHPStormBanner implements Banner
{
    public function render()
    {
        $output = <<< END

<a href="http://www.jetbrains.com/phpstorm/" style="display:block; background:#5854b5 url(http://www.jetbrains.com/phpstorm/documentation/phpstorm_banners/phpstorm1/phpstorm468x60_violet.gif) no-repeat 10px 50%; border:solid 1px #5854b5; margin:0;padding:0;text-decoration:none;text-indent:0;letter-spacing:-0.001em; width:466px; height:58px" alt="Lightning-smart IDE for PHP development" title="Lightning-smart IDE for PHP development"><span style="margin: 3px 0 0 65px;padding: 0;float: left;font-size: 12px;cursor:pointer;  background-image:none;border:0;color: #fff; font-family: trebuchet ms,arial,sans-serif;font-weight: normal;text-align:left;">Developed with</span><span style="margin:0 0 0 185px;padding:18px 0 2px 0; line-height:13px;font-size:13px;cursor:pointer;  background-image:none;border:0;display:block; width:270px; color: #fff; font-family: trebuchet ms,arial,sans-serif;font-weight: normal;text-align:left;">Lightning-smart IDE for PHP<br/>development</span></a>

END;

        return $output;
    }
}
