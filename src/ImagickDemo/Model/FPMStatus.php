<?php


namespace ImagickDemo\Model;

use Amp\Artax\Client;
use Arya\TextBody;
use ImagickDemo\Config;
use Tier\Domain;

class FPMStatus
{
    /**
     * @var Domain
     */
    private $internalDomainName;
    
    
    public function __construct(Config $config)
    {
        $this->internalDomainName = $config->getKey(Config::DOMAIN_INTERNAL);
    }
    
    public function render()
    {
        $startOBLevel = ob_get_level();

        $url = sprintf(
            "http://%s/www-status?full&json",
            $this->internalDomainName
        );

        
        try {
            ob_start();

            $reactor = \Amp\getReactor();
            $client = new Client($reactor);

            $promise = $client->request($url);
            $response = \Amp\wait($promise);

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

            echo "<table class='table-serverSettings'>";
            echo "<tr><th colspan='2'>Pool info</th></tr>";

            foreach ($headers as $header => $display) {
                echo "<tr><td>";
                echo $display;
                echo "</td><td>";
                echo $json[$header];
                echo "</td></tr>";
            }
            echo "</table>";

            echo "<div style='height: 20px;'></div>";
            
            echo "<table class='table-serverSettings'>";

            $processHeaders = [
                "pid",
                "state",
                //"start time",
                "start since",
                "requests",
                //https://bugs.php.net/bug.php?id=62382
                // "request duration", todo re-enable after upgrade
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

                            $text = str_replace(
                                [
                                    '/home/github/imagick-demos//imagick-demos',
                                    '/home/github/imagick-demos/imagick-demos'
                                ],
                                '',
                                $text
                            );

                            $text = ltrim($text, '/');

                            echo $text;
                        } else {
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

            return $output;
        }
        catch (\Exception $e) {
            while (ob_get_level() > $startOBLevel) {
                ob_end_clean();
            }
            return "Error fetching FPM status from `$url`. Error is: ".$e->getMessage();
        }
    }
}
