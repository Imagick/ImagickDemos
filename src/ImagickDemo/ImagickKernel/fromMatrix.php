<?php

namespace ImagickDemo\ImagickKernel;

use ImagickDemo\Control\ReactControls;
use ImagickDemo\Display;
use VarMap\VarMap;
use ImagickDemo\ImagickKernel\Controls\FromMatrixControl;

class fromMatrix extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "ImagickKernel::fromMatrix";
    }

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



    public function render(
        ?string $activeCategory,
        ?string $activeExample
    ) {
        $imageBaseUrl = "/image/ImagickKernel/fromMatrix";

        if ($this->fromMatrixControl->getKernelRender() === "Values") {
            $imageBaseUrl = null;
        }

        $output = createReactImagePanel(
            $imageBaseUrl,
            "/ImagickKernel/fromMatrix",
            $this
        );

        // Well this is horrendous.
        \ImagickDemo\ImagickKernel\functions::load();

        if ($this->fromMatrixControl->getKernelRender() === "Values") {
            $kernel = createFromMatrix();
            $output .= Display::renderKernelTable($kernel->getMatrix());
        }

        return $output;
    }

    public function needsFullPageRefresh(): bool
    {
        return true;
    }


    public static function getParamType(): string
    {
        return FromMatrixControl::class;
    }
}
