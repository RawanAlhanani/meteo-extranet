<?php

namespace Tests\Unit;

<<<<<<< HEAD
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    public function test_that_true_is_true()
=======
use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_that_true_is_true(): void
>>>>>>> 4d5adbcd7abac5b4ddd7716a201e1e65d62eee9f
    {
        $this->assertTrue(true);
    }
}
