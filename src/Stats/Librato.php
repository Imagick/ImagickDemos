<?php


namespace Stats;

use ImagickDemo\Config\Librato as LibratoConfig;

use Amp\Artax\Client as ArtaxClient;
use Amp\Artax\Request;

use Amp\Artax\SocketException;

class Librato {

    /**
     * @var LibratoConfig
     */
    private $libratoConfig;
    
    function __construct(LibratoConfig $libratoConfig) {
        $this->libratoConfig = $libratoConfig;
    }

    /**
     * @param $gauges Gauge[]
     * @param $counters Counter[]
     */
    function send($gauges, $counters) {

        $client = new ArtaxClient;

        $client->setAllOptions([
            ArtaxClient::OP_MS_CONNECT_TIMEOUT        => 2000,
            ArtaxClient::OP_MS_TRANSFER_TIMEOUT       => 3000,
        ]);

        $request = new Request();
        $request->setUri("https://metrics-api.librato.com/v1/metrics");
        $request->setProtocol('1.1');
        $request->setMethod('POST');
        $request->setHeader("Content-Type", "application/json");

        $auth = base64_encode($this->libratoConfig->getLibratoUsername().':'.$this->libratoConfig->getLibratoKey());
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
            $promise = $client->request($request);
            /** @var $response \Amp\Artax\Response */
            $response = \Amp\wait($promise);
            echo "Status ".$response->getStatus()."\n";
            echo $response->getBody();
        }
        catch(SocketException $se) {
            echo "Artax\\SocketExeption".$se->getMessage();
        }
    }
}
