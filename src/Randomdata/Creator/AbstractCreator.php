<?php
namespace Randomdata\Creator;

use Randomdata\RandomizerInterface;

abstract class AbstractCreator implements CreatorInterface
{   
    protected $randomizer;
    
    public function __construct(RandomizerInterface $randomizer)
    {
        $this->randomizer = $randomizer;
    }
    
    public function usesFormatter()
    {
        return false;
    }
}