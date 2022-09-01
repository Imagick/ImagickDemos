<?php

namespace ImagickDemo\ImagickKernel;

use ImagickDemo\Display;
use ImagickDemo\ImagickKernel\Controls\FromBuiltInControl;
use VarMap\VarMap;

class fromBuiltIn extends \ImagickDemo\Example
{
    private FromBuiltInControl $fromBuiltInControl;

    public function __construct(VarMap $varMap)
    {
        $control = FromBuiltInControl::createFromVarMap($varMap);

        $this->fromBuiltInControl = $control;
    }

    public function renderTitle(): string
    {
        return "ImagickKernel::fromBuiltIn";
    }

    public function renderDescription()
    {
        return "Create a kernel from a builtin in kernel. See http://www.imagemagick.org/Usage/morphology/#kernel for examples. Currently the 'rotation' symbol is not supported.
    ";
    }

    public function render(
        ?string $activeCategory,
        ?string $activeExample
    ) {
        $imageBaseURL = "/image/ImagickKernel/fromBuiltIn";

        if ($this->fromBuiltInControl->getKernelRender() === "Values") {
            $imageBaseURL = null;
        }

        $output = createReactImagePanel(
            $imageBaseURL,
            "/ImagickKernel/fromBuiltIn",
            $this
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

        return $output;
    }

    public function needsFullPageRefresh(): bool
    {
        return true;
    }

    public static function getParamType(): string
    {
        return FromBuiltInControl::class;
    }
}
