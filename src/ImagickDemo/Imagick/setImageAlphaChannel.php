<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\SetImageAlphaChannelControl;

class setImageAlphaChannel extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Imagick::setImageAlphaChannel";
    }

    public function renderDescription()
    {
        $html = <<< HTML
<p>
Theoretically, this table is meant to document what the different settings do exactly. But I am not entirely sure. PRs welcome!<br/>
</p>

<table>
  <tr>
    <td>Imagick::ALPHACHANNEL_ACTIVATE</td>
    <td></td>
  </tr>
  <tr>
    <td>Imagick::ALPHACHANNEL_DEACTIVATE</td>
    <td></td>
  </tr>
  <tr>
    <td>Imagick::ALPHACHANNEL_OPAQUE</td>
    <td></td>
  </tr>
  <tr>
    <td>Imagick::ALPHACHANNEL_SET</td>
    <td></td>
  </tr>
</table>




HTML;


        return $html;
    }


    public static function getParamType(): string
    {
        return SetImageAlphaChannelControl::class;
    }
}
