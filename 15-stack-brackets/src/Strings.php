<?php

namespace App\Strings;

// BEGIN (write your solution here)
function checkIfBalanced($string) {
    $validBrackets = [
        '()',
        '[]',
        '{}',
    ];
    $openBrackets = ['(', '[', '{'];
    $closeBrackets = [')', ']', '}'];
    $chars = str_split($string);
    $stack = [];
    foreach ($chars as $char) {
        if (in_array($char, $openBrackets)) {
            array_push($stack, $char);
        } else {
            if (in_array($char, $closeBrackets)) {
                $pair = array_pop($stack) . $char;
                if (!in_array($pair, $validBrackets)) {
                    return false;
                }
            }
        }
    }
    return empty($stack);
}
// END
