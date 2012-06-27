<?php
namespace Randomdata\Formatter\en_US;

class Name extends AbstractLocaleFormatter
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