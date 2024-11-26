<?php

namespace App\Strings;

// BEGIN (write your solution here)
function makeCensored($sentence, $censored) {
    foreach ($censored as $badWord) {
        $sentence = str_replace($badWord, '$#%!', $sentence);
    }
    return $sentence;
}
// END
