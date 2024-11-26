<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;

use function App\Arrays\apply;

class ArraysTest extends TestCase
{
    public function testGet()
    {
        $cities = ['moscow', 'london', 'berlin', 'porto'];

        $result1 = apply($cities, 'reset');
        $this->assertEquals([], $result1);

        $result2 = apply($cities, 'remove', 1);
        $this->assertEquals(['moscow', 'berlin', 'porto'], array_values($result2));
        $result3 = apply($cities, 'change', 0, 'miami');
        $this->assertEquals(['miami', 'london', 'berlin', 'porto'], array_values($result3));
    }
}
