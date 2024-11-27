<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;

use function App\Strings\buildDefinitionList;

class StringsTest extends TestCase
{
    public function testBuildDefinitionList()
    {
        $definitions1 = [
            ['key', 'value'],
            ['key2', 'value2'],
        ];
        $actual1 = buildDefinitionList($definitions1);
        $expected1 = '<dl><dt>key</dt><dd>value</dd><dt>key2</dt><dd>value2</dd></dl>';
        $this->assertEquals($expected1, $actual1);

        $definitions2 = [];
        $actual2 = buildDefinitionList($definitions2);
        $expected2 = '';
        $this->assertEquals($expected2, $actual2);
    }
}
