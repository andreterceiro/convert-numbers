<?php
use PHPUnit\Framework\TestCase;

final class HelloWorldTest extends TestCase
{
    public function testDummy() {
        $this->assertTrue(true);
    }

    public function testEquals() {
        $this->assertEquals(1, 1);
    }
}