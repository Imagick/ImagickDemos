<?php

namespace ImagickDemo;

class DocHelperDisplay extends DocHelper
{
    public function showDescription()
    {
        if (isset($this->manualEntries[$this->category][$this->example]) == false) {
            return "";
        }

        $manualEntry = $this->manualEntries[$this->category][$this->example];

        return $manualEntry['description'];
    }

    public function showDescriptionPanel($smaller = false)
    {
        $description = trim($this->showDescription());
        if (!$description) {
            return null;
        }

        $output = Display::getPanelStart($smaller, 'textPanelSpacing');
        $output .= "<i>";
        $output .= htmlentities($description);
        $output .= "</i>";
        $output .= Display::getPanelEnd();
        
        return $output;
    }

    public function showParametersPanel()
    {
        $params = $this->showParameters();
        
        if (!$params) {
            return null;
        }

        $output  = "<div class='row'> ";
        $output .= "<div class='col-md-12 visible-md visible-lg contentPanel'>";
        $output .= $params;
        $output .= "
                </div>
            </div>";

        return $output;
    }

    public function showParameters()
    {
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

    /**
     * @return array
     */
    public function getExamples()
    {
        if (isset($this->exampleEntries[$this->category][$this->example]) == false) {
            return [];
        }
        
        return $this->exampleEntries[$this->category][$this->example];
    }

    public function showExamples()
    {
        return $this->showExamplesAsHTML();
        //return $this->showExamplesAsXML();
    }

    public function getXML()
    {
        $output = "";

        if (isset($this->exampleEntries[$this->category][$this->example]) == false) {
            return "";
        }

        $examples = $this->exampleEntries[$this->category][$this->example];

        $xmlStart = "\n\n".'<refsect1 role="examples">
  &reftitle.examples;
  <para>';

        $xmlEnd = '  </para>
</refsect1>

';

        $exampleText =
            '
    <example>
      <title>%s <function>%s</function></title>
      <programlisting role="php">
      <![CDATA[
<?php
%s
?>
]]>
      </programlisting>
    </example>'."\n";

        $output .= $xmlStart;

        foreach ($examples as $example) {
            $example = unserialize($example);

            $header = '';
            $description = $example->getDescription();
            if (strlen(trim($description))) {
                $header = $description;
            }

            $output .= sprintf(
                $exampleText,
                $header,
                $this->categoryCase.'::'.$this->exampleCase,
                $example->getLines()
            );
        }

        $output .= $xmlEnd;

        return $output;
    }

    public function showExamplesAsXML()
    {
        $output = "";

        if (isset($this->exampleEntries[$this->category][$this->example]) == false) {
            return "";
        }

        $examples = $this->exampleEntries[$this->category][$this->example];

        $xmlStart = '<refsect1 role="examples">
  &reftitle.examples;
  <para>';
        
        $xmlEnd = '  </para>
</refsect1>
';

        $exampleText = '
    <example>
      <title>%s <function>%s</function></title>
      <programlisting role="php">
      <![CDATA[
<?php
%s
?>
]]>
      </programlisting>
    </example>'."\n";


        
        
        $count = 1;
        foreach ($examples as $example) {
            $example = unserialize($example);
            $output .= "<div class='row'>
                <div class='col-md-12 contentPanel'>";

            $header = '';
            $description = $example->getDescription();
            if (strlen(trim($description))) {
                $header = $description;
            }

            $output .= "<div class='shContainer'>";
            $output .= "<pre>";

            $xml = $xmlStart;

            $xml .= sprintf(
                $exampleText,
                $header,
                $this->categoryCase.'::'.$this->exampleCase,
                $example->getLines()
            );

            $xml .= $xmlEnd;
            $output .= htmlentities($xml);
            $output .= "</pre></div>";
            $count++;

            $output .= Display::getPanelEnd();
        }

        return $output;
    }

    public function showExamplesAsHTML()
    {
        $output = "";

        if (isset($this->exampleEntries[$this->category][$this->example]) == false) {
            return "";
        }

        return "example goes here.";

        $examples = $this->exampleEntries[$this->category][$this->example];

        $count = 1;
        foreach ($examples as $example) {
            $example = unserialize($example);
            $output .= "<div class='row'>
                <div class='col-md-12 contentPanel'>";

            $header = false;
            
            if (count($examples) > 1) {
                $header = "Example $count";
            }

            $description = $example->getDescription();
            if (strlen(trim($description))) {
                if ($header) {
                    $header .= ' - ' . $description;
                }
                else {
                    $header = $description;
                }
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

            $string = $example->getLines();
            $offset = 0;
            $lines = explode("\n", $string);
            foreach ($lines as $line) {
                if (!strlen(trim($line))) {
                    continue;
                }

                $matched = preg_match('#[^\s]#', $line, $matches, PREG_OFFSET_CAPTURE);

                if ($matched) {
                    $offset = $matches[0][1];
                    break;
                }
            }

            $output .= "<div class='shContainer'>";
            $output .= "<pre class='brush: php;' data-github='$uri'>";

            if ($header) {
                for ($x = 0; $x < $offset; $x++) {
                    $output .= ' ';
                }
                $output .= '//' . $header . "\n\n";
            }

            $output .=  $example->getLines();
            $output .=  "</pre></div>";
            $count++;

            $output .= Display::getPanelEnd();
        }

        return $output;
    }
}
