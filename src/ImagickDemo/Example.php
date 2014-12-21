<?php


namespace ImagickDemo;


interface renderableExample {
    function renderTitle();
    function render();
    function renderCodeLink();
}

abstract class Example implements renderableExample {

    /**
     * @var Control
     */
    protected $control;

    function __construct(\ImagickDemo\Control $control) {
        $this->control = $control;
    }

    function getOriginalImage() {
        return false;
    }

    function renderOriginalImage() {
        throw new \Exception("This shouldn't be reached - example missing renderOriginalImage method.");
    }
    
    function renderTitle() {
        return getClassName(get_class($this));
    }

    function renderDescription() {
        return null;
    }

    function getCustomImageParams() {
        return [];
    }

    function renderImageURL() {
        return $this->control->renderImageURL($this->getOriginalImage());
    }

    function renderCustomImageURL($extraParams = []) {
        return $this->control->renderCustomImageURL($extraParams);
    }

    /**
     * Get number of bootstrap columns the content should be offset by 
     * @return int
     */
    function getColumnOffset() {
        return 2;
    }

    function getColumnRightOffset() {
        return 0;
    }

    /**
     * @param bool $smaller
     * @return null|string
     */
    function renderDescriptionPanel($smaller = false) {
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
    function renderCodeLink() {
        //TODO - this is the wrong link.
        $classname = get_class($this);
        $classname = str_replace('\\', '/', $classname);
        $url = "https://github.com/Danack/Imagick-demos/blob/master/src/".$classname.".php";

        return "<a href='$url' target='_blank'>Source code on Github</a>";
    }
}

 