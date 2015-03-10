<?php

namespace ImagickDemo\ImagickKernel {
    
use ImagickKernel;

class functions {
    static function load() {
    }
}

/**
 * Hack the header function to allow us to capture the image type,
 * while still having clean example code.
 *
 * @param $string
 * @param bool $replace
 * @param null $http_response_code
 */
function header($string, $replace = true, $http_response_code = null) {
    global $imageType;
    global $cacheImages;

    if (stripos($string, "Content-Type: image/") === 0) {
        $imageType = substr($string, strlen("Content-Type: image/"));
    }

    if ($cacheImages == false) {
        \header($string, $replace, $http_response_code);
    }
}


function makeNewKernel($currentKernels) {
    $rotatedKernel = null;

    foreach ($currentKernels as $kernelMatrix) {
        $newKernel = ImagickKernel::fromMatrix($kernelMatrix, [0, 0]);

        if ($rotatedKernel == null) {
            $rotatedKernel = $newKernel;
        }
        else {
            $rotatedKernel->addKernel($newKernel);
        }
    }

    return $rotatedKernel;
}



// Cyclically rotate 3x3 kernels in 45-degree increments,
// producing a list of up to 8 rotated kernels.
function rotateKernel45(ImagickKernel $kernel) {

    $matrix = $kernel->getMatrix();

    if (count($matrix) != 3) {
        throw new ImagickKernelException("Can only rotate 3x3 matrixes.");
    }

    if (count($matrix[0]) != 3) {
        throw new ImagickKernelException("Can only rotate 3x3 matrixes.");
    }
    
    $finished = false;

    $rotatedKernels = [];
    
    while($finished == false) {
        $rotatedKernels[] = $matrix;

        $newMatrix = [];
        $newMatrix[0][1] = $matrix[0][0];
        $newMatrix[0][2] = $matrix[0][1];
        $newMatrix[1][2] = $matrix[0][2];
        $newMatrix[2][2] = $matrix[1][2];
        $newMatrix[2][1] = $matrix[2][2];
        $newMatrix[2][0] = $matrix[2][1];
        $newMatrix[1][0] = $matrix[2][0];
        $newMatrix[0][0] = $matrix[1][0];
        $newMatrix[1][1] = $matrix[1][1];

        if (in_array($newMatrix , $rotatedKernels, true)) {
            $finished = true;
        }
        else {
            $matrix = $newMatrix;   //Gets added in next loop
        }
    }
    
    return makeNewKernel($rotatedKernels);
}



function rotateMatrix90($matrix) {
    $finished = false;
    $rotatedKernels = [];

    while($finished == false) {
        $rotatedKernels[] = $matrix;
        $newMatrix = [];
        $rows = count($matrix);
        $columns = count($matrix[0]);

        for($row=0; $row<$rows ; $row++) {
            for($column=0; $column<$columns ; $column++) {
                $srcRow = ($rows - 1) - $row;
                $srcColumn = $column;
                $newMatrix[$column][$row] = $matrix[$srcRow][$srcColumn];
            }
        }

        if (in_array($newMatrix, $rotatedKernels, true)) {
            $finished = true;
        }
        else {
            $matrix = $newMatrix;   //Gets added in next loop
        }
    }

    return $rotatedKernels;
}
    

//Rotate (square or linear kernels only) in 90-degree increments.
function rotateKernel90(ImagickKernel $kernel) {
    $matrix = $kernel->getMatrix();
    $rotatedKernels = rotateMatrix90($matrix);
    
    return makeNewKernel($rotatedKernels);
}

// Produce 90-degree rotations but in a 'mirror' sequence (rotation angles of 0, 180, -90, +90 ). This special form of rotation expansion works better for morphology methods such as 'Thinning'. 
function rorateKernel90Mirror(ImagickKernel $kernel) {
    $matrix = $kernel->getMatrix();
    $rotatedKernels = rotateMatrix90($matrix);
    
    if (array_key_exists(2, $rotatedKernels) == true) {
        $reorderedKernels = [];
        $reorderedKernels[0] = $rotatedKernels[0];
        $reorderedKernels[1] = $rotatedKernels[2];
        $reorderedKernels[2] = $rotatedKernels[3];
        $reorderedKernels[3] = $rotatedKernels[1];

        $rotatedKernels = $reorderedKernels;
    }

    return makeNewKernel($rotatedKernels);
}

    
    
function renderKernel(ImagickKernel $imagickKernel) {
    $matrix = $imagickKernel->getMatrix();
    
    $imageMargin = 20;
    
    $tileSize = 20;
    $tileSpace = 4;
    $shadowSigma = 4;
    $shadowDropX = 20;
    $shadowDropY = 0;

    $radius = ($tileSize / 2) * 0.9;
    
    $rows = count($matrix);
    $columns = count($matrix[0]);
 
    $imagickDraw = new \ImagickDraw();

    $imagickDraw->setFillColor('#afafaf');
    $imagickDraw->setStrokeColor('none');
    
    $imagickDraw->translate($imageMargin, $imageMargin);
    $imagickDraw->push();

    ksort($matrix);
    
    foreach ($matrix as $row) {
        ksort($row);
        $imagickDraw->push();
        foreach ($row as $cell) {
            if ($cell !== false) {
                $color = intval(255 * $cell);
                $colorString = sprintf("rgb(%f, %f, %f)", $color, $color, $color);
                $imagickDraw->setFillColor($colorString);
                $imagickDraw->rectangle(0, 0, $tileSize, $tileSize);
            }
            $imagickDraw->translate(($tileSize + $tileSpace), 0);
        }
        $imagickDraw->pop();
        $imagickDraw->translate(0, ($tileSize + $tileSpace));
    }

    $imagickDraw->pop();

    $width = ($columns * $tileSize) + (($columns - 1) * $tileSpace);
    $height = ($rows * $tileSize) + (($rows - 1) * $tileSpace);

    $imagickDraw->push();
    $imagickDraw->translate($width/2 , $height/2);
    $imagickDraw->setFillColor('rgba(0, 0, 0, 0)');
    $imagickDraw->setStrokeColor('white');
    $imagickDraw->circle(0, 0, $radius - 1, 0);
    $imagickDraw->setStrokeColor('black');
    $imagickDraw->circle(0, 0, $radius, 0);
    $imagickDraw->pop();

    $canvasWidth = $width + (2 * $imageMargin); 
    $canvasHeight = $height + (2 * $imageMargin);

    $kernel = new \Imagick();
    $kernel->newPseudoImage(
        $canvasWidth,
        $canvasHeight,
        'canvas:none'
    );

    $kernel->setImageFormat('png');
    $kernel->drawImage($imagickDraw);
 
    /* create drop shadow on it's own layer */
    $canvas = $kernel->clone();
    $canvas->setImageBackgroundColor(new \ImagickPixel('rgb(0, 0, 0)'));
    $canvas->shadowImage(100, $shadowSigma, $shadowDropX, $shadowDropY);

    $canvas->setImagePage($canvasWidth, $canvasHeight, -5, -5);
    $canvas->cropImage($canvasWidth, $canvasHeight, 0, 0);
    
    /* composite original text_layer onto shadow_layer */
    $canvas->compositeImage($kernel, \Imagick::COMPOSITE_OVER, 0, 0);
    $canvas->setImageFormat('png');

    return $canvas;
}

//Example ImagickKernel::addKernel
function addKernel($imagePath) {
    $matrix1 = [
        [-1, -1, -1],
        [ 0,  0,  0],
        [ 1,  1,  1],
    ];

    $matrix2 = [
        [-1,  0,  1],
        [-1,  0,  1],
        [-1,  0,  1],
    ];

    $kernel1 = ImagickKernel::fromMatrix($matrix1);
    $kernel2 = ImagickKernel::fromMatrix($matrix2);
    $kernel1->addKernel($kernel2);

    $imagick = new \Imagick(realpath($imagePath));
    $imagick->filter($kernel1);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();

}
//Example end
    

//Example ImagickKernel::addUnityKernel
function addUnityKernel($imagePath) {

    $matrix = [
        [-1, 0, -1],
        [ 0, 4,  0],
        [-1, 0, -1],
    ];

    $kernel = ImagickKernel::fromMatrix($matrix);

    $kernel->scale(4, \Imagick::NORMALIZE_KERNEL_VALUE);
    $kernel->addUnityKernel(0.5);


    $imagick = new \Imagick(realpath($imagePath));
    $imagick->filter($kernel);
    header("Content-Type: image/jpg");
    echo $imagick->getImageBlob();

}
//Example end

//Example ImagickKernel::fromMatrix

function createFromMatrix() {
    $matrix = [
        [0.5, 0, 0.2],
        [0, 1, 0],
        [0.9, 0, false],
    ];

    $kernel = \ImagickKernel::fromMatrix($matrix);

    return $kernel;
}
    
function fromMatrix() {
    $kernel = createFromMatrix();
    $imagick = renderKernel($kernel);

    header("Content-Type: image/png");
    echo $imagick->getImageBlob();
}
//Example end

//Example ImagickKernel::fromBuiltIn
function createFromBuiltin($kernelType, $kernelFirstTerm, $kernelSecondTerm, $kernelThirdTerm) {
    $string = '';

    if ($kernelFirstTerm != false && strlen(trim($kernelFirstTerm)) != 0) {
        $string .= $kernelFirstTerm;

        if ($kernelSecondTerm != false && strlen(trim($kernelSecondTerm)) != 0) {
            $string .= ','.$kernelSecondTerm;
            if ($kernelThirdTerm != false && strlen(trim($kernelThirdTerm)) != 0) {
                $string .= ','.$kernelThirdTerm;
            }
        }
    }

    $kernel = ImagickKernel::fromBuiltIn(
        $kernelType, //\Imagick::KERNEL_DIAMOND,
        $string
    );

    return $kernel;
}
    
function fromBuiltin($kernelType, $kernelFirstTerm, $kernelSecondTerm, $kernelThirdTerm) {
    $diamondKernel = createFromBuiltin($kernelType, $kernelFirstTerm, $kernelSecondTerm, $kernelThirdTerm);
    $imagick = renderKernel($diamondKernel);

    header("Content-Type: image/png");
    echo $imagick->getImageBlob();
}
//Example end



}




 