<?php

namespace App\Strings;

// BEGIN (write your solution here)
function countUniqChars($string) {
    if (strlen($string) == 0) {
        return 0;
    }

    $chars = [];
    foreach (str_split($string) as $char) {
        if (!array_key_exists($char, $chars)) {
            $chars[$char] = 0;
        }
        $chars[$char]++;
    }
    return count($chars);
}
// END
