<?php

namespace ImagickDemo\JigPlugin;

use Jig\Plugin;
use Jig\JigException;

class ImagickPlugin implements Plugin
{
    static private $functionList = [
        'var_dump',
        'peakMemory',
        'tagManagerInHead',
        'tagManagerInBodyStart',
        'analytics',
        'adSlotLeaderBoard',
        'responsiveAdSlot'
    ];

    public static function getFunctionList()
    {
        return self::$functionList;
    }

    public static function hasBlock($blockName)
    {
        $blockList = static::getBlockRenderList();

        return in_array($blockName, $blockList, true);
    }
    
    public static function hasFunction($functionName)
    {
        $functionList = static::getFunctionList();

        return in_array($functionName, $functionList, true);
    }
    
    /**
     * @param string $functionName
     * @param array $params
     * @return mixed
     * @throws JigException
     */
    public function callFunction($functionName, array $params)
    {
        if (method_exists($this, $functionName) == true) {
            return call_user_func_array([$this, $functionName], $params);
        }

        if (in_array($functionName, self::$functionList)) {
            call_user_func_array($functionName, $params);
        }

        throw new JigException("No function called [$functionName] in BasicPlugin");
    }

    public static function getBlockRenderList()
    {
        return [
            'trim',
        ];
    }

    /**
     * @param $blockName
     * @param string $extraParam
     * @return mixed
     */
    public function callBlockRenderStart($blockName, $extraParam)
    {
        $blockNameStart = $blockName."BlockRenderStart";

        if (method_exists($this, $blockNameStart) == true) {
            return call_user_func([$this, $blockNameStart], $extraParam);
        }

        throw new JigException("No function called [$blockNameStart] in BasicPlugin");
    }

    /**
     * @param string $blockName
     * @param string $contents
     * @return mixed
     */
    public function callBlockRenderEnd($blockName, $contents)
    {
        $blockNameEnd = $blockName."BlockRenderEnd";

        if (method_exists($this, $blockNameEnd) == true) {
            return call_user_func([$this, $blockNameEnd], $contents);
        }
        
        throw new JigException("No function called [$blockNameEnd] in BasicPlugin");
    }

    public function trimBlockRenderStart($segmentText)
    {
        return "";
    }

    /**
     * @param $content
     * @return string
     */
    public function trimBlockRenderEnd($content)
    {
        return trim($content);
    }

    public static function getFilterList()
    {
        return ['upper', 'lower'];
    }
    
    /**
     * @param string $filterName The name of the filter.
     * @param string $string
     * @return mixed
     */
    public function callFilter($filterName, $string)
    {
        if (method_exists($this, $filterName) == true) {
            return call_user_func([$this, $filterName], $string);
        }

        throw new JigException(
            "No filter called [$filterName] in BasicPlugin"
        );
    }

    public function upper($string)
    {
        return strtoupper($string);
    }
    
    public function lower($string)
    {
        return strtolower($string);
    }
    
    public function peakMemory($real_usage = false)
    {
        return number_format(memory_get_peak_usage($real_usage));
    }

    public function tagManagerInHead() 
    {
        // Paste this code as high in the <head> of the page as possible:
        $HTML = <<< HTML
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-TPG3RVN');</script>
<!-- End Google Tag Manager -->

HTML;

        return $HTML;
    }

    public function tagManagerInBodyStart()
    {
        //Additionally, paste this code immediately after the opening <body> tag:
        $HTML = <<< HTML

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TPG3RVN"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
HTML;
        return $HTML;
    }

    public function analytics()
    {
        $HTML = <<< HTML
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-32004535-2', 'auto');
  ga('send', 'pageview');

</script>
HTML;

        return $HTML;
    }

    /**
     * 
     * 728 x 90
     * Leaderboard
     */
    function adSlotLeaderBoard()
    {
        $HTML = <<< HTML
        
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- TestLeaderboardText -->
<ins class="adsbygoogle"
     style="display:inline-block;width:728px;height:90px"
     data-ad-client="ca-pub-2560334673780653"
     data-ad-slot="1471701929"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
HTML;

        return $HTML;
    }
    
    
    
    function responsiveAdSlot()
    {
        $HTML = <<< HTML
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- TestResponsiveText -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-2560334673780653"
     data-ad-slot="8315154322"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>

HTML;

        return $HTML;
    }
}
