<?php

namespace ScriptServer;

class CSSFile
{
    /**
     * @var
     */
    public $file;

    /**
     * @var
     */
    public $mediaQuery;

    /**
     * @param $file
     * @param $mediaQuery
     * Media queries look a little like:
     *    screen and (min-width: 1280px), print and (min-resolution: 300dpi)
     */
    public function __construct($file, $mediaQuery)
    {
        $this->file = $file;
        $this->mediaQuery = $mediaQuery;
    }

    /**
     * @return mixed
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @return mixed
     */
    public function getMediaQuery()
    {
        return $this->mediaQuery;
    }

    public function render($jsVersion)
    {
        $mediaString = '';

        if ($this->mediaQuery) {
            $mediaString = " media='".$this->mediaQuery."' ";
        }

        return sprintf(
            "<link rel='stylesheet' type='text/css' %s href='/css/%s?%s' />\n",
            $mediaString,
            $this->file,
            $jsVersion
        );
    }
}
