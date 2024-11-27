<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;

use function App\Strings\checkIfBalanced;

class StringsTest extends TestCase
{
    public function testCheckIfBalanced()
    {
        $this->assertTrue(checkIfBalanced('(5 + 6) * (7 + 8)/(4 + 3)')); // true
        $this->assertFalse(checkIfBalanced('(4 + 3))')); // false
        $this->assertFalse(checkIfBalanced('(')); // false
        $this->assertFalse(checkIfBalanced(')')); // false
        $this->assertFalse(checkIfBalanced(')()(')); // false
        $this->assertFalse(checkIfBalanced('3+5)()('));
        $this->assertFalse(checkIfBalanced('(()'));
        $this->assertFalse(checkIfBalanced('(1-(7+(3+5)*(2-1))'));
    }
}
