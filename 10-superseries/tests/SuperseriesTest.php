<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;

use function App\Superseries\getSuperSeriesWinner;

class SuperseriesTest extends TestCase
{
    public function testFirstSuperSeries()
    {
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
        $this->assertEquals('canada', $result);
    }

    public function testSecondSuperSeries()
    {
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
        $this->assertEquals('ussr', $result);
    }

    public function testThirdSuperSeries()
    {
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
        $this->assertNull($result);
    }
}
