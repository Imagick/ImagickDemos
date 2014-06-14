<?php


namespace Stats;



class Librato {

    private $libratoKey;
    
    function __construct($libratoKey, $libratoUsername) {
        $this->libratoKey = $libratoKey;
        $this->libratoUsername = $libratoUsername;
    }

    /**
     * @param $guages
     * @param $counters 
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

        if (count($gauges)) {
            $gaugeEntries = [];
            foreach ($gauges as $gauge) {
                $gaugeEntries[] = $gauge->convertToArray();
            }
            $data["gauges"] = $gaugeEntries;
        }

        if (count($counters)) {
            $counterEntries = [];
            foreach ($counters as $counter) {
                $counterEntries[] = $counter->convertToArray();
            }
            $data["counters"] = $counterEntries;
        }

        $body = json_encode($data);

        $request->setBody($body);

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
