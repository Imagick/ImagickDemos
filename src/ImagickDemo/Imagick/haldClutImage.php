<?php

namespace ImagickDemo\Imagick;

use VarMap\VarMap;
use ImagickDemo\Imagick\Controls\HaldClutImageControl;

class haldClutImage extends \ImagickDemo\Example
{
    private HaldClutImageControl $haldClutImageControl;

    public function __construct(
        VarMap $varMap
    ) {
        $this->haldClutImageControl = HaldClutImageControl::createFromVarMap($varMap);
    }

    public function needsFullPageRefresh(): bool
    {
        return true;
    }

    public function renderTitle(): string
    {
        return "Hald clut image";
    }

    function renderDescription()
    {
        $haldImg = $this->haldClutImageControl->getHaldClutType();
        $haldImg = str_replace("/var/app/public", "", $haldImg);

        $html = <<< HTML

<hr/>

<p>
A Hald clut is a special image that encodes how source colors should be mapped to output colors. Full details of how they work can be found on either <a href="http://www.quelsolaar.com/technology/clut.html">Quel Solaar - Clut page</a>, or <a href="https://rawpedia.rawtherapee.com/Film_Simulation">RawTherapee - using different cluts to simulate film</a>.
</p>

<p>
<a href="https://marcrphoto.wordpress.com/film-simulation/the-largest-collection-of-film-simulation-haldclut-luts-brought-together/">Lots more HaldCLUTs</a> are behind that link.
</p>

<p>
This HaldCLUT image used for the selected settings:<br/>
<img src='$haldImg' width="360" /><br/>

View <a href="$haldImg" target="_blank">full size hald image</a>.


</p>

<br/>
HTML;

//        <p>
//    Generate hald palette with `convert   hald:8    hald_8.png`";
//
//</p>



        return $html;
    }

    public function useImageControlAsOriginalImage()
    {
        return true;
    }

    public static function getParamType(): string
    {
        return HaldClutImageControl::class;
    }
}
