<?php


namespace ImagickDemo\ImagickDraw;


use ImagickDemo\Navigation\ActiveNav;
use ImagickDemo\Control\ColorControl;

class ImagickDrawNav extends \ImagickDemo\Navigation\Nav implements ActiveNav {

    private $imagickDrawExamples = array(
        [ 'affine', ColorControl::class ],
        //[ 'annotation',  ColorControl::class ], //=> 'setFontSize',
        [ 'arc', ColorControl::class ],
        [ 'bezier', ColorControl::class ],
        [ 'circle', ColorControl::class ],
            //'clear',
            //'color',
            //'comment',
        [ 'composite', ColorControl::class ],
            //'destroy',
        [ 'ellipse',ColorControl::class ],
        //    'getClipPath',
        //    'getClipRule',
        //    'getClipUnits',
        //    'getFillColor',
        //    'getFillOpacity',
        //    'getFillRule',
        //    'getFont',
        //    'getFontFamily',
        //    'getFontSize',
        //    'getFontStyle',
        //    'getFontWeight',
        //    'getGravity',
        //    'getStrokeAntialias',
        //    'getStrokeColor',
        //    'getStrokeDashArray',
        //    'getStrokeDashOffset',
        //    'getStrokeLineCap',
        //    'getStrokeLineJoin',
        //    'getStrokeMiterLimit',
        //    'getStrokeOpacity',
        //    'getStrokeWidth',
        //    'getTextAlignment',
        //    'getTextAntialias',
        //    'getTextDecoration',
        //    'getTextEncoding',
        //    'getTextUnderColor',
        //    'getVectorGraphics',
        [ 'line', ColorControl::class ],
            //'matte', dont know how it works
//        'pathClose' => 'pathStart',
//        'pathCurveToAbsolute',
//        'pathCurveToQuadraticBezierAbsolute',
//        'pathCurveToQuadraticBezierRelative',
//        'pathCurveToQuadraticBezierSmoothAbsolute',
//        'pathCurveToQuadraticBezierSmoothRelative',
//        'pathCurveToRelative',
//        'pathCurveToSmoothAbsolute',
//        'pathCurveToSmoothRelative',
//        'pathEllipticArcAbsolute',
//        'pathEllipticArcRelative',
//        'pathFinish',
//        'pathLineToAbsolute',
//        'pathLineToHorizontalAbsolute',
//        'pathLineToHorizontalRelative',
//        'pathLineToRelative',
//        //'pathLineToVerticalAbsolute',
//        //'pathLineToVerticalRelative',
//        'pathMoveToAbsolute',
//        'pathMoveToRelative',
        [ 'pathStart',ColorControl::class ],
        [ 'point',ColorControl::class ],
        [ 'polygon',ColorControl::class ],
        [ 'polyline',ColorControl::class ],
        [ 'pop' ,ColorControl::class ], //=> 'push'
        [ 'popClipPath' ,ColorControl::class ], //=> 'setClipPath'
            //'popDefs', DrawPushDefs() indicates that commands up to a terminating DrawPopDefs() command create named elements (e.g. clip-paths, textures, etc.) which may safely be processed earlier for the sake of efficiency.
        [ 'popPattern' ,ColorControl::class ], //=> 'pushPattern'
        [ 'push',ColorControl::class ],
        [ 'pushClipPath' ,ColorControl::class ], //=> 'setClipPath'
            // 'pushDefs', DrawPushDefs() indicates that commands up to a terminating DrawPopDefs() command create named elements (e.g. clip-paths, textures, etc.) which may safely be processed earlier for the sake of efficiency.
        [ 'pushPattern', ColorControl::class ],
        [ 'rectangle',ColorControl::class ],
            //'render', no idea what this does
        [ 'rotate',ColorControl::class ],
        [ 'roundRectangle',ColorControl::class ],
        [ 'scale',ColorControl::class ],
        [ 'setClipPath',ColorControl::class ],
        [ 'setClipRule',ColorControl::class ],
        [ 'setClipUnits',ColorControl::class ],
        [ 'setFillAlpha',ColorControl::class ],
        [ 'setFillColor',ColorControl::class ],
        [ 'setFillOpacity',ColorControl::class ],
        [ 'setFillPatternURL' ,ColorControl::class ], //=> 'pushPattern'
        [ 'setFillRule',ColorControl::class ],
        [ 'setFillRule2',ColorControl::class ],
        [ 'setFont',ColorControl::class ],
            //'setFontFamily',
        [ 'setFontSize',ColorControl::class ],
            //'setFontStretch', Does nothing?
        [ 'setFontStyle',ColorControl::class ],
        [ 'setFontWeight',ColorControl::class ],
        [ 'setGravity',ColorControl::class ],
        [ 'setStrokeAlpha',ColorControl::class ],
        [ 'setStrokeAntialias',ColorControl::class ],
        [ 'setStrokeColor',ColorControl::class ],
        [ 'setStrokeDashArray',ColorControl::class ],
        [ 'setStrokeDashOffset',ColorControl::class ],
        [ 'setStrokeLineCap',ColorControl::class ],
        [ 'setStrokeLineJoin',ColorControl::class ],
        [ 'setStrokeMiterLimit',ColorControl::class ],
        [ 'setStrokeOpacity',ColorControl::class ],
            //'setStrokePatternURL',
        [ 'setStrokeWidth',ColorControl::class ],
        [ 'setTextAlignment',ColorControl::class ],
        [ 'setTextAntialias',ColorControl::class ],
        [ 'setTextDecoration',ColorControl::class ],
            //'setTextEncoding',
        [ 'setTextUnderColor',ColorControl::class ],
        [ 'setVectorGraphics', ColorControl::class ],// seems broken
            // 'setViewbox', no idea what this does
        [ 'skewX',ColorControl::class ],
        [ 'skewY',ColorControl::class ],
        [ 'translate',ColorControl::class ],
    );

    function getBaseURI() {
        return "ImagickDraw";
    }

    function display($example, \Auryn\Provider $provider) {
        $this->currentExample = $example;
        $classname = 'ImagickDemo\ImagickDraw\\' . $example;
        $provider->defineParam('imageBaseURL', '/image/ImagickDraw/'.$example);
        $currentNavOption = $this->getCurrent($this->currentExample);
        $provider->alias(\ImagickDemo\Control::class, $currentNavOption->getControl());
        $control = $provider->make(\ImagickDemo\Control::class);
        
        foreach($control->getParams() as $key => $value) {
            $provider->defineParam($key, $value);
        }

        $provider->alias(\ImagickDemo\Example::class, $classname);
        $provider->alias(\ImagickDemo\Navigation\ActiveNav::class, get_class($this));
        $provider->share($this);
    }

    function displayIndex(\Auryn\Provider $provider) {
        $provider->alias(\ImagickDemo\Navigation\ActiveNav::class, get_class($this));
        $provider->share($this);
    }

    function getNavOptions() {
        return $this->imagickDrawExamples;
    }

    function renderImage($example, \Auryn\Provider $provider) {
        $this->currentExample = $example;
        $classname = '\ImagickDemo\ImagickDraw\\' . $example;
        $provider->defineParam('imageBaseURL', '/image/Imagick/'.$example);
        $provider->alias(\ImagickDemo\Example::class, $classname);
        $currentNavOption = $this->getCurrent($this->currentExample);
        $provider->alias(\ImagickDemo\Control::class, $currentNavOption->getControl());
        $control = $provider->make(\ImagickDemo\Control::class);

        foreach($control->getParams() as $key => $value) {
            $provider->defineParam($key, $value);
        }

        $provider->execute([\ImagickDemo\ImageExampleCache::class, 'renderImageSafe']);
    }

    function renderTitle() {
        if ($this->currentExample) {
            return $this->currentExample;
        }
        return 'ImagickDraw';
    }


    function renderNav() {
        echo "<ul class='nav nav-sidebar smallPadding'>";
        foreach ($this->imagickDrawExamples as $key => $imagickExampleOption) {

            $imagickDrawExample = $imagickExampleOption[0];

            echo "<li>";
            if ($key === intval($key)){
                echo "<a href='/ImagickDraw/$imagickDrawExample'>".$imagickDrawExample."</a>";
            }
            else{
                echo "<a href='/ImagickDraw/$imagickDrawExample'>".$key."</a>";
            }
            echo "</li>";
        }
        echo "</ul>";
    }
}

 