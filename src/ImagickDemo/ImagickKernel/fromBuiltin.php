<?php

namespace ImagickDemo\ImagickKernel;

use ImagickDemo\ImagickKernel\Control\fromBuiltIn as fromBuiltInControl;
use ImagickDemo\ControlElement\KernelRender;

class fromBuiltin extends \ImagickDemo\Example
{
    /**
     * @var fromBuiltInControl
     */
    private $builtInControl;

    public function __construct(fromBuiltInControl $control)
    {
        parent::__construct($control);
        $this->builtInControl = $control;
    }

    public function renderDescription()
    {
        return "Create a kernel from a builtin in kernel. See http://www.imagemagick.org/Usage/morphology/#kernel for examples. Currently the 'rotation' symbol is not supported.
    ";
    }

    public function render()
    {
        switch ($this->builtInControl->getKernelRender()) {
            case (KernelRender::KERNEL_RENDER_IMAGE): {
                return $this->renderImageURL();
                break;
            }

            case (KernelRender::KERNEL_RENDER_VALUES): {
                $kernel = createFromBuiltin(
                    $this->builtInControl->getKernelType(),
                    $this->builtInControl->getKernelFirstTerm(),
                    $this->builtInControl->getKernelSecondTerm(),
                    $this->builtInControl->getKernelThirdTerm()
                );

                return renderKernelTable($kernel->getMatrix());
            }
        }

        return "Unknown render type.";
    }
}
