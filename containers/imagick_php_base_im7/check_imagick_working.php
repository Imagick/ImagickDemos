<?php

declare(strict_types = 1);


$imagick_loaded = extension_loaded('Imagick');

if ($imagick_loaded === true) {
    echo "Imagick is loaded.";
}
else {
    echo "Imagick is _not_ loaded.";
    exit(-1);
}

echo "Configure options are:\n";
$configure_options = Imagick::getConfigureOptions();

foreach ($configure_options as $key => $value) {
    echo "$key : $value \n";
}

exit(0);