<?php

namespace ImagickDemo\Tutorial;

use ImagickDemo\Helper\PageInfo;
use ImagickDemo\Tutorial\Controls\EyeColourResolutionParams;
use DataType\OpenApi\OpenApiV300ParamDescription;
use VarMap\VarMap;
use ImagickDemo\ReactParamType;


class EyeColourResolution extends \ImagickDemo\Example implements ReactParamType
{
    public function renderTitle(): string
    {
        return "Eye color resolution";
    }

    public static function getParamType(): string
    {
        return EyeColourResolutionParams::class;
    }

    public function renderReactControls()
    {
        $eyeColourResolutionParams = EyeColourResolutionParams::createFromVarMap($this->varMap);

        $paramDescription = OpenApiV300ParamDescription::createFromRules(
            EyeColourResolutionParams::getInputParameterList()
        );

        [$error, $value] = convertToValue($eyeColourResolutionParams);

        if ($error !== null) {
            // what to do here
            return "oh dear, the form failed to render correctly: " . $error;
        }

        $output = sprintf(
            "<div id='controlPanel' data-params_json='%s' data-controls_json='%s'></div>",
            json_encode_safe($value),
            json_encode($paramDescription)
        );

        return $output;
    }

    public function renderDescription()
    {
        $output = <<< END

<p>
Human vision is... 'interesting'.
</p>

<p>
The way that your brain perceives the photons that enter your eyeball is optimized to throw away 'useless' information and enhance 'useful' information. This results in human perception being vulnerable to multiple 'optical illusions'.
</p> 


<p>
You can't tell if two colors <a href="https://en.wikipedia.org/wiki/Checker_shadow_illusion" target="_blank" rel="noopener noreferrer">are the same or different</a>.

You perceive movement <a href="https://en.wikipedia.org/wiki/Grid_illusion" target="_blank" rel="noopener noreferrer">where there is none</a>.

Your brain gets bored of seeing pink and <a href="https://en.wikipedia.org/wiki/Lilac_chaser" target="_blank" rel="noopener noreferrer">decides that green is far more interesting</a>. Aka your visual perception of the world is <a href="https://en.wikipedia.org/wiki/List_of_optical_illusions" target="_blank" rel="noopener noreferrer"> full of bugs</a>.
</p>

<p>
This page allows you to experiment with how your eye perceives resolution by downsampling the separate color channels of images in different colorspaces. Some examples will probably be easier to understand than a technical explanation. 
</p>


<p>
For RGB colorspace, if either the <a href="/Tutorial/eyeColorResolution?colorspace=RGB&channel_1_sample=8&channel_2_sample=1&channel_3_sample=1&imagepath=People">red</a> or <a href="/Tutorial/eyeColorResolution?colorspace=RGB&channel_1_sample=1&channel_2_sample=8&channel_3_sample=8&imagepath=People">green</a> channels are downsampled, you notice very quickly. If the <a href="/Tutorial/eyeColorResolution?colorspace=RGB&channel_1_sample=1&channel_2_sample=1&channel_3_sample=8&imagepath=People">blue channel</a> is downsampled, then your eyes don't really notice, even if the image features <a href="/Tutorial/eyeColorResolution?colorspace=RGB&channel_1_sample=1&channel_2_sample=1&channel_3_sample=8&imagepath=Lorikeet">blue quite prominently</a>  
</p>




<p>
For the YIC colorspace, <a href="/Tutorial/eyeColorResolution?colorspace=YIC&channel_1_sample=1&channel_2_sample=8&channel_3_sample=8&imagepath=Lorikeet"> a high sample rate for the Y channel, low sample rate for I and C channels</a>, give a better image quality than the <a href="/Tutorial/eyeColorResolution?colorspace=YIC&channel_1_sample=8&channel_2_sample=1&channel_3_sample=8&imagepath=Lorikeet">I channel</a> or <a href="/Tutorial/eyeColorResolution?colorspace=YIC&channel_1_sample=8&channel_2_sample=8&channel_3_sample=1&imagepath=Lorikeet">C channel</a> having high sample rates.
</p>

<p>
The image below shows the reconstructed image in the top left, and representations of the three color channels for the other three parts.
</p>

END;

        return $output;
    }

    public function render(
        ?string $activeCategory,
        ?string $activeExample
    )
    {
        return createReactImagePanel(
            "/image/Tutorial/eyeColorResolution",
            "/Tutorial/eyeColorResolution",
            $this
        );
    }
}
