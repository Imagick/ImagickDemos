<?php

namespace ImagickDemo\Params;

use Params\ExtractRule\GetIntOrDefault;
use Params\InputParameter;
use Params\Param;
use Params\ProcessRule\RangeIntValue;

#[\Attribute]
class H20 implements Param
{
    public function __construct(
        private string $name
    ) {
    }

    public function getInputParameter(): InputParameter
    {
        return new InputParameter(
            $this->name,
            new GetIntOrDefault(100),
            new RangeIntValue(0, 20),
        );
    }

//class H20 implements ControlElement
//{
//    private $h20 = "5";
//
//    const H20_NAME = 'h20';
//
//    public function __construct(VariableMap $variableMap)
//    {
//        $this->h20 = $variableMap->getVariable(self::H20_NAME, $this->h20);
//        $this->h20 = intval($this->h20);
//        if ($this->h20 < 0) {
//            $this->h20 = 0;
//        }
//        if ($this->h20 > 20) {
//            $this->h20 = 20;
//        }
//    }
//
//    /**
//     * @return array
//     */
//    public function getParams()
//    {
//        return [
//            self::H20_NAME => $this->h20,
//        ];
//    }
//
//    /**
//     * @return array
//     */
//    public function getInjectionParams()
//    {
//        return $this->getParams();
//    }
//
//    /**
//     * @return string
//     */
//    public function renderFormElement()
//    {
//        $sWidth = safeText($this->h20);
//
//        $text = "<div class='row controlRow'>
//    <div class='col-sm-" . self::FIRST_ELEMENT_SIZE . " controlCell'>
//        %s
//    </div>
//    <div class='col-sm-" . self::MIDDLE_ELEMENT_SIZE . " inputValue controlCell'>
//        <input type='text' name='%s' value='%s'/>
//    </div>
//</div>";
//
//        return sprintf(
//            $text,
//            "Height",
//            self::H20_NAME,
//            $sWidth
//        );
//    }
//
//    /**
//     * @return string
//     */
//    public function getH20()
//    {
//        return $this->h20;
//    }
}
