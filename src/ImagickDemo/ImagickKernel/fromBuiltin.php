<?php

namespace ImagickDemo\ImagickKernel;

//use ImagickDemo\ImagickKernel\Control\fromBuiltIn as fromBuiltInControl;
use ImagickDemo\Control\ReactControls;
use ImagickDemo\ControlElement\KernelRender;
use ImagickDemo\Display;
use ImagickDemo\ImagickKernel\Params\FromMatrixControl;
use ImagickDemo\ImagickKernel\Params\FromBuiltInControl;
use VarMap\VarMap;

class fromBuiltin extends \ImagickDemo\Example
{
    private FromBuiltInControl $fromBuiltInControl;

    public function __construct(VarMap $varMap)
    {
        $control = FromBuiltInControl::createFromVarMap($varMap);

        $this->fromBuiltInControl = $control;
    }

    public function renderDescription()
    {
        return "Create a kernel from a builtin in kernel. See http://www.imagemagick.org/Usage/morphology/#kernel for examples. Currently the 'rotation' symbol is not supported.
    ";
    }

    public function bespokeRender(ReactControls $reactControls)
    {
        $output = sprintf(
            '<div
                id="imagePanel"
                data-imageBaseUrl="%s"
                data-pagebaseurl="%s"
                ></div>',
            "/image/ImagickKernel/fromBuiltin",
            "/ImagickKernel/fromBuiltin"
        );

        // Well this is horrendous.
        \ImagickDemo\ImagickKernel\functions::load();

        if ($this->fromBuiltInControl->getKernelRender() === "Values") {
            $kernel = createFromBuiltin(
                $this->fromBuiltInControl->getKernelType(),
                $this->fromBuiltInControl->getFirstTerm(),
                $this->fromBuiltInControl->getSecondTerm(),
                $this->fromBuiltInControl->getThirdTerm()
            );

            $output .= Display::renderKernelTable($kernel->getMatrix());
            return $output;
        }

        $url = "/image/ImagickKernel/fromBuiltin";
        $url .= "?" . http_build_query($this->fromBuiltInControl->getValuesForForm());

        $output .= "<img src='$url' alt='matrix from built in'/>";

        return $output;
    }

    public function hasBespokeRender()
    {
        return true;
    }

    public function hasReactControls(): bool
    {
        return true;
    }

    public static function getParamType(): string
    {
        return FromBuiltInControl::class;
    }
}
