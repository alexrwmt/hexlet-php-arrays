<?php

namespace App\Arrays;

// BEGIN (write your solution here)
function getIntersectionOfSortedArray(array $array1, array $array2): array
{
    $array1 = array_unique($array1);
    $array2 = array_unique($array2);
    $intersection = [];

    foreach($array1 as $i) {
        if (in_array($i, $array2)) {
            $intersection[] = $i;
        }
    }
    return $intersection;
}
// END
