<?php


namespace ImagickDemo\ControlElement;

use Intahwebz\Request;



class H20 implements ControlElement {
    
    private $h20 = "5";

    const h20Name = 'h20';

    function __construct(Request $request) {
        $this->h20 = $request->getVariable(self::h20Name, $this->h20);
        $this->h20 = intval($this->h20);
        if ($this->h20 < 0) {
            $this->h20 = 0;
        }
        if ($this->h20 > 20) {
            $this->h20 = 20;
        }
    }

    /**
     * @return array
     */
    function getParams() {
        return [
            self::h20Name => $this->h20,
        ];
    }

    /**
     * @return array
     */
    function getInjectionParams() {
        return $this->getParams();
    }

    /**
     * @return string
     */
    function renderFormElement() {
        $sWidth = safeText($this->h20);
   
        $text = "<div class='row controlRow'>
    <div class='col-sm-".self::FIRST_ELEMENT_SIZE." controlCell'>
        %s
    </div>    
    <div class='col-sm-".self::MIDDLE_ELEMENT_SIZE." inputValue controlCell'>
        <input type='text' name='%s' value='%s'/>
    </div>
</div>";

        return sprintf(
            $text,
            "Height",
            self::h20Name,
            $sWidth
        );
    }

    /**
     * @return string
     */
    public function getH20() {
        return $this->h20;
    }
}

 