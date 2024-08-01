<?php
/**
 *
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
    public function setDecimal(int $decimal): void {
        if ($decimal < 1) {
            throw new RangeException("The passed decimal need to be greater than 0");
        }
        if ($decimal > 3999) {
            throw new RangeException("The passed decimal need to be lower than 4000");
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
    public function getDecimal(): int {
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
    public function decimalToRoman(): string {
        
    }
}