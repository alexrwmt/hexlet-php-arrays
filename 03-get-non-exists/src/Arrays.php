<?php

namespace App\Arrays;

// BEGIN (write your solution here)
function get($items, $index, $default = null) {
    if (array_key_exists($index, $items)) {
        return $items[$index];
    }
    return $default;
}
// END
