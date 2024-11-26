<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;

use function App\Arrays\calculateAverage;

class ArraysTest extends TestCase
{
    public function testCalculateAverage()
    {
        $temperatures1 = [37.5, 34, 39.3, 40, 38.7, 41.5];

        $actual1 = calculateAverage($temperatures1);
        $this->assertEquals(38.5, $actual1);

        $temperatures2 = [36, 37.4, 39, 41, 36.6];

        $actual2 = calculateAverage($temperatures2);
        $this->assertEquals(38.0, $actual2);

        $temperatures3 = [];

        $actual3 = calculateAverage($temperatures3);
        $this->assertEquals(0, $actual3);
    }
}
