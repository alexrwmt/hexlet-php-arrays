<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;

use function App\Arrays\addPrefix;

class ArraysTest extends TestCase
{
    public function testAddPrefix()
    {
        $names = ['john', 'smith', 'karl'];

        $actual1 = addPrefix($names, 'Mr');
        $expected = ['Mr john', 'Mr smith', 'Mr karl'];
        $this->assertEquals($expected, $actual1);

        $actual2 = addPrefix($names, 'Mrs');
        $expected = ['Mrs john', 'Mrs smith', 'Mrs karl'];
        $this->assertEquals($expected, $actual2);
    }
}
