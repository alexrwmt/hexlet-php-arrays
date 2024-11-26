<?php

namespace App\Arrays;

// BEGIN (write your solution here)
function addPrefix($items, $prefix) {
    // $prefixedArray = [];
    foreach($items as $key => $value) {
        $items[$key] = $prefix.' ' .$value;
    }
    return $items;
}
// END
