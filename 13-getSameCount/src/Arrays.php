<?php

namespace App\Arrays;

// BEGIN (write your solution here)
function getSameCount($arr1, $arr2) {
    $common = array_intersect(array_unique($arr1), array_unique($arr2));
    print_r($common);
    return count($common);
}
// END
