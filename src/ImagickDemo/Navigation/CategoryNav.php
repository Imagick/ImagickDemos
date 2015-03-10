<?php


namespace ImagickDemo\Navigation;



class CategoryNav implements Nav {

    protected $currentExample;

    /**
     * @var array
     */
    private $exampleList;

    /**
     * @param $category
     * @param $example
     */
    function __construct($category, $example) {
        $this->category = $category;
        $this->currentExample = $example;
        $this->exampleList = $this->getCategoryList($category);
    }

    function getCategory() {
        return $this->category;
    }

    /**
     * @return mixed
     */
    function getBaseURI() {
        return $this->category;
    }

    /**
     * @return mixed
     */
    function renderTitle() {
        if ($this->currentExample) {
            return $this->currentExample;
        }
        return $this->category;
    }

    /**
     * @param \Auryn\Provider $injector
     */
    function setupControlAndExample(\Auryn\Provider $injector) {
        $navName = $this->getCurrentName();

        if ($navName) {
                $exampleClassname = sprintf('ImagickDemo\%s\%s', $this->category, $navName);
        }
        else {
            $exampleClassname = sprintf('ImagickDemo\%s\nullExample', $this->category);
        }

        $injector->alias(\ImagickDemo\Example::class, $exampleClassname);
    }

    /**
     * @internal param $current
     * @internal param $array
     * @return string
     */
    function getPreviousName() {

        $current = $this->currentExample;
        $previous = null;
        foreach ($this->exampleList as $exampleName => $exampleDefinition) {
            if (strcmp($current, $exampleName) === 0) {
                if ($previous) {
                    return $previous;
                }
            }
            $previous = $exampleName;
        }

        return null;
    }

    /**
     * @return string
     */
    function getCurrentName() {
        foreach ($this->exampleList as $exampleName => $exampleDefinition) {
            if (strcmp($this->currentExample, $exampleName) === 0) {
                return $exampleName;
            }
        }

        return null;
    }


    
    
    /**
     * @internal param $current
     * @return string
     */
    function getNextName() {
        $current = $this->currentExample;
        $next = false;
        foreach ($this->exampleList as $exampleName => $exampleDefinition) {
            if ($next == true) {
                return $exampleName;
            }
            if (strcmp($current, $exampleName) === 0) {
                $next = true;
            }
        }

        return null;
    }

    /**
     * @return string
     */
    function renderPreviousButton() {
        $previousNavName = $this->getPreviousName();

        if ($previousNavName) {
            return "<a href='/".$this->category."/".$previousNavName."'>
            <button type='button' class='btn btn-primary'>
             <span class='glyphicon glyphicon-arrow-left'></span> ".$previousNavName."
            </button>
            </a>";
        }

        return "";
    }

    /**
     * @return string
     */
    function renderPreviousLink() {
        $previousNavName = $this->getPreviousName();

        if ($previousNavName) {
            return "<a href='/".$this->category."/".$previousNavName."'>
             <span class='glyphicon glyphicon-arrow-left'></span> ".$previousNavName."
            </a>";
        }

        return "";
    }
    
    
    /**
     * @return string
     */
    function renderNextButton() {
        $nextName = $this->getNextName();

        if ($nextName) {
            echo "<a href='/".$this->category."/".$nextName."'>
            <button type='button' class='btn btn-primary'>
            ".$nextName." <span class='glyphicon  glyphicon-arrow-right'></span>
            </button>
            </a>";
        }

        return "";
    }

    /**
     * @return string
     */
    function renderNextLink() {
        $nextName = $this->getNextName();

        if ($nextName) {
            echo "<a href='/".$this->category."/".$nextName."'>
            ".$nextName." <span class='glyphicon  glyphicon-arrow-right'></span>
            </a>";
        }

        return "";
    }

   
    /**
     *
     */
    function renderSelect() {

        $output = '';

        $exampleLabel = 'Choose example';

        if ($this->currentExample) {
            $exampleLabel = $this->currentExample;
        }

        $output .= <<< END
<!-- Single button -->
<div class="btn-group">
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
            $exampleLabel <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" role="menu">
END;
        
        foreach ($this->exampleList as $exampleName => $exampleDefinition) {
            //$output .= "<li><a href='$url'>$name</a></li>";
            $imagickExample = $exampleName;
            $output .= "<li>";
            $output .= "<a href='/".$this->category."/$imagickExample'>".$imagickExample."</a>";
            $output .= "</li>";
        }

        $output .="
  </ul>
</div>";

        return $output;
    }

    /**
     * @return string
     */
    function renderSearchBox() {

        $output = <<< END
<div class='smallPadding navSpacer searchContainer' role='search'   >
    <input type="text" class='searchBox' id='searchInput' placeholder="Search..." name="query" value="" />
</div>

<div class='smallPadding navSpacer' id='searchResultNone' style='display: none; padding-top: 15px'>
    No matches found
</div>
END;

        return $output;
    }
    
    
    function renderVertical() {
        
        $output = "<ul class='nav nav-sidebar smallPadding' id='searchList'>";

        foreach ($this->exampleList as $exampleName => $exampleDefinition) {
            $imagickExample = $exampleName;//$imagickExampleOption->getName();
            $active = '';
            $activeLink = '';
            
            if ($this->currentExample === $imagickExample) {
                $active = 'navActive';
                $activeLink = 'navActiveLink';
            }

            $name = $imagickExample;

            if (isset($exampleDefinition['name'])) {
                $name = $exampleDefinition['name'];
            }

            $output .= "<li class='navSpacer $active'>";
            $output .= "<a class='smallPadding $activeLink' href='/".$this->category."/$imagickExample'>".$name."</a>";
            $output .= "</li>";
        }

        $output .= "</ul>";
        
        return $output;
    }

    function renderHorizontal() {

        echo "<div style='font-size: 12px'>";
        
        foreach ($this->exampleList as $exampleName => $exampleDefinition) {
            $imagickExample = $exampleName;
            $active = '';

            if ($this->currentExample === $imagickExample) {
                $active = 'navActive';
            }
            //echo "<li>";
            echo "<a class='smallPadding $active' href='/".$this->category."/$imagickExample'>".$imagickExample."</a> ";
            //echo "</span>";
        }
        echo "<div>";
    }



    /**
     * @param bool $horizontal
     */
    function renderNav($horizontal = false) {
        echo "<div class='contentPanel navContainer' >";
            echo $this->renderSearchBox();
            echo $this->renderVertical();
        echo "</div>";
    }

    function getExampleDefinition($category, $example) {
        $examples = $this->getAllExamples();

        if (!isset($examples[$category][$example])) {
            throw new \Exception("Somethings fucky: example [$category][$example] doesn't exist.");
        }

        return $examples[$category][$example];
    }
    
    function getCategoryList($category) {
        $examples = $this->getAllExamples();

        if (array_key_exists($category, $examples)) {
            return $examples[$category];
        }

        return [];
    }

    
    function getAllExamples() {

        $imagickExamples = [
            'adaptiveBlurImage' => ['adaptiveBlurImage', \ImagickDemo\Imagick\Control\adaptiveBlurImage::class],

            'adaptiveResizeImage' => ['adaptiveResizeImage', \ImagickDemo\Imagick\Control\adaptiveResizeImage::class],
            'adaptiveSharpenImage' => ['adaptiveSharpenImage', \ImagickDemo\Imagick\Control\adaptiveSharpenImage::class ],
            'adaptiveThresholdImage' => [
                'adaptiveThresholdImage',
                \ImagickDemo\Imagick\Control\adaptiveThresholdImage::class
            ],
            //'addImage',
            'addNoiseImage' => ['addNoiseImage', \ImagickDemo\Imagick\Control\addNoiseImage::class],
            'affineTransformImage' => ['affineTransformImage', \ImagickDemo\Control\ImageControl::class], //Doesn't work?
            //'animateImages',
            'annotateImage' => [
                'annotateImage',
                \ImagickDemo\Imagick\Control\annotateImage::class,
                'defaultParams' => [
                    'fillColor' => 'rgb(232, 227, 232)'
                ],
            ],

            //'appendImages',
            'autoLevelImage' => ['autoLevelImage', \ImagickDemo\Control\ImageControl::class],
            'blackThresholdImage' => ['blackThresholdImage', \ImagickDemo\Imagick\Control\blackThresholdImage::class],
            'blueShiftImage' => ['blueShiftImage', \ImagickDemo\Imagick\Control\BlueShiftControl::class],
            'blurImage' => ['blurImage', \ImagickDemo\Imagick\Control\BlurControl::class],
            'borderImage' => ['borderImage', \ImagickDemo\Imagick\Control\borderImage::class],
            'brightnessContrastImage' => ['brightnessContrastImage', \ImagickDemo\Imagick\Control\brightnessContrastImage::class],

            
            'charcoalImage' => ['charcoalImage', \ImagickDemo\Imagick\Control\charcoalImage::class],
            'chopImage' => [
                'chopImage',
                \ImagickDemo\Imagick\Control\chopImage::class,
                'defaultParams' => [ 'width' => 100 ]
            ],
            //'clear',
            //'clipPathImage',
            'clutImage' => ['clutImage', \ImagickDemo\Control\NullControl::class],
            //'coalesceImages',
            //deprecated - new NavOption('colorFloodfillImage', true),
            //ColorDecisionListImage
            'colorizeImage' => ['colorizeImage', \ImagickDemo\Imagick\Control\colorizeImage::class],
            'colorMatrixImage' => [
                'colorMatrixImage', \ImagickDemo\Imagick\Control\colorMatrixImage::class
            ],
            //'combineImages',
            //'commentImage',
            //'compareImageChannels',
            //'compareImageLayers',
//'compareImages',
            'compositeImage' => ['compositeImage',\ImagickDemo\Control\ImageControl::class ],
            // CompositeLayers
            //__construct',
            'contrastImage' => ['contrastImage', \ImagickDemo\Imagick\Control\contrastImage::class],
            //'contrastStretchImage',
            'convolveImage' => [
                'convolveImage', 
                \ImagickDemo\Imagick\Control\convolveImage::class
            ],
            'cropImage' => ['cropImage', \ImagickDemo\Imagick\Control\cropImage::class],
            //'cropThumbnailImage',
            //'current',
            //'cycleColormapImage',
            //'constituteImage' => [ 'constituteImage', \ImagickDemo\Control\NullControl::class],
            // DestroyImage
            //'decipherImage',
            //'deconstructImages',
            //'deleteImageArtifact',
            'deskewImage' => ['deskewImage', \ImagickDemo\Imagick\Control\deskewImage::class ],
            'despeckleImage' => ['despeckleImage', \ImagickDemo\Control\ImageControl::class],
            //'destroy',
            //'displayImage',
            //'displayImages',
            'distortImage' => ['distortImage', \ImagickDemo\Control\ControlCompositeImageDistortionType::class],
            //'drawImage',
            'edgeImage' => [
                'edgeImage',
                \ImagickDemo\Imagick\Control\edgeImage::class
            ],
            'embossImage' => [
                'embossImage',
                \ImagickDemo\Imagick\Control\embossImage::class
            ],
            
            //'encipherImage',

            'enhanceImage' => ['enhanceImage', \ImagickDemo\Control\ImageControl::class],
            'equalizeImage' => ['equalizeImage', \ImagickDemo\Control\ImageControl::class],
            'evaluateImage' =>  ['evaluateImage', \ImagickDemo\Control\EvaluateTypeControl::class],
            //'exportImagePixels',
//            'extentImage' => [
//                'extentImage',
//                \ImagickDemo\Imagick\Control\chopImage::class
//            ],
            'filter' => ['filter', \ImagickDemo\Control\ImageControl::class],
            //FrameImage
            'flattenImages' => ['flattenImages', \ImagickDemo\Control\NullControl::class],
            'flipImage' => ['flipImage', \ImagickDemo\Control\ImageControl::class],
            
            'floodFillPaintImage' => [
                'floodFillPaintImage',
                \ImagickDemo\Imagick\Control\floodFillPaintImage::class,
                'defaultParams' => [ 
                    'x' => 260,
                    'y' => 150,
                    'fuzz' => 0.2,
                    'fillColor' => 'rgb(0, 0, 0)',
                    'targetColor' => 'rgb(245, 124, 24)'
                ]
            ],
            'flopImage' => ['flopImage', \ImagickDemo\Control\ImageControl::class],
            'forwardFourierTransformImage' => ['forwardFourierTransformImage', \ImagickDemo\Control\ImageControl::class],
            'frameImage' => ['frameImage', \ImagickDemo\Imagick\Control\frameImage::class],
            'functionImage' => ['functionImage', \ImagickDemo\Control\ImagickFunctionControl::class],
            'fxImage' => ['fxImage', \ImagickDemo\Control\ImageControl::class],
            'gammaImage' => ['gammaImage', \ImagickDemo\Imagick\Control\gammaImage::class],
            'gaussianBlurImage' => ['gaussianBlurImage', \ImagickDemo\Imagick\Control\gaussianBlurImage::class],
            //'getColorspace',
            //'getCompression',
            //'getCompressionQuality',
            'getCopyright'  => ['getCopyright', \ImagickDemo\Control\NullControl::class],
            //'getFilename',
            //'getFont',
            //'getFormat',
            //'getGravity',
            //'getHomeURL',
            //'getImage',
            //'getImageAlphaChannel',
            //'getImageArtifact',
            //'getImageBackgroundColor',
            //'getImageBlob',
            //'getImageBluePrimary',
            //'getImageBorderColor',
            //'getImageChannelDepth',
            //'getImageChannelDistortion',
            //'getImageChannelDistortions',
            //'getImageChannelExtrema',
            //'getImageChannelKurtosis',
            //'getImageChannelMean',
            //'getImageChannelRange',
            'getImageChannelStatistics' => ['getImageChannelStatistics', \ImagickDemo\Control\ImageControl::class],
            //'getImageClipMask',
            //'getImageColormapColor',
            //'getImageColors',
            //'getImageColorspace',
            //'getImageCompose',
            'getImageCompression' => ['getImageCompression', \ImagickDemo\Control\ImageControl::class],
            //'getCompressionQuality',
            //'getImageDelay',
            //'getImageDepth',
            //'getImageDispose',
            //'getImageDistortion',
            //'getImageExtrema',
            //'getImageFilename',
            //'getImageFormat',
            //'getImageGamma',
            'getImageGeometry' => ['getImageGeometry', \ImagickDemo\Control\ImageControl::class],
            //'getImageGravity',
            //'getImageGreenPrimary',
            //'getImageHeight',
            'getImageHistogram' => ['getImageHistogram', \ImagickDemo\Control\ImageControl::class],
            //'getImageIndex',
            //'getImageInterlaceScheme',
            //'getImageInterpolateMethod',
            //'getImageIterations',
            //'getImageLength',
            //'getImageMagickLicense',
            //'getImageMatte',
            //'getImageMatteColor',
            //'getImageOrientation',
            //'getImagePage',
            //'getImagePixelColor',
            //'getImageProfile',
            //'getImageProfiles',
            //'getImageProperties',
            //'getImageProperty',
            //'getImageRedPrimary',
            //'getImageRegion',
            //'getImageRenderingIntent',
            //'getImageResolution',
            //'getImagesBlob',
            //'getImageScene',
            //'getImageSignature',
            //'getImageSize',
            //'getImageTicksPerSecond',
            //'getImageTotalInkDensity',
            //'getImageType',
            //'getImageUnits',
            //'getImageVirtualPixelMethod',
            //'getImageWhitePoint',
            //'getImageWidth',
            //'getInterlaceScheme',
            //'getIteratorIndex',
            //'getNumberImages',
            //'getOption',
            //'getPackageName',
            //'getPage',
            'getPixelIterator' => ['getPixelIterator', \ImagickDemo\Control\ImageControl::class],
            'getPixelRegionIterator' => ['getPixelRegionIterator', \ImagickDemo\Control\ImageControl::class],
            //'getPointSize',
            //'getQuantumDepth',
            //'getQuantumRange',
            //'getReleaseDate',
            //'getResource',
            //'getResourceLimit',
            //'getSamplingFactors',
            //'getSize',
            //'getSizeOffset',
            //'getVersion',

            'haldClutImage' => ['haldClutImage', \ImagickDemo\Control\ImageControl::class],
            //'hasNextImage',
            //'hasPreviousImage',
            'identifyImage' => ['identifyImage', \ImagickDemo\Control\ImageControl::class],
            'identifyFormat' => ['identifyFormat', \ImagickDemo\Control\NullControl::class],
            
            'inverseFourierTransformImage' => ['forwardFourierTransformImage', \ImagickDemo\Control\ImageControl::class],
            'implodeImage'  => ['implodeImage', \ImagickDemo\Control\ImageControl::class],
            //'importImagePixels',
            //'labelImage' => basically does setImageProperty("label", $text) 
            
            'levelImage' => [
                'levelImage',
                \ImagickDemo\Control\blackAndWhitePoint::class,
                'defaultParams' => [
                    'blackPoint' => 50,
                    'whitePoint' => 100
                ]
            ],
            
            'linearStretchImage' => [
                'linearStretchImage',
                \ImagickDemo\Control\linearStretchControl::class
            ],
            //'liquidRescaleImage',
            'magnifyImage' => ['magnifyImage', \ImagickDemo\Control\ImageControl::class],
            //'mapImage',
            //'matteFloodfillImage',
            'medianFilterImage' => ['medianFilterImage', \ImagickDemo\Control\ControlCompositeRadiusImage::class],

            'mergeImageLayers'  => ['mergeImageLayers', \ImagickDemo\Imagick\Control\mergeImageLayers::class],
            //'minifyImage', //MagickMinifyImage() is a convenience method that scales an image proportionally to one-half its original size
            'modulateImage' => ['modulateImage', \ImagickDemo\Imagick\Control\modulateImage::class],
            //'montageImage',
            //'morphImages',
            // MorphologyImage

            'morphology'          => [
                'morphology',
                \ImagickDemo\ImagickKernel\Control\usage::class
            ],
            
            //'mosaicImages' => ['mosaicImages', \ImagickDemo\Control\ImageControl::class],
            'motionBlurImage' => ['motionBlurImage', \ImagickDemo\Imagick\Control\motionBlurImage::class],
            'negateImage' => ['negateImage', \ImagickDemo\Imagick\Control\negateImage::class],
            //'newImage',
            'newPseudoImage' => ['newPseudoImage', \ImagickDemo\Imagick\Control\newPseudoImage::class],
            //'nextImage',
            'normalizeImage' => [
                'normalizeImage',
                \ImagickDemo\Imagick\Control\separateImageChannel::class
            ],
            'oilPaintImage' => ['oilPaintImage', \ImagickDemo\Imagick\Control\oilPaintImage::class],
            //'opaquePaintImage',
            //'optimizeImageLayers',
            // OptimizeImageTransparency
            'orderedPosterizeImage' => [
                'orderedPosterizeImage',
                \ImagickDemo\Imagick\Control\orderedPosterizeControl::class
            ],
            //'paintOpaqueImage',
            //'paintTransparentImage',

            'pingImage' => ['pingImage', \ImagickDemo\Control\ImageControl::class],

            'Quantum'  => ['Quantum', \ImagickDemo\Control\NullControl::class],
            //'pingImageBlob',
            //'pingImageFile',
            'polaroidImage'  => ['polaroidImage', \ImagickDemo\Control\ImageControl::class],
            'posterizeImage' => [
                'posterizeImage',
                \ImagickDemo\Imagick\Control\posterizeControl::class
            ],
            //'previewImages',
            //'previousImage',
            //'profileImage',
            'quantizeImage' => ['quantizeImage', \ImagickDemo\Imagick\Control\quantizeImage::class],
            //'quantizeImages',
            'queryFontMetrics'=> ['queryFontMetrics', \ImagickDemo\Control\NullControl::class],
            //'queryFonts',
            'queryFormats' => ['queryFormats', \ImagickDemo\Control\NullControl::class],

            'radialBlurImage' => ['radialBlurImage', \ImagickDemo\Control\ImageControl::class],
            'raiseImage' => [
                'raiseImage',
                \ImagickDemo\Imagick\Control\raiseImage::class,
                'defaultParams' => [
                    'width' => 15,
                    'height' => 15
                ]
            ],
            'randomThresholdImage' => ['randomThresholdImage', \ImagickDemo\Imagick\Control\randomThresholdimage::class],
            //'readImage',
            'readImageBlob'  => ['readImageBlob', \ImagickDemo\Control\NullControl::class],
            //'readImageFile',
            'recolorImage' => ['recolorImage', \ImagickDemo\Control\ImageControl::class],
            'reduceNoiseImage' => ['reduceNoiseImage', \ImagickDemo\Imagick\Control\reduceNoiseImage::class],


            //'remapImage' => ['remapImage', \ImagickDemo\Control\ImageControl::class],
        
            //'removeImage',
            //'removeImageProfile',
            //'render',
            'resampleImage' => ['resampleImage', \ImagickDemo\Control\ImageControl::class],
            //'resetImagePage',
            'resizeImage' => [
                'resizeImage',
                \ImagickDemo\Imagick\Control\resizeImage::class,
                'defaultParams' => [
                    'width' => 200,
                    'height' => 200
                ]
            ],
            'rollImage' => ['rollImage', \ImagickDemo\Imagick\Control\rollImage::class],
            'rotateImage' => ['rotateImage', \ImagickDemo\Imagick\Control\rotateImage::class],
            'rotationalBlurImage' => ['rotationalBlurImage', \ImagickDemo\Control\ImageControl::class],
            'roundCorners' => ['roundCorners', \ImagickDemo\Control\ImageControl::class],
            //'sampleImage',
            'scaleImage' => ['scaleImage', \ImagickDemo\Control\ImageControl::class],
            'segmentImage' => ['segmentImage', \ImagickDemo\Imagick\Control\segmentImage::class],
            'selectiveBlurImage' => ['selectiveBlurImage', \ImagickDemo\Control\SelectiveBlurImage::class ],
            'separateImageChannel' => ['separateImageChannel', \ImagickDemo\Imagick\Control\separateImageChannel::class],
            'sepiaToneImage' => ['sepiaToneImage', \ImagickDemo\Imagick\Control\sepiaToneImage::class],
            //'setBackgroundColor',
            //'setColorspace',
            //'setCompression',
            'setCompressionQuality' => [
                'setCompressionQuality',
                \ImagickDemo\Imagick\Control\imageQuality::class
            ],
            //'setFilename',
            //'setFirstIterator',
            //'setFont',
            //'setFormat',
            //'setGravity',
            //'setImage',
            //'setImageAlphaChannel',
            'setImageArtifact' => [
                'setImageArtifact',
                \ImagickDemo\Control\NullControl::class
            ],
            //'setImageBackgroundColor',
            'setImageBias' => [
                'setImageBias',
                \ImagickDemo\Imagick\Control\setImageBias::class
            ],
            //'setImageBluePrimary',
            //'setImageBorderColor',
            //'setImageChannelDepth',
            'setImageClipMask' => ['setImageClipMask', \ImagickDemo\Control\ImageControl::class],
            //'setImageColormapColor',
            //'setImageColorspace',
            //'setImageCompose',
            //'setImageCompression',
            'setImageCompressionQuality' => [
                'setImageCompressionQuality',
                \ImagickDemo\Imagick\Control\imageQuality::class
            ],
            //'setImageDepth',
            'setImageDelay' => ['setImageDelay', \ImagickDemo\Control\ImageControl::class],
            //'setImageDispose',
            //'setImageExtent',
            //'setImageFilename',
            //'setImageFormat',
            //'setImageGamma',
            //'setImageGravity',
            //'setImageGreenPrimary',
            //'setImageIndex',
            //'setImageInterlaceScheme',
            //'setImageInterpolateMethod',
            //'setImageIterations',
            //'setImageMatte',
            //'setImageMatteColor',
            //'setImageOpacity',
            
            
            'setImageOrientation' => ['setImageOrientation', \ImagickDemo\Imagick\Control\setImageOrientation::class],
            //'setImagePage',
            //'setImageProfile',
            //'setImageProperty',
            //'setImageRedPrimary',
            //'setImageRenderingIntent',
            'setImageResolution' => ['setImageResolution', \ImagickDemo\Control\ImageControl::class ],
            //'setImageScene',
            'setImageTicksPerSecond' => ['setImageTicksPerSecond', \ImagickDemo\Control\ImageControl::class ],
            //'setImageType',
            //'setImageUnits',
            //'setImageVirtualPixelMethod',
            //'setImageWhitePoint',
            //'setInterlaceScheme',
            'setIteratorIndex' => ['setIteratorIndex', \ImagickDemo\Control\NullControl::class ],
            //'setLastIterator',
            'setOption' => ['setOption', \ImagickDemo\Imagick\Control\setOption::class ],
            'setProgressMonitor' => ['setProgressMonitor', \ImagickDemo\Control\NullControl::class],
            //'setPage',
            //'setPointSize',
            //'setResolution',
            //'setResourceLimit',
            'setSamplingFactors' => [
                'setSamplingFactors',
                \ImagickDemo\Imagick\Control\samplingFactors::class
            ],
            //'setSize',
            //'setSizeOffset',
            //'setType',
            'shadeImage' => ['shadeImage', \ImagickDemo\Control\ImageControl::class ],
            'shadowImage' => ['shadowImage', \ImagickDemo\Control\ImageControl::class ],
            'sharpenImage' => ['sharpenImage', \ImagickDemo\Imagick\Control\sharpenImage::class],
            'shaveImage' => ['shaveImage', \ImagickDemo\Control\ImageControl::class],
            'shearImage' => ['shearImage', \ImagickDemo\Imagick\Control\shearImage::class],
            'sigmoidalContrastImage' => ['sigmoidalContrastImage', \ImagickDemo\Imagick\Control\SigmoidalContrastControl::class ],

            'sketchImage' => [
                'sketchImage',
                \ImagickDemo\Imagick\Control\sketchImage::class,
                'defaultParams' => [
                    'sigma' => 15
                ]
            ],
            'smushImages' => ['smushImages', \ImagickDemo\Control\ImageControl::class],
            'solarizeImage' => ['solarizeImage', \ImagickDemo\Control\ControlCompositeImageSolarizeThreshold::class],
            'sparseColorImage' => ['sparseColorImage', \ImagickDemo\Control\SparseColorControl::class],
            'spliceImage' => ['spliceImage', \ImagickDemo\Imagick\Control\spliceImage::class],
            'spreadImage' => ['spreadImage', \ImagickDemo\Imagick\Control\spreadImage::class],
            'statisticImage' => ['statisticImage', \ImagickDemo\Control\StatisticControl::class],
            'subImageMatch' => ['subImageMatch', \ImagickDemo\Control\ImageControl::class],
            'swirlImage' => ['swirlImage', \ImagickDemo\Control\ControlCompositeImageSwirl::class],
            'textureImage' => ['textureImage', \ImagickDemo\Control\ImageControl::class],
            'thresholdImage' => [
                'thresholdImage',
                \ImagickDemo\Imagick\Control\thresholdImage::class
            ],
            'thumbnailImage' => ['thumbnailImage', \ImagickDemo\Control\ImageControl::class],
            'tintImage' => [
                'tintImage',
                \ImagickDemo\Control\ControlCompositeRGBA::class,
                'defaultParams' => [
                    'g' => 50
                ]
            ],
            'transformImage' => ['transformImage', \ImagickDemo\Control\ImageControl::class],
            'transparentPaintImage' => [
                'transparentPaintImage',
                \ImagickDemo\Imagick\Control\transparentPaintImage::class,
                'defaultParams' => [
                    'color' => 'rgb(39, 194, 255)'
                ]
            ],
            'transposeImage' => ['transposeImage', \ImagickDemo\Control\ImageControl::class],
            'transformImageColorspace' => ['transformImageColorspace', \ImagickDemo\Control\TransformColorSpaceControl::class],

            'transverseImage' => ['transverseImage', \ImagickDemo\Control\ImageControl::class],
            'trimImage' => [
                'trimImage',
                \ImagickDemo\Imagick\Control\trimImage::class,
                'defaultParams' => [
                    'color' => 'rgb(39, 194, 255)' 
                ]
            ],
        
            'uniqueImageColors' => ['uniqueImageColors', \ImagickDemo\Control\ImageControl::class],
            'unsharpMaskImage' => ['unsharpMaskImage',\ImagickDemo\Control\ControlCompositeImageRadiusSigmaAmountUnsharpThresholdChannel::class ],
            'vignetteImage' => ['vignetteImage', \ImagickDemo\Control\ControlCompositeImageBlackPointWhitePointXY::class],
            'waveImage' => ['waveImage', \ImagickDemo\Imagick\Control\waveImage::class],
            'whiteThresholdImage' => ['whiteThresholdImage', \ImagickDemo\Imagick\Control\whiteThresholdImage::class],
        ];

        $imagickDrawExamples = [
            'affine' => ['affine', \ImagickDemo\Control\ControlCompositeBackgroundColorStrokeColorFillColor::class],
            'arc' => ['arc', \ImagickDemo\Control\ArcControl::class],
            'bezier' => ['bezier', \ImagickDemo\Control\ControlCompositeBackgroundColorStrokeColorFillColor::class],
            'circle' => ['circle', \ImagickDemo\Control\CircleControl::class],
            'composite' => ['composite', \ImagickDemo\Control\ControlCompositeBackgroundColorStrokeColorFillColor::class],
            'ellipse' => ['ellipse', \ImagickDemo\Control\ControlCompositeBackgroundColorStrokeColorFillColor::class],
            'line' => ['line', \ImagickDemo\Control\ControlCompositeBackgroundColorStrokeColorFillColor::class],
            'matte' => ['matte', \ImagickDemo\ImagickDraw\Control\matte::class],
            'pathStart' => ['pathStart', \ImagickDemo\Control\ControlCompositeBackgroundColorStrokeColorFillColor::class],
            'pathCurveToQuadraticBezierAbsolute' => [
                'pathCurveToQuadraticBezierAbsolute',
                \ImagickDemo\Control\ControlCompositeBackgroundColorStrokeColorFillColor::class,
                'name' => "pathCurveToQuadratic BezierAbsolute",
            ],

            'pathCurveToQuadraticBezierSmoothAbsolute' => [
                'pathCurveToQuadraticBezierAbsolute',
                \ImagickDemo\Control\ControlCompositeBackgroundColorStrokeColorFillColor::class,
                'name' => 'pathCurveToQuadratic BezierSmoothAbsolute',
            ],

            'point' => ['point', \ImagickDemo\Control\ControlCompositeBackgroundColorStrokeColorFillColor::class],
            'polygon' => ['polygon', \ImagickDemo\Control\ControlCompositeBackgroundColorStrokeColorFillColor::class],
            'polyline' => ['polyline', \ImagickDemo\Control\ControlCompositeBackgroundColorStrokeColorFillColor::class],
            'pop' => ['push', \ImagickDemo\Control\ControlCompositeBackgroundColorStrokeColorFillColorFillModifiedColor::class],
            'popClipPath' => ['setClipPath', \ImagickDemo\Control\ControlCompositeBackgroundColorStrokeColorFillColor::class],
            'popPattern' => ['pushPattern', \ImagickDemo\Control\ControlCompositeBackgroundColorStrokeColorFillColor::class],
            'popDefs' => ['popDefs', \ImagickDemo\Control\ControlCompositeBackgroundColorStrokeColorFillColor::class],
            'push' => ['push', \ImagickDemo\Control\ControlCompositeBackgroundColorStrokeColorFillColorFillModifiedColor::class],
            'pushClipPath' => ['setClipPath', \ImagickDemo\Control\ControlCompositeBackgroundColorStrokeColorFillColor::class],
            'pushPattern' => ['pushPattern', \ImagickDemo\Control\ControlCompositeBackgroundColorStrokeColorFillColor::class],
            'rectangle' => ['rectangle', \ImagickDemo\Control\ControlCompositeBackgroundColorStrokeColorFillColor::class],
            //'render' => ['render', \ImagickDemo\Control\ControlCompositeBackgroundColorStrokeColorFillColor::class],
            'rotate' => ['rotate', \ImagickDemo\Control\ControlCompositeBackgroundColorStrokeColorFillColorFillModifiedColor::class],
            'roundRectangle' => ['roundRectangle', \ImagickDemo\Control\RoundRectangleControl::class],
            'scale' => ['scale', \ImagickDemo\Control\ControlCompositeBackgroundColorStrokeColorFillColorFillModifiedColor::class],
            'setClipPath' => ['setClipPath', \ImagickDemo\Control\ControlCompositeBackgroundColorStrokeColorFillColor::class],
            'setClipRule' => ['setClipRule', \ImagickDemo\Control\ControlCompositeBackgroundColorStrokeColorFillColor::class],
            'setClipUnits' => ['setClipUnits', \ImagickDemo\Control\ControlCompositeBackgroundColorStrokeColorFillColor::class],
            'setFillAlpha' => ['setFillAlpha', \ImagickDemo\Control\ControlCompositeBackgroundColorStrokeColorFillColor::class],
            'setFillColor' => ['setFillColor', \ImagickDemo\Control\ControlCompositeBackgroundColorStrokeColorFillColor::class],
            'setFillOpacity' => ['setFillOpacity', \ImagickDemo\Control\ControlCompositeBackgroundColorStrokeColorFillColor::class],
            'setFillRule' => ['setFillRule', \ImagickDemo\Control\ControlCompositeBackgroundColorStrokeColorFillColor::class],
            'setFont' => ['setFont', \ImagickDemo\Control\ControlCompositeBackgroundColorStrokeColorFillColor::class],
            'setFontFamily' => ['setFontFamily', \ImagickDemo\Control\ControlCompositeBackgroundColorStrokeColorFillColor::class],
            'setFontSize' => ['setFontSize', \ImagickDemo\Control\ControlCompositeBackgroundColorStrokeColorFillColor::class],
            'setFontStretch' => ['setFontStretch', \ImagickDemo\Control\ControlCompositeBackgroundColorStrokeColorFillColor::class],
            'setFontStyle' => ['setFontStyle', \ImagickDemo\Control\ControlCompositeBackgroundColorStrokeColorFillColor::class],
            'setFontWeight' => ['setFontWeight', \ImagickDemo\Control\ControlCompositeBackgroundColorStrokeColorFillColor::class],
            'setGravity' => ['setGravity', \ImagickDemo\Control\ControlCompositeBackgroundColorStrokeColorFillColor::class],
            'setStrokeAlpha' => ['setStrokeAlpha', \ImagickDemo\Control\ControlCompositeBackgroundColorStrokeColorFillColor::class],
            'setStrokeAntialias' => ['setStrokeAntialias', \ImagickDemo\Control\ControlCompositeBackgroundColorStrokeColorFillColor::class],
            'setStrokeColor' => ['setStrokeColor', \ImagickDemo\Control\ControlCompositeBackgroundColorStrokeColorFillColor::class],
            'setStrokeDashArray' => ['setStrokeDashArray', \ImagickDemo\Control\ControlCompositeBackgroundColorStrokeColorFillColor::class],
            'setStrokeDashOffset' => ['setStrokeDashOffset', \ImagickDemo\Control\ControlCompositeBackgroundColorStrokeColorFillColor::class],
            'setStrokeLineCap' => ['setStrokeLineCap', \ImagickDemo\Control\ControlCompositeBackgroundColorStrokeColorFillColor::class],
            'setStrokeLineJoin' => ['setStrokeLineJoin', \ImagickDemo\Control\ControlCompositeBackgroundColorStrokeColorFillColor::class],

            'setStrokeMiterLimit' => ['setStrokeMiterLimit', \ImagickDemo\Control\ControlCompositeBackgroundColorStrokeColorFillColor::class],
            'setStrokeOpacity' => ['setStrokeOpacity', \ImagickDemo\Control\ControlCompositeBackgroundColorStrokeColorFillColor::class],
            'setStrokeWidth' => ['setStrokeWidth', \ImagickDemo\Control\ControlCompositeBackgroundColorStrokeColorFillColor::class],
            'setTextAlignment' => ['setTextAlignment', \ImagickDemo\Control\ControlCompositeBackgroundColorStrokeColorFillColor::class],
            'setTextAntialias' => ['setTextAntialias', \ImagickDemo\Control\ControlCompositeBackgroundColorStrokeColorFillColor::class],
            'setTextDecoration' => ['setTextDecoration', \ImagickDemo\Control\TextDecoration::class],
            'setTextUnderColor' => ['setTextUnderColor', \ImagickDemo\Control\TextUnderControl::class],
            //'setVectorGraphics' => ['setVectorGraphics', \ImagickDemo\Control\ControlCompositeBackgroundColorStrokeColorFillColor::class],
            'setViewBox' => ['setViewBox', \ImagickDemo\Control\ControlCompositeBackgroundColorStrokeColorFillColor::class],
            'skewX' => ['skewX', \ImagickDemo\Control\SkewControl::class],
            'skewY' => ['skewY', \ImagickDemo\Control\SkewControl::class],
            'translate' => ['translate', \ImagickDemo\Control\TranslateControl::class],
        ];


        $imagickPixelExamples = [
            'construct' => ['construct', \ImagickDemo\Control\NullControl::class],
            'getColor' => ['getColor', \ImagickDemo\Control\NullControl::class],
            'getColorAsString' => ['getColorAsString', \ImagickDemo\Control\NullControl::class],
            'getColorCount' => ['getColorCount', \ImagickDemo\Control\NullControl::class],
            'getColorValue' => ['getColorValue', \ImagickDemo\Control\NullControl::class],
            'getColorValueQuantum' => ['getColorValueQuantum', \ImagickDemo\Control\NullControl::class],
            'getHSL' => ['getHSL', \ImagickDemo\Control\NullControl::class],
            'isSimilar' => ['isPixelSimilar', \ImagickDemo\Control\NullControl::class],
            'isPixelSimilar' => ['isPixelSimilar', \ImagickDemo\Control\NullControl::class],
            'setColor' => ['setColor', \ImagickDemo\Control\NullControl::class],
            'setColorValue' => ['setColorValue', \ImagickDemo\Control\NullControl::class],
            'setColorValueQuantum' => ['setColorValueQuantum', \ImagickDemo\Control\NullControl::class],
            'setHSL' => ['setHSL', \ImagickDemo\Control\NullControl::class],
        ];


        $imagickPixelIteratorExamples = [
            'clear' => ['clear', \ImagickDemo\Control\ImageControl::class],
            'construct' => ['construct', \ImagickDemo\Control\ImageControl::class],
            //'getCurrentIteratorRow',
            //'getIteratorRow' => 'setIteratorRow',
            'getNextIteratorRow' => ['getNextIteratorRow', \ImagickDemo\Control\ImageControl::class ],
            //'getPreviousIteratorRow',
            //'newPixelIterator', deprecated
            //'newPixelRegionIterator', deprecated
            'resetIterator' => ['resetIterator', \ImagickDemo\Control\ImageControl::class],
            //'setIteratorFirstRow',
            //'setIteratorLastRow',
            'setIteratorRow' => ['setIteratorRow', \ImagickDemo\Control\ImageControl::class],
            'syncIterator' => ['construct', \ImagickDemo\Control\ImageControl::class],
        ];

        $imagickKernelExamples = [
            'addKernel'      => ['addKernel', \ImagickDemo\Control\ImageControl::class],
            'addUnityKernel' => ['addUnityKernel', \ImagickDemo\Control\NullControl::class],
            'fromMatrix'     => [
                'fromMatrix',
                \ImagickDemo\ImagickKernel\Control\fromMatrixControl::class
            ],
            'fromBuiltin'    => [
                'fromBuiltin',
                \ImagickDemo\ImagickKernel\Control\fromBuiltIn::class
            ],
            'getMatrix'      => ['getMatrix', \ImagickDemo\Control\NullControl::class],
            'scale'          => ['scale', \ImagickDemo\Control\NullControl::class],
            'separate'       => ['separate', \ImagickDemo\Control\NullControl::class],
            
        ];


        $tutorialExamples = [
            'composite' => ['composite', \ImagickDemo\Control\CompositeExampleControl::class ],
            //'colorspaceLinearity' => ['colorspaceLinearity', \ImagickDemo\Control\NullControl::class],
            'edgeExtend' => ['edgeExtend', \ImagickDemo\Control\ControlCompositeImageVirtualPixel::class],
            //'compressImages' => ['compressImages', \ImagickDemo\Control\NullControl::class],
            'fxAnalyzeImage' => [
                'fxAnalyzeImage', 
                \ImagickDemo\Control\FXAnalyzeControl::class
            ],

            //'creatingGifs' => ['creatingGifs', \ImagickDemo\Control\NullControl::class],
            'deconstructGif' => ['deconstructGif', \ImagickDemo\Control\NullControl::class],

            'fontEffect' => ['fontEffect', \ImagickDemo\Control\NullControl::class],
            //'gifGeneration' => ['gifGeneration', \ImagickDemo\Control\NullControl::class],
            'gradientGeneration' => ['gradientGeneration', \ImagickDemo\Control\NullControl::class],
            'gradientReflection' => ['gradientReflection', \ImagickDemo\Control\NullControl::class],
            'imagickComposite' => ['imagickComposite', \ImagickDemo\Control\NullControl::class],
            'imagickCompositeGen' => [
                'imagickCompositeGen',
                \ImagickDemo\Control\blendComposite::class,

                'defaultParams' => [
                    'contrast' => 10
                ]
            ],
            'listColors' => ['listColors', \ImagickDemo\Control\NullControl::class],
            'levelizeImage' => [
                'levelizeImage',
                \ImagickDemo\Control\blackAndWhitePoint::class,
                'defaultParams' => [
                    'blackPoint' => 50,
                    'whitePoint' => 100
                ]
            ],
            'layerPSD' => ['layerPSD', \ImagickDemo\Control\NullControl::class],
            'logoTshirt' => ['logoTshirt', \ImagickDemo\Control\NullControl::class],
            'psychedelicFont' => ['psychedelicFont', \ImagickDemo\Control\NullControl::class],
            'psychedelicFontGif' => ['psychedelicFontGif', \ImagickDemo\Control\NullControl::class],

            'whirlyGif' =>  ['whirlyGif', \ImagickDemo\Imagick\Control\loopGif::class],
            'svgExample' => ['svgExample', \ImagickDemo\Control\NullControl::class],
            'screenEmbed' => ['screenEmbed', \ImagickDemo\Control\NullControl::class],
            'imageGeometryReset' => ['imageGeometryReset', \ImagickDemo\Control\NullControl::class],
        ];

        $examples = [
            'Imagick' => $imagickExamples,
            'ImagickDraw' => $imagickDrawExamples,
            'ImagickPixel' => $imagickPixelExamples,
            'ImagickPixelIterator' => $imagickPixelIteratorExamples,
            'ImagickKernel' => $imagickKernelExamples,
            'Tutorial' => $tutorialExamples,
        ];

        return $examples;
    }
}

 