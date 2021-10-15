<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\ImageControl;
use VarMap\VarMap;

class setProgressMonitor extends \ImagickDemo\Example
{
    private ImageControl $imageControl;

    public function __construct(
        VarMap $varMap
    ) {
        $this->imageControl = ImageControl::createFromVarMap($varMap);
    }


    public static function getParamType(): string
    {
        return ImageControl::class;
    }

    public function renderTitle(): string
    {
        return "Imagick::setProgressMonitor";
    }

    public function renderDescription()
    {
        $output = <<< END
The progress monitor allows you to be notified of progress during image processing. It also allows you to abort the image processing, for example if it's taking too long, or it is detected the image is no longer needed.

In the example below, the progress is monitored and then the image operation is cancelled when the progress passed 20%.

Please note the offset and span values are approximate and do not reflect an accurate measure of the image progress.
END;

        return nl2br($output);
    }

    public function render()
    {
        echo "<pre>";
//Example Imagick::setProgressMonitor
        $abortReason = null;

        try {
            $imagick = new \Imagick(realpath($this->imageControl->getImagePath()));
            $startTime = time();

            $callback = function ($offset, $span) use ($startTime, &$abortReason) {
                if (((100 * $offset) / $span) > 20) {
                    $abortReason = "Processing reached 20%";
                    return false;
                }

                $nowTime = time();

                if ($nowTime - $startTime > 5) {
                    $abortReason = "Image processing took more than 5 seconds";
                    return false;
                }
                if (($offset % 5) == 0) {
                    echo "Progress: $offset / $span <br/>";
                }
                return true;
            };

            $imagick->setProgressMonitor($callback);

            $imagick->waveImage(2, 15);

            echo "Data len is: " . strlen($imagick->getImageBlob());
        }
        catch (\ImagickException $e) {
            if ($abortReason != null) {
                echo "Image processing was aborted: " . $abortReason . "<br/>";
            }
            else {
                echo "ImagickException caught: " . $e->getMessage() . " Exception type is " . get_class($e);
            }
        }
//Example end
        echo "</pre>";
    }
}
