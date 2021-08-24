<?php


namespace ImagickDemo\Model;

use ImagickDemo\Config;
use Jig\Jig;

class ServerSettings
{
    public function renderIniSettings()
    {
        $settings = [
            'opcache.enable' => true,
            'opcache.validate_timestamps' => false,
            'opcache.file_update_protection' => false,
            'opcache.enable_file_override' => false,
        ];

        $output = "";
        $output .= "<table class='table-serverSettings'>";
        
        $output .= "<thead>";
        
        $output .= "<th>Server setting</th>";
        $output .= "<th>Value</th>";
        $output .= "</thead>";

        $output .= "<body>";
        foreach ($settings as $setting => $expectedValue) {
            $value = ini_get($setting);
            $class = 'good';
            if ($value != $expectedValue) {
                $class = 'bad';
            }

            $value = var_export($value, true);
            $output .= "<tr>";
            $output .= sprintf(
                "<td class='%s'>%s</td><td class='%s'>%s</td>",
                $class,
                htmlentities($setting, ENT_DISALLOWED | ENT_HTML401 | ENT_NOQUOTES, 'UTF-8'),
                $class,
                htmlentities($value, ENT_DISALLOWED | ENT_HTML401 | ENT_NOQUOTES, 'UTF-8')
            );
            $output .= "</tr>";
        }
        $output .= "</tbody></table>";

        return $output;
    }

    public function renderConfSettings()
    {
        $settings = [
//            Config::JIG_COMPILE_CHECK => Jig::COMPILE_CHECK_EXISTS,
//            Config::CACHING_SETTING => LastModifiedStrategy::CACHING_TIME,
//            Config::LIBRATO_STATSSOURCENAME => null,
            'environment' => null,
        ];

        $output = "";
        $output .= "<table class='table-serverSettings'>";
        
        $output .= "<thead>";
        
        $output .= "<th>Conf setting</th>";
        $output .= "<th>Value</th>";
        $output .= "</thead>";
        
        $config = new Config();

        $output .= "<body>";
        foreach ($settings as $setting => $expectedValue) {
            $value = $config->getKey($setting);

            $class = 'good';
            if ($expectedValue === null) {
                //Do nothing.
            }
            else if ($value != $expectedValue) {
                $class = 'bad';
            }

            $value = var_export($value, true);
            $output .= "<tr>";
            $output .= sprintf(
                "<td class='%s'>%s</td><td class='%s'>%s</td>",
                $class,
                htmlentities($setting, ENT_DISALLOWED | ENT_HTML401 | ENT_NOQUOTES, 'UTF-8'),
                $class,
                htmlentities($value, ENT_DISALLOWED | ENT_HTML401 | ENT_NOQUOTES, 'UTF-8')
            );
            $output .= "</tr>";
        }
        $output .= "</tbody></table>";

        return $output;
    }

    public function render()
    {
        $output = "";
        $output .= $this->renderIniSettings();
        $output .= $this->renderConfSettings();

        return $output;
    }
}
