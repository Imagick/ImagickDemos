<?php

declare(strict_types = 1);

namespace ImagickDemo;

trait ToArray
{
    public function toArray(): array
    {
        $data = [];
        foreach ($this as $name => $value) {
            if (strpos($name, '__') === 0) {
                //Skip
                continue;
            }

            [$error, $value] = \convertToValue($value);

            if ($error !== null) {
                throw new \Exception("Problem converting object property $name to value: " . $error);
            }

            $data[$name] = $value;
        }

        return $data;
    }
}
