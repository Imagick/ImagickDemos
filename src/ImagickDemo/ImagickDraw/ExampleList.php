<?php


namespace ImagickDemo\ImagickDraw;


use ImagickDemo\Navigation\NavOption;

class ExampleList implements \ImagickDemo\ExampleList {

    function getExamples() {

        $imagickDrawExamples = array(
            new NavOption('affine'),
            //[ 'annotation',  ColorControl::class ], //=> 'setFontSize',
            new NavOption('arc'),
            new NavOption('bezier'),
            new NavOption('circle'),
            //'clear',
            //'color',
            //'comment',
            new NavOption('composite'),
            //'destroy',
            new NavOption('ellipse'),
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
            new NavOption('line'),
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
            new NavOption('pathStart'),
            new NavOption('point'),
            new NavOption('polygon'),
            new NavOption('polyline'),
            new NavOption('pop', 'push'),
            new NavOption('popClipPath', 'setClipPath'), //=> 'setClipPath'
            //'popDefs', DrawPushDefs() indicates that commands up to a terminating DrawPopDefs() command create named elements (e.g. clip-paths, textures, etc.) which may safely be processed earlier for the sake of efficiency.
            new NavOption('popPattern', 'pushPattern'), //=> 'pushPattern'
            new NavOption('push'),
            new NavOption('pushClipPath', 'setClipPath'), //=> 'setClipPath'
            // 'pushDefs', DrawPushDefs() indicates that commands up to a terminating DrawPopDefs() command create named elements (e.g. clip-paths, textures, etc.) which may safely be processed earlier for the sake of efficiency.
            new NavOption('pushPattern'),
            new NavOption('rectangle'),
            //'render', no idea what this does
            new NavOption('rotate'),
            new NavOption('roundRectangle'),
            new NavOption('scale'),
            new NavOption('setClipPath'),
            new NavOption('setClipRule'),
            new NavOption('setClipUnits'),
            new NavOption('setFillAlpha'),
            new NavOption('setFillColor'),
            new NavOption('setFillOpacity'),
            //new NavOption( 'setFillPatternURL' ,true ), //=> 'pushPattern'
            new NavOption('setFillRule'),
            new NavOption('setFont'),
            //'setFontFamily',
            new NavOption('setFontSize'),
            //'setFontStretch', Does nothing?
            new NavOption('setFontStyle'),
            new NavOption('setFontWeight'),
            new NavOption('setGravity'),
            new NavOption('setStrokeAlpha'),
            new NavOption('setStrokeAntialias'),
            new NavOption('setStrokeColor'),
            new NavOption('setStrokeDashArray'),
            new NavOption('setStrokeDashOffset'),
            new NavOption('setStrokeLineCap'),
            new NavOption('setStrokeLineJoin'),
            new NavOption('setStrokeMiterLimit'),
            new NavOption('setStrokeOpacity'),
            //'setStrokePatternURL',
            new NavOption('setStrokeWidth'),
            new NavOption('setTextAlignment'),
            new NavOption('setTextAntialias'),
            new NavOption('setTextDecoration'),
            //'setTextEncoding',
            new NavOption('setTextUnderColor'),
            //new NavOption( 'setVectorGraphics', true ),
            // 'setViewbox', no idea what this does
            new NavOption('skewX'),
            new NavOption('skewY'),
            new NavOption('translate'),
        );

        return $imagickDrawExamples;
    }



}

 