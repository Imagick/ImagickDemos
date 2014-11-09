<?php


namespace ImagickDemo\ControlElement;




class SparseColorType extends OptionKeyElement {


    protected function getDefault() {
        return 'renderImageVoronoi';
    }

    protected function getVariableName() {
        return 'sparse';
    }

    protected function getDisplayName() {
        return "Sparse color type";
    }

    protected function getOptions() {
        return [
            'renderImageBilinear' => 'Bilinear',
            'renderImageVoronoi' => 'Voronoi',
            'renderImageBarycentric' => 'Barycentric',
            'renderImageBarycentric2' => 'Barycentric alt',
            //'renderImagePolynomial' => 'Polynomial',
            'renderImageShepards' => 'Shepards',
        ];
    }

    function getSparseColorType() {
        return $this->getKey();
    }
}

 