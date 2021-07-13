<?php

namespace ImagickDemo\ImagickKernel;


use ImagickDemo\Control\ReactControls;
use ImagickDemo\ControlElement\KernelRender;
use ImagickDemo\Display;
use VarMap\VarMap;
use ImagickDemo\ImagickKernel\Params\FromMatrixControl;


class fromMatrix extends \ImagickDemo\Example
{
    /**
     * @var fromMatrixControl
     */
    private $fromMatrixControl;

    public function __construct(VarMap $varMap)
    {
        $control = fromMatrixControl::createFromVarMap($varMap);

        $this->fromMatrixControl = $control;
    }

    public function renderDescription()
    {
        return "Create a kernel from an 2d matrix of values. Each value should either be a float (if the element should be used) or 'false' if the element should be skipped.";
    }



    public function bespokeRender(ReactControls $reactControls)
    {
        $output = createReactImagePanel(
            "/image/ImagickKernel/fromMatrix",
            "/ImagickKernel/fromMatrix",
            true
        );

        // Well this is horrendous.
        \ImagickDemo\ImagickKernel\functions::load();

        if ($this->fromMatrixControl->getKernelRender() === "Values") {
            $kernel = createFromMatrix();
            $output .= Display::renderKernelTable($kernel->getMatrix());
        }
        else {
            $output .= $reactControls->renderImageURL(false);
        }

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
        return FromMatrixControl::class;
    }
}
