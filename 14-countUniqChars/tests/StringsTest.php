<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;

use function App\Strings\countUniqChars;

class StringsTest extends TestCase
{
    public function testCountUniqChars()
    {
        $text1 = 'You know nothing Jon Snow';
        $actual1 = countUniqChars($text1);
        $this->assertEquals(13, $actual1);

        $text2 = 'Fear cuts deeper than swords.';
        $actual2 = countUniqChars($text2);
        $this->assertEquals(16, $actual2);

        $text3 = '';
        $actual3 = countUniqChars($text3);
        $this->assertEquals(0, $actual3);

        $text4 = '0';
        $actual4 = countUniqChars($text4);
        $this->assertEquals(1, $actual4);
    }
}
