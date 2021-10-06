<?php

declare(strict_types = 1);



$first = DateTime::createFromFormat("j M, H:i", "29 Apr, 23:29");
$second = DateTime::createFromFormat("j M, H:i", "5 Oct, 21:33");

$diff = $second->diff($first);

$diff->format()



