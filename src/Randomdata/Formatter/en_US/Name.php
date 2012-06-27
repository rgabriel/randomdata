<?php
namespace Randomdata\Formatter\en_US;

class Name
{
    public function getFirstname()
    {
        return 'John';
    }
    
    public function getLastname()
    {
        return 'Doe';
    }
    
    public function getName()
    {
        return $this->getFirstname() . ' ' . $this->getLastname();
    }
}