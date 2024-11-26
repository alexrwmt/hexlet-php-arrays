<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;

use function App\Arrays\get;

class ArraysTest extends TestCase
{
    public function testGet()
    {
        $cities = ['moscow', 'london', 'berlin', 'porto', null];

        $actual1 = get($cities, 0);
        $this->assertEquals($cities[0], $actual1);

        $actual2 = get($cities, 2, 'default');
        $this->assertEquals($cities[2], $actual2);

        $actual3 = get($cities, 4, false);
        $this->assertNull($actual3);

        $actual4 = get($cities, -1, 'oops');
        $this->assertEquals('oops', $actual4);

        $actual5 = get($cities, 4, 'default');
        $this->assertEquals($cities[4], $actual5);
    }
}
