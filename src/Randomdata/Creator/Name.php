<?php
namespace Randomdata\Creator;

use Randomdata\Formatter\FormatterInterface;

class Name extends AbstractFormattedCreator
{
    public function getFirstname()
    {
        return $this->formatter->getFirstname();
    }
    
    public function getLastname()
    {
        return $this->formatter->getLastname();
    }
    
    public function getName()
    {
        return $this->formatter->getFirstname() . ' ' . $this->formatter->getLastname();
    }
    
    public function getFullname()
    {
        // Randomly adds 0 to 3 middle names into the mix, chosen from first names
        
    }
}