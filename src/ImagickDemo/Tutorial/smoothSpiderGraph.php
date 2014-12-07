<?php


define('debug', false);


$image = new Imagick();
$image->newImage(500, 500, 'white', 'png');


function interpolate($fraction, $value1, $value2) {
    return ((1 - $fraction) * $value1) + ($fraction * $value2);
}

function interpolateArray($fraction, $curvedPosition, $linearPosition) {

    $result = [];
    
    for ($i=0 ; $i<count($curvedPosition) ; $i++) {
        $result[$i] = interpolate($fraction, $curvedPosition[$i], $linearPosition[$i]);
    }

    return $result;
}


class SpiderChart {

    /**
     * @var \ImagickDraw
     */
    private $draw;

    private $chartWidth = 500;
    private $chartHeight = 500;

    private $segments = 100;
    
    private $points = [];
    

    function __construct() {
        $draw = new ImagickDraw();
        $draw->setFillColor('#B42AAF');
        $draw->setStrokeColor('black');
        $draw->setStrokeWidth(1);
        
        $this->draw = $draw;
    }

    /**
     * @return ImagickDraw
     */
    public function getDraw() {
        return $this->draw;
    }
    
    function drawChartBackground() {
        $this->draw->line(
            25, 
            $this->chartHeight / 2,
            $this->chartWidth - 25,
            $this->chartHeight / 2
        );

        $this->draw->line(
            $this->chartWidth / 2,
            25,
            $this->chartWidth / 2,
            $this->chartHeight - 25
        );

        $this->draw->setFillColor('none');
        
        $this->draw->circle(
            $this->chartWidth / 2,
            $this->chartHeight / 2,
            $this->chartWidth / 2,
            $this->chartHeight / 2 + 200 
        );

        $this->draw->circle(
            $this->chartWidth / 2,
            $this->chartHeight / 2,
            $this->chartWidth / 2,
            $this->chartHeight / 2 + 100
        );
    }

    
    public function getInterpolatedPosition($p, $i, $points) {
        $angleBetweenPoints = 2 * M_PI / count($points);
        $fraction = $i / $this->segments;
        $angle = ($p + ($fraction)) * $angleBetweenPoints;
        $firstValue = $points[$p];
        $secondValue = $points[($p + 1) % count($points)];
        $averageValue = interpolate($fraction, $firstValue, $secondValue);

        $positionX = sin($angle) * $averageValue ;
        $positionY = -cos($angle) * $averageValue ;
        
        if (debug) {
            echo "angle $angle positionX $positionX, positionY $positionY \n";
        }
        
        return [$positionX, $positionY];
    }
    
    public function getLinearPosition($p, $i, $points) {
        $angleBetweenPoints = 2 * M_PI / count($points);
        $fraction = $i / $this->segments;
        $startAngle = $p * $angleBetweenPoints;
        $endAngle = ($p + 1) * $angleBetweenPoints;
        
        $startPositionX = sin($startAngle) * $points[$p];
        $startPositionY = -cos($startAngle) * $points[$p];

        $endPositionX = sin($endAngle) * $points[($p + 1)];
        $endPositionY = -cos($endAngle) * $points[($p + 1) % count($points)];
        
        return [
            interpolate($fraction, $startPositionX, $endPositionX),
            interpolate($fraction, $startPositionY, $endPositionY),
        ];
    }
    
   
    public function drawBlendedChart($points, $curveLinearBlend) {
        $this->draw->setFillColor('#B42AAF9F');
        $this->draw->translate(
            $this->chartWidth / 2,
            $this->chartHeight / 2
        );
        
        $this->draw->pathStart();

        list($nextPositionX, $nextPositionY) = $this->getInterpolatedPosition(0, 0, $points);

        $this->draw->pathMoveToAbsolute(
            $nextPositionX,
            $nextPositionY
        );

        for ($p=0 ; $p<count($points) ; $p++) {
            for ($i = 0; $i < $this->segments; $i++) {
                $curvedPosition = $this->getInterpolatedPosition($p, $i, $points);
                $linearPosition = $this->getLinearPosition($p, $i, $points);

                list($nextPositionX,$nextPositionY) = interpolateArray(
                    $curveLinearBlend,
                    $curvedPosition,
                    $linearPosition
                );

                $this->draw->pathLineToAbsolute(
                    $nextPositionX,
                    $nextPositionY
                );
            }
        }

        $this->draw->pathClose();
        $this->draw->pathFinish();
    }


    /**
     * @param $points
     * @return array
     */
    private function getPointTangents($points) {
        $angleBetweenPoints = 2 * M_PI / count($points);
        $tangents = [];
        
        for ($i=0; $i<count($points) ; $i++) {
            $angle = ($i * $angleBetweenPoints) + M_PI_2;

            $unitX = sin($angle);
            $unitY = -cos($angle);
            $tangents[] = [$unitX, $unitY];
        }

        return $tangents;
    }

    /**
     * @param $points
     * @return array
     */
    private function getPointPositions($points) {
        $angleBetweenPoints = 2 * M_PI / count($points);
        $positions = [];

        for ($i=0; $i<count($points) ; $i++) {
            $angle = ($i * $angleBetweenPoints);

            $positions[] = [
                sin($angle) * $points[$i],
                -cos($angle) * $points[$i] 
            ];
        }

        return $positions;
    }

    /**
     * @param $position
     * @param $tangent
     * @param $direction - which sign the control point should use to multiple the unit vector 
     * @return array
     */
    private function getControlPoint($value, $position, $tangent, $direction, $roundness, $numberSides) {
        
        //TODO - this scale needs to be done properly. The factors should be
        // i) the value of the current point.
        // ii) The curviness desired
        // iii) Some magic to make round bezier curves


        //$scale = 111;
        $scale = $value * 4 * (sqrt(2)-1) / 3;

        //This 'appears' to work
        $scale *= 4 / $numberSides;
        $scale *= $roundness;
        
        
        
        $resultX = $position[0] + $direction * $tangent[0] * $scale;
        $resultY = $position[1] + $direction * $tangent[1] * $scale;
        
        
        $this->points[] = [$resultX, $resultY, $resultX + 2, $resultY];
        
        return [$resultX, $resultY];
    }
    
    
    function drawBezierChart($points, $roundness) {

        //Calculate the tangent vector for each point that you're drawing.
        $tangents = $this->getPointTangents($points);
        $positions = $this->getPointPositions($points);

        $numberOfPoints = count($points);

        $this->draw->setFillColor('#B42AAF9F');   
        
        $this->draw->translate(
            $this->chartWidth / 2,
            $this->chartHeight / 2
        );
        
        $this->draw->pathStart();
        $this->draw->pathMoveToAbsolute($positions[0][0], $positions[0][1]);

    
        //Scale that by the 'value' of each point aka the distance from the chart's centre.
        
        //Also scale it by how rounded you want the chart.
        
        for ($i=0 ; $i<$numberOfPoints ; $i++) {
            list($nextPositionX, $nextPositionY) = $positions[($i + 1) % $numberOfPoints];

            list($controlPoint1X, $controlPoint1Y) = 
                $this->getControlPoint(
                    $points[$i],
                    $positions[$i],
                    $tangents[$i],
                    1,
                    $roundness,
                    count($points)
                );

            list($controlPoint2X, $controlPoint2Y) =
                $this->getControlPoint(
                    $points[($i + 1) % $numberOfPoints],
                    $positions[($i + 1) % $numberOfPoints],
                    $tangents[($i + 1) % $numberOfPoints],
                    -1,
                    $roundness,
                    count($points)
                );

            $this->draw->pathCurveToAbsolute(
                $controlPoint1X, $controlPoint1Y,
                $controlPoint2X, $controlPoint2Y,
                $nextPositionX, $nextPositionY
            );
        }

        $this->draw->pathClose();
        $this->draw->pathFinish();
        
        foreach ($this->points as $point) {
            $this->draw->circle($point[0], $point[1], $point[2], $point[3]);
        }
        
    }
}

function getValues() {

    $coordinates_1 = [
        200,
        200,
        100,
        200,
        220,
        200
//        145
    ];

    return $coordinates_1;
}

$spiderChart = new SpiderChart();

$spiderChart->drawChartBackground();

$points = getValues();

//$spiderChart->drawBlendedChart($points, 0.2);

$spiderChart->drawBezierChart($points, 0.4);


$image->drawImage($spiderChart->getDraw());

if (!debug) {
    header('Content-Type: image/png');
    echo $image;
}