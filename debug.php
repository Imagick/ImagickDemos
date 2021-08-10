<?php

declare(strict_types = 1);


$users = [
    ['uid' => 5],
    ['uid' => 6],
    []
];

foreach ($users as ['uid' => $uid]) {

    // , or $uid = 1
    echo "uid is " . $uid . "\n";
}