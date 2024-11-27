<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;

use function App\Arrays\getIntersectionOfSortedArray;

class ArraysTest extends TestCase
{
    public function testGetIntersectionOfSortedArrays()
    {
        $actual1 = getIntersectionOfSortedArray([], []);
        $this->assertEquals([], $actual1);

        $actual2 = getIntersectionOfSortedArray([1], []);
        $this->assertEquals([], $actual2);

        $actual3 = getIntersectionOfSortedArray([], [2]);
        $this->assertEquals([], $actual3);

        $actual4 = getIntersectionOfSortedArray([10, 11, 24], [-2, 3, 4]);
        $this->assertEquals([], $actual4);

        $actual5 = getIntersectionOfSortedArray([10, 11, 24], [10, 13, 14, 18, 24, 30]);
        $this->assertEquals([10, 24], $actual5);

        $actual6 = getIntersectionOfSortedArray([3, 3, 10], [10, 12, 19, 21]);
        $this->assertEquals([10], $actual6);
    }
}
