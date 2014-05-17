<?php


namespace ImagickDemo\ImagickDraw;


use ImagickDemo\Navigation\NavOption;

class ExampleList implements \ImagickDemo\ExampleList {

    function getExamples() {

        $imagickDrawExamples = array(
            new NavOption('affine', true ),
            //[ 'annotation',  ColorControl::class ], //=> 'setFontSize',
            new NavOption( 'arc', true ),
            new NavOption( 'bezier', true ),
            new NavOption( 'circle', true ),
            //'clear',
            //'color',
            //'comment',
            new NavOption( 'composite', true ),
            //'destroy',
            new NavOption( 'ellipse',true ),
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
            new NavOption( 'line', true ),
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
            new NavOption( 'pathStart',true ),
            new NavOption( 'point',true ),
            new NavOption( 'polygon',true ),
            new NavOption( 'polyline',true ),
            new NavOption( 'pop' ,true, 'push' ),
            new NavOption( 'popClipPath' ,true, 'setClipPath' ), //=> 'setClipPath'
            //'popDefs', DrawPushDefs() indicates that commands up to a terminating DrawPopDefs() command create named elements (e.g. clip-paths, textures, etc.) which may safely be processed earlier for the sake of efficiency.
            new NavOption( 'popPattern' ,true, 'pushPattern' ), //=> 'pushPattern'
            new NavOption( 'push',true ),
            new NavOption( 'pushClipPath' ,true, 'setClipPath' ), //=> 'setClipPath'
            // 'pushDefs', DrawPushDefs() indicates that commands up to a terminating DrawPopDefs() command create named elements (e.g. clip-paths, textures, etc.) which may safely be processed earlier for the sake of efficiency.
            new NavOption( 'pushPattern', true),
            new NavOption( 'rectangle',true ),
            //'render', no idea what this does
            new NavOption( 'rotate',true ),
            new NavOption( 'roundRectangle',true ),
            new NavOption( 'scale',true ),
            new NavOption( 'setClipPath',true ),
            new NavOption( 'setClipRule',true ),
            new NavOption( 'setClipUnits',true ),
            new NavOption( 'setFillAlpha',true ),
            new NavOption( 'setFillColor',true ),
            new NavOption( 'setFillOpacity',true ),
            //new NavOption( 'setFillPatternURL' ,true ), //=> 'pushPattern'
            new NavOption( 'setFillRule',true ),
            new NavOption( 'setFont',true ),
            //'setFontFamily',
            new NavOption( 'setFontSize',true ),
            //'setFontStretch', Does nothing?
            new NavOption( 'setFontStyle',true ),
            new NavOption( 'setFontWeight',true ),
            new NavOption( 'setGravity',true ),
            new NavOption( 'setStrokeAlpha',true ),
            new NavOption( 'setStrokeAntialias',true ),
            new NavOption( 'setStrokeColor',true ),
            new NavOption( 'setStrokeDashArray',true ),
            new NavOption( 'setStrokeDashOffset',true ),
            new NavOption( 'setStrokeLineCap',true ),
            new NavOption( 'setStrokeLineJoin',true ),
            new NavOption( 'setStrokeMiterLimit',true ),
            new NavOption( 'setStrokeOpacity',true ),
            //'setStrokePatternURL',
            new NavOption( 'setStrokeWidth',true ),
            new NavOption( 'setTextAlignment',true ),
            new NavOption( 'setTextAntialias',true ),
            new NavOption( 'setTextDecoration',true ),
            //'setTextEncoding',
            new NavOption( 'setTextUnderColor',true ),
            //new NavOption( 'setVectorGraphics', true ),
            // 'setViewbox', no idea what this does
            new NavOption( 'skewX',true ),
            new NavOption( 'skewY',true ),
            new NavOption( 'translate',true ),
        );

        return $imagickDrawExamples;
    }



}

 