<?php
namespace Randomdata;
/**
 * Interface to implement for randomizer so consumers of the class are not
 * hinted to the specific implementation.
 * 
 * @author Christian Riesen <chris.riesen@gmail.com>
 */
interface RandomizerInterface
{
    /**
     * Returns a random element of an array
     * Just returns the value of it, key gets ignored
     * 
     * @param array $array
     * @return mixed
     */
    function getElement(array $array);
        
    /**
     * Creates a random letter in lower case
     * 
     * @return string
     */
    function getLetter();
    
    /**
     * Creates a random string from a given seed
     * 
     * @param integer $length
     * @param array $seed
     * @throws \InvalidArgumentException
     * @return string
     */
    function getString($length = 1, array $seed = array(1));
    
    /**
     * Creates a hex string (lowercase letters) of a given length
     * Common lengths:
     * md5: 32, sha1: 40, sha256: 64, sha512: 128, ripemd160: 40, whirlpool: 128
     * tiger160: 40, adler32 and crc32(b): 8, haval160: 40, haval256: 64
     * 
     * Each one generated could be a technical output of these algorithms
     * 
     * @param integer $length
     * @return string
     */
    function getHex($length = 1);
    
    /**
     * Returns a single digit (integer)
     * Just a single digit. By default also returns 0, if called with false,
     * only returns digits larger than zero
     * 
     * @param boolean $includeZero Optional if digit zero should be returned too
     * @return integer
     */
    function getDigit($includeZero = true);
    
    /**
     * Creates a random full number
     * 
     * @param integer $length maximum length of number in digits
     * @return number
     */
    function getNumber($length = null);
    
    /**
     * A number smaller then something
     * 
     * @param integer $max Maximum number this can be, minimum is 0
     * @return number
     */
    function getNumberMax($max = 1);
    
    /**
     * Gives you a false or true answer back as a real boolean
     * Parameter to finetune the chances of getting true. Higher means more
     * output of true happening.
     * 
     * @param integer $favorTrue Chances for true being given (5000 = 50%)
     * @return boolean
     */
    function getBoolean($favorTrue = 5000);
    
    /**
     * Creates a floting point number
     * 
     * @param integer $length Number of digits before decimal (default random)
     * @param integer $decimals Number of decimal digits (default random)
     * @return float 
     */
    function getFloat($length = null, $decimals = null);
        
    /**
     * @param \DateTime $start
     * @param \DateTime $end
     * @return \DateTime
     */
    function getDate(\DateTime $start = null, \DateTime $end = null);
}