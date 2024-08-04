<?php
/**
 * First let's think in roman to decimal conversion. 
 * Reference: http://t2.gstatic.com/licensed-image?q=tbn:ANd9GcTVq0phNZQxLnNmF0BFEbr3grVZI1g_HLio6s_CsNYHEPeEc-NlrL_RcToc2qCbbm48
 * Reference for values of conversions: https://www.todamateria.com.br/numeros-romanos/ 
 * 
 * OBS: please see in the second link: 0 and negative numbers don't exists. Nor fractional numbers
 *
 * Another reference link: https://pt.wikipedia.org/wiki/Numera%C3%A7%C3%A3o_romana#:~:text=Para%20cifras%20elevadas%2C%20utiliza%2Dse,000%2C%20que%20corresponde%20a%20MMMCMXCIX.
 * 
 * We have numbers with a dash above the number! We do not have this characters in the ASCII table:
 * https://www.sciencebuddies.org/science-fair-projects/references/ascii-table
 * 
 * We will ignore these numbers with a dash above the number, ok?
 * 
 * The first problematic character is related to the number 4000.
 * 
 * In the final of the comment we will try to convert to roman the decimal 3999
 * 
 * Let's start thinking, drafting things: 
 * I -> 1
 * II -> 2
 * III -> 3
 * IV -> 4
 * V -> 5
 * VI -> 6
 * VII -> 7
 * VIII -> 8
 * IX -> 9
 * X -> 10
 * 
 * Let's stop for now.
 * 
 * We can verify if we have I a symbol before V or X. If yes, we need to subtract the previous
 * symbol. And we can sum numbers this way:
 * I: sum 1 for every I alone or after I, V or X
 * V: sum 5 for every V alone or after X
 * X: sum 10
 *   
 * Let's test:
 * I: sum 1 = 1 
 * II: sum 1, sum 1 = 2
 * III: sum 1, sum 1, sum 1 = 4
 * IV: sum 5, subtract 1 = 4
 * V: sum 5
 * VI: sum 5, sum 1 = 6
 * VII: sum 5, sum 1, sum 1 = 7
 * VIII: sum 5, sum 1, sum 1, sum 1 = 8
 * IX: sum 10, subtract 1
 * X: sum 10
 * 
 * Ok, seems right. Let's test with random numbers:
 * XXVII: sum 10, sum 10, sum 5, sum 1, sum 1: 27
 * XXXIV: sum 10, sum 10, sum 10, subtract 1, sum 5: 34
 * 
 * Seems right for now, let's adds another symbols:
 * L: 50
 * C: 100
 * D: 500
 * M: 1000
 *
 * The symbol to subtract need to be lower than the next symbol. What do I mean:
 * IV: I is lower than V, 5 - 1 = 4
 * 
 * But see:
 * VX: do not exists, XV = 15, ok, but VX do not exists
 * IX: 9
 * 
 * Hum... Let's do another verifications:
 * LC: do not exists
 * IC: do not exists
 * XC: 90 100 - 10
 * XCI ... XCIX = 91 ... 99
 * 
 * XL: 40
 * 
 * We have unities, dozens, hundreds
 * The number previuos for another number needs to be the lower number in the scale position 
 * of the reference number, like 
 * X is the lower number for dozens in case of XL
 * X is the lower number for dozens in case of XC
 * I is the lower number for unities in case of IX
 * 
 * Another verifications:
 * XL: 40 -> X is the bigger symbol previous L: 50 - 10
 * IL: don't exists. X is the lower symbol for dozens, not I
 * XLI: 41: 50 - 10 + 1
 * LI: 51, 50 + 1
 * LX: 60, 50 + 10
 * LXX: 70, 50 + 10 + 10
 * 
 * Let's try to convert the decimal 3999:
 * 3000: MMM +
 * 900: CM +
 * 90: XC +
 * 9: IX
 * 
 * So: 3999 (decimal) = MMMCMXCIX (decimal)
 * 
 * Let's start to implement
 */
class Roman {
    /**
     * Roman value
     * 
     * @var string
     * @access private
     */
    private string $romanNumber;

    /**
     * Constructor
     * 
     * @access public
     *
     * @throws InvalidArgumentException Rethrows an exception if its receive an ivalid roman number
     *
     * @param string $romanNumber Reference roman number
     */
    function __construct(string $romanNumber) {
        $this->setNumber($romanNumber);
    }

    /**
     * Validates (with another method) and sets the roman number
     *
     * @throws InvalidArgumentException If the received roman is not a valid roman number
     *
     * @access public
     *
     * @param string $romanNumber The roman number character to be setted
     *
     * @return void
     */
    public function setNumber(string $romanNumber): void {
        $roman = strtoupper($romanNumber);
    
        if (! $this->validatesNumber($romanNumber)) {
            throw new InvalidArgumentException("$romanNumber is not a valid roman number");
        }

        $this->romanNumber = $romanNumber;
    }

    /**
     * Returns true if the passed roman number is valid
     * 
     * Access private? We need to test. Ok, then test the constructor or the setRoman method
     *
     * @access private
     *
     * @param string $romanNumber The roman number character to be validated
     *
     * @return bool
     */
    private function validatesNumber(string $romanNumber): bool {
        // We need only to accept valid characters
        if (preg_match('/[^IVXLCDM]/', $romanNumber)) {
            return false;
        }

        // But we still need to filter invalid combinations
        // One thing that we need to think os that the characters with bigger values 
        // need to come before the characters with lower value except in some especial cases
        // 
        // Examples:
        // CI: 101
        // XC: 90
        // IC: Does not exists

        // Let's start verifying the "I" character. Needs to be the last character except in the 
        // case of IV or IX. The charcter in the verification will be the first caracter in the
        // "or" part of the regex, like the "[IL]" part
        if ((substr_count($romanNumber, 'IL') > 0) || (substr_count($romanNumber, 'IC') > 0) || (substr_count($romanNumber, 'ID') > 0) || (substr_count($romanNumber, 'IM') > 0)) {
            return false;
        }
        
        // Now we need to verify the "V" character
        if ((substr_count($romanNumber, 'VX') > 0) || (substr_count($romanNumber, 'VL') > 0) || (substr_count($romanNumber, 'VC') > 0) || (substr_count($romanNumber, 'VD') > 0) || (substr_count($romanNumber, 'VM') > 0)) {
            return false;
        }

        // Now we need to verify the "X" character. We do not need to verify again combinations that
        // we already verified, like VX
        if ((substr_count($romanNumber, 'XM') > 0) || (substr_count($romanNumber, 'XD') > 0)) {
            return false;
        }

        //echo "HERE 2";

        // Now we need do verify the "L" character
        if ((substr_count($romanNumber, 'LC') > 0) || (substr_count($romanNumber, 'LD') > 0) || (substr_count($romanNumber, 'LM') > 0)) {
            return false;
        }

        // Now we need do verify the "C" character. We can have all valid combinations with "C"
        // as the first character. Let's make a draft to verify:
        // CI: 101
        // CII: 102 (we will only verify this first repetition of characters)
        // CV: 105
        // CX: 110
        // CL: 150
        // CC: 200
        // CD: 400
        // CM: 900
        //
        // And ICX? Is invalid! We already filtered in "I" verification :)

        // Now we need to verify the "D" character
        if (substr_count($romanNumber, 'DM') > 0) {
            return false;
        }

        // Now we need to verify the "M" character. We can have all valid combinations with "M"
        // as first character. Let's make a draft to verify:
        // MI: 1001
        // MII: 1002
        // MV: 1005
        // MX: 1010
        // ML: 1050
        // MC: 1100
        // MD: 1500
        // MM: 2000

        // But we maybe still have invalid repetition combinations, like IIII. Let's make a draft...
        // III: 3
        // IIII (4 or more characters): invalid, 4 is "IV"
        // V: 5
        // VV: (2 or more characters): invalid, 10 is "X"
        // XXX: 30
        // XXXX (4 or more characters): invalid, 40 id "LX"
        // L: 50
        // LL (2 or more characters): invalid, 100 is "C"
        // CCC: 300
        // CCCC (4 or more characters): invalid, 400 is "ID"
        // D: 500
        // DD (2 or more characters): invalid, 1000 is "M"
        // MMM: 3000
        // MMMM (4 or more characters): invalid, 3999 is the bigger number that we accept
        // 
        // Now we will make a regex step by step to be more readable for every character
        if (preg_match('/(I{4,})/', $romanNumber)) {
            return false;
        }
        if (preg_match('/(V{2,})/', $romanNumber)) {
            return false;
        }
        if (preg_match('/(X{4,})/', $romanNumber)) {
            return false;
        }
        if (preg_match('/(L{2,})/', $romanNumber)) {
            return false;
        }
        if (preg_match('/(C{4,})/', $romanNumber)) {
            return false;
        }
        if (preg_match('/(D{2,})/', $romanNumber)) {
            return false;
        }
        if (preg_match('/(M{4,})/', $romanNumber)) {
            return false;
        }

        // But...
        // If we still have invalid combinations repeated, like:
        // XCX
        // See, XCX is already invalid, is not necessary to be XCXC
        // Hum... we also need to filter
        // Let's make a regex for every character o be more readable
        // Remember, we already filtered another invalid cases, like IC

        // For "I"
        if (preg_match('/IV[\w]*I/', $romanNumber)) {
            return false;
        }
        if (preg_match('/IX[\w]*I/', $romanNumber)) {
            return false;
        }

        // For "V". "V" will not be as previous character of another character with a major value

        // For "X"
        // We need to think in "XL[X|XX|XXX]IX" = 49 and XCIX[XC|X|XX|XXX]IX
        if (preg_match('/XL^[X]*X/', $romanNumber)) {
            return false;
        }
        if (preg_match('/XC[\w]*X/', $romanNumber)) {
            return false;
        }

        // For "L". "L" will not be as previous character of another character with a major value

        // For "C"
        if (preg_match('/CD[\w]*C/', $romanNumber)) {
            return false;
        }
        if (preg_match('/CM[\w]*C/', $romanNumber)) {
            return false;
        }

        // For "D". "D" will not be as previous character of another character with a major value

        // For "M". "M" is the major character

        // Else we need to return true
        return true;
    }

    /**
     * Returns the setted roman number
     * 
     * @access public
     * 
     * @return string
     */
    public function getNumber(): string {
        return $this->romanNumber;
    }

    /**
     * Converts the setted decimal to roman
     * 
     * We do not need to throw an exception here because we know that the setted decimal number
     * is a number that we can convert
     * 
     * @return string
     */
    public function toDecimal(): string {
        $romanNumber = $this->getNumber();
        $decimalNumber = 0;

        // Lets start with the subtractions

        // I
        if (strpos($romanNumber, 'IV') > -1) {
            $decimalNumber -= 1;
            $romanNumber = str_replace('I', '', $romanNumber);
        }
        if (strpos($romanNumber, 'IX') > -1) {
            $decimalNumber -= 1;
            $romanNumber = str_replace('IX', 'X', $romanNumber);
        }

        // V -> we can't have V as subtractor

        // X
        if (strpos($romanNumber, 'XL') > -1){
            $decimalNumber -= 10;
            $romanNumber = str_replace('XL', 'L', $romanNumber)   ;
        }

        if (strpos($romanNumber, 'XC') > -1) {
            $decimalNumber -= 10;
            $romanNumber = str_replace('XC', 'C', $romanNumber);
        }

        // L -> we can't have V as subtractor

        // C
        if (strpos($romanNumber, 'CD') > -1) {
            $decimalNumber -= 100;
            $romanNumber = str_replace('CD', 'D', $romanNumber);
        }
        if (strpos($romanNumber, 'CM') > -1) {
            $decimalNumber -= 100;
            $romanNumber = str_replace('CM', 'M', $romanNumber);
        }

        // D -> we can't have D as subtractor

        // M -> we can't have M as subtractor

        // Now we only need to count the charactes and map to these values
        // Remember that we already removed the subtraction :)
        // Because in some cases we can have a valid repetition of characters, like II (equals 2)
        $characterValuesMaps = [
            "I" => 1,
            "V" => 5,
            "X" => 10,
            "L" => 50,
            "C" => 100,
            "D" => 500,
            "M" => 1000,
        ];

        foreach ($characterValuesMaps as $character => $value) {
            $decimalNumber += substr_count($romanNumber, $character) * $value;
        }

        return $decimalNumber;
    }
}