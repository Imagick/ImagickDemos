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

    function renderTitle() {
        return getClassName(get_class($this));
    }

    function renderImageURL() {

        $js = '';
        $originalImage = $this->getOriginalImage();

        $output = '';

        $originalText = "(touch/mouse over to see original)";
        $modifiedText = "(touch/mouse out to see modified)";

        if ($originalImage == true) {
            $modifiedImage = $this->control->getURL();

            $changeToOriginal = "$('#exampleImage').attr('src', '$originalImage' ); $('#mouseText').text('$modifiedText')";
            
            $changeToModified = "$('#exampleImage').attr('src', '$modifiedImage' ); $('#mouseText').text('$originalText')\"";
            
            $mouseOver = "onmouseover=\"$changeToOriginal\"";
            $touchStart = "ontouchstart=\"$changeToOriginal\"";

            $mouseOut = "onmouseout=\"$changeToModified\"";
            $touchStop =  "ontouchstart=\"$changeToModified\"";

            $js = $mouseOver.' '.$mouseOut.' '.$touchStart.' '.$touchStop;
        }

        
        
        $output .= sprintf("<img src='%s' id='exampleImage' class='img-responsive' %s />", $this->control->getURL(), $js);

        if ($originalImage == true) {
            $output .= "<br/>";
            $output .= "<span id='mouseText' style='font-size: 12px'>$originalText</span>";
        }
        
        return $output;
    }

    function renderCodeLink() {
        //TODO - this is the wrong link.
        $classname = get_class($this);
        $classname = str_replace('\\', '/', $classname);
        $url = "https://github.com/Danack/Imagick-demos/blob/master/src/".$classname.".php";

        return "<a href='$url' target='_blank'>Source code on Github</a>";
    }
}

 