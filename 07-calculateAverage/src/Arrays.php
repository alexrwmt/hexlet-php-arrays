<?php

namespace App\Arrays;

// BEGIN (write your solution here)
function calculateAverage($items) {
    if (count($items) == 0) {
        return 0;
    }
    return array_sum($items) / count($items);
}
// END
