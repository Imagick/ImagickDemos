<?php


namespace ImagickDemo\Control;


class SparseColorControl extends OptionControl{

    function getName() {
        return 'sparse';
    }

    function getDefaultOption() {
        return 'Bilinear';
    }

    function getOptions() {
        $images = [
            'renderImageBilinear' => 'Bilinear',
            'renderImageVoronoi' => 'Voronoi',
            'renderImageBarycentric' => 'Barycentric',
            'renderImageBarycentric2' => 'Barycentric alt',
            'renderImagePolynomial' => 'Polynomial',
            'renderImageShepards' => 'Shepards',
        ];

        return $images;
    }
}

 