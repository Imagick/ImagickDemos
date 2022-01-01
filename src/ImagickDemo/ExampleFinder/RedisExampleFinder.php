<?php

declare(strict_types=1);

namespace ImagickDemo\ExampleFinder;

use ImagickDemo\CodeExample;
use Predis\Client as RedisClient;

class RedisExampleFinder implements ExampleFinder
{
    private ExampleSourceFinder $exampleSourceFinder;

    public function __construct(private RedisClient $redis, private int $ttl)
    {
        $this->exampleSourceFinder = new ExampleSourceFinder();
    }

    /**
     * @param CodeExample[]
     */
    private function examplesToString(array $examples): string
    {
        $arrays = [];
        foreach ($examples as $example) {
            $arrays[] = (array)$example;
        }

        return json_encode_safe($arrays);
    }

    /**
     * @return CodeExample[]
     */
    private function examplesFromString(string $encoded)
    {
        $examples = [];

        $array = json_decode_safe($encoded);
        foreach ($array as $entry) {
            $examples[] = new CodeExample(
                $entry['category'],
                $entry['function'],
                $entry['lines'],
                $entry['description'],
                $entry['startLine']
            );
        }

        return $examples;
    }

    public function findExamples(string $category, string $example)
    {
        $key = 'example_' . $category . '_' . $example;
        $result = $this->redis->get($key);

        if ($result === null) {
            $examples = $this->exampleSourceFinder->findExamples($category, $example);
            $string = $this->examplesToString($examples);
            $this->redis->set($key, $string, 'EX', $this->ttl);
            return $examples;
        }

        $examples = $this->examplesFromString($result);
        return $examples;
    }
}