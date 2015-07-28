<?php


namespace Stats;

class SummaryTimer
{
    /**
     * @var Timer[]
     */
    private $timings = [];

    private $name;

    private $sourceName;

    /**
     * @param $name string
     * @param $sourceName
     */
    public function __construct($name, $sourceName)
    {
        $this->name = $name;
        $this->sourceName = $sourceName;
    }


//        $current_timer_data["count"] = $timer_counters[$key];
//        $current_timer_data["std"] = $stddev;
//        $current_timer_data["upper"] = $max;
//        $current_timer_data["lower"] = $min;
//        
//        $current_timer_data["count_ps"] = $timer_counters[$key] / ($flushInterval / 1000);
//        $current_timer_data["sum"] = $sum;
//        $current_timer_data["sum_squares"] = $sumSquares;
//        $current_timer_data["mean"] = $mean;
//        $current_timer_data["median"] = $median;


    /**
     * @param Timer $timer
     */
    public function addTiming(Timer $timer)
    {
        $this->timings[] = $timer;
    }

    /**
     * @return array
     */
    public function convertToArray()
    {
        $sum = 0;
        foreach ($this->timings as $timing) {
            $sum += $timing->getValue();
        }

        $count = count($this->timings);


        if ($count) {
            $values = [
                'sum' => $sum,
                'count' => $count,
                'median' => $sum / $count
            ];
        } else {
            $values = [
                'sum' => 0,
                'count' => 0,
                'median' => 0
            ];
        }

        $array = [];

        foreach ($values as $subName => $value) {
            $array[] = [
                "name" => $this->name . '.' . $subName,
                "value" => $value,
                "source" => $this->sourceName,
            ];
        }

        return $array;
    }
}
