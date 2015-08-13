<?php

namespace ScriptServer\Service;

use ScriptServer\CSSFile;

abstract class ScriptInclude
{
    protected $includeJSArray = array();

    /**
     * @var CSSFile[]
     */
    protected $cssFiles = [];

    private $onBodyLoadJavascript = array();


    abstract public function linkCSS();
    abstract public function linkJS();

    /**
     * @param $dataBindingJS
     */
    public function addBodyLoadFunction($dataBindingJS)
    {
        $this->onBodyLoadJavascript[] = $dataBindingJS;
    }

    /**
     * @param $cssFile
     * @param string $media
     */
    public function addCSS($cssFile, $media = 'screen')
    {
        $this->cssFiles[] = new CSSFile($cssFile, $media);
    }


    /**
     * @param $includeJS
     */
    public function addJS($includeJS)
    {
        $this->includeJSArray[] = $includeJS;
    }

    /**
     * @return string
     */
    public function emitOnBodyLoadJavascript()
    {
        $output = "";
        $output .= "<script type='text/javascript'>";
        $output .= "try {\n";

        foreach ($this->onBodyLoadJavascript as $functionToPerform) {
            $output .= $functionToPerform."\n";
        }

        $output .= "//hey we've loaded";
        $output .= "\n } catch (error) { ";
        $output .= "// alert('Error caught: ' + error)";
        $output .= " }";
        $output .= "</script>";

        return $output;
    }
}
