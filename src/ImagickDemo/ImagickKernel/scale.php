<?php

namespace ImagickDemo\ImagickKernel;

class scale extends \ImagickDemo\Example {

    function renderDescription() {
        return "Scales a kernel.
         
NORMALIZE_KERNEL_VALUE

NORMALIZE_KERNEL_PERCENT

NORMALIZE_KERNEL_CORRELATE
         
         Please read http://www.imagemagick.org/api/morphology.php#ScaleKernelInfo";

    }
    
    function renderTitle() {
        return "";
    }

    function render() {
//Example ImagickKernel::scale
        $output = "";
        
        $matrix = [
            [-1, 0, -1],
            [ 0, 4,  0],
            [-1, 0, -1],
        ];

        $kernel = \ImagickKernel::fromMatrix($matrix);
        $kernelClone = clone $kernel;

        $output .= "Start kernel<br/>";
        $output .= renderKernelTable($kernel->getMatrix());
        
        
        $output .= "Scaling with NORMALIZE_KERNEL_VALUE. The  <br/>";
        $kernel->scale(2, \Imagick::NORMALIZE_KERNEL_VALUE);
        $output .= renderKernelTable($kernel->getMatrix());


        $kernel = clone $kernelClone;
        $output .= "Scaling by percent<br/>";
        $kernel->scale(2, \Imagick::NORMALIZE_KERNEL_PERCENT);
        $output .= renderKernelTable($kernel->getMatrix());


        
        
        
        
        $matrix2 = [
            [-1, -1, 1],
            [ -1, false,  1],
            [1, 1, 1],
        ];
        
        $kernel = \ImagickKernel::fromMatrix($matrix2);
        $output .= "Scaling by correlate<br/>";
        $kernel->scale(1, \Imagick::NORMALIZE_KERNEL_CORRELATE);
        $output .= renderKernelTable($kernel->getMatrix());
    

        return $output; 
//Example end
    }
}