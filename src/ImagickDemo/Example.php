<?php

namespace ImagickDemo;

use ImagickDemo\Imagick\Controls\NullControl;

abstract class Example
{
    // Means that the image selected in the control
    // must be used as the original image and not a hard-coded path.
    public function useImageControlAsOriginalImage()
    {
        return false;
    }

    public function getOriginalImage()
    {
        return false;
    }

    public static function getParamType(): string
    {
        return NullControl::class;
    }

    public function isRemovedInIM7()
    {
        return false;
    }

    public function hasCustomImage(): bool
    {
        return false;
    }

    public function renderOriginalImage()
    {
        throw new \Exception("This shouldn't be reached - example missing renderOriginalImage method.");
    }

    public function getOriginalFilename(): string|null
    {
        return null;
    }

    public function renderCustomImage()
    {
        throw new \Exception("This shouldn't be reached - example missing renderCustomImage method.");
    }

    abstract public function renderTitle(): string;

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

    public function renderCustomImageURL(
        $extraParams = [],
        $originalImageURL = null
    ) {
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

        $output = Display::getPanelStart($smaller, 'textPanelSpacing');
        $output .= $description;
        $output .= Display::getPanelEnd();

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
        $url = "https://github.com/Danack/Imagick-demos/blob/master/src/" . $classname . ".php";

        return "<a href='$url' target='_blank'>Source code on Github</a>";
    }

    public function needsFullPageRefresh(): bool
    {
        return false;
    }

    public function render(
        ?string $activeCategory,
        ?string $activeExample
    ) {
        // What about custom images?
        $imageBaseUrl = \ImagickDemo\Route::getImageURL($activeCategory, $activeExample);

        if ($this->hasCustomImage() === true) {
            $imageBaseUrl = \ImagickDemo\Route::getCustomImageURL(
                $activeCategory,
                $activeExample
            );
        }

        $pageBaseUrl = \ImagickDemo\Route::getPageURL($activeCategory, $activeExample);
        return createReactImagePanel(
            $imageBaseUrl,
            $pageBaseUrl,
            $this
        );
    }
}