<?php
/**
 * Thinking...
 * 
 * 1  - I
 * 2  - II
 * 3  - III
 * 4  - IV
 * 5  - V
 * 6  - VI
 * 7  - VII
 * 8  - VIII
 * 9  - IX
 * 10 - X
 * 
 * In the next group of characters to test we only uses a "X" as the first char
 * 11 - XI
 * 12 - XII
 * 13 - XIII
 * 14 - XIV
 * 15 - XV
 * 16 - XVI
 * 17 - XVII
 * 18 - XVIII
 * 19 - XIX
 * 20 - XX
 * 
 * After 40 is starting to be used the character "L"
 * 40 - XL
 * 41 - XLI
 * 42 - XLII
 * 43 - XLIII
 * 44 - XLIV
 * 45 - XLV
 * 46 - XLVI
 * 47 - XLVII
 * 48 - XLVIII
 * 49 - XLVIX
 * 50 - L
 * 
 * We notted two things:
 * - In the number 50 não we do not have a X, as in 5 we do not have "I"
 * - From 1 to 9 all behaviour is repeated, very cool
 *
 * Let's see from 60 to 70 now:
 * - 60: LX
 * - 61: LXI
 * - 62: LXII
 * - 63: LXIII
 * - 64: LXIV
 * - 65: LXV
 * - 66: LXVI
 * - 67: LXVII
 * - 68: LXVIII
 * - 69: LXIX
 * - 70: LXX
 * 
 * Observations:
 * - To add 1 from 60 to 63 we have to add a "I" (61, 62, 63 => LXI, LXII, LXIII)
 *   but to add 10, we add an "X" (60, 70 => LX, LXX)
 * - From 1 to 9 all behaviour is repeated, very cool
 * 
 * Let's see from 90 to 100:
 * - 90:  XC
 * - 91:  XCI
 * - 92:  XCII
 * - 93:  XCIII
 * - 94:  XCIV
 * - 95:  XCV
 * - 96:  XCVI
 * - 97:  XCVII
 * - 98:  XCVIII
 * - 99:  XCIX
 * - 100: C
 * 
 * Observations:
 * - The unity works in the same way
 * - "C" appeared. But see that before the "C" character must be inserted the character "X" (10)  
 *   to subtract 10 from 100 (XC as example);
 *   
 * For now we know:
 * - The unity works always in the same way. The behaviour of a zero is special because we do not 
 *   have zero in roman numeral system;
 * 
 * Let's make another verifications:
 *   - IV => 4
 *   - V => 5
 *   - VI => 6
 *   - VII => 7
 *   - VIII => 8
 *   - IX => 9
 *   - X => 10
 *   - XI => 11
 *   - XII => 12
 *   - XIII => 13
 *   (we add - VI = 5 + 1 - or subtract - IV = 5 - 1 - above)
 *   ...
 *   - XL => 40
 *   - L => 50
 *   - LX => 60
 *   - LXX => 70
 *   - LXXX => 80
 *   - XC => 90
 *   - C => 100
 *   - CX => 110
 *   - CXX => 120
 *   - CXXX => 130
 *   - CXL => 140
 *   - CL => 150
 *   - CLX => 160
 *   (now we add or subtract 10 above)
 * 
 * We note that we have a patterns. Let's talk about the interval from 0 to 9:
 * - Symbol with the minor value: I, named by us of "A"
 * - Symbol of an intermediate value: V, named by us of "B"
 * - Symbol with the bigger value: X, named by us of "C"
 * 
 * Then we have:
 * 1 -  A
 * 2 -  AA
 * 3 -  AAA
 * 4 -  AB
 * 5 -  B
 * 6 -  BA
 * 7 -  BAA
 * 8 -  BAAA
 * 9 -  AC
 * 
 * For 10 to 90 (step = 10), let's use the same pattern ("A", "B" and "C"):
 * - Symbol with the minor value: X, named by us of "A"
 * - Symbol of an intermediate value: L, named by us of "B"
 * - Symbol with the bigger value: C, named by us of "C"
 * 
 * Stepping by 10, we have:
 * 10 -  A
 * 20 -  AA
 * 30 -  AAA
 * 40 -  AB
 * 50 -  B
 * 60 -  BA
 * 70 -  BAA
 * 80 -  BAAA
 * 90 -  AC
 *     
 * Repetition of the pattern!
 * 
 * Let's test more, from 100 to 900, stepping by 100:
 * - Symbol with the minor value: C, named by us of "A"
 * - Symbol of an intermediate value: D, named by us of "B"
 * - Symbol with the bigger value: M, named by us of "C"
 * 100 -  A
 * 200 -  AA
 * 300 -  AAA
 * 400 -  AB
 * 500 -  B
 * 600 -  BA
 * 700 -  BAA
 * 800 -  BAAA
 * 900 -  AC
 * 
 * Repetition of the pattern again!
 * 
 * We will do intil 3999, no secret, 1000, 2000 and 3000 is M, MM and MMM.
 * 
 * Let's test with some random numbers:
 * 512: B A AA => DXXX 
 * 1024: B _ XX IV => O underline in hundreds means that we don't have a character in this "house" 
 * Above we do not represented any character for hundreds. Let's make more similar tests:
 * 100: A _ _ => C 
 * 
 * We can say taht:
 * - We didn't have a character for unities;
 * - We didn't have a character for dozens 
 * - For hundreds, we had the character for hundreds with the lower value, "A", that were the "C"
 * 
 * Ok, let's make more tests:
 * 101: A _ A => CI
 * 110: A A _ => CX
 * 190: A AC _ =>  CXC
 * 2649: AA BA AB AC => MMDCXLIX
 * 4: AB => IV
 * 
 * Seems that we have a pattern and that we can sum the value of the "houses" (unities,
 * dozens, hundreds...)
 * 
 * Let's implement. After we will make some random unit tests...
 */
class Decimal {
    /**
     * Number value
     * 
     * @var int
     * @access private
     */
    private int $decimal;

    /**
     * Constructor
     * 
     * @access public
     * 
     * @param int $decimal Reference decimal number
     */
    function __construct(int $decimal) {
        $this->decimal = $decimal;
    }

    /**
     * Sets the decimal with a integer value
     *
     * @param int $decimal
     * 
     * @access public 
     * 
     * @return void
     */
    public function setNumber(int $decimal): void {
        if ($decimal < 1) {
            throw new RangeException("The passed decimal needs to be greater than 0");
        }
        if ($decimal > 3999) {
            throw new RangeException("The passed decimal needs to be lower than 4000");
        }
        $this->decimal = $decimal;
    }

    /**
     * Returns the setted decimal
     * 
     * @access public
     * 
     * @return int
     */
    public function getNumber(): int {
        return $this->decimal;
    }

    /**
     * Converts the setted decimal to roman
     * 
     * We do not need to throw an exception here because we know that the setted decimal number
     * is a number that we can convert
     * 
     * @returns string
     */
    public function toRoman(): string {
        $decimalNumber = $this->getNumber();       
        $arrayDecimalNumber = str_split($decimalNumber);
        
        // Reversingg to start from unit, next is dozens...
        $arrayDecimalNumber = array_reverse($arrayDecimalNumber);  
        
        // Let's create the patterns in a array:
        $patterns = [
            // 0 to 9
            0 => [
                'lower'  => 'I',
                'middle' => 'V',
                'higher' => 'X'
            ],
            // 10 to 99
            1 => [
                'lower'  => 'X',
                'middle' => 'L',
                'higher' => 'C'
            ],
            // 100 to 999
            2 => [
                'lower'  => 'C',
                'middle' => 'D',
                'higher' => 'M'
            ],
            3 => [
                'lower'  => 'M'
            ]
        ];

        $ret = '';

        foreach ($arrayDecimalNumber as $indexOfPattern => $decimalNumber) {
            if ($decimalNumber == 0) {
                continue;
            }
            // 1, 2 and 3 are formed by the repetition of the lower pattern
            if ($decimalNumber < 4) {
                $ret = str_repeat($patterns[$indexOfPattern]['lower'], (int) $decimalNumber) . $ret;
            } elseif  ($decimalNumber == 4) {
                $ret = $patterns[$indexOfPattern]['lower'] . $patterns[$indexOfPattern]['middle'] . $ret;
            } elseif  ($decimalNumber == 5) {
                $ret = $patterns[$indexOfPattern]['middle'] . $ret;
            } elseif ($decimalNumber < 9) { // 6, 7 and 8
                $ret = $patterns[$indexOfPattern]['middle'] . str_repeat($patterns[$indexOfPattern]['lower'], ((string)((int) $decimalNumber)) - 5) . $ret;
            } else { // 9
                $ret = $patterns[$indexOfPattern]['lower'] . $patterns[$indexOfPattern]['higher'] . $ret;
            }
        }

        return $ret;
    }
}