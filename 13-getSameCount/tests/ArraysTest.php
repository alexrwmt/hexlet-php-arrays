<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;

use function App\Arrays\getSameCount;

class ArraysTest extends TestCase
{
    public function testSameCount()
    {
        $actual1 = getSameCount([], []);
        $this->assertEquals(0, $actual1);

        $actual2 = getSameCount([1, 2], []);
        $this->assertEquals(0, $actual2);

        $actual3 = getSameCount([0], ['one', 'two']);
        $this->assertEquals(0, $actual3);

        $actual4 = getSameCount([5, 3, 3], ['one', 'two']);
        $this->assertEquals(0, $actual4);

        $actual5 = getSameCount([1, 2, 3], [2, 8, 10]);
        $this->assertEquals(1, $actual5);

        $actual6 = getSameCount([1, 8, 2, 3], [2, 8, 10]);
        $this->assertEquals(2, $actual6);

        $actual7 = getSameCount([1, 3, 2, 2], [3, 1, 1, 2]);
        $this->assertEquals(3, $actual7);

        $actual8 = getSameCount([1, 1, 1, 2, 3], [1, 1]);
        $this->assertEquals(1, $actual8);
    }
}
