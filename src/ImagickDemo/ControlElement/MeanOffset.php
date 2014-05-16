<?php


namespace ImagickDemo\ControlElement;

use Intahwebz\Request;

class MeanOffset implements ControlElement {

    private $meanOffset = 5;
    
    const name = 'meanOffset';

    function __construct(Request $request) {
        $this->meanOffset = floatval($request->getVariable(self::name, $this->meanOffset));
        
        if ($this->meanOffset < 0) {
            $this->meanOffset = 0;
        }
        if ($this->meanOffset > 10) {
            $this->meanOffset = 10;
        }
        //blah
    }

    function getParams() {
        return [self::name => $this->meanOffset];
    }


    function renderFormElement() {
        $output = '';
        $sMeanOffset = safeText($this->meanOffset);

        $output .= "
            <tr>
                <td class='standardCell'>
                    Mean offset
                </td>
                <td class='standardCell'>
                    <input type='text' name='".self::name."' value='$sMeanOffset'/>
                </td>
            </tr>
";

        return $output;
    }

    /**
     * @return string
     */
    public function getMeanOffset() {
        return $this->meanOffset;
    }

}

 