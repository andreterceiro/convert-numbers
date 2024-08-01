
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
    private string $roman;

    /**
     * Constructor
     * 
     * @access public
     * 
     * @param int $roman Reference roman number
     */
    function __construct(int $decimal) {
        $this->decimal = $decimal;
    }

    /**
     * Validates and sets the roman number
     *
     * @param int decimal
     * 
     * @access public 
     * 
     * @return void
     */
    public function setRoman(string $roman): void {
        $this->roman = $roman;
    }

    /**
     * Returns the setted decimal
     * 
     * @access public
     * 
     * @return int
     */
    public function getRoman(): int {
        return $this->roman;
    }

    /**
     * Converts the setted decimal to roman
     * 
     * We do not need to throw an exception here because we know that the setted decimal number
     * is a number that we can convert
     * 
     * @returns string
     */
    public function toDecimal(): string {
        
    }
}