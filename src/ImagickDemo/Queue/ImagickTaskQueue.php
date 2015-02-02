<?php

namespace ImagickDemo\Queue;

use Predis\Client as RedisClient;

class ImagickTaskQueue extends RedisTaskQueue {
    function __construct(RedisClient $redisClient) {
        parent::__construct($redisClient, 'Imagick');
    }
}