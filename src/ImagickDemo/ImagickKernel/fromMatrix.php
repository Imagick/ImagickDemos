<?php

namespace ImagickDemo\ImagickKernel;

use ImagickDemo\ImagickKernel\Control\fromMatrixControl;
use ImagickDemo\ControlElement\KernelRender;
use ImagickDemo\App;
use ImagickDemo\Display;

function createFromMatrix()
{
    $matrix = [
        [0.5, 0, 0.2],
        [0, 1, 0],
        [0.9, 0, false],
    ];

    $kernel = \ImagickKernel::fromMatrix($matrix);

    return $kernel;
}

class fromMatrix extends \ImagickDemo\Example
{
    /**
     * @var fromMatrixControl
     */
    private $fromMatrixControl;

    public function __construct(fromMatrixControl $control)
    {
        parent::__construct($control);
        $this->fromMatrixControl = $control;
    }

    public function renderDescription()
    {
        return "Create a kernel from an 2d matrix of values. Each value should either be a float (if the element should be used) or 'false' if the element should be skipped.";
    }

    public function render()
    {
        switch ($this->fromMatrixControl->getKernelRender()) {
            case (KernelRender::KERNEL_RENDER_IMAGE): {
                return $this->renderImageURL();
                break;
            }

            case (KernelRender::KERNEL_RENDER_VALUES): {
                $kernel = createFromMatrix();

                return Display::renderKernelTable($kernel->getMatrix());
            }
        }

        return $this->renderImageURL();
    }
}
