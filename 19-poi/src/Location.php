<?php

namespace App\Location;

function getDistance(array $point1, array $point2)
{
    [$x1, $y1] = $point1;
    [$x2, $y2] = $point2;

    $xs = $x2 - $x1;
    $ys = $y2 - $y1;

    return sqrt($xs ** 2 + $ys ** 2);
}

// BEGIN (write your solution here)
function getTheNearestLocation($items, $userPoint) {
    if (empty($items)) {
        return null;
    }

    [, $POIPoint] = $items[0];
    $shortestDistance = getDistance($userPoint, $POIPoint);
    $nearestPOI = $items[0];
    foreach ($items as $item) {
        [$title, [$x, $y]] = $item;
        $distance = getDistance($userPoint, [$x, $y]);
        if ($shortestDistance > $distance) {
            $shortestDistance = $distance;
            $nearestPOI = $item;
        }
    }
    return $nearestPOI;
}
// END


$locations = [
    ['Park', [10, 5]],
    ['Sea', [1, 3]],
    ['Museum', [8, 4]],
];

$currentPoint = [5, 5];

$result = getTheNearestLocation($locations, $currentPoint);
var_dump($result);