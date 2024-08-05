<?php
use PHPUnit\Framework\TestCase;
use Andreterceiro\libs\Decimal;

final class DecimalTest extends TestCase
{
    public function testInvalidNegativeNumber() {
        // Not perfect, but works...
        try {
            $decimalConversor = new Decimal(-1);
            $decimalConversor->toRoman();
            $this->assertTrue(false);
        } catch (InvalidArgumentException $e) {
            $this->assertTrue(true);
        }
    }

    public function testInvalidBigNumber() {
        // Not perfect, but works...
        try {
            $decimalConversor = new Decimal(4000);
            $decimalConversor->toRoman();
            $this->assertTrue(false);
        } catch (InvalidArgumentException $e) {
            $this->assertTrue(true);
        }
    }

    public function testInvalidFloatNumber() {
        // Not perfect, but works...
        try {
            $decimalConversor = new Decimal(1.1);
            $decimalConversor->toRoman();
            $this->assertTrue(false);
        } catch (InvalidArgumentException $e) {
            $this->assertTrue(true);
        }
    }

    public function testInvalidStringWithAlfabeticCharacters() {
        // Not perfect, but works...
        try {
            $decimalConversor = new Decimal('1a1');
            $decimalConversor->toRoman();
            $this->assertTrue(false);
        } catch (InvalidArgumentException $e) {
            $this->assertTrue(true);
        }
    }

    public function testIntegerString() {
        $decimalConversor = new Decimal('1');
        $this->assertEquals(
            $decimalConversor->toRoman(),
            'I'
        );
    }

    public function testOne() {
        $decimalConversor = new Decimal(1);
        $this->assertEquals(
            $decimalConversor->toRoman(),
            'I'
        );
    }

    public function testThree() {
        $decimalConversor = new Decimal(3);
        $this->assertEquals(
            $decimalConversor->toRoman(),
            'III'
        );
    }

    public function testFour() {
        $decimalConversor = new Decimal(4);
        $this->assertEquals(
            $decimalConversor->toRoman(),
            'IV'
        );
    }

    public function testFive() {
        $decimalConversor = new Decimal(5);
        $this->assertEquals(
            $decimalConversor->toRoman(),
            'V'
        );
    }

    public function testSeven() {
        $decimalConversor = new Decimal(7);
        $this->assertEquals(
            $decimalConversor->toRoman(),
            'VII'
        );
    }

    public function testNine() {
        $decimalConversor = new Decimal(9);
        $this->assertEquals(
            $decimalConversor->toRoman(),
            'IX'
        );
    }

    public function testTen() {
        $decimalConversor = new Decimal(10);
        $this->assertEquals(
            $decimalConversor->toRoman(),
            'X'
        );
    }

    public function testThirteen() {
        $decimalConversor = new Decimal(13);
        $this->assertEquals(
            $decimalConversor->toRoman(),
            'XIII'
        );
    }

    public function testFourteen() {
        $decimalConversor = new Decimal(14);
        $this->assertEquals(
            $decimalConversor->toRoman(),
            'XIV'
        );
    }

    public function testFifteen() {
        $decimalConversor = new Decimal(15);
        $this->assertEquals(
            $decimalConversor->toRoman(),
            'XV'
        );
    }

    public function testSixteen() {
        $decimalConversor = new Decimal(16);
        $this->assertEquals(
            $decimalConversor->toRoman(),
            'XVI'
        );
    }

    public function testTwentyThree() {
        $decimalConversor = new Decimal(23);
        $this->assertEquals(
            $decimalConversor->toRoman(),
            'XXIII'
        );
    }

    public function testFortySix() {
        $decimalConversor = new Decimal(46);
        $this->assertEquals(
            $decimalConversor->toRoman(),
            'XLVI'
        );
    }

    public function testNinetyNine() {
        $decimalConversor = new Decimal(99);
        $this->assertEquals(
            $decimalConversor->toRoman(),
            'XCIX'
        );
    }

    public function testThreeHundred() {
        $decimalConversor = new Decimal(300);
        $this->assertEquals(
            $decimalConversor->toRoman(),
            'CCC'
        );
    }

    public function testFiveHundredAndFourteen() {
        $decimalConversor = new Decimal(514);
        $this->assertEquals(
            $decimalConversor->toRoman(),
            'DXIV'
        );
    }

    public function testOneThousandAndOne() {
        $decimalConversor = new Decimal(1001);
        $this->assertEquals(
            $decimalConversor->toRoman(),
            'MI'
        );
    }

    public function testTwoThousandThreeHundredAndFiftySeven() {
        $decimalConversor = new Decimal(2357);
        $this->assertEquals(
            $decimalConversor->toRoman(),
            'MMCCCLVII'
        );
    }

    public function testThreeThousandNineHundredNinetyNine() {
        $decimalConversor = new Decimal(3999);
        $this->assertEquals(
            $decimalConversor->toRoman(),
            'MMMCMXCIX'
        );
    }
}