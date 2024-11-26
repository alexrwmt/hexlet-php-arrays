<?php

namespace App\Arrays;

function apply(array $items, string $operationName, int $index = null, $value = null): array
{
    // BEGIN (write your solution here)
    if ($operationName == 'reset') {
        return [];
    }
    if ($operationName == 'remove') {
        // if (array_key_exists($items, $index)) {
        unset($items[$index]);
        // }
        return $items;
    }
    if ($operationName == 'change') {
        $items[$index] = $value;
        return $items;
    }
    // END
}
