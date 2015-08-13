<?php

namespace ScriptServer\Service;

use ScriptServer\CSSFile;
use ScriptServer\Value\ScriptVersion;

class ScriptIncludePacked extends ScriptInclude
{
    private $scriptVersion;
    
    public function __construct(
        ScriptVersion $scriptVersion
    ) {
        $this->scriptVersion = $scriptVersion;
    }

    public function linkJS()
    {
        $separator = ',';

        if (count($this->includeJSArray) == 0) {
            return "";
        }

        $url = $this->scriptVersion->getValue();
        $output = "<script type='text/javascript'>\n";

        foreach ($this->includeJSArray as $includeJS) {
            $url .= $separator;
            $url .= urlencode($includeJS);
        }

        $output .= "</script>\n";
        $domain = '';
//        $domain = $this->domain->getContentDomain(0);
        $uri = routeJSInclude($url);
        $output .= "<script type='text/javascript' src='".$domain.$uri."'></script>";

        return $output;
    }

    /**
     * @param $media
     * @param $cssList CSSFile[]
     */
    private function renderMediaCSS($mediaQuery, $cssList)
    {
        $fileList = '';
        $separator = '';

        foreach ($cssList as $cssFile) {
            /** @var $cssFile CSSFile */
            $fileList .= $separator;
            $fileList .= urlencode($cssFile->getFile());
            $separator = ',';
        }

        //$domain = $this->domain->getContentDomain(0);

        $mediaString = '';

        if ($mediaQuery) {
            $mediaString = " media='".$mediaQuery."' ";
        }

        $output = sprintf(
            "<link rel='stylesheet' type='text/css' %s href='/css/%s?%s' />\n",
            $mediaString,
            $fileList,
            $this->scriptVersion->getValue()
        );

        return $output;
    }
    
    /**
     * @return string
     */
    public function linkCSS()
    {
        if (count($this->cssFiles) == 0) {
            return "";
        }

        $mediaCSS = [];

        foreach ($this->cssFiles as $cssFile) {
            $mediaCSS[$cssFile->getMediaQuery()][] = $cssFile;
        }
        
        $output = "";

        foreach ($mediaCSS as $media => $cssList) {
            $output .= $this->renderMediaCSS($media, $cssList);
        }

        return $output;
    }
}
