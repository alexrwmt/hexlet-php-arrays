<?php
namespace App\Superseries;

// BEGIN (write your solution here)
function getSuperSeriesWinner($scores) {

    $canada = 0;
    $ussr = 0;
    $nobody = 0;

    foreach($scores as $game) {
        // match getWinnerIndex($game)
        var_dump($game[0] <=> $game[1]);
        match ($game[0] <=> $game[1]) {
            -1 => ++$ussr,
            0 => ++$nobody,
            1 => ++$canada
        };
    }
    if ($canada > $ussr)
        return 'canada';
    if ($ussr > $canada)
        return 'ussr';
    return null;
}

// function getWinnerIndex($game) {
//     return ;
// }
// END

$scores = [
    [3, 7],
    [4, 1],
    [4, 4],
    [3, 5],
    [4, 5],
    [3, 2],
    [4, 3],
    [6, 5],
];

$result = getSuperSeriesWinner($scores);
var_dump($result);


$scores = [
    [3, 3],
    [4, 1],
    [5, 8],
    [5, 5],
    [2, 3],
    [2, 5],
    [4, 4],
    [2, 3],
];

$result = getSuperSeriesWinner($scores);
var_dump($result);

$scores = [
    [3, 2],
    [4, 1],
    [5, 8],
    [5, 5],
    [2, 2],
    [2, 4],
    [4, 2],
    [2, 3],
];

$result = getSuperSeriesWinner($scores);
var_dump($result);