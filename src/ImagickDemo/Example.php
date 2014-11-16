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

    function renderDescription() {
        return null;
    }

    /**
     * Get number of bootstrap columns the content should be offset by 
     * @return int
     */
    function getColumnOffset() {
        return 3;
    }

    function renderDescriptionPanel($smaller = false) {

        $description = $this->renderDescription();
        
        if (!$description) {
            return null;
        }

//        if ($smaller == true) {
//            $output = '<div class="row">
//                <div class="col-md-12 visible-xs visible-sm">';
//        }
//        else {
//            $output = '<div class="row">
//                <div class="col-md-12 visible-md visible-lg">';
//            
//        }
        
        $output = getPanelStart($smaller, 'textPanelSpacing');
        $output .= $description;
        $output .= getPanelEnd();
        
//        $output .= "</div>
//            </div>";
        
        return $output;
    }

    function renderImageURL() {

        $js = '';
        $originalImage = $this->getOriginalImage();

        $output = '';

        $originalText = "(touch/mouse over to see original)";
        $modifiedText = "(touch/mouse out to see modified)";

        if ($originalImage == true) {
            $modifiedImage = $this->control->getURL();

            $output .= <<< JAVASCRIPT

<script type='text/javascript'>

function toggleImage(imageSelector, mouseSelector, originalURL, originalText, modifiedURL, modifiedText) {

    var newImageURL; 
    var newText;
    
    if ( typeof toggleImage.originalImage == 'undefined' ) {
        // First call, perform the initialization
        toggleImage.originalImage = false;
    }

    if (toggleImage.originalImage) {
        newImageURL = modifiedURL;
        newText = modifiedText;
        toggleImage.originalImage = false;
    }
    else {
        newImageURL = originalURL;
        newText = originalText;
        toggleImage.originalImage = true;
    }

    $(imageSelector).attr('src', newImageURL);
    $(mouseSelector).text(newText);
}

</script>

JAVASCRIPT;

            $changeToOriginal = ("$('#exampleImage').attr('src', '$originalImage' ); $('#mouseText').text('$modifiedText')");
            
            $changeToModified = ("$('#exampleImage').attr('src', '$modifiedImage' ); $('#mouseText').text('$originalText')");
            
            $mouseOver = "onmouseover=\"$changeToOriginal\"\n";
            $mouseOut = "onmouseout=\"$changeToModified\" \n";
            $touch = "toggleImage('#exampleImage', '#mouseText', '$originalImage', '$originalText', '$modifiedImage', '$modifiedText')";

            $touchStart = "ontouchstart=\"$touch\"\n";
            $touchEnd =  "ontouchend=\"$touch\"\n";

            $js = $mouseOver.' '.$mouseOut.' '.$touchStart;
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

 