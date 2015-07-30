<?php


namespace ImagickDemo;

//
//interface renderableExample
//{
//    function renderTitle();
//    function render();
//    function renderCodeLink();
//}

abstract class Example // implements renderableExample
{
    /**
     * @var Control
     */
    protected $control;

    public function __construct(\ImagickDemo\Control $control)
    {
        $this->control = $control;
    }

    public function getOriginalImage()
    {
        return false;
    }

    public function renderOriginalImage()
    {
        throw new \Exception("This shouldn't be reached - example missing renderOriginalImage method.");
    }
    
    public function renderTitle()
    {
        return getClassName(get_class($this));
    }

    public function renderDescription()
    {
        return null;
    }

    public function getCustomImageParams()
    {
        return [];
    }

    public function renderImageURL()
    {
        return $this->control->renderImageURL($this->getOriginalImage());
    }

    public function renderCustomImageURL($extraParams = [], $originalImageURL = null)
    {
        //This sucks...two default params....eww.
        return $this->control->renderCustomImageURL($extraParams, $originalImageURL);
    }

    /**
     * Get number of bootstrap columns the content should be offset by
     * @return int
     */
    public function getColumnOffset()
    {
        return 2;
    }

    public function getColumnRightOffset()
    {
        return 0;
    }

    /**
     * @param bool $smaller
     * @return null|string
     */
    public function renderDescriptionPanel($smaller = false)
    {
        $description = $this->renderDescription();
        if (!$description) {
            return null;
        }

        $output = getPanelStart($smaller, 'textPanelSpacing');
        $output .= $description;
        $output .= getPanelEnd();
        
        return $output;
    }

    /**
     * @return string
     */
    public function renderCodeLink()
    {
        //TODO - this is the wrong link.
        $classname = get_class($this);
        $classname = str_replace('\\', '/', $classname);
        $url = "https://github.com/Danack/Imagick-demos/blob/master/src/".$classname.".php";

        return "<a href='$url' target='_blank'>Source code on Github</a>";
    }
}
