<?php


namespace ImagickDemo\ControlElement;

use Intahwebz\Request;

class Amount implements ControlElement {

    private $amount = 5;

    const amountName = 'amount';
    
    function __construct(Request $request) {
        $this->amount = floatval($request->getVariable(self::amountName, $this->amount));
        
        if ($this->amount < 0) {
            $this->amount = 0;
        }
        if ($this->amount > 20) {
            $this->amount = 20;
        }
        //blah
    }

    function getParams() {
        return [self::amountName => $this->amount];
    }

    function renderFormElement() {
        $output = '';
        $sAmount = safeText($this->amount);

        $output .= "
            <tr>
                <td class='standardCell'>
                    ".self::amountName."
                </td>
                <td class='standardCell'>
                    <input type='text' name='".self::amountName."' value='$sAmount'/>
                </td>
            </tr>
";

        return $output;
    }

    /**
     * @return string
     */
    public function getAmount() {
        return $this->amount;
    }
}

 