<?php

namespace ScriptServer\Service;

use ScriptServer\Value\ScriptVersion;

class ScriptIncludeIndividual extends ScriptInclude
{
    /**
     * @var ScriptVersion
     */
    private $scriptVersion;
    
    public function __construct(ScriptVersion $scriptVersion)
    {
        $this->scriptVersion = $scriptVersion;
    }
    
    public function linkJS()
    {
        $output = '';

        foreach ($this->includeJSArray as $includeJS) {
            $output .= sprintf(
                "<script type='text/javascript' src='/js/%s.js?version=%s'></script>\n",
                $includeJS,
                $this->scriptVersion->getValue()
            );
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
                $this->scriptVersion->getValue()
            );
        }

        return $output;
    }
}
