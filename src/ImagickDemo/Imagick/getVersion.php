<?php

namespace ImagickDemo\Imagick;

class getVersion extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Imagick::getVersion";
    }

    public function renderDescription()
    {
        $html = <<< HTML
<p>Returns information about the version of ImageMagick that is being used.</p>
<p>The 'versionNumber' represents a hex number that encodes the ImageMagick semver version number e.g. 1808 = 0x710, where the ImageMagick major version is 7, minor number is 1, and bug-release is 0.</p>
HTML;
        return $html;
    }

    public function render(
        ?string $activeCategory,
        ?string $activeExample
    ) {
//Example Imagick::getVersion
        $version_info = \Imagick::getVersion();

        $output = "Version information is:<pre>";
        foreach ($version_info as $key => $value) {
            $output .= "$key: $value <br/>";
        }

        $output .= sprintf(
            "versionNumber as hex: %x<br/>",
            $version_info['versionNumber']
        );

        $output .= "</pre>";
//Example end
        return $output;
    }
}
