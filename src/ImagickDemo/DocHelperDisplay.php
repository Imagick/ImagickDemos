<?php


namespace ImagickDemo;


class DocHelperDisplay extends DocHelper {



    function showDescription() {
        if (isset($this->manualEntries[$this->category][$this->example]) == false) {
            return "";
        }

        $manualEntry = $this->manualEntries[$this->category][$this->example];

        return $manualEntry['description'];
    }

    function showParameters() {
        if (isset($this->manualEntries[$this->category][$this->example]) == false) {
            return "";
        }

        $manualEntry = $this->manualEntries[$this->category][$this->example];

        $output = '';

        if (count($manualEntry['parameters'])) {
            $output .= "<h5>Parameters</h5>";

            $output .= "<table class='smallPadding'><tbody>";

            foreach ($manualEntry['parameters'] as $parameter) {
                $output .= "<tr>";
                $output .= "<td class='smallPadding' valign='top'>".$parameter['name']."</td>";
                $output .= "<td class='smallPadding' valign='top'>".$parameter['type']."</td>";
                $output .= "<td class='smallPadding' valign='top'>".$parameter['description']."</td>";
                $output .= "</tr>";
            }

            $output .= "</tbody></table>";
        }


        return $output;
    }


    function showExamples() {

        $output = "";

        if (isset($this->exampleEntries[$this->category][$this->example]) == false) {
            return "";
            //return "No example for ".$this->category. " ".$this->example ;
        }

        $examples = $this->exampleEntries[$this->category][$this->example];

        
        
        $count = 1;
        foreach ($examples as $example) {
            $example = unserialize($example);
            /** @var $example \ImagickDemo\CodeExample */

            if (count($examples) > 1) {
                $output .= "Example $count";
            }
            else {
                $output .= "Example";
            }
            $description = $example->getDescription();
            if (strlen(trim($description))) {
                $output .= ' - '.$description;
            }

            $uri = sprintf(
                "https://github.com/Danack/Imagick-demos/tree/master/src/ImagickDemo/%s/functions.php",
                $example->category
            );

            if ($example->startLine && $example->endLine) {
                $uri .= sprintf(
                    "#L%d-L%d",
                    $example->startLine,
                    $example->endLine
                );
            }
            else if ($example->startLine) {
                $uri .= sprintf(
                    "#L%d",
                    $example->startLine
                );
            }

            $output .= "<div class='shContainer'>";
            $output .= "<pre class='brush: php;' data-github='$uri'>";
            $output .=  $example->getLines();
            $output .=  "</pre></div>";
            $count++;
        }

        return $output;
    }

}

