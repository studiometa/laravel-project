<?php

namespace Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     *
     */
    public function test_example(): void
    {
        $this->assertTrue(true);
    }
}
