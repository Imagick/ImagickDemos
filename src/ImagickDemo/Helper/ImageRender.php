<?php

namespace ImagickDemo\Helper;

class ImageRender
{
    private $useAsyncLoading;
    private $imgURL;
    private $originalImageURL;
    private $statusURL;
    private $output = '';
    private $originalText = "Touch/mouse over to see original ";
    private $modifiedText = "Touch/mouse out to see modified ";

    public function __construct(
        $useAsyncLoading,
        $imgURL,
        $originalImageURL,
        $statusURL
    ) {
        $this->useAsyncLoading = $useAsyncLoading;
        $this->imgURL = $imgURL;
        $this->originalImageURL = $originalImageURL;
        $this->statusURL = $statusURL;
    }

    /**
     * @return string
     */
    private function getOriginalImageJS()
    {
        if (!$this->originalImageURL) {
            return '';
        }
        
        $changeToOriginal = sprintf(
            "$('#exampleImage').attr('src', '%s' ); $('#mouseText').text('%s')",
            addslashes($this->originalImageURL),
            addslashes($this->modifiedText)
        );

        $changeToModified = sprintf(
            "$('#exampleImage').attr('src', '%s' ); $('#mouseText').text('%s')",
            addslashes($this->imgURL),
            addslashes($this->originalText)
        );

        $mouseOver = "onmouseover=\"$changeToOriginal\"\n";
        $mouseOut = "onmouseout=\"$changeToModified\" \n";
        $touch = sprintf(
            "ontouchstart=\"toggleImage('#exampleImage', '#mouseText', '%s', '%s', '%s', '%s')\"",
            $this->originalImageURL,
            $this->originalText,
            $this->imgURL,
            $this->modifiedText
        );

        return $mouseOver.' '.$mouseOut.' '.$touch;
    }

    /**
     * @return string
     */
    public function render()
    {
        $this->output = '';
        $this->openContainer();
        
        $this->output .= "<div class='col-xs-12 text-center' style='font-size: 12px'>";
        $this->addAsyncLoading();
        $this->addImage();
        $this->output .= "</div>";
        $this->closeContainer();

        return $this->output;
    }

    /**
     *
     */
    private function addImage()
    {
        $js = $this->getOriginalImageJS();

        $imageURL = $this->imgURL;
        $this->output .= sprintf(
            "<div class='row imageShown'>
                <img src='%s' id='exampleImage' class='img-responsive exampleImage wtfmate  ' %s />
            ",
            $imageURL,
            $js
        );

        $this->output .= "<span class='imageShown'>";
        $this->addOriginalText();
        $this->output .= "</span>";
        
        $this->output .= "</div>";
    }

    /**
     *
     */
    private function addAsyncLoading()
    {
        if ($this->useAsyncLoading) {
            $this->output .= "<span class='asyncLoading asyncShown' style='display: none'>";
            $this->output .= "<span class='asyncImageStatus' >Async image loading...</span> <br/>";
            $this->output .= "<img class='asyncSpinner' src='/images/loading.gif'/> <br/>";
            $this->output .= "</span>";
        }
    }

    /**
     *
     */
    private function openContainer()
    {
        $enabled = 'false';
        if ($this->useAsyncLoading) {
            $enabled = 'true';
        }
        
        $this->output .= sprintf(
            "<span class='asyncImage' data-statusuri='%s' data-imageuri='%s' data-enabled='%s'>",
            addslashes($this->statusURL),
            addslashes($this->imgURL),
            $enabled
        );
    }

    /**
     *
     */
    private function closeContainer()
    {
        $this->output .= "</span>";
    }

    /**
     *
     */
    private function addOriginalText()
    {
        if (!$this->originalImageURL) {
            return;
        }
        
        $newWindow = sprintf(
            "<a href='%s' target='_blank'>View modified in new window.</a>",
            $this->imgURL
        );

        $this->output .= "<span id='mouseText'>";
        $this->output .= $this->originalText;
        $this->output .= "</span>";
        $this->output .= $newWindow;
    }
}
