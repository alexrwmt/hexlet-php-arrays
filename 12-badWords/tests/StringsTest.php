<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;

use function App\Strings\makeCensored;

class StringsTest extends TestCase
{
    public function testMakeCensored()
    {
        $sentence1 = 'When you play the game of thrones, you win or you die';
        $actual1 = makeCensored($sentence1, ['die']);
        $expected1 =  'When you play the game of thrones, you win or you $#%!';
        $this->assertEquals($expected1, $actual1);

        $sentence2 = 'chicken chicken? chicken! chicken';
        $actual2 = makeCensored($sentence2, ['chicken']);
        $expected2 = '$#%! chicken? chicken! $#%!';
        $this->assertEquals($expected2, $actual2);

        $sentence2 = 'chicken chicken? chicken! ? chicken';
        $actual2 = makeCensored($sentence2, ['?', 'chicken']);
        $expected2 = '$#%! chicken? chicken! $#%! $#%!';
        $this->assertEquals($expected2, $actual2);
    }
}
