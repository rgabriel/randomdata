<?php
namespace Randomdata;
/**
 * A basic class for doing very basic random things, that one needs to do over
 * and over again.
 * 
 * All this is pseudo random and not really secure random. So use this for tests
 * and other nont highly sensitive matters.
 * 
 * @author Christian Riesen <chris.riesen@gmail.com>
 */
class Randomizer implements RandomizerInterface
{
    protected $seedHex = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 'a', 'b', 'c', 'd', 'e', 'f');
    
    /**
     * Returns a random element of an array
     * Just returns the value of it, key gets ignored
     * 
     * @param array $array
     * @return mixed
     */
    public function getElement(array $array)
    {
        return $array[array_rand($array)];
    }
    
    /**
     * Creates a random letter in lower case
     * 
     * @return string
     */
    public function getLetter()
    {
        return chr(mt_rand(97, 122));
    }
    
    /**
     * Creates a random string from a given seed
     * 
     * @param integer $length
     * @param array $seed
     * @throws \InvalidArgumentException
     * @return string
     */
    public function getString($length = 1, array $seed = array(1))
    {
        if (!is_int($length)) {
            throw new \InvalidArgumentException('Length has to be an integer');
        }
        
        if ($length <= 0) {
            throw new \InvalidArgumentException('Length has to be 1 or larger');
        }
        
        $string = '';
        
        for ($i = 0; $i <= $length; $i++) {
            $string .= $this->getElement($seed);
        }
        
        return $string;
    }
    
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
    public function getHex($length = 1)
    {
        return $this->getString($length, $this->seedHex);
    }
    
    /**
     * Returns a single digit (integer)
     * Just a single digit. By default also returns 0, if called with false,
     * only returns digits larger than zero
     * 
     * @param boolean $includeZero Optional if digit zero should be returned too
     * @return integer
     */
    public function getDigit($includeZero = true)
    {
        if ($includeZero === true) {
            return mt_rand(0, 9);
        } else {
            return mt_rand(1, 9);
        }
    }
    
    /**
     * Creates a random full number
     * 
     * @param integer $length maximum length of number in digits
     * @return number
     */
    public function getNumber($length = null)
    {
        if (is_null($length)) {
            $length = $this->getDigit(false);
        }
        
        return mt_rand(1, str_repeat(9, $length));
    }
    
    /**
     * A number smaller then something
     * 
     * @param integer $max Maximum number this can be, minimum is 0
     * @return number
     */
    public function getNumberMax($max = 1)
    {
        return mt_rand(0, $max);
    }
    
    /**
     * Gives you a false or true answer back as a real boolean
     * Parameter to finetune the chances of getting true. Higher means more
     * output of true happening.
     * 
     * @param integer $favorTrue Chances for true being given (5000 = 50%)
     * @return boolean
     */
    public function getBoolean($favorTrue = 5000)
    {
        $random = mt_rand(1, 10000);
        
        if ($random <= $favorTrue) {
            return true;
        } else {
            return false;
        }
    }
    
    /**
     * Creates a floting point number
     * 
     * @param integer $length Number of digits before decimal (default random)
     * @param integer $decimals Number of decimal digits (default random)
     * @return float 
     */
    public function getFloat($length = null, $decimals = null)
    {
        if (is_null($length)) {
            $length = $this->getDigit(false);
        }

        if (is_null($decimals)) {
            $decimals = $this->getDigit(false);
        }
        
        $number = mt_rand(1, str_repeat(9, $length));
        $decimal = mt_rand(1, str_repeat(9, $decimals));
        
        return $number + ($decimal / (1 . str_repeat(0, ($decimals - 1))));
    }
    
    /**
     * @param \DateTime $start
     * @param \DateTime $end
     * @return \DateTime
     */
    public function getDate(\DateTime $start = null, \DateTime $end = null)
    {
        if (is_null($start)) {
            // default start is the unix epoch
            $start = new \DateTime('@' . 0);
        }
        
        if (is_null($end)) {
            // default end is today
            $end = new \DateTime();
        }
        
        // If the start is after the end, then just return the start
        if ($start >= $end) {
            return $start;
        }
        
        // Find a random spot in history
        $time = mt_rand($start->getTimestamp(), $end->getTimestamp());
        
        return new \DateTime('@' . $time);
    }
}