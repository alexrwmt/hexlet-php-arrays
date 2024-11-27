<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;

use function App\Location\getTheNearestLocation;

class LocationTest extends TestCase
{
    public function testGetTheNearestLocation()
    {
        $locations = [
            ['Park', [10, 5]],
            ['Sea', [1, 3]],
            ['Museum', [8, 4]],
        ];

        $currentPoint = [5, 5];

        $result = getTheNearestLocation([], $currentPoint);
        $this->assertNull($result);

        $result2 = getTheNearestLocation($locations, $currentPoint);
        $this->assertEquals($locations[2], $result2);

        $currentPoint2 = [1, 3];
        $result3 = getTheNearestLocation($locations, $currentPoint2);
        $this->assertEquals($locations[1], $result3);
    }
}
