<?php


namespace ImagickDemo\Controller;

use ImagickDemo\Response\TextResponse;

use Amp\Artax\Client;


class ServerInfo {

    function createResponse() {

        ob_start();

        $knownServers = [
            'imagick.test',
            'phpimagick.com',
            'phpimagick.test',
            'www.phpimagick.com',
            'test.phpimagick.com'
        ];

        $serverName = null;

        if(array_key_exists("HTTP_HOST", $_SERVER)) {
            $allgedServerName = strtolower($_SERVER["HTTP_HOST"]);

            if (in_array($allgedServerName, $knownServers)) {
                $serverName = $allgedServerName;
            }
        }

        if (!$serverName) {
            return null;
        }

        $reactor = \Amp\getReactor();
        $client = new Client($reactor);
        $url = "http://".$serverName."/www-status?full&json";
        $promise = $client->request($url);

        $response = \Amp\wait($promise);
        //$response = $promise->wait();

        $headers = [
            "pool" => "Pool name",
            "process manager" => "Process manager",
            "start time" => "Start time",
            "start since" => "Uptime",
            "accepted conn" => "Accepted connections",
            "listen queue" => "Listen queue",
            "max listen queue" => "Max listen queue",
            "listen queue len" => "Listen queue length",
            "idle processes" => "Idle processes",
            "active processes" => "Active processes",
            "total processes" => "Total processes",
            "max active processes" => "Max active processes",
            "max children reached" => "Max children reached",
            "slow requests" => "Slow requests",
        ];

    
        $json = json_decode($response->getBody(), true);

        echo "<table>";
        foreach ($headers as $header => $display) {
            echo "<tr><td>";
            echo $display;
            echo "</td><td>";
            echo $json[$header];
            echo "</td></tr>";
        }
        echo "</table>";

        echo "<table>";

        $processHeaders = [
            "pid",
            "state",
            "start time",
            "start since",
            "requests",
            "request duration",
            //"request method",
            "request URI",
            "content length",
            //"user",
            "script",
            "last request cpu",
            "last request memory",
        ];

        foreach ($processHeaders as $processHeader) {
            echo "<th>";
            echo $processHeader;
            echo "</th>";
        }

        if (isset($json['processes']) && is_array($json['processes'])) {

            foreach ($json['processes'] as $process) {
                echo "<tr>";

                foreach ($processHeaders as $processHeader) {
                    echo "<td align='right'>";
                    if (array_key_exists($processHeader, $process)) {
                        $text = $process[$processHeader];

                        $text = str_replace([
                                '/home/github/imagick-demos//imagick-demos',
                                '/home/github/imagick-demos/imagick-demos'
                            ],
                            '',
                            $text
                        );

                        $text = ltrim($text, '/');

                        echo $text;
                    }
                    else {
                        echo "-";
                    }
                    echo "</td>";
                }

                echo "</tr>";
            }
        }

        echo "</table>";

        echo "<br/>";
        echo "<a href='http://127.0.0.1:9002'>SupervisorD</a>";

        $output = ob_get_contents();

        ob_end_clean();

        return new TextResponse($output);
    }
}

 