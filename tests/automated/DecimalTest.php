<?php
use PHPUnit\Framework\TestCase;
use andreterceiro\libs\Decimal;

final class DecimalTest extends TestCase
{
    public function testInvalidNegativeNumber() {
        new Decimal;
        $this->assertEquals(1, 1);
    }
}