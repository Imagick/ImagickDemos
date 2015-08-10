<?php


namespace ImagickDemo\Model;

use ImagickDemo\Config;
use Tier\Caching\Caching;
use Jig\Jig;

class ServerSettings
{
    function renderIniSettings()
    {
        $settings = [
            'opcache.enabled' => true,
            'opcache.validate_timestamps' => false,
            'opcache.file_update_protection' => false,
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
    
    


    function renderConfSettings()
    {
        $settings = [
            'JIG_COMPILE_CHECK' => Jig::COMPILE_CHECK_EXISTS,
            'CACHING_SETTING' => Caching::CACHING_TIME,
            'LIBRATO_STATSSOURCENAME' => null, 
            
        ];

        $output = "";
        $output .= "<table class='table-serverSettings'>";
        
        $output .= "<thead>";
        
        $output .= "<th>Conf setting</th>";
        $output .= "<th>Value</th>";
        $output .= "</thead>";

        $output .= "<body>";
        foreach ($settings as $setting => $expectedValue) {
            $value = Config::getEnv(constant("ImagickDemo\\Config::$setting"));

            $class = 'good';
            if ($expectedValue === null) {

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

    function render()
    {
        $output = "";
        $output .= $this->renderIniSettings();
        $output .= $this->renderConfSettings();

        return $output;
    }
}

