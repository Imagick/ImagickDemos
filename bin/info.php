<?php

require_once __DIR__.'/../../clavis.php';

if (php_sapi_name() != "cli") {
    echo "not allowed";
    exit(0);
}

if ($argc != 2) {
    echo "Usage info.php SOME_VARIABLE_NAME\n";
    exit(0);
}

$variableRequired = $argv[1];

$allowedVariables = array(
    'github.access_token',
//    'MYSQL_PASSWORD',
//    'MYSQL_ROOT_PASSWORD',
//    'GITHUB_ACCESS_TOKEN',
);

if (in_array($variableRequired, $allowedVariables) == false) {
    echo "Unknown variable: $variableRequired\n";
    exit(-1);
}

$keys = getAppKeys();
    
if (array_key_exists($variableRequired, $keys) == false) {
    echo "Mysteriously the variable isn't set in the keys.";
    exit(-2);
}

exit("".$keys[$variableRequired]."");
