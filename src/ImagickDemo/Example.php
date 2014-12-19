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

    function renderCustomImageURL($extraParams = []) {
        return sprintf(
            "<img src='%s' />",
            $this->control->getCustomImageURL($extraParams)
        );
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
    function renderImageURL() {
        $js = '';
        $imgURL = $this->control->getURL();
        $originalImage = $this->getOriginalImage();

        $output = '';

        $output .= $this->control->getImageStatusURL();
        
        $newWindow = sprintf(
            "<a href='%s' target='_blank'>View modified in new window.</a>",
            $imgURL
        );
        
        
        $originalText = "Touch/mouse over to see original ";
        $modifiedText = "Touch/mouse out to see modified ";

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

            $changeToOriginal = sprintf(
                "$('#exampleImage').attr('src', '%s' ); $('#mouseText').text('%s')",
                addslashes($originalImage),
                addslashes($modifiedText)
            );
            
            $changeToModified = sprintf(
                "$('#exampleImage').attr('src', '%s' ); $('#mouseText').text('%s')",
                addslashes($modifiedImage),
                addslashes($originalText)
            );
            
            $mouseOver = "onmouseover=\"$changeToOriginal\"\n";
            $mouseOut = "onmouseout=\"$changeToModified\" \n";
            $touch = sprintf(
                "toggleImage('#exampleImage', '#mouseText', '%s', '%s', '%s', '%s')",
                $originalImage,
                $originalText,
                $modifiedImage,
                $modifiedText
            );

            $touchStart = "ontouchstart=\"$touch\"\n";
            //$touchEnd =  "ontouchend=\"$touch\"\n";

            $js = $mouseOver.' '.$mouseOut.' '.$touchStart;
        }

        $output .= sprintf(
            "<img src='%s' id='exampleImage' class='img-responsive' %s />",
            $imgURL,
            $js
        );

        if ($originalImage == true) {
            $output .= "<div class='row'>";
            $output .= "<div class='col-xs-12 text-center' style='font-size: 12px'>";
            
            $output .= "<span id='mouseText'>";
            $output .= $originalText;
            $output .= "</span>";
            $output .= $newWindow;
            $output .= "</div>";
            
            
            $output .= "</div>";
        }

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

 