<?php

namespace ImagickDemo\Params;



use Params\ExtractRule\GetIntOrDefault;
use Params\InputParameter;
use Params\Param;
use Params\ProcessRule\EnumMap;

class SparseColorType implements Param
{
    public function __construct(
        private string $name
    ) {
    }

    public function getInputParameter(): InputParameter
    {
        return new InputParameter(
            $this->name,
            new GetIntOrDefault('renderImageVoronoi'),
            new EnumMap([
                'renderImageBilinear' => 'Bilinear',
                'renderImageVoronoi' => 'Voronoi',
                'renderImageBarycentric' => 'Barycentric',
                'renderImageBarycentric2' => 'Barycentric alt',
                //'renderImagePolynomial' => 'Polynomial',
                'renderImageShepards' => 'Shepards',
            ])
        );
    }

//class SparseColorType extends OptionKeyElement
//{
//    protected function getDefault()
//    {
//        return 'renderImageVoronoi';
//    }
//
//    protected function getVariableName()
//    {
//        return 'sparse';
//    }
//
//    protected function getDisplayName()
//    {
//        return "Sparse color type";
//    }
//
//    protected function getOptions()
//    {
//        return [
//            'renderImageBilinear' => 'Bilinear',
//            'renderImageVoronoi' => 'Voronoi',
//            'renderImageBarycentric' => 'Barycentric',
//            'renderImageBarycentric2' => 'Barycentric alt',
//            //'renderImagePolynomial' => 'Polynomial',
//            'renderImageShepards' => 'Shepards',
//        ];
//    }
//
//    public function getSparseColorType()
//    {
//        return $this->getKey();
//    }
}
