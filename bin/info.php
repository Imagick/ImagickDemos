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
    'MYSQL_USERNAME',
    'MYSQL_PASSWORD',
    'MYSQL_ROOT_PASSWORD',
    'GITHUB_ACCESS_TOKEN',
);

if(in_array($variableRequired, $allowedVariables) == true){
    exit(constant($variableRequired));
}

echo "Unknown variable: $variableRequired\n";

exit(-1);