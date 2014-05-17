<?php


namespace ImagickDemo\ControlElement;

use Intahwebz\Request;

class StatisticType implements ControlElement {

    private $statisticType = \Imagick::STATISTIC_GRADIENT;
    
    const statisticTypeName = 'statisticType';
    
    private $statisticTypeDefault = 'Gradient';

    private $statisticTypes = [
        \Imagick::STATISTIC_GRADIENT => "Gradient",
        \Imagick::STATISTIC_MAXIMUM => "Maximum",
        \Imagick::STATISTIC_MEAN => "Mean",
        \Imagick::STATISTIC_MEDIAN => "Median",
        \Imagick::STATISTIC_MINIMUM => "Minimum",
        \Imagick::STATISTIC_MODE => "Mode",
        \Imagick::STATISTIC_NONPEAK => "Non-peak",
        \Imagick::STATISTIC_STANDARD_DEVIATION => "Standard deviation",
    ];
    
    function __construct(Request $request) {
        $this->statisticTypeDefault = $request->getVariable(self::statisticTypeName, $this->statisticTypeDefault);
        
        foreach ($this->statisticTypes as $noiseType => $value) {
            if (strcmp($this->statisticTypeDefault, $value) === 0 || $this->statisticTypeDefault == null) {
                $this->statisticType = $noiseType;
            }
        }
        //zendcode eats braces
    }

    /**
     * @return array
     */
    function getParams() {
        return [self::statisticTypeName => $this->statisticTypeDefault];
    }

    /**
     * @return string
     */
    function renderFormElement() {
        $output = "<tr>
                <td class='standardCell'>Statistic type
                </td>
                <td class='standardCell'> ";

        $output .= "<select name='".self::statisticTypeName."'>";

        foreach ($this->statisticTypes as $noiseType => $noiseName) {
            $selected = '';
            if (strcmp($noiseName, $this->statisticTypeDefault) === 0) {
                $selected = "selected='selected'";
            }
            $output .= "<option value='".$noiseName."' $selected>$noiseName</option>";
        }

        $output .= "</select>
                    </td>
            </tr>";

        return $output;
    }

    function getStatisticType() {
        return $this->statisticType;
    }
}

 