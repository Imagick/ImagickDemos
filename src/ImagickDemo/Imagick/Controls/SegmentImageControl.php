<?php

declare(strict_types = 1);

namespace ImagickDemo\Imagick\Controls;


use ImagickDemo\ToArray;
use Params\Create\CreateFromVarMap;
use Params\InputParameterListFromAttributes;
use Params\SafeAccess;

use ImagickDemo\Params\Image;
use ImagickDemo\Params\ColorSpace;
use ImagickDemo\Params\Radius;
use ImagickDemo\Params\Sigma;
use ImagickDemo\Params\ClusterThreshold;
use ImagickDemo\Params\SmoothThreshold;

class SegmentImageControl
{
    use SafeAccess;
    use CreateFromVarMap;
    use ToArray;
    use InputParameterListFromAttributes;

    public function __construct(
        #[ClusterThreshold('cluster_threshold')]
        private string $cluster_threshold,
        #[SmoothThreshold('smooth_threshold')]
        private string $smooth_threshold,
        #[ColorSpace('colorspace')]
        private string $colorspace,
        #[Image('image_path')]
        private string $image_path,
    ) {
    }

    public function getValuesForForm(): array
    {
        return [
            'cluster_threshold' => $this->cluster_threshold,
            'smooth_threshold' => $this->smooth_threshold,
            'colorspace' => getOptionFromOptions($this->colorspace, getColorSpaceOptions()),
            'image_path' => getOptionFromOptions($this->image_path, getImagePathOptions()),
        ];
    }

    public function getImagePath(): string
    {
        return $this->image_path;
    }
}