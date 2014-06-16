<?php


namespace Stats;



class Librato {

    private $libratoKey;
    
    function __construct($libratoKey, $libratoUsername) {
        $this->libratoKey = $libratoKey;
        $this->libratoUsername = $libratoUsername;
    }

    /**
     * @param $gauges Gauge[]
     * @param $counters Counter[]
     */
    function send($gauges, $counters) {

        $client = new \Artax\Client;

        $client->setAllOptions([
            'connectTimeout'        => 15,      // Timeout connect attempts after N seconds
            'transferTimeout'       => 30,      // Timeout transfers after N seconds
        ]);

        $request = new \Artax\Request();
        $request->setUri("https://metrics-api.librato.com/v1/metrics");
        $request->setProtocol('1.1');
        $request->setMethod('POST');
        $request->setHeader("Content-Type", "application/json");

        $auth = base64_encode($this->libratoUsername.':'.$this->libratoKey);
        $request->setHeader("Authorization", "Basic $auth");

        $data = [];

        //working
        //"{"gauges":[{"name":"Queue.ImagickTaskQueue","value":0,"source":"test.phpimagick.com"}]}"

        if (count($gauges)) {
            $gaugeEntries = [];
            foreach ($gauges as $gauge) {
                $arrayed = $gauge->convertToArray();
                $gaugeEntries = array_merge($gaugeEntries, $arrayed);
            }
            $data["gauges"] = $gaugeEntries;
        }

        if (count($counters)) {
            $counterEntries = [];
            foreach ($counters as $counter) {
                $arrayed = $counter->convertToArray();
                if (is_array($arrayed) == true) {
                    $counterEntries = array_merge($counterEntries, $arrayed);
                }
                else {
                    $counterEntries[] = $arrayed;
                }
            }
            $data["counters"] = $counterEntries;
        }

        $body = json_encode($data);

        $request->setBody($body);
        
        var_dump($body);

        try {
            $response = $client->request($request);
            echo "Status ".$response->getStatus()."\n";
            echo $response->getBody();
        }
        catch(\Artax\SocketException $se) {
            echo "Artax\\SocketExeption".$se->getMessage();
        }
    }
}
