<?php

namespace ImagickDemo\Imagick;

/**
 * Class distortImage
 * @package ImagickDemo\Imagick
 * 
 * Thanks to DJ Mike for some of the examples taken from 
 * http://www.php.net/manual/en/imagick.distortimage.php#103403
 */

class distortImage extends \ImagickDemo\Example {

    /**
     * @var \ImagickDemo\Control\ControlCompositeImageDistortionType
     */
    private $rsiControl;

    function __construct(\ImagickDemo\Control\ControlCompositeImageDistortionType $rsiControl) {
        $this->rsiControl = $rsiControl;
    }

    function getControl() {
        return $this->rsiControl;
    }

    function render() {
        $output = $this->renderDescription();
        $output .= sprintf("<img src='%s' />", $this->rsiControl->getCustomImageURL());

        return $output;
    }
    
    function renderCustomImage() {

        $methods = [
            \Imagick::DISTORTION_AFFINE => "renderImageAffine",
            \Imagick::DISTORTION_AFFINEPROJECTION => "renderImageAffineProjection",
            \Imagick::DISTORTION_ARC => "renderImageArc",
            \Imagick::DISTORTION_BILINEAR => 'renderImageBilinear',
            \Imagick::DISTORTION_PERSPECTIVE => 'renderImagePerspective',
            \Imagick::DISTORTION_PERSPECTIVEPROJECTION => 'renderImagePerspectiveProjection',
            \Imagick::DISTORTION_SCALEROTATETRANSLATE => 'renderImageScaleRotateTransform',
            \Imagick::DISTORTION_POLYNOMIAL => 'renderImagePerspectivePolynomial',
            \Imagick::DISTORTION_POLAR => 'renderImagePerspectivePolar',
            \Imagick::DISTORTION_DEPOLAR => 'renderImagePerspectiveDepolar',
            \Imagick::DISTORTION_BARREL => 'renderImageBarrel',
            \Imagick::DISTORTION_BARRELINVERSE => 'renderImageBarrelInverse',
            \Imagick::DISTORTION_SHEPARDS => 'renderImageShepards',
            \Imagick::DISTORTION_SENTINEL => 'renderImageBarrelSentinel',
        ];

        $customImage = $this->rsiControl->getDistortionType();
        
        if (array_key_exists($customImage, $methods) == false) {
            throw new \Exception("Unknown composite method $customImage");
        }

        $method = $methods[$customImage];
        $this->{$method}();
    }
    
    function renderDescription() {

        //http://stackoverflow.com/questions/12276098/understanding-perspective-projection-distortion-imagemagick
        
//        $functionName = $this->getFunctionName();
//        if ($functionName){
//            echo "Using function :".$functionName;
//        }
//        else {
//            echo "Function $functionName not implemented yet.";
//        }
        
        return "Some distortion.";
    }

//    function renderImage() {
//        $functionName = $this->getFunctionName();
//        if ($functionName) {
//            $this->{$functionName}();
//        }
//        else {
//            echo "Function $functionName not implemented yet.";
//            exit(0);
//        }
//    }

    /**
     * 
     */
    function renderImageAffine() {
        $imagick = new \Imagick(realpath($this->rsiControl->getImagePath()));
        $points = array(
            0,    0, 
            25,  25,
            100,  0, 
            100, 50
        );

        $imagick->setimagebackgroundcolor("#fad888");
        $imagick->setImageVirtualPixelMethod( \Imagick::VIRTUALPIXELMETHOD_BACKGROUND );
        $imagick->distortImage(  \Imagick::DISTORTION_AFFINE, $points, TRUE );
        header( "Content-Type: image/jpeg" );
        echo $imagick;   
    }

    /**
     * 
     */
    function renderImageAffineProjection() {

        $imagick = new \Imagick(realpath($this->rsiControl->getImagePath()));
        $points = array( 
            0.9,0.3,
            -0.2,0.7,
            20,15
        );
        $imagick->setimagebackgroundcolor("#fad888");
        $imagick->setImageVirtualPixelMethod( \Imagick::VIRTUALPIXELMETHOD_BACKGROUND );
        $imagick->distortImage( \Imagick::DISTORTION_AFFINEPROJECTION, $points, TRUE );
        header( "Content-Type: image/jpeg" );
        echo $imagick;
    }

    /**
     * 
     */
    function renderImageArc() {

        //Make some text arc around the center of it's image
//        convert logo: -resize x150 -gravity NorthEast -crop 100x100+10+0! \
//        \( -background none label:'IM Examples' \
//        -virtual-pixel Background +distort Arc '270 50 20' \
//        -repage +75+21\! \)  -flatten  arc_overlay.jpg
        
        
        $imagick = new \Imagick(realpath($this->rsiControl->getImagePath()));
        $degrees = array( 180 );
        $imagick->setimagebackgroundcolor("#fad888");
        $imagick->setImageVirtualPixelMethod( \Imagick::VIRTUALPIXELMETHOD_BACKGROUND );
        $imagick->distortImage( \Imagick::DISTORTION_ARC, $degrees, TRUE );
        header( "Content-Type: image/jpeg" );
        echo $imagick;
    }

    /**
     * 
     */
    function renderImageRotatedArc() {
        $imagick = new \Imagick(realpath($this->rsiControl->getImagePath()));
        $degrees = array( 180, 45, 100, 20 );
        $imagick->setimagebackgroundcolor("#fad888");
        $imagick->setImageVirtualPixelMethod( \Imagick::VIRTUALPIXELMETHOD_BACKGROUND );
        $imagick->distortImage( \Imagick::DISTORTION_ARC, $degrees, TRUE );
        header( "Content-Type: image/jpeg" );
        echo $imagick;
    }

    /**
     * 
     */
    function renderImageBilinear() {

        $imagick = new \Imagick(realpath($this->rsiControl->getImagePath()));
        $points = array(
            0,0, 25,25, # top left  
            176,0, 126,0, # top right
            0,135, 0,105, # bottom right 
            176,135, 176,135 # bottum left
        );
        $imagick->setImageBackgroundColor("#fad888");
        $imagick->setImageVirtualPixelMethod( \Imagick::VIRTUALPIXELMETHOD_BACKGROUND );
        $imagick->distortImage( \Imagick::DISTORTION_BILINEAR, $points, TRUE );
        header( "Content-Type: image/jpeg" );
        echo $imagick;
    }
    
    function renderImageScaleRotateTransform() {

        $imagick = new \Imagick(realpath($this->rsiControl->getImagePath()));
        $points = array(
            1.5, # scale 150%
            150 # rotate
        );
        $imagick->setimagebackgroundcolor("#fad888");
        $imagick->setImageVirtualPixelMethod( \Imagick::VIRTUALPIXELMETHOD_BACKGROUND );
        $imagick->distortImage( \Imagick::DISTORTION_SCALEROTATETRANSLATE, $points, TRUE );
        header("Content-Type: image/jpeg");
        echo $imagick;
    }
    
    function renderImagePerspective() {
    
        //$imagick = new \Imagick(realpath($this->rsiControl->getImagePath()));
        $imagick = new \Imagick();

        /* Create new checkerboard pattern */
        $imagick->newPseudoImage(100, 100, "pattern:checkerboard");

        /* Set the image format to png */
        $imagick->setImageFormat('png');

        /* Fill new visible areas with transparent */
        $imagick->setImageVirtualPixelMethod(\Imagick::VIRTUALPIXELMETHOD_TRANSPARENT);
        
        
        /* Activate matte */
        $imagick->setImageMatte(true);

        /* Control points for the distortion */
        $controlPoints = array( 10, 10,
            10, 5,

            10, $imagick->getImageHeight() - 20,
            10, $imagick->getImageHeight() - 5,

            $imagick->getImageWidth() - 10, 10,
            $imagick->getImageWidth() - 10, 20,

            $imagick->getImageWidth() - 10, $imagick->getImageHeight() - 10,
            $imagick->getImageWidth() - 10, $imagick->getImageHeight() - 30);

        /* Perform the distortion */
        $imagick->distortImage(\Imagick::DISTORTION_PERSPECTIVE, $controlPoints, true);
        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();
    }


    /**
     * 
     */
    function renderImagePerspectiveProjection() {
        //X-of-destination = (sx*xs + ry+ys +tx) / (px*xs + py*ys +1)
        //Y-of-destination = (rx*xs + sy+ys +ty) / (px*xs + py*ys +1)

        // sx   ry   tx
        // rx   sy   ty
        // px   py
        
        $imagick = new \Imagick(realpath($this->rsiControl->getImagePath()));
        $points = array(
            1.945622, 0.071451, 
            -12.187838, 0.799032, 
            1.276214, -24.470275, 0.006258, 0.000715
        );
        $imagick->setimagebackgroundcolor("#fad888");
        $imagick->setImageVirtualPixelMethod( \Imagick::VIRTUALPIXELMETHOD_BACKGROUND);
        $imagick->distortImage(\Imagick::DISTORTION_PERSPECTIVEPROJECTION, $points, TRUE);
        header("Content-Type: image/jpeg");
        echo $imagick;
    }


    function renderImagePerspectivePolynomial() {

        //http://www.imagemagick.org/Usage/distorts/#polynomial

//        Order     X1,Y1 I1,J1     X2,Y2 I2,J2     X3,Y3 I3,J3     X4,Y4 I4,J4 . . . .
//The 'Order' argument is usually an integer from '1' onward, though a special value of '1.5' can also be used. This defines the 'order' or complexity of the 2-dimensional mathematical equation (using both 'x' and 'y') , that will be applied.
//For example an order '1' polynomial will fit a equation of the form...
//Xd = 	 C2x*Xs + C1x*Ys + C0x	  ,      	Yd = 	 C2y*Xs + C1y*Ys + C0y	

        $imagick = new \Imagick(realpath($this->rsiControl->getImagePath()));
        $points = array(
            1.5,   //Order 1.5 = special
            0, 0, 26, 0,   
            128,0,  114,23,  
            128,128,  128,100,
            0,128,  0,123
        );
        $imagick->setimagebackgroundcolor("#fad888");
        $imagick->setImageVirtualPixelMethod( \Imagick::VIRTUALPIXELMETHOD_BACKGROUND);
        $imagick->distortImage(\Imagick::DISTORTION_POLYNOMIAL, $points, TRUE);
        header("Content-Type: image/jpeg");
        echo $imagick;
    }

    
    //Polar args
    //Radius_Max   Radius_Min   Center_X,Center_Y   Start_Angle,End_Angle

    function renderImagePerspectivePolar() {
        //v6.4.2-6
        $imagick = new \Imagick(realpath($this->rsiControl->getImagePath()));
        $points = array(
            0
        );

        //Only do partial arc
//        $points = array(
//            60,20, 0,0, -60,60
//        );

//        HorizontalTile
        
        $imagick->setimagebackgroundcolor("#fad888");
        $imagick->setImageVirtualPixelMethod( \Imagick::VIRTUALPIXELMETHOD_HORIZONTALTILE);
        $imagick->distortImage(\Imagick::DISTORTION_POLAR, $points, TRUE);
        header("Content-Type: image/jpeg");
        echo $imagick;   
    }

    //Polar args
    //Radius_Max   Radius_Min   Center_X,Center_Y   Start_Angle,End_Angle

    function renderImagePerspectiveDepolar() {
        //v6.4.2-6
        $imagick = new \Imagick(realpath($this->rsiControl->getImagePath()));
        $points = array(
            0
        );

     

        $imagick->setimagebackgroundcolor("#fad888");
        $imagick->setImageVirtualPixelMethod( \Imagick::VIRTUALPIXELMETHOD_BACKGROUND);
        $imagick->distortImage(\Imagick::DISTORTION_POLAR, $points, TRUE);
        header("Content-Type: image/jpeg");
        echo $imagick;
    }
    
 
    function renderImageBarrel() {
//
//    The arguments needed for the 'Barrel' distort method. Generally you supply 3 or 4 values only...
//A   B   C   [ D   [ X , Y ] ]
//The optional X,Y arguments provide an optional 'center' for the radial distortion, otherwise it defaults to the exact center of the image given (regardless of its virtual offset).
//The coefficients are designed so that if all four A to D values, add up to '1.0', the minimal width/height of the image will not change. For this reason if D (which controls the overall scaling of the image) is not supplied it will be set so all four values do add up to '1.0'.
    
        $imagick = new \Imagick(realpath($this->rsiControl->getImagePath()));
     
        $points = array(
            //0.2, 0.0, 0.0, 1.0
            0.4, 0.6, 0.0, 1.0
        );

        $imagick->setimagebackgroundcolor("#fad888");
        $imagick->setImageVirtualPixelMethod( \Imagick::VIRTUALPIXELMETHOD_EDGE);
        $imagick->distortImage(\Imagick::DISTORTION_BARREL, $points, TRUE);
        header("Content-Type: image/jpeg");
        echo $imagick;
    }


    function renderImageBarrelInverse() {
//        Rsrc = r / ( A*r3 + B*r2 + C*r + D )
//	 This equation does NOT produce the 'reverse' the 'Barrel' distortion. You can NOT use it to 'undo' the previous distortion.

        $imagick = new \Imagick(realpath($this->rsiControl->getImagePath()));

        $points = array(
            //0.2, 0.0, 0.0, 1.0
            0.2, 0.1, 0.0, 1.0
        );

        $imagick->setimagebackgroundcolor("#fad888");
        $imagick->setImageVirtualPixelMethod( \Imagick::VIRTUALPIXELMETHOD_EDGE);
        $imagick->distortImage(\Imagick::DISTORTION_BARRELINVERSE, $points, TRUE);
        header("Content-Type: image/jpeg");
        echo $imagick;
    }


    function renderImageShepards() {

        //The control points move points in the image in a taffy like motion
        $imagick = new \Imagick(realpath($this->rsiControl->getImagePath()));

        $points = array(

            //Setup some control points that don't move
            5 * $imagick->getImageWidth() / 100, 5 * $imagick->getImageHeight() / 100,
            5 * $imagick->getImageWidth() / 100, 5 * $imagick->getImageHeight() / 100,
            
            5 * $imagick->getImageWidth() / 100, 95 * $imagick->getImageHeight() / 100,
            5 * $imagick->getImageWidth() / 100, 95 * $imagick->getImageHeight() / 100,

            95 * $imagick->getImageWidth() / 100, 95 * $imagick->getImageHeight() / 100,
            95 * $imagick->getImageWidth() / 100, 95 * $imagick->getImageHeight() / 100,

            5 * $imagick->getImageWidth() / 100, 5 * $imagick->getImageHeight() / 100,
            95 * $imagick->getImageWidth() / 100, 95 * $imagick->getImageHeight() / 100,
            
            
            
//            //Move the centre of the image down and to the right
//            50 * $imagick->getImageWidth() / 100, 50 * $imagick->getImageHeight() / 100,
//            60 * $imagick->getImageWidth() / 100, 60 * $imagick->getImageHeight() / 100,
//
//            //Move a point near the top-right of the image down and to the left and down
//            90 * $imagick->getImageWidth(), 10 * $imagick->getImageHeight(),
//            80 * $imagick->getImageWidth(), 15 * $imagick->getImageHeight(),  
        );

        
        
        
        $imagick->setimagebackgroundcolor("#fad888");
        $imagick->setImageVirtualPixelMethod( \Imagick::VIRTUALPIXELMETHOD_EDGE);
        $imagick->distortImage(\Imagick::DISTORTION_SHEPARDS, $points, TRUE);
        header("Content-Type: image/jpeg");
        echo $imagick;
    }



    function renderImageBarrelSentinel() {
//        Rsrc = r / ( A*r3 + B*r2 + C*r + D )
//	 This equation does NOT produce the 'reverse' the 'Barrel' distortion. You can NOT use it to 'undo' the previous distortion.

        $imagick = new \Imagick(realpath($this->rsiControl->getImagePath()));

        $points = array(
            //0.2, 0.0, 0.0, 1.0
            0.2, 0.1, 0.0, 1.0
        );

        $imagick->setimagebackgroundcolor("#fad888");
        $imagick->setImageVirtualPixelMethod( \Imagick::VIRTUALPIXELMETHOD_EDGE);
        $imagick->distortImage(\Imagick::DISTORTION_SENTINEL, $points, TRUE);
        header("Content-Type: image/jpeg");
        echo $imagick;
    }
    
    
}