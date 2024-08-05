<?php
use PHPUnit\Framework\TestCase;
use Andreterceiro\libs\Roman;

final class RomanTest extends TestCase
{
    public function testOne() {
        $romanConversor = new Roman('I');
        $this->assertEquals(
            $romanConversor->toDecimal(),
            1
        );
    }

    public function testThree() {
        $romanConversor = new Roman('III');
        $this->assertEquals(
            $romanConversor->toDecimal(),
            3
        );
    }

    public function testFour() {
        $romanConversor = new Roman('IV');
        $this->assertEquals(
            $romanConversor->toDecimal(),
            4
        );
    }

    public function testFive() {
        $romanConversor = new Roman('V');
        $this->assertEquals(
            $romanConversor->toDecimal(),
            5
        );
    }

    public function testSeven() {
        $romanConversor = new Roman('VII');
        $this->assertEquals(
            $romanConversor->toDecimal(),
            7
        );
    }

    public function testNine() {
        $romanConversor = new Roman('IX');
        $this->assertEquals(
            $romanConversor->toDecimal(),
            9
        );
    }

    public function testTen() {
        $romanConversor = new Roman('X');
        $this->assertEquals(
            $romanConversor->toDecimal(),
            10
        );
    }

    public function testThirteen() {
        $romanConversor = new Roman('XIII');
        $this->assertEquals(
            $romanConversor->toDecimal(),
            13
        );
    }

    public function testFourteen() {
        $romanConversor = new Roman('XIV');
        $this->assertEquals(
            $romanConversor->toDecimal(),
            14
        );
    }

    public function testFifteen() {
        $romanConversor = new Roman('XV');
        $this->assertEquals(
            $romanConversor->toDecimal(),
            15
        );
    }

    public function testSixteen() {
        $romanConversor = new Roman('XVI');
        $this->assertEquals(
            $romanConversor->toDecimal(),
            16
        );
    }

    public function testTwentyThree() {
        $romanConversor = new Roman('XXIII');
        $this->assertEquals(
            $romanConversor->toDecimal(),
            23
        );
    }

    public function testFortySix() {
        $romanConversor = new Roman('XLVI');
        $this->assertEquals(
            $romanConversor->toDecimal(),
            46
        );
    }

    public function testNinetyNine() {
        $romanConversor = new Roman('XCIX');
        $this->assertEquals(
            $romanConversor->toDecimal(),
            99
        );
    }

    public function testThreeHundred() {
        $romanConversor = new Roman('CCC');
        $this->assertEquals(
            $romanConversor->toDecimal(),
            300
        );
    }

    public function testFiveHundredAndFourteen() {
        $romanConversor = new Roman('DXIV');
        $this->assertEquals(
            $romanConversor->toDecimal(),
            514
        );
    }

    public function testOneThousandAndOne() {
        $romanConversor = new Roman('MI');
        $this->assertEquals(
            $romanConversor->toDecimal(),
            1001
        );
    }

    public function testTwoThousandThreeHundredAndFiftySeven() {
        $romanConversor = new Roman('MMCCCLVII');
        $this->assertEquals(
            $romanConversor->toDecimal(),
            2357
        );
    }

    public function testThreeThousandNineHundredNinetyNine() {
        $romanConversor = new Roman('MMMCMXCIX');
        $this->assertEquals(
            $romanConversor->toDecimal(),
            3999
        );
    }
}