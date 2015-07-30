<?php

namespace ImagickDemo\ControlElement;

class KernelType extends OptionKeyElement
{
    protected function getDefault()
    {
        return \Imagick::KERNEL_DISK;
    }

    protected function getVariableName()
    {
        return 'kernelType';
    }

    protected function getDisplayName()
    {
        return "Kernel type";
    }

    public function getOptions()
    {
        return [
            \Imagick::KERNEL_UNITY => "Unity",
            \Imagick::KERNEL_GAUSSIAN => "Gaussian",
            \Imagick::KERNEL_DIFFERENCE_OF_GAUSSIANS => "Difference of Gaussians",
            \Imagick::KERNEL_LAPLACIAN_OF_GAUSSIANS => "Laplacian of Gaussians",
            \Imagick::KERNEL_BLUR => "Blur",
            \Imagick::KERNEL_COMET => "Comet",
            \Imagick::KERNEL_LAPLACIAN => "Laplacian",
            \Imagick::KERNEL_SOBEL => "Sobel",
            \Imagick::KERNEL_FREI_CHEN => "FreiChen",
            \Imagick::KERNEL_ROBERTS => "Roberts",
            \Imagick::KERNEL_PREWITT => "Prewitt",
            \Imagick::KERNEL_COMPASS => "Compass",
            \Imagick::KERNEL_KIRSCH => "Kirsch",
            \Imagick::KERNEL_DIAMOND => "Diamond",
            \Imagick::KERNEL_SQUARE => "Square",
            \Imagick::KERNEL_RECTANGLE => "Rectangle",
            \Imagick::KERNEL_OCTAGON => "Octagon",
            \Imagick::KERNEL_DISK => "Disk",
            \Imagick::KERNEL_PLUS => "Plus",
            \Imagick::KERNEL_CROSS => "Cross",
            \Imagick::KERNEL_RING => "Ring",
            \Imagick::KERNEL_PEAKS => "Peaks",
            \Imagick::KERNEL_EDGES => "Edges",
            \Imagick::KERNEL_CORNERS => "Corners",
            \Imagick::KERNEL_DIAGONALS => "Diagonals",
            \Imagick::KERNEL_LINE_ENDS => "Line Ends",
            \Imagick::KERNEL_LINE_JUNCTIONS => "Line Junctions",
            \Imagick::KERNEL_RIDGES => "Ridges",
            \Imagick::KERNEL_CONVEX_HULL => "Convex Hull",
            \Imagick::KERNEL_THIN_SE => "Thin SE",
            \Imagick::KERNEL_SKELETON => "Skeleton",
            \Imagick::KERNEL_CHEBYSHEV => "Chebyshev",
            \Imagick::KERNEL_MANHATTAN => "Manhattan",
            \Imagick::KERNEL_OCTAGONAL => "Octagonal",
            \Imagick::KERNEL_EUCLIDEAN => "Euclidean",
            // \Imagick::KERNEL_USER_DEFINED => "User Defined", This isn't needed
            // Imagick has fromMatrix which is far saner to use.
            \Imagick::KERNEL_BINOMIAL => "Binomial",
        ];
    }

    public function getKernelType()
    {
        return $this->getKey();
    }
}
