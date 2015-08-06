<?php

namespace ScriptServer\Service;

class ScriptIncludeIndividual extends ScriptInclude
{
    public function linkJS()
    {
        $jsVersion = $this->scriptVersion;
        $output = '';

        foreach ($this->includeJSArray as $includeJS) {
            $output .= "<script type='text/javascript' src='/js/".$includeJS.".js?version=$jsVersion'></script>\n";
        }

        return $output;
    }
    
    /**
     * @return string
     */
    public function linkCSS()
    {
        $output = "";

        foreach ($this->cssFiles as $cssFile) {
            $mediaString = '';

            if ($cssFile->mediaQuery) {
                $mediaString = " media='".$cssFile->mediaQuery."' ";
            }
    
            $output .= sprintf(
                "<link rel='stylesheet' type='text/css' %s href='/css/%s.css?%s' />\n",
                $mediaString,
                $cssFile->file,
                $this->scriptVersion
            );
        }

        return $output;
    }
}
