<?php

declare(strict_types = 1);

$env = getenv();


if (array_key_exists('ENV_DESCRIPTION', $env) === false) {
    echo "env description not set.\n";
    exit(-1);
}

$env_description = $env['ENV_DESCRIPTION'];
$env_parts = explode(",", $env_description);

if (in_array('local', $env_parts, true) === true) {
    echo "update";
    exit(0);
}

echo "prod";
exit(0);
