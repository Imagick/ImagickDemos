<?php


namespace ImagickDemo\ControlElement;

use Intahwebz\Request;


class ColorMatrix implements ControlElement {
    
    
//    private $colorMatrix = [
//        1.5, 0.0, 0.0, 0.0, 0.0, -0.157,
//        0.0, 1.0, 0.5, 0.0, 0.0, -0.157,
//        0.0, 0.0, 0.5, 0.0, 0.0, 0.5,
//        0.0, 0.0, 0.0, 1.0, 0.0,  0.0,
//        0.0, 0.0, 0.0, 0.0, 1.0,  0.0,
//        0.0, 0.0, 0.0, 0.0, 0.0,  1.0,
//    ];

    private $colorMatrix = [
        1.5, 0.0, 0.0, 0.0, -0.157,
        0.0, 1.0, 0.5, 0.0, -0.157,
        0.0, 0.0, 0.5, 0.0, 0.5,
        0.0, 0.0, 0.0, 1.0, 0.0,
        0.0, 0.0, 0.0, 0.0, 1.0,
    ];

    private $matrixDimension = 5;

    private $colorMatrixSize = 25; 

    function __construct(Request $request) {
        $elements = $this->colorMatrixSize;
        for ($i=0 ; $i<$elements ; $i++) {
            $name = 'colorMatrix_'.$i;
            $newValue = $request->getVariable($name, $this->colorMatrix[$i]);
            $newValue = floatval($newValue);
            $this->colorMatrix[$i] = $newValue;
        }
    }
    
    
    /**
     * @return array
     */
    function getParams() {
        $return = [];
        
        foreach($this->colorMatrix as $key => $value) {
            $return['colorMatrix_'.$key] = $value;
        }

        return $return;
    }

    /**
     * @return string
     */
    function renderFormElement() {

        $output = '';
        
        $output .= "<tr>
        <td class='standardCell' colspan='3'>
        ";

        $output .= "<table style='font-size: 10px'>";
        
        foreach ($this->colorMatrix as $key => $value) {

            if (($key % $this->matrixDimension) == 0) {
                $output .= "<tr>";
            }

            $output .= "<td>";

            $name = 'colorMatrix_'.$key;
            
            $output .= "<input type='text' length='4' name='$name' value='$value' style='width: 40px'/>";
            $output .= "</td>";

            if (($key % $this->matrixDimension) == ($this->matrixDimension - 1)) {
                $output .= "</tr>";
            }
        }

        $output .= "</table>";
        
        
        
//        $output .= <<< END
//        
//  <script type='text/javascript'>
//
//        <div style='display: inline-block; border: 1px solid #000000; margin: 4px' onclick='resetToIdentiy('#colorMatrix', $this->matrixDimension)'>Reset to identity</div>
//END;
//  
//        
//        
        $output .= "</td></tr>";

        return $output;
    }

    public function getColorMatrix() {
        return $this->colorMatrix;
    }
}

 