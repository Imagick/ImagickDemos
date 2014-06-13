<?php


namespace Stats;

//use Artax\Client;

class Librato {

    private $libratoKey;
    
    function __construct($libratoKey) {
        $this->libratoKey = $libratoKey;
    }

    function send() {

        $username = "Danack@basereality.com";

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

        $auth = base64_encode($username.':'.$this->libratoKey);
        $request->setHeader("Authorization", "Basic $auth");


        $data = [
            "gauges" => [
                [
                    "name" => "imageQueue",
                    "value" => 4,
                    "source" => "test.phpimagick.com",
                    "measure_time" => time()
                ]
            ],
            "counters" => [
                [
                    "name" => "requests",
                    "value" => 5,
                    "source" => "test.phpimagick.com",
                    "measure_time" => time() + 20
                ]
            ]
        ];



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

        exit(0);

        $client = new Client();
            
        $response = $client->request($body);
        echo "Status is ".    $response->getStatus()."\n";

        var_dump($response->getBody());
    }
}
