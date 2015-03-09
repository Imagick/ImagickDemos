<?php


namespace ImagickDemo\ControlElement;

use ImagickDemo\Framework\VariableMap;


class KernelMatrix implements ControlElement {

    private $kernelMatrix = [
        -1, -1, -1, 
        -1, 8, -1, 
        -1, -1, -1
    ];

    private $matrixDimension = 3;

    private $kernelMatrixSize = 9; 

    function __construct(VariableMap $variableMap) {
        $elements = $this->kernelMatrixSize;
        for ($i=0 ; $i<$elements ; $i++) {
            $name = 'kernelMatrix_'.$i;
            $newValue = $variableMap->getVariable($name, $this->kernelMatrix[$i]);
            $newValue = floatval($newValue);
            $this->kernelMatrix[$i] = $newValue;
        }
    }

    /**
     * @return array
     */
    function getParams() {
        $return = [];
        
        foreach($this->kernelMatrix as $key => $value) {
            $return['kernelMatrix_'.$key] = $value;
        }

        return $return;
    }

    /**
     * @return array
     */
    function getInjectionParams() {
        //return $this->getParams();

        return ['kernelMatrix' => $this->kernelMatrix];
    }

    /**
     * @return string
     */
    function renderFormElement() {

        $output = "
        <div class='row controlRow'>
        
        <div class='col-xs-".self::FIRST_ELEMENT_SIZE."'>
        Kernel
        </div>

        <div class='col-xs-".self::MIDDLE_ELEMENT_SIZE." controlCell' style='font-size: 12px'>";
        
        foreach ($this->kernelMatrix as $key => $value) {
            if (($key % $this->matrixDimension) == 0) {
                $output .= "<div class='row'>";
            }

            $output .= "<div class='col-xs-4 '>";
            $name = 'kernelMatrix_'.$key;
            $output .= "<input type='text' length='4' name='$name' value='$value' style='width: 30px'/>";
            $output .= "</div>";

            if (($key % $this->matrixDimension) == ($this->matrixDimension - 1)) {
                //$output .= "<div class='col-xs-2'></div>";
                $output .= "</div>";
            }
        }

        $output .= " </div></div>";

        return $output;
    }

    public function getKernelMatrix() {
        return $this->kernelMatrix;
    }
}

 