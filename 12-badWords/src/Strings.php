<?php

namespace App\Strings;

// BEGIN (write your solution here)
function makeCensored($sentence, $censored) {
    $words = explode(' ', $sentence);
    foreach ($words as $key => $word) {
        if (in_array($word, $censored)) {
            $words[$key] = '$#%!';
        }
    }
    return implode(' ', $words);
}
// END
